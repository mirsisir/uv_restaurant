@extends('layouts.base')
@section('content')
<div style="height: 120px">

</div>
    <div class=" container card mt-4">

        <div class="card-body">
            <img src="{{asset('storage/'.$blog->image)}}" style="width: auto; height: 300px;" class="m-auto"  alt="img">
            <h1 class="text-danger">{{$blog->title}}</h1>
            <p style=" " class="text-justify">{{$blog->description}}</p>
        </div>
    </div>

<br>
<br>
<br>

@endsection


