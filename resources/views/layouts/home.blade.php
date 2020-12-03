@extends('layouts.app')

@section('title')
    @yield('section-title') | Psiklinik
@endsection

@section('app')
    <header>
        @yield('section-title')
    </header>

    @yield('content')

    <footer>
        Footer
    </footer>
@endsection

