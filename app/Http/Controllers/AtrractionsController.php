<?php

namespace App\Http\Controllers;
use App\Attraction;
use App\AttractionAddress;
use App\AttractionImages;

use Illuminate\Http\Request;

class AtrractionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['map']]);
    }

    public function create(){
        return \view('attractions.create');
    }

    public  function store(Request $request)
    {


        $request->validate([
            'name' => ['required','string','unique:attractions','max:255'],
            'description' => ['required'],
            'price' => ['numeric','required', 'min:1000'],
            'county' => ['required'],
            'subcounty' => ['required'],
            'lng' => ['required'],
            'lat' => ['required'],
            'image'=>['required'],
            // 'image.*'=>['image','max:8000']
        ]);

        $attraction = Attraction::create([
            'name'=> $request['name'],
            'description'=> $request['description'],
            'price'=> $request['price'],
        ]);



        $address = $attraction->address()->save(
            new AttractionAddress([
                'county'=> $request['county'],
                'subcounty'=> $request['subcounty'],
                'lat'=> $request['lat'],
                'lng'=> $request['lng'],
            ])
        );

        if($request->hasfile('image')){
             $count = 0;
            foreach($request->file('image') as $file)
            {
                $name = '_attr_'.$attraction->id.'_'.$count.'.'.$file->extension();
               // echo $name;
                $file->move(public_path().'/uploads/', $name);
                $attraction->images()->create([
                    'path'=> $name
                ]);
                $count++;
            }
         }
         return redirect('/attractions/create')->with('status', 'Attraction site posted successfully!');
    }

    public function map($id)
    {
       $attraction= Attraction::findOrFail($id);
      // dd($attraction->address->lng);
       return \view('attractions.map', ['attraction'=>$attraction]);
    }
}

