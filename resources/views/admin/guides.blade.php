@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h2>Tour Guides</h2></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table">
                        <tr>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>ID number</th>
                        <th>Phone number</th>
                        </tr>
                        @foreach ($guides as $guide)
                        <tr>
                            <td>{{$guide->firstname}}</td>
                            <td>{{$guide->lastname}}</td>
                            <td>{{$guide->idnumber}}</td>
                            <td>{{$guide->phonenumber}}</td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
