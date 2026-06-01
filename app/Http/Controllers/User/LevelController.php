<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Level;

class LevelController extends Controller
{
    public function show($id)
    {
        $level = Level::with(['lessons' => function ($q) {
            $q->where('is_active', true)->orderBy('order_index');
        }])->where('is_active', true)->findOrFail($id);

        return view('user.levels.show', compact('level'));
    }
}
