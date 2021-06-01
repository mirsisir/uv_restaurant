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

            <h5  class="my-1 float-left">Food</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('food.food.create') }}" class="btn btn-success" title="Create New Food">
                    <i class="fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Food
                </a>
            </div>

        </div>

        @if(count($foodObjects) == 0)
            <div class="card-body text-center">
                <h4>No Food Available.</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Is Offer</th>
                            <th>Is Special</th>
                            <th>Status</th>
                            <th>Image</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($foodObjects as $food)
                        <tr>
                                <td>{{ $food->name }}</td>
                            <td>{{ optional($food->category)->name }}</td>
                            <td>{{ $food->price }}</td>
                            <td>{{ ($food->is_offer) ? 'Yes' : 'No' }}</td>
                            <td>{{ ($food->is_special) ? 'Yes' : 'No' }}</td>
                            <td>{{ $food->status }}</td>
                            <td>{{ $food->image }}</td>

                            <td>

                                <form method="POST" action="{!! route('food.food.destroy', $food->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right " role="group">
                                        <a href="{{ route('food.food.show', $food->id ) }}"title="Show Food">
                                            <i class="fa fa-eye text-info" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('food.food.edit', $food->id ) }}" class="mx-4" title="Edit Food">
                                            <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" style="border: none;background: transparent"  title="Delete Food" onclick="return confirm(&quot;Click Ok to delete Food.&quot;)">
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
            {!! $foodObjects->render() !!}
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


