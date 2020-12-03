@extends('layouts.app')

@section('title')
    Register | Psiklinik
@endsection

@section('app')
<div class="container-fluid py-5">
    <h1 class="text-center mb-4">Sign Up</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    @endif
    <form method="POST" action="{{route('auth.register')}}">
        @csrf
        <input type="text" name="first_name" class="form-control mb-2" placeholder="First Name" required>
        <input type="text" name="last_name" class="form-control mb-2" placeholder="Last Name" required>
        <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
        <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>

        <button type="submit" class="mt-5 btn btn-block btn-primary">Sign Up</button>
        <a href="{{route('auth.login')}}" type="button" class="btn btn-block btn-light">Log In</a>
    </form>
</div>
@endsection
