@extends('layouts.app')

@section('title')
    Login | Psiklinik
@endsection

@section('app')
<div class="container-fluid py-5">
    <h1 class="text-center mb-4">Log In</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>
    @endif

    <form method="POST" action="{{route('auth.login')}}">
        @csrf
        <input type="email" name="email" class="form-control mb-2" id="email" placeholder="Email" required>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>

        <button type="submit" class="mt-5 btn btn-block btn-primary">Log In</button>
        <a href="{{route('auth.register')}}" type="button" class="btn btn-block btn-light">Sign Up</a>
    </form>
</div>
@endsection

