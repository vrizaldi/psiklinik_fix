@extends('layouts.home')

@section('section-title')
    Article
@endsection

@section('content')
    <div class="news">
        <div class="blog-post mb-2">
            <img class="mb-3" src="{{$blog->image_link}}">
            <h5 class="mt-1 mb-3">{{$blog->title}}</h5>
            <p class="text-justify">{!!$blog->content!!}</p>
        </div>
    </div>
@endsection
