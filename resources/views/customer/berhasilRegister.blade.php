@extends('layoutLogin')
@section('content')
    <div class="card">
        <div class="card-body"> 
           <h2> Registration Successful </h2>
           <p>You have successfully registered. Please login to continue.</p>
           <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
        </div>
    </div>
@stop