@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h2>Guide Registration</h2></div>

                <div class="card-body">
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                    <form method="POST" action="/guides">
                        @csrf

                        <div class="form-group row">
                            <label for="firstname"
                            class="col-md-4 col-form-label text-md-right">
                            {{ __('First name') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text"
                                 class="form-control @error('firstname')
                                 is-invalid @enderror" name="firstname"
                                 value="{{ old('firstname') }}"
                                 required autocomplete="firstname" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname"
                             class="col-md-4 col-form-label text-md-right">
                             {{ __('Last name') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text"
                                class="form-control @error('lastname')
                                is-invalid @enderror" name="lastname" v
                                alue="{{ old('lastname') }}" required
                                autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="idnumber"
                            class="col-md-4 col-form-label text-md-right">
                            {{ __('ID/Passport number') }}</label>

                            <div class="col-md-6">
                                <input id="idnumber" type="text"
                                class="form-control @error('idnumber') is-invalid @enderror"
                                name="idnumber" value="{{ old('idnumber') }}"
                                required autocomplete="idnumber"
                                autofocus>

                                @error('idnumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phonenumber"
                            class="col-md-4 col-form-label text-md-right">
                            {{ __('Phone number') }}</label>

                            <div class="col-md-6">
                                <input id="phonenumber" type="text"
                                class="form-control @error('phonenumber') is-invalid @enderror"
                                name="phonenumber" value="{{ old('phonenumber') }}"
                                required autocomplete="phonenumber"
                                autofocus>

                                @error('phonenumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4
                            col-form-label text-md-right">
                            {{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                 class="form-control @error('email')
                                 is-invalid @enderror" name="email"
                                 value="{{ old('email') }}"
                                 required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       <div class="text-center"> <h4>Address Information</h4></div>

                            <div class="form-group  row">
                                <label for="county"
                                class="col-md-4 col-form-label text-md-right">
                                {{ __('County') }}</label>

                                <div class="col-md-6">
                                    <input id="county" type="text"
                                    class="form-control @error('county') is-invalid @enderror"
                                    name="county" value="{{ old('county') }}"
                                    required autocomplete="county"
                                    autofocus>

                                    @error('county')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city"
                                class="col-md-4 col-form-label text-md-right">
                                {{ __('City') }}</label>

                                <div class="col-md-6">
                                    <input id="city" type="text"
                                    class="form-control @error('city') is-invalid @enderror"
                                    name="city" value="{{ old('city') }}"
                                    required autocomplete="city"
                                    autofocus>

                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group  row">
                                <label for="postalcode"
                                class="col-md-4 col-form-label text-md-right">
                                {{ __('Postal code') }}</label>

                                <div class="col-md-6">
                                    <input id="postalcode" type="text"
                                    class="form-control @error('postalcode') is-invalid @enderror"
                                    name="postalcode" value="{{ old('postalcode') }}"
                                    required autocomplete="postalcode"
                                    autofocus>

                                    @error('postalcode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register Guide') }}
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
