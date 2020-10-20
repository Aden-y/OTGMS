<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TourGuide;
use App\TourGuideAddress;
use App\User;
use Illuminate\Support\Facades\Hash;
class GuideController extends Controller
{
    public function __construct() {
        $this->middleware ('auth');
    }
    public function index()
    {
        $guides = User::where('type' ,'=', 'guide')->get();
        return \view('guides.guides', ['guides'=>$guides]);
    }
    public function create()
    {
        return \view('guides.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phonenumber' => ['required', 'string', 'max:13'],
            'idnumber' => ['required', 'integer'],
            'county' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'postalcode' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'type'=> User::GUIDE,
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $guide = $user->guide()->save(new TourGuide([
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'idnumber' => $request['idnumber'],
            'phonenumber' => $request['phonenumber']
        ]));

        $address = $guide->address()->save(new TourGuideAddress([
            'county' => $request['county'],
            'city' => $request['city'],
            'postalcode' => $request['postalcode']
        ]));
        return \redirect('guides')->with(['status'=>'You successfully added a tour guide!!']);
    }
}
