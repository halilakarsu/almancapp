<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Lesson;
use App\Models\UserCardProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    /**
     * Show the card study session for a lesson.
     * Card order: wrong-heavy → learning → new
     */
    public function study(Request $request, $lessonId)
    {
        $lesson = Lesson::where('is_active', true)->findOrFail($lessonId);

        $userId = Auth::id() ?? 1; // fallback for dev

        $allCards = Card::where('lesson_id', $lessonId)
            ->where('is_active', true)
            ->orderBy('order_index')
            ->get();

        // Attach progress data to each card
        $progressMap = UserCardProgress::where('user_id', $userId)
            ->whereIn('card_id', $allCards->pluck('id'))
            ->get()
            ->keyBy('card_id');

        // Sort: wrong-heavy first, then learning, then new
        $sorted = $allCards->sortBy(function ($card) use ($progressMap) {
            $p = $progressMap->get($card->id);
            if (!$p || $p->status === 'new') return 2;
            if ($p->status === 'learning') return 1;
            // known – show at end but still show
            return 3;
        })->sortByDesc(function ($card) use ($progressMap) {
            $p = $progressMap->get($card->id);
            return $p ? $p->wrong_count : 0;
        })->values();

        // Build card data for the view
        $cards = $sorted->map(function ($card) use ($progressMap) {
            $p = $progressMap->get($card->id);
            return [
                'id'             => $card->id,
                'type'           => $card->type,
                'german_content' => $card->german_content,
                'turkish_content'=> $card->turkish_content,
                'image'          => $card->image,
                'audio'          => $card->audio,
                'difficulty'     => $card->difficulty,
                'status'         => $p?->status ?? 'new',
                'correct_count'  => $p?->correct_count ?? 0,
                'wrong_count'    => $p?->wrong_count ?? 0,
            ];
        });

        // Stats for header
        $stats = [
            'new'      => $allCards->filter(fn($c) => !$progressMap->has($c->id) || $progressMap[$c->id]->status === 'new')->count(),
            'learning' => $allCards->filter(fn($c) => $progressMap->has($c->id) && $progressMap[$c->id]->status === 'learning')->count(),
            'known'    => $allCards->filter(fn($c) => $progressMap->has($c->id) && $progressMap[$c->id]->status === 'known')->count(),
            'total'    => $allCards->count(),
        ];

        return view('user.cards.study', compact('lesson', 'cards', 'stats'));
    }

    /**
     * AJAX – record 👍 or 👎 for a card.
     */
    public function review(Request $request)
    {
        $request->validate([
            'card_id' => 'required|exists:cards,id',
            'knew'    => 'required|boolean',
        ]);

        $userId = Auth::id() ?? 1;

        $progress = UserCardProgress::firstOrCreate(
            ['user_id' => $userId, 'card_id' => $request->card_id],
            [
                'status'        => 'new',
                'correct_count' => 0,
                'wrong_count'   => 0,
                'repetitions'   => 0,
                'ease_factor'   => 2.50,
                'interval_days' => 1,
            ]
        );

        $progress->review((bool) $request->knew);

        return response()->json([
            'status'         => $progress->status,
            'correct_count'  => $progress->correct_count,
            'wrong_count'    => $progress->wrong_count,
            'next_review_at' => $progress->next_review_at?->toDateTimeString(),
        ]);
    }
}
