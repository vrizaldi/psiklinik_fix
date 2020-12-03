@extends('layouts.app')

@section('title')
    @yield('section-title') | Psiklinik
@endsection

@section('app')
    <header class="navbar-header">
        <h1 class="text-center mt-3">
            @yield('section-title')
        </h1>
    </header>

    <div class="content">
        @yield('content')
    </div>

    <footer class="navbar-footer d-flex flex-row justify-content-around align-items-center">
        <a href="{{route('home.news')}}">
            <i class="fas fa-newspaper"></i>
        </a>
        <a href="#">
            <i class="fas fa-stethoscope"></i>
        </a>
        <a href="#">
            <i class="fas fa-chart-line"></i>
        </a>
        <a href="{{route('auth.logout')}}">
            <i class="fas fa-sign-out-alt"></i>
        </a>
    </footer>
@endsection

