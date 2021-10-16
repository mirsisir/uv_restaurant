@extends('layouts.admin_base')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <i class=" fas fa-fw fa-check" aria-hidden="true"></i>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">Reservations</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('reservations.reservation.create') }}" class="btn btn-success" title="Create New Reservation">
                    <i class="fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Reservation
                </a>
            </div>

        </div>

        @if(count($reservations) == 0)
            <div class="card-body text-center">
                <h4>No Reservations Available.</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Guest</th>
                            <th>Accept</th>
                            <th>Table No</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($reservations as $reservation)
                        <tr>
                                <td>{{ $reservation->name }}</td>
                            <td>{{ $reservation->email }}</td>
                            <td>{{ $reservation->phone }}</td>
                            <td>{{ $reservation->date }}</td>
                            <td>{{ $reservation->time }}</td>
                            <td>{{ $reservation->guest }}</td>
                            <td>{{ ($reservation->accept) ? 'Yes' : 'No' }}</td>
                            <td>{{ $reservation->table_no }}</td>

                            <td>

                                <form method="POST" action="{!! route('reservations.reservation.destroy', $reservation->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right " role="group">
                                        <a href="{{ route('reservations.reservation.show', $reservation->id ) }}"title="Show Reservation">
                                            <i class="fa fa-eye text-info" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('reservations.reservation.edit', $reservation->id ) }}" class="mx-4" title="Edit Reservation">
                                            <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" style="border: none;background: transparent"  title="Delete Reservation" onclick="return confirm(&quot;Click Ok to delete Reservation.&quot;)">
                                            <i class=" fas  fa-trash text-danger" aria-hidden="true"></i>
                                        </button>
                                    </div>

                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="card-footer">
            {!! $reservations->render() !!}
        </div>

        @endif

    </div>
@endsection

@section('scripts')

     <script>
         $(document).ready(function () {
             $('table').DataTable({
                 // responsive: true,
                 "order": [],
                 dom: 'lBfrtip',
                 buttons: [
                     'copy', 'excel', 'pdf', 'print'
                 ]

             });
         });
     </script>

     <style>
         .dataTables_filter {
             float: right;
         }
        i:hover { color: #0248fa !important; }

     </style>


@endsection


