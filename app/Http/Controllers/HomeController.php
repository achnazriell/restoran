<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class HomeController extends Controller
{
    public function index()
    {
        $data = User::get();
        return view('index', compact('data'));
    }
}
