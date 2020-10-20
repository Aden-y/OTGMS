<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attraction;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome', ['attractions'=>Attraction::all()]);
    }
}
