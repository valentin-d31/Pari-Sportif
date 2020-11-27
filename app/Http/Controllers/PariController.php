<?php

namespace App\Http\Controllers;

use App\Pari;
use Illuminate\Http\Request;

class PariController extends Controller
{
    public function index()
    {
        $paris = Pari::all();

        return view('paris.index', compact('paris'));
    }
}
