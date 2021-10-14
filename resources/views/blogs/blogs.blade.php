@extends('layouts.base')
@section('content')
<div style="height: 120px">

</div>
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Blog</span>
                <h2 class="mb-4">Recent Blog</h2>
            </div>
        </div>
        <div class="row" style="height: 100%">

            @foreach($blogs as $blog)
                <div class="col-md-4 ftco-animate" style="height: 100%">
                    <div class="blog-entry" style="height: 100%">
                        {{--                        <a href="blog-single.html"  style="background-image: url();">--}}
                        {{--                        </a>--}}
                        <img src="{{asset('storage/'.$blog->image)}}"  class="block-20" alt="image">
                        <div class="text px-4 pt-3 pb-4" style="height: 100%">
                            <div class="meta">
                                <div><a href="#">{{$blog->created_at->format('D-M-Y h:i')}}</a></div>
                                <div><a href="#">Admin</a></div>
                            </div>
                            <h3 class="heading"><a href="#">{{$blog->title}}</a></h3>
                            <p class="clearfix">
                                <a href="{{route('read.blog',$blog->id)}}" class="float-left read btn btn-primary">Read more</a>
                                <a href="#" class="float-right meta-chat"><span class="fa fa-comment"></span> 3</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

<br>
<br>
<br>

@endsection


