@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h1>Book Tour</h1></div>

                <div class="card-body">
                    <form method="POST" action="/bookings">
                        @csrf

                        <div class="form-group row">
                            <label for="attraction"
                            class="col-md-4 col-form-label
                            text-md-right">{{ __('Attraction') }}</label>
                            <div class="col-md-6">
                                <input id="attraction"
                                type="text" class="form-control
                                @error('attraction') is-invalid
                                @enderror" name="attraction" value="{{ $attraction->name }}"
                                required autocomplete="attraction"
                                autofocus disabled>

                                @error('attraction')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        <input type="number" name="attraction_id" value="{{$attraction->id}}" hidden>
                        </div>

                        <div class="form-group row">
                            <label for="price"
                            class="col-md-4 col-form-label
                            text-md-right">{{ __('Daily charges per person (Ksh.)') }}</label>
                            <div class="col-md-6">
                                <input id="price"
                                type="number" class="form-control
                                @error('price') is-invalid
                                @enderror" name="price" value="{{$attraction->price}}"
                                required autocomplete="price"
                                autofocus disabled>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="people"
                            class="col-md-4 col-form-label
                            text-md-right">{{ __('Number of people') }}</label>
                            <div class="col-md-6">
                                <input id="people"
                                type="text" class="form-control
                                @error('people') is-invalid
                                @enderror" name="people" value="{{ old('people') }}"
                                required autocomplete="people"
                                autofocus >
                                @error('people')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="duration"
                            class="col-md-4 col-form-label
                            text-md-right">{{ __('Duration in days') }}</label>
                            <div class="col-md-6">
                                <input id="duration"
                                type="number" class="form-control
                                @error('duration') is-invalid
                                @enderror" name="duration" value="{{ old('duration') }}"
                                required autocomplete="duration"
                                autofocus >

                                @error('duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="start"
                            class="col-md-4 col-form-label
                            text-md-right">{{ __('Start date') }}</label>
                            <div class="col-md-6">
                                <input id="start"
                                type="date" class="form-control
                                @error('start') is-invalid
                                @enderror" name="start" value="{{ old('start') }}"
                                required autocomplete="start"
                                autofocus >

                                @error('start')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
<!---->
<!--                    <div class="form-group row">-->
<!--                            <label for="end"-->
<!--                            class="col-md-4 col-form-label-->
<!--                            text-md-right">{{ __('end') }}</label>-->
<!--                            <div class="col-md-6">-->
<!--                                <input id="end"-->
<!--                                type="date" class="form-control-->
<!--                                @error('end') is-invalid-->
<!--                                @enderror" name="end" value="{{ old('Ends on') }}"-->
<!--                                required autocomplete="end"-->
<!--                                autofocus disabled>-->
<!---->
<!--                                @error('end')-->
<!--                                    <span class="invalid-feedback" role="alert">-->
<!--                                        <strong>{{ $message }}</strong>-->
<!--                                    </span>-->
<!--                                @enderror-->
<!--                            </div>-->
<!--                    </div>-->

                    <div class="form-group row">
                        <label for="total"
                        class="col-md-4 col-form-label
                        text-md-right">{{ __('Total Amount') }}</label>
                        <div class="col-md-6">
                            <input id="total"
                            type="text" class="form-control
                            @error('total') is-invalid
                            @enderror" name="total" value="{{ old('total') }}"
                            required autocomplete="total"
                            autofocus disabled>

                            @error('total')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit Booking') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="application/javascript" src="{{ asset('js/booking.js') }}" defer></script>
</div>
@endsection
