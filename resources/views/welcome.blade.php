@extends('layouts.app')
@section('content')
    <div class="container">
        <center><h1>Welcome to Online Tourist Guide Management System</h1></center>
        @foreach ($attractions as $attraction)

            <div class="mt-5">
                <div class="card">
                    <div class="card-header text-center">
                       <h4>
                        {{ $attraction->name }}
                       </h4>
                    </div>
                    <div class="card-body row">
                        <div class="col-md-6 pt-2" style="height:350px">
                            <img src="./uploads/{{$attraction->images[0]->path}}"
                            alt="Attr Img" width="100%" height="100%">
                        </div>
                        <div class="col-md-6 pt-2">
                            <p>
                                {{ $attraction->description }}
                            </p>
                            <div class="pt-2">
                                <label>Daily charges per individual : <strong>Ksh :  {{ $attraction->price }}</strong></label>
                                <label> Found in  {{ $attraction->address->county }}
                                    County,
                                     {{ $attraction->address->subcounty }} District. <a href="/bookings/map/{{$attraction->id}}" >See on map</a></label>
                            </div>
                            <div class="text-center">
                                @if (Auth::check() && Auth::user()->type == 'tourist')
                                <a href="/bookings/{{$attraction->id}}" type="button" class="btn btn-success">
                                    Book now!!
                                </a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
