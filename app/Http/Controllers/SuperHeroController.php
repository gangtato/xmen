<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperHeroController extends Controller
{
    public function index(){
        return view('SuperHero');
    }
}
