<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Level;

class DashboardController extends Controller
{
    public function index()
    {
        // Ana sayfada sadece aktif seviyeleri göster
        $levels = Level::where('is_active', true)->orderBy('order_index')->get();
        return view('user.home', compact('levels'));
    }
}
