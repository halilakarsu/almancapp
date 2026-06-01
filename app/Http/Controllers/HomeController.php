<?php

namespace App\Http\Controllers;

use App\Models\Level;

class HomeController extends Controller
{
    public function index()
    {
        $levels = Level::orderBy('order_index')->get();

        return view('user.home', compact('levels'));
    }
}
