<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index()
    {
        return view('ruangan.index');
    }

    public function create()
    {
        return view('ruangan.create');
    }
}
