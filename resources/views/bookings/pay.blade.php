@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h2>{{ __('Booking Payment') }}</h2></div>

                <div class="card-body">
                    <p>
                        Your booking of a tour at <strong>{{$booking->attraction->name}} </strong> is almost complete. Please enter your M-Pesa pin to
                    authorize the payment of <strong>Ksh. {{$booking->amount}}</strong> for a total of
                    <strong>{{$booking->people}} people</strong>
                    for a duration of <strong>{{$booking->duration}} days.</strong>
                    </p>

                    <p>If you have paid please push the I have paid button bellow to confirm.</p>
                    <form method="POST" action="/bookings/pay">
                        @csrf
                        <div class="form-group row">
                            <label for="price"
                                   class="col-md-4 col-form-label
                            text-md-right">{{ __('Enter transaction code') }}</label>
                            <div class="col-md-6">
                                <input hidden name="booking_id" value="{{$booking->id}}">
                                <input id="transaction_code"
                                       type="text" class="form-control
                                @error('transaction_code') is-invalid
                                @enderror" name="transaction_code"
                                       required autocomplete="transaction_code"
                                       autofocus>

                                @error('transaction_code')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('I have paid!') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
