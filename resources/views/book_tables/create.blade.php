@extends('layouts.admin_base')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">Create New Book Table</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('book_tables.book_table.index') }}" class="btn btn-primary" title="Show All Book Table">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Book Table
                </a>
            </div>

        </div>

        <div class="card-body">



            <form method="POST" action="{{ route('book_tables.book_table.store') }}" accept-charset="UTF-8" id="create_book_table_form" name="create_book_table_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('book_tables.form', [
                                        'bookTable' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


