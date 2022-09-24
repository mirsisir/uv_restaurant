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

            <h5  class="my-1 float-left">Book Tables</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('book_tables.book_table.create') }}" class="btn btn-success" title="Create New Book Table">
                    <i class="fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Book Table
                </a>
            </div>

        </div>

        @if(count($bookTables) == 0)
            <div class="card-body text-center">
                <h4>No Book Tables Available.</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Guest</th>
                            <th>Is Approved</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($bookTables as $bookTable)
                        <tr>
                                <td>{{ $bookTable->name }}</td>
                            <td>{{ $bookTable->phone }}</td>
                            <td>{{ $bookTable->email }}</td>
                            <td>{{ $bookTable->date }}</td>
                            <td>{{ $bookTable->time }}</td>
                            <td>{{ $bookTable->guest }}</td>
                            <td>{{ ($bookTable->is_approved) ? 'Yes' : 'No' }}</td>

                            <td>

                                <form method="POST" action="{{route('book_tables.book_table.destroy', $bookTable->id)}}" accept-charset="UTF-8">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right " role="group">
                                        <a href="{{ route('book_tables.book_table.show', $bookTable->id ) }}"title="Show Book Table">
                                            <i class="fa fa-eye text-info" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('book_tables.book_table.edit', $bookTable->id ) }}" class="mx-4" title="Edit Book Table">
                                            <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" style="border: none;background: transparent"  title="Delete Book Table"
                                                onclick="return confirm(&quot;Click Ok to delete Book Table.&quot;)">
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
            {!! $bookTables->render() !!}
        </div>

        @endif

    </div>
@endsection

@section('scripts')

     <script>
         $(document).ready(function () {
             $('table').DataTable({
                 responsive: true,
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


