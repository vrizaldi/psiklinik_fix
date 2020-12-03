@extends('layouts.home')

@section('section-title')
    Psikolog
@endsection

@section('content')
    <div class="consultants">
        <form method="GET" action="{{route('home.consultants')}}">
            <div class="input-group mb-3 consultant-search">
                <input name="query" type="text" class="form-control" placeholder="Search" aria-label="Search bar" value="{{$query}}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>

        <div>
            @foreach($consultantTypes as $type => $consultants)
            @if(count($consultants) > 0)
            <div class="consultant-type mb-4">
                <h4>{{$type}}</h4>
                <div class="consultant-list d-flex flex-nowrap">
                    @foreach($consultants as $consultant)
                    <a href="{{route('home.consultants.consult', ['email' => $consultant->email])}}">
                        <div class="consultant">
                            <img src="{{$consultant->profile_pic_href}}">
                            <p class="mt-2 font-weight-bold">{{$consultant->name}}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
@endsection
