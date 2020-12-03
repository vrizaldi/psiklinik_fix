@extends('layouts.home')

@section('section-title')
    News
@endsection

@section('content')
    <div class="news">
        <div class="blog-post mb-2">
            <img src="{{$blog->image_link}}">
            <h5 class="mt-1 mb-0">{{$blog->title}}</h5>
            <p class="text-justify">{!!$blog->content!!}</p>
        </div>
    </div>
@endsection
