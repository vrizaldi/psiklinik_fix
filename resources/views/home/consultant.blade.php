@extends('layouts.home')

@section('section-title')
    Psikolog
@endsection

@section('content')
    <div class="consultants">
        <div class="consultant-profile text-center">
            <img src={{$consultant->profile_pic_href}}>
            <h4 class="mt-3">{{$consultant->name}}</h4>
            <button type="button" class="btn btn-primary px-4" data-toggle="modal" data-target="#contactModal">Contact Me!</button>
            <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-body">
                        <h4>Phone</h4>
                        <p>{{$consultant->phone}}</p>
                        <h4 class="mt-4">Email</h4>
                        <p>{{$consultant->email}}</p>
                    </div>
                  </div>
                </div>
              </div>

            <h5 class="mt-4">Profile</h5>
            <p>{{$consultant->profile}}</p>
            <h5>Education</h5>
            <p>{{$consultant->education}}</p>
            <h5>Type</h5>
            <p>{{$consultant->type}}</p>
        </div>
    </div>
@endsection
