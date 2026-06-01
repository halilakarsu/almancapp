<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function show($id)
    {
        $lesson = Lesson::with([
            'level',
            'cards' => fn ($q) => $q->where('is_active', true)->orderBy('order_index'),
        ])->where('is_active', true)->findOrFail($id);

        return view('user.lessons.show', compact('lesson'));
    }

    public function exercise($id)
    {
        $lesson = Lesson::with([
            'level',
            'cards' => fn ($q) => $q->where('is_active', true),
        ])->where('is_active', true)->findOrFail($id);

        // Alıştırma kartları: tüm kartlar karıştırılmış şekilde
        $cards = collect();

        foreach ($lesson->cards as $c) {
            $cards->push([
                'type' => $c->type,
                'question' => $c->german_content,
                'answer' => $c->turkish_content,
            ]);
        }

        // Karıştır
        $cards = $cards->shuffle()->values();

        // Her kart için 3 yanlış seçenek üret (diğer kartların cevaplarından, ama SADECE aynı tipten olanlar)
        $cards = $cards->map(function ($card) use ($cards) {
            $sameTypeAnswers = $cards->where('type', $card['type'])->pluck('answer')->toArray();

            $wrong = collect($sameTypeAnswers)
                ->filter(fn ($a) => $a !== $card['answer'])
                ->shuffle()
                ->take(3)
                ->values()
                ->toArray();

            $choices = collect(array_merge([$card['answer']], $wrong))
                ->shuffle()
                ->values()
                ->toArray();

            $card['choices'] = $choices;

            return $card;
        });

        return view('user.lessons.exercise', compact('lesson', 'cards'));
    }

    public function matchWords($id)
    {
        $lesson = Lesson::with([
            'level',
            'cards' => fn ($q) => $q->where('is_active', true)->where('type', 'match'),
        ])->where('is_active', true)->findOrFail($id);

        $pairs = collect();

        foreach ($lesson->cards as $c) {
            $pairs->push([
                'id' => 'card_'.$c->id,
                'de' => $c->german_content,
                'tr' => $c->turkish_content,
            ]);
        }

        // Shuffle pairs so the game gets a randomized set
        $pairs = $pairs->shuffle()->values();

        return view('user.lessons.match', compact('lesson', 'pairs'));
    }

    public function scrambleSentences($id)
    {
        $lesson = Lesson::with([
            'level',
            'cards' => fn ($q) => $q->where('is_active', true)->where('type', 'sentence'),
        ])->where('is_active', true)->findOrFail($id);

        $sentences = $lesson->cards->map(function ($c) {
            return [
                'tr' => strip_tags($c->turkish_content),
                'de' => strip_tags($c->german_content),
            ];
        })->shuffle()->values();

        return view('user.lessons.scramble', compact('lesson', 'sentences'));
    }

    public function fillBlanks($id)
    {
        $lesson = Lesson::with([
            'level',
            'cards' => fn ($q) => $q->where('is_active', true)->where('type', 'sentence'),
        ])->where('is_active', true)->findOrFail($id);

        // Prepare sentences for fill in the blanks
        $sentences = $lesson->cards->map(function ($c) {
            return [
                'tr' => strip_tags($c->turkish_content),
                'de' => strip_tags($c->german_content),
            ];
        })->shuffle()->values();

        return view('user.lessons.fill', compact('lesson', 'sentences'));
    }

    public function writePractice($id)
    {
        $lesson = Lesson::with([
            'level',
            'cards' => fn ($q) => $q->where('is_active', true),
        ])->where('is_active', true)->findOrFail($id);

        // Prepare words/sentences for writing practice
        $items = $lesson->cards->map(function ($c) {
            return [
                'type' => $c->type,
                'tr' => strip_tags($c->turkish_content),
                'de' => strip_tags($c->german_content),
                'image' => $c->image ? asset('storage/'.$c->image) : null,
            ];
        })->shuffle()->values();

        return view('user.lessons.write', compact('lesson', 'items'));
    }
}
