@extends('layouts.app')

@section('title')
    Quiz | Psiklinik
@endsection

@section('app')
<div class="container-fluid py-5 text-center">
    <h2 class="mb-4">How good do you think is your mental health today?</h2>
    <form action="{{route('home.track.quiz.submit')}}">
        @csrf
        <input id="mood-level-input" type="range" name="mood_level" class="form-control-range" step="1" min="0" max="10" onchange="changeRange()">
        <h3 id="mood-level" class="mt-4">5/10</h3>
        <button type="submit" class="btn btn-primary mt-5 px-5">Submit</button>
        <script>
            function changeRange() {
                $('#mood-level').html($('#mood-level-input').val() + '/10');
            }
        </script>
    </form>
</div>
@endsection
