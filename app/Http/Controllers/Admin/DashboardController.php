<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Card;
use App\Models\Level;
use App\Models\Lesson;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users_count' => User::count(),
            'cards_count' => Card::count(),
            'levels_count' => Level::count(),
            'lessons_count' => Lesson::count(),
        ];

        // Recent 5 added cards
        $recentCards = Card::with('lesson')->latest()->take(5)->get();

        // Top 5 lessons by card count (as a proxy for top lessons)
        $topLessons = Lesson::withCount('cards')->orderBy('cards_count', 'desc')->take(5)->get();
        
        // Card counts by type
        $cardTypes = \App\Models\Card::select('type', \Illuminate\Support\Facades\DB::raw('count(*) as total'))
            ->groupBy('type')
            ->pluck('total', 'type')
            ->toArray();

        return view('admin.dashboard', compact('stats', 'recentCards', 'topLessons', 'cardTypes'));
    }
}
