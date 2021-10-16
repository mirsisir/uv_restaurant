@extends('layouts.admin_base')

@section('title','Reservation List')
@section('content')

    <div class="card">
        <div class="card-body">

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Date-time</th>
                    <th scope="col">Guest</th>
                    <th scope="col">Accept</th>
                    <th scope="col">Table No:</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{$reservation->name}}  {{$reservation->phone}} </td>
                        <td>{{$reservation->date}} {{$reservation->time}} </td>
                        <td>{{$reservation->guest}}  </td>
                        <td>{{$reservation->accept}}  </td>
                        <td>{{$reservation->table_no}}  </td>
                    </tr>
                @endforeach

                </tbody>
            </table>


        </div>
    </div>
@endsection
