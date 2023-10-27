@extends('layout')

@section('title')
    Register
@endsection

@section('content')
    @include('inc.errors')

    <div style="margin-bottom: 250px; margin-top: 50px" class="container">
        <form method="POST" action="{{ route('auth.handleRegister') }}">
            @csrf

            {{-- <div class="display">
                @include('inc.errors')
            </div> --}}
            <div class="mb-3">
                <label class="form-label fs-1"> Name</label>
                <input placeholder="Your User Name" class="form-control" type="text" name=" name"
                    value="{{ old('name') }}">
            </div>
            {{-- <div class="display">
                @include('inc.errors')
            </div> --}}
            <div class="mb-3">
                <label class="form-label fs-1">E-mail</label>
                <input placeholder="Please Write your personal E-mail" class="form-control" type="text" name="email"
                    value="{{ old('email') }}">
            </div>
            {{-- <div class="display">
                @include('inc.errors')
            </div> --}}
            <div class="mb-5">
                <label class="form-label fs-1">Password</label>
                <input placeholder="Please Write a Strong Password" class="form-control" type="password" name="password"
                    value="{{ old('password') }}">

            </div>

            <button type="submit" class="btn default-btn mb-3">Sign Up</button>
        </form>
        <a style="width: 200px" class="btn btn-outline-danger mb-5 " href="{{ route('auth.github.redirect') }}">sign up with
            github <i class="fa-brands fa-github"></i></a>
    </div>
@endsection
