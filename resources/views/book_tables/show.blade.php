@extends('layouts.admin_base')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($bookTable->name) ? $bookTable->name : 'Book Table' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('book_tables.book_table.destroy', $bookTable->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('book_tables.book_table.index') }}" class="btn btn-primary mr-2" title="Show All Book Table">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Book Table
                    </a>

                    <a href="{{ route('book_tables.book_table.create') }}" class="btn btn-success mr-2" title="Create New Book Table">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Book Table
                    </a>

                    <a href="{{ route('book_tables.book_table.edit', $bookTable->id ) }}" class="btn btn-primary mr-2" title="Edit Book Table">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Book Table
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Book Table" onclick="return confirm(&quot;Click Ok to delete Book Table.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Book Table
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $bookTable->name }}</dd>
            <dt>Phone</dt>
            <dd>{{ $bookTable->phone }}</dd>
            <dt>Email</dt>
            <dd>{{ $bookTable->email }}</dd>
            <dt>Date</dt>
            <dd>{{ $bookTable->date }}</dd>
            <dt>Time</dt>
            <dd>{{ $bookTable->time }}</dd>
            <dt>Guest</dt>
            <dd>{{ $bookTable->guest }}</dd>
            <dt>Is Approved</dt>
            <dd>{{ ($bookTable->is_approved) ? 'Yes' : 'No' }}</dd>

        </dl>

    </div>
</div>

@endsection
