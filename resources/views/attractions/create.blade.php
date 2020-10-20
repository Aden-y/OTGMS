@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h1>Create Attraction</h1></div>

                <div class="card-body">
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">{{ $error }}</div>
                    @endforeach
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="/attractions" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Attraction name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control
                                @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="description"
                            class="col-md-4 col-form-label text-md-right">
                            {{ __('Attraction description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" cols="10" rows="10"
                                class="form-control @error('description')
                                is-invalid @enderror" name="description"
                                value="{{ old('description') }}"
                                required autocomplete="description" autofocus>
                                </textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price"
                            class="col-md-4 col-form-label text-md-right">
                            {{ __('Attraction price') }}</label>

                            <div class="col-md-6">
                                <input id="price"
                                 type="number" class="form-control
                                 @error('price') is-invalid @enderror" name="price"
                                 value="{{ old('price') }}" required
                                 autocomplete="price" autofocus>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="county" class="col-md-4 col-form-label text-md-right">{{ __('Attraction county') }}</label>

                            <div class="col-md-6">
                                <input id="county" type="text"
                                class="form-control @error('county') is-invalid @enderror"
                                 name="county" value="{{ old('county') }}"
                                 required autocomplete="county" autofocus>

                                @error('county')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subcounty" class="col-md-4 col-form-label text-md-right">{{ __('Attraction subcounty') }}</label>

                            <div class="col-md-6">
                                <input id="subcounty" type="text"
                                class="form-control @error('subcounty') is-invalid @enderror"
                                 name="subcounty" value="{{ old('subcounty') }}"
                                 required autocomplete="subcounty" autofocus>

                                @error('subcounty')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div style="height:450px" class="pt-5 mb-5">
                            <div class="map" id="registryMap" style="width: 100%; height: 450px;">

                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-6 row">
                                <label for="lat"
                                class="col-md-4 col-form-label text-md-right">
                                {{ __('Latitude') }}</label>

                                <div class="col-md-6">
                                    <input id="lat" type="text" class="form-control
                                    @error('lat') is-invalid @enderror"
                                    name="lat" value="{{ old('lat') }}"
                                    required autocomplete="lat" autofocus >

                                    @error('lat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>

                            <div class="form-group col-md-6 row">
                                <label for="lng" class="col-md-4 col-form-label
                                 text-md-right">{{ __('Longitude') }}</label>

                                <div class="col-md-6">
                                    <input id="lng" type="text"
                                    class="form-control @error('lng') is-invalid @enderror"
                                    name="lng" value="{{ old('lng') }}"
                                    required autocomplete="lng" autofocus >

                                    @error('lng')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Upload Images') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="@error('image')
                                is-invalid @enderror" name="image[]" value="{{ old('image') }}"
                                required autocomplete="image[]" autofocus multiple>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
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
