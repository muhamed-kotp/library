@extends('layout')

@section('title')
    Login
@endsection

@section('content')
    @include('inc.errors')
    <div class="container" style="margin-bottom: 250px; margin-top: 50px">
        <form method="POST" action="{{ route('auth.handleLogin') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label fs-1">@lang('site.mail')</label>
                <input placeholder="Please Enter Your E-mail " class="form-control" type="text" name="email"
                    value="{{ old('email') }}">

            </div>
            <div class="mb-3">
                <label class="form-label fs-1">@lang('site.pass')</label>
                <input placeholder="Please Enter a Strong password" class="form-control" type="password" name="password"
                    value="{{ old('password') }}">
            </div>

            <button type="submit" class="btn default-btn mb-3">Sign In</button>
        </form>

        <a style="width: 200px" class="btn btn-outline-danger mb-5 " href="{{ route('auth.github.redirect') }}">sign up with
            github <i class="fa-brands fa-github"></i></a>

    </div>
@endsection
