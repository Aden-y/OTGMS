@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                       <h4>
                        {{ $attraction->name }}
                       </h4>
                    </div>
                    <div class="card-body row">
                        <div class="col-md-8" >
                        <input type="text"  id="positionLat" value="{{$attraction->address->lat}}" hidden>
                        <input type="text"  id="positionLng" value="{{$attraction->address->lng}}" hidden>
                            <div style="height:500px;">
                                <div class="map" id="attractionPositionMap" style="width: 100%; height: 450px;">

                                </div>
                            </div>
                            <div class="mt-5">
                                <p>
                                    {{$attraction->description}}
                                </p>

                                <div class="text-center">
                                    <label>Daily charges per individual : <strong>Ksh :  {{ $attraction->price }}</strong></label>
                                </div>

                                @if (Auth::check() && Auth::user()->type == 'tourist')
                                <div class="text-center">
                                    <a href="/bookings/{{$attraction->id}}" type="button" class="btn btn-success">
                                        Book now!!
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                @foreach ($attraction->images as $image)
                                    <div class="col-12 mt-5" style="width:100%; height:200px;">
                                        {{-- {{$image->path}} --}}
                                    <img width="100%" height="100%" src="http://127.0.0.1:8000/uploads/{{$image->path}}" alt="Image">
                                    </div>
                                @endforeach
                            </div>

                        </div>

                    </div>
                </div>
            </div>


        </div>

    </div>
@endsection
