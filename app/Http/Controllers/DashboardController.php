<?php

namespace App\Http\Controllers;

use App\Models\Province;

class DashboardController extends Controller
{
    public function index()
    {
        $provinces = Province::withCount('restaurants')->get();
        return view('dashboard', compact('provinces'));
        // return $provinces;
    }
}