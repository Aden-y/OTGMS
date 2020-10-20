<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
     public function __construct() {
        $this->middleware('admin');
    }

    public function create ()
    {
        return \view('admin.create');
    }
    public function strore (Request $request)
    {
        $request->validate([
            'email'=> 'required|email|unique:users|max:255',
            'password' => 'required|string|min:6'
        ]);

        User::create([
            'type'=>'admin',
            'email'=>$request['email'],
            'password'=>Hash::make($request['password'])
        ]);

        return \redirect('admins')->with(['status'=>'You successfully created an admin!!']);
    }

    public function index()
    {
        $admins = User::where('type', '=', 'admin')->get();
       // \dd($admins);
        return \view('admin.admins', ['admins'=>$admins]);
    }
}
