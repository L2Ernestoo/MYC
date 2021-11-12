<?php

namespace App\Http\Controllers;

use App\Models\Naviera;
use Illuminate\Http\Request;

class NavierasController extends Controller
{
    public function index(){
        $navieras = Naviera::all();

        return view('pages.navieras.index', compact('navieras'));
    }
}
