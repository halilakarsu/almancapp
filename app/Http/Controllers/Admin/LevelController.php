<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = Level::orderBy('order_index')->get();

        return view('admin.levels.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.levels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'level_title' => 'required|string|max:255|unique:levels,level_title',
            'level_description' => 'nullable|string',
            'order_index' => 'required|integer',
            'is_active' => 'required|boolean',
            'level_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'level_title' => $validated['level_title'],
            'level_slug' => Str::slug($validated['level_title']),
            'order_index' => $validated['order_index'],
            'is_active' => $validated['is_active'],
            'level_description' => $validated['level_description'],
        ];

        if ($request->hasFile('level_image')) {
            $file = $request->file('level_image');
            $filename = time().'_'.$file->getClientOriginalName();

            $path = public_path('uploads/levels');
            if (! file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $file->move($path, $filename);
            $data['level_image'] = 'uploads/levels/'.$filename;
        }

        Level::create($data);

        return redirect()->route('admin.levels.index')->with('success', 'Seviye başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Level $level)
    {
        return redirect()->route('admin.levels.edit', $level);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Level $level)
    {
        return view('admin.levels.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Level $level)
    {
        $validated = $request->validate([
            'level_title' => 'required|string|max:255|unique:levels,level_title,'.$level->id,
            'order_index' => 'required|integer',
            'is_active' => 'required|boolean',
            'level_description' => 'nullable|string',
            'level_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'level_title' => $validated['level_title'],
            'level_slug' => Str::slug($validated['level_title']),
            'order_index' => $validated['order_index'],
            'level_description' => $validated['level_description'],
            'is_active' => $validated['is_active'],
        ];

        if ($request->hasFile('level_image')) {
            // Eski resmi sil
            if ($level->level_image && file_exists(public_path($level->level_image))) {
                @unlink(public_path($level->level_image));
            }

            $file = $request->file('level_image');
            $filename = time().'_'.$file->getClientOriginalName();

            $path = public_path('uploads/levels');
            if (! file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $file->move($path, $filename);
            $data['level_image'] = 'uploads/levels/'.$filename;
        }

        $level->update($data);

        return redirect()->route('admin.levels.index')->with('success', 'Seviye başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Level $level)
    {
        $level->delete();

        return redirect()->route('admin.levels.index')->with('success', 'Seviye başarıyla silindi.');
    }

    public function copy(Level $level)
    {
        $newLevel = $level->replicate();
        $newLevel->level_title = $newLevel->level_title.' (Kopya)';
        $newLevel->level_slug = Str::slug($newLevel->level_title);
        $newLevel->save();

        return redirect()->route('admin.levels.index')->with('success', 'Seviye başarıyla kopyalandı.');
    }
}
