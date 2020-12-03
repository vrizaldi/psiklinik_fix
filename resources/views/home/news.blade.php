@extends('layouts.home')

@section('section-title')
    Articles
@endsection

@section('content')
    <div class="news">
        <form method="GET" action="{{route('home.news')}}">
            <div class="input-group mb-3 blog-search">
                <input name="query" type="text" class="form-control" placeholder="Search" aria-label="Search bar" value="{{$query}}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
        @foreach($blogs as $blog)
            <a class="d-block" href="{{route('home.news.post', ['id'=>$blog->id])}}">
                <div class="blog-post mb-2">
                    <img src="{{$blog->image_link}}">
                    <h5 class="mt-1 mb-0">{{$blog->title}}</h5>
                    <p>{{$blog->desc}}</p>
                </div>
            </a>
        @endforeach
    </div>
@endsection
