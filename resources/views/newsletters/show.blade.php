@extends('layouts.admin_base')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($newsletter->name) ? $newsletter->name : 'Newsletter' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('newsletters.newsletter.destroy', $newsletter->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('newsletters.newsletter.index') }}" class="btn btn-primary mr-2" title="Show All Newsletter">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Newsletter
                    </a>

                    <a href="{{ route('newsletters.newsletter.create') }}" class="btn btn-success mr-2" title="Create New Newsletter">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Newsletter
                    </a>

                    <a href="{{ route('newsletters.newsletter.edit', $newsletter->id ) }}" class="btn btn-primary mr-2" title="Edit Newsletter">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Newsletter
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Newsletter" onclick="return confirm(&quot;Click Ok to delete Newsletter.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Newsletter
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Email</dt>
            <dd>{{ $newsletter->email }}</dd>
            <dt>Name</dt>
            <dd>{{ $newsletter->name }}</dd>

        </dl>

    </div>
</div>

@endsection
