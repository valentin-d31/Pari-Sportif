<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PariController extends Controller
{
    public function index()
    {
        return view('pari.index');
    }
}
