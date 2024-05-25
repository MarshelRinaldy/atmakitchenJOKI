@extends('layout')
@section('content')

    <div class="card">
        <div class="card-header">Register Form</div>
        <div class="card-body">
            <form action="{{ route('register') }}" method="post">
                {!! csrf_field() !!}
                <label>First Name</label>
                <input type="text" name="name" id="name" class="form-control"> <br>

                <label>Email</label>
                <input type="email" name="email" id="email" class="form-control"> <br>

                <label>Password</label>
                <input type="password" name="password" id="password" class="form-control"> <br>

                <label>Username</label>
                <input type="text" name="username" id="username" class="form-control"> <br>

                <label>Address</label>
                <input type="text" name="address" id="address" class="form-control"> <br>

                <label>Date of Birth</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control"> <br>

                <label>Phone Number</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control"> <br>

                <label>Gender</label>
                <select name="gender" id="gender" class="form-control">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select> <br>

                <input type="submit" value="Save" class="btn btn-success">
            </form>
        </div>
    </div>
@stop
