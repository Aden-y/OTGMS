<?php

namespace App\Http\Controllers;

use App\TourGuide;
use Illuminate\Http\Request;
use App\Attraction;
use Illuminate\Support\Facades\Auth;
use App\Booking;
use App\User;

class BookingsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function create($id){
        $attraction = Attraction::findOrFail($id);
        return \view('bookings.create', ['attraction'=>$attraction]);
    }

    public function store(Request $request){
        $request->validate([
            'people'=>['numeric', 'min:1', 'required'],
            'attraction_id'=>['numeric', 'required'],
            'duration'=>['numeric', 'required', 'min:1'],
            'start'=>['date', 'after:'. date('m/d/Y')]
        ]);
        $attraction = Attraction::findOrFail($request['attraction_id']);
            $booking = Auth::user()->tourist->bookings()->create([

                'attraction_id'=>$request['attraction_id'],
                'duration'=>$request['duration'],
                'people'=>$request['people'],
                'amount'=>(int)$request['people']*$attraction->price*(int)$request['duration'],
                'start'=>$request['start'],
                'end'=>date('Y-m-d', strtotime($request['start']. ' + '.$request['duration'].' days')),
            ]);

        return \redirect('bookings/pay/'.$booking->id);
    }

    public function  assign_confirm(Request $request) {
        $request->validate([
            'guide'=>['numeric', 'min:1', 'required'],
            'booking_id'=>['numeric', 'required'],
        ]);
        $booking = Booking::findOrFail($request['booking_id']);
        $booking->guide_id = $request['guide'];
        $booking->save();
        return \redirect('home');
    }


    public function pay($id)
    {
        $booking = Booking::findOrFail($id);
        if(Auth::user()->tourist->id != $booking->tourist_id){
            return abort(404);
        }
        return \view('bookings.pay',['booking'=> $booking]);
    }

    public function pay_confirm(Request $request) {
        $request->validate([
            'transaction_code'=>['required', 'string','min:10', 'max:10'],
            'booking_id'=>['numeric', 'required'],
        ]);
        $booking = Booking::findOrFail($request['booking_id']);
        $booking->transaction_code = $request['transaction_code'];
        $booking->payment_status = 'Finished';
        $booking->save();
        return \redirect('home');

    }


    public function assign($id)
    {
        $booking = Booking::findOrFail($id);
      //  $guides = User::where('type', '=', 'guide')->get();
        $guides = TourGuide::all();
       // dd($guides);

        return \view('bookings.assign',['booking'=> $booking, 'guides'=>$guides]);
    }
}
