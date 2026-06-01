<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CardController extends Controller
{
    public function index(Request $request)
    {
        $query = Card::with('lesson')->withTrashed(false);

        if ($request->filled('lesson_id')) {
            $query->where('lesson_id', $request->lesson_id);
        }
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }
        if ($request->filled('difficulty')) {
            $query->where('difficulty', $request->difficulty);
        }
        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('german_content', 'ilike', "%{$s}%")
                    ->orWhere('turkish_content', 'ilike', "%{$s}%");
            });
        }

        $sort = $request->get('sort', 'order_index');
        $dir = $request->get('dir', 'asc');
        $allowed = ['order_index', 'german_content', 'type', 'lesson_id'];

        if (! in_array($sort, $allowed)) {
            $sort = 'order_index';
        }
        $dir = $dir === 'desc' ? 'desc' : 'asc';

        $cards = $query->orderBy($sort, $dir)->paginate(100)->withQueryString();
        $lessons = Lesson::where('is_active', true)->orderBy('lesson_title')->get();

        if ($request->ajax()) {
            $tableHtml = view('admin.cards._table_rows', compact('cards', 'lessons'))->render();
            $paginationHtml = $cards->hasPages() ? view('admin.cards._pagination', compact('cards'))->render() : '';

            return response()->json([
                'tableHtml' => $tableHtml,
                'paginationHtml' => $paginationHtml,
                'total' => $cards->total(),
            ]);
        }

        return view('admin.cards.index', compact('cards', 'lessons', 'sort', 'dir'));
    }

    public function create()
    {
        $lessons = Lesson::where('is_active', true)->orderBy('lesson_title')->get();

        return view('admin.cards.create', compact('lessons'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'lesson_id' => 'nullable|exists:lessons,id',
            'type' => 'required|in:word,sentence,match,scramble,fill,write',
            'german_content' => 'required|string',
            'turkish_content' => 'required|string',
            'difficulty' => 'required|integer|min:1|max:3',
            'order_index' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'image' => 'nullable|image|max:4096',
            'audio' => 'nullable|mimes:mp3,ogg,wav,m4a|max:10240',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('cards/images', 'public');
        }

        // Handle audio upload
        if ($request->hasFile('audio')) {
            $data['audio'] = $request->file('audio')->store('cards/audio', 'public');
        }

        $data['is_active'] = $request->boolean('is_active', true);

        $card = Card::create($data);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Kart başarıyla oluşturuldu.']);
        }

        return redirect()->route('admin.cards.index')
            ->with('success', 'Kart başarıyla oluşturuldu.');
    }

    public function show(Card $card)
    {
        return redirect()->route('admin.cards.edit', $card);
    }

    public function edit(Card $card)
    {
        $lessons = Lesson::where('is_active', true)->orderBy('lesson_title')->get();

        return view('admin.cards.edit', compact('card', 'lessons'));
    }

    public function update(Request $request, Card $card)
    {
        $data = $request->validate([
            'lesson_id' => 'nullable|exists:lessons,id',
            'type' => 'required|in:word,sentence,match,scramble,fill,write',
            'german_content' => 'required|string',
            'turkish_content' => 'required|string',
            'difficulty' => 'required|integer|min:1|max:3',
            'order_index' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'image' => 'nullable|image|max:4096',
            'audio' => 'nullable|mimes:mp3,ogg,wav,m4a|max:10240',
        ]);

        if ($request->hasFile('image')) {
            if ($card->image) {
                Storage::disk('public')->delete($card->image);
            }
            $data['image'] = $request->file('image')->store('cards/images', 'public');
        }

        if ($request->hasFile('audio')) {
            if ($card->audio) {
                Storage::disk('public')->delete($card->audio);
            }
            $data['audio'] = $request->file('audio')->store('cards/audio', 'public');
        }

        $data['is_active'] = $request->boolean('is_active', true);

        $card->update($data);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Kart başarıyla güncellendi.']);
        }

        return redirect()->route('admin.cards.index')
            ->with('success', 'Kart başarıyla güncellendi.');
    }

    public function destroy(Card $card)
    {
        $card->delete();

        if (request()->ajax() || request()->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Kart başarıyla silindi.']);
        }

        return redirect()->route('admin.cards.index')
            ->with('success', 'Kart silindi.');
    }

    public function copy(Card $card)
    {
        $newCard = $card->replicate();
        $maxOrder = Card::where('lesson_id', $card->lesson_id)->max('order_index') ?? 0;
        $newCard->order_index = $maxOrder + 1;
        $newCard->save();

        if (request()->ajax() || request()->wantsJson()) {
            $newCard->load('lesson');

            return response()->json([
                'success' => true,
                'message' => 'Kart başarıyla kopyalandı.',
                'card' => $newCard->toArray(),
            ]);
        }

        return redirect()->route('admin.cards.index')
            ->with('success', 'Kart başarıyla kopyalandı.');
    }

    public function inlineUpdate(Request $request, Card $card)
    {
        $data = $request->validate([
            'type' => 'nullable|in:word,sentence,match,scramble,fill,write',
            'order_index' => 'nullable|integer|min:0',
            'difficulty' => 'nullable|integer|min:1|max:3',
            'lesson_id' => 'nullable|exists:lessons,id',
        ]);

        if (isset($data['type'])) {
            $card->type = $data['type'];
        }
        if (isset($data['order_index'])) {
            $card->order_index = $data['order_index'];
        }
        if (isset($data['difficulty'])) {
            $card->difficulty = $data['difficulty'];
        }
        if (isset($data['lesson_id'])) {
            $card->lesson_id = $data['lesson_id'];
        }
        $card->save();

        return response()->json(['success' => true, 'message' => 'Kart güncellendi.']);
    }

    public function bulkDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:cards,id',
        ]);

        Card::whereIn('id', $request->ids)->delete();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true, 'message' => count($request->ids).' adet kart başarıyla silindi.']);
        }

        return redirect()->route('admin.cards.index')
            ->with('success', count($request->ids).' adet kart başarıyla silindi.');
    }
}
