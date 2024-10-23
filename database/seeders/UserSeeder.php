<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = User::all(); // Using all() for better readability

        return view('soon', compact('data'));
    }
}
