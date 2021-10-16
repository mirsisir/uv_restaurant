@extends('layouts.admin_base')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($reservation->name) ? $reservation->name : 'Reservation' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('reservations.reservation.destroy', $reservation->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('reservations.reservation.index') }}" class="btn btn-primary mr-2" title="Show All Reservation">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Reservation
                    </a>

                    <a href="{{ route('reservations.reservation.create') }}" class="btn btn-success mr-2" title="Create New Reservation">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Reservation
                    </a>

                    <a href="{{ route('reservations.reservation.edit', $reservation->id ) }}" class="btn btn-primary mr-2" title="Edit Reservation">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Reservation
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Reservation" onclick="return confirm(&quot;Click Ok to delete Reservation.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Reservation
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $reservation->name }}</dd>
            <dt>Email</dt>
            <dd>{{ $reservation->email }}</dd>
            <dt>Phone</dt>
            <dd>{{ $reservation->phone }}</dd>
            <dt>Date</dt>
            <dd>{{ $reservation->date }}</dd>
            <dt>Time</dt>
            <dd>{{ $reservation->time }}</dd>
            <dt>Guest</dt>
            <dd>{{ $reservation->guest }}</dd>
            <dt>Accept</dt>
            <dd>{{ ($reservation->accept) ? 'Yes' : 'No' }}</dd>
            <dt>Table No</dt>
            <dd>{{ $reservation->table_no }}</dd>
            <dt>Created At</dt>
            <dd>{{ $reservation->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $reservation->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection
