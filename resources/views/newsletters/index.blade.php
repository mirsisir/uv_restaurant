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

            <h5  class="my-1 float-left">Newsletters</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('newsletters.newsletter.create') }}" class="btn btn-success" title="Create New Newsletter">
                    <i class="fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Newsletter
                </a>
            </div>

        </div>

        @if(count($newsletters) == 0)
            <div class="card-body text-center">
                <h4>No Newsletters Available.</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>Email</th>
                            <th>Name</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($newsletters as $newsletter)
                        <tr>
                                <td>{{ $newsletter->email }}</td>
                            <td>{{ $newsletter->name }}</td>

                            <td>

                                <form method="POST" action="{!! route('newsletters.newsletter.destroy', $newsletter->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right " role="group">
                                        <a href="{{ route('newsletters.newsletter.show', $newsletter->id ) }}"title="Show Newsletter">
                                            <i class="fa fa-eye text-info" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('newsletters.newsletter.edit', $newsletter->id ) }}" class="mx-4" title="Edit Newsletter">
                                            <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" style="border: none;background: transparent"  title="Delete Newsletter" onclick="return confirm(&quot;Click Ok to delete Newsletter.&quot;)">
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
            {!! $newsletters->render() !!}
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


