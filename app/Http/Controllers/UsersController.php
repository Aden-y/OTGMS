<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Tourist;
use App\TourGuide;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function admins()
    {
        $admins = User::where('type', '=', 'admin')->get();
        return view('admin.admins', ['admins'=>$admins]);
    }

    public function guides()
    {
        $guides = TourGuide::all();
        return view('admin.guides', ['guides'=>$guides]);
    }

    public function tourists()
    {
        $tourists = \App\Tourist::all();
        return view('admin.tourists', ['tourists'=>$tourists]);
    }
}
