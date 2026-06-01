<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::with('level')->orderBy('id', 'asc')->paginate(10);

        return view('admin.lessons.index', compact('lessons'));
    }

    public function create()
    {
        $levels = Level::orderBy('order_index')->get();

        return view('admin.lessons.create', compact('levels'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'lesson_title' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'level_id' => 'required|exists:levels,id',
            'order_index' => 'nullable|integer',
            'lesson_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('lesson_image')) {
            $validated['lesson_image'] = $request->file('lesson_image')
                ->store('lessons', 'public');
        }

        Lesson::create($validated);

        return redirect()->route('admin.lessons.index')->with('success', 'Ders başarıyla oluşturuldu.');
    }

    public function show(Lesson $lesson)
    {
        return redirect()->route('admin.lessons.edit', $lesson);
    }

    public function edit(Lesson $lesson)
    {
        $levels = Level::orderBy('order_index')->get();

        return view('admin.lessons.edit', compact('lesson', 'levels'));
    }

    public function update(Request $request, Lesson $lesson)
    {
        $validated = $request->validate([
            'lesson_title' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'level_id' => 'required|exists:levels,id',
            'order_index' => 'nullable|integer',
            'lesson_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('lesson_image')) {
            // Eski görseli sil
            if ($lesson->lesson_image) {
                Storage::disk('public')->delete($lesson->lesson_image);
            }
            $validated['lesson_image'] = $request->file('lesson_image')
                ->store('lessons', 'public');
        }

        // Görseli kaldır isteği
        if ($request->boolean('remove_image') && $lesson->lesson_image) {
            Storage::disk('public')->delete($lesson->lesson_image);
            $validated['lesson_image'] = null;
        }

        $lesson->update($validated);

        return redirect()->route('admin.lessons.index')->with('success', 'Ders başarıyla güncellendi.');
    }

    public function destroy(Lesson $lesson)
    {
        if ($lesson->lesson_image) {
            Storage::disk('public')->delete($lesson->lesson_image);
        }
        $lesson->delete();

        return redirect()->route('admin.lessons.index')->with('success', 'Ders başarıyla silindi.');
    }

    public function copy(Lesson $lesson)
    {
        $newLesson = $lesson->replicate();
        $newLesson->lesson_title = $newLesson->lesson_title.' (Kopya)';
        $newLesson->lesson_image = null; // Görseli kopyalama
        $newLesson->save();

        return redirect()->route('admin.lessons.index')->with('success', 'Ders başarıyla kopyalandı.');
    }
}
