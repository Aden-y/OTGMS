@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h2>{{ __('Assign Guide') }}</h2></div>

                <div class="card-body">
                    <form method="post" action="/bookings/assign/confirm">
                        @csrf
                    <input type="number" name="booking_id" value="{{$booking->id}}" hidden>
                        <div class="form-group">

                            <label> Select Guide</label><br>
                            <select name="guide" required class="form-control">
                                <option  disabled value="">Select guide</option>
                                @foreach ($guides as $guide)
                                     <option value="{{$guide->id}}">{{$guide->firstname.' '.$guide->lastname}}</option>
                                @endforeach
                            </select>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
