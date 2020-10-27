@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header text-center">
                <h2>
                    Welcome
                    @admin
                     &nbsp; Admin
                    @endadmin
                    @tourist
                    {{ Auth::user()->tourist->firstname.'  '.Auth::user()->tourist->lastname}}
                    @endtourist
                </h2>
            </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   @tourist
                   <center><h3>You current bookings</h3></center>
                   <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Place</th>
                        <th>Tickets</th>
                        <th>Booked on</th>
                        <th>Tour starts</th>
                        <th>Duration</th>
                        <th>Ends on</th>
                        <th>Amount</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach (Auth::user()->tourist->bookings as $booking)
                            <tr>
                            <td>{{$booking->attraction->name}}</td>
                            <td>{{$booking->people}}</td>
                            <td>{{$booking->created_at}}</td>
                            <td>{{$booking->start}}</td>
                            <td>{{$booking->duration}}</td>
                            <td>{{$booking->end}}</td>
                            <td>{{$booking->amount}}</td>
                            <td>
                                @if ($booking->payment_status == 'Pending')
                                <a class="btn btn-sm btn-success"
                                   type="button" href="/bookings/pay/{{$booking->id}}">
                                    Pay
                                </a>
                                @endif

                                @if ($booking->payment_status == 'Finished')
                                <p class="text-success">Paid</p>
                                <p class="text-success"><strong>{{$booking->transaction_code}}</strong></p>
                                @endif

                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                        </table>
                   @endtourist

                   @admin
                   <center><h3>Available bookings</h3>
                    @if (sizeof(Auth::user()->bookings())== 0)
                        <p>No bookings to display</p>
                    @endif

                </center>
                   <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Tourist name</th>
                        <th>Place</th>
                        <th>Tickets</th>
                        <th>Booked on</th>
                        <th>Tour starts</th>
                        <th>Duration</th>
                        <th>Ends on</th>
                        <th>Amount</th>
                        <th>Guide Assigned</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach (Auth::user()->bookings() as $booking)
                            <tr>
                            <td>{{$booking->tourist->firstname.' '.$booking->tourist->lastname}}-
                                <br>
                                (
                                    {{$booking->tourist->address->country}},
                                    {{$booking->tourist->address->city}}
                                )
                            </td>
                            <td>{{$booking->attraction->name}}</td>
                            <td>{{$booking->people}}</td>
                            <td>{{$booking->created_at}}</td>
                            <td>{{$booking->start}}</td>
                            <td>{{$booking->duration}}</td>
                            <td>{{$booking->end}}</td>
                            <td>{{$booking->amount}}</td>
                            <td>
                                @if ($booking->guide != null)
                                    {{$booking->guide->firstname}}
                                @endif

                                @if ($booking->guide == null)
                                 <a href="bookings/assign/{{$booking->id}}"
                                    class="btn btn-small btn-info">Assign guide</a>
                                @endif


                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                        </table>
                   @endadmin
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
