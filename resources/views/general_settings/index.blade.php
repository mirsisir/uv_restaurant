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

            <h5  class="my-1 float-left">General Settings</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('general_settings.general_settings.create') }}" class="btn btn-success" title="Create New General Settings">
                    <i class="fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New General Settings
                </a>
            </div>

        </div>

        @if(count($generalSettingsObjects) == 0)
            <div class="card-body text-center">
                <h4>No General Settings Available.</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>Name</th>
                            <th>Title</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Logo</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($generalSettingsObjects as $generalSettings)
                        <tr>
                                <td>{{ $generalSettings->name }}</td>
                            <td>{{ $generalSettings->title }}</td>
                            <td>{{ $generalSettings->phone }}</td>
                            <td>{{ $generalSettings->email }}</td>
                            <td>{{ $generalSettings->address }}</td>
                            <td>{{ $generalSettings->logo }}</td>

                            <td>

                                <form method="POST" action="{!! route('general_settings.general_settings.destroy', $generalSettings->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right " role="group">
                                        <a href="{{ route('general_settings.general_settings.show', $generalSettings->id ) }}"title="Show General Settings">
                                            <i class="fa fa-eye text-info" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('general_settings.general_settings.edit', $generalSettings->id ) }}" class="mx-4" title="Edit General Settings">
                                            <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" style="border: none;background: transparent"  title="Delete General Settings" onclick="return confirm(&quot;Click Ok to delete General Settings.&quot;)">
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
            {!! $generalSettingsObjects->render() !!}
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


