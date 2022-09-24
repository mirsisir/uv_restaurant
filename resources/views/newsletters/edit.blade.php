@extends('layouts.admin_base')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">{{ !empty($newsletter->name) ? $newsletter->name : 'Newsletter' }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('newsletters.newsletter.index') }}" class="btn btn-primary mr-2" title="Show All Newsletter">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Newsletter
                </a>

                <a href="{{ route('newsletters.newsletter.create') }}" class="btn btn-success" title="Create New Newsletter">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Newsletter
                </a>

            </div>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('newsletters.newsletter.update', $newsletter->id) }}" id="edit_newsletter_form" name="edit_newsletter_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('newsletters.form', [
                                        'newsletter' => $newsletter,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
