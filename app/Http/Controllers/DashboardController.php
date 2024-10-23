<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use App\Models\Minuman;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function index()
    {
        $makanan = Makanan::all();
        $minuman = Minuman::all();
        return view('dashboard', compact('makanan', 'minuman'));
    }
}
