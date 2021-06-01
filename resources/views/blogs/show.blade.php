@extends('layouts.admin_base')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($blog->title) ? $blog->title : 'Blog' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('blogs.blog.destroy', $blog->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('blogs.blog.index') }}" class="btn btn-primary mr-2" title="Show All Blog">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Blog
                    </a>

                    <a href="{{ route('blogs.blog.create') }}" class="btn btn-success mr-2" title="Create New Blog">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Blog
                    </a>

                    <a href="{{ route('blogs.blog.edit', $blog->id ) }}" class="btn btn-primary mr-2" title="Edit Blog">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Blog
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Blog" onclick="return confirm(&quot;Click Ok to delete Blog.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Blog
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Title</dt>
            <dd>{{ $blog->title }}</dd>
            <dt>Description</dt>
            <dd>{{ $blog->description }}</dd>
            <dt>Image</dt>
            <dd><img src="{{ asset('storage/' . $blog->image) }}" style="width:360px;" alt=""></dd>

        </dl>

    </div>
</div>

@endsection
