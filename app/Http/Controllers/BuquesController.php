<?php

namespace App\Http\Controllers;

use App\Models\Buque;
use Illuminate\Http\Request;

class BuquesController extends Controller
{
    public function index(){
        $buques = Buque::all();

        return view('pages.buques.index', compact('buques'));
    }
}
