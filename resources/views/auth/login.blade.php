@extends('layouts.layout')
@section('content')
@section('title', 'Login')
@section('breadcrumb')
<div aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/" class="breadcrumb-items">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Login</li>
    </ol>
</div>
@endsection
<div class="container-fluid">
    <form action="/login" method="post" class="w-75 mt-3 mx-auto">
        @csrf
        <h2 class="fw-bold text-center mb-3">Login</h2>
        <div class="w-75 mb-3 mx-auto"><hr></div>
        <div class="form-floating mb-3 w-75 mx-auto">
            <input type="text" class="form-control border border-dark" id="usernameInput" name="username" placeholder="Username" value="{{ old('username')}}"
                required oninvalid="this.setCustomValidity('Please Enter Username!')" oninput="setCustomValidity('')" autocomplete="off">
            <label for="usernameInput" class="placeholders"><svg class="svgsub me-1" width="20" height="20"><use href="#user"></svg>Username</label>
        </div>
        <div class="form-floating mb-3 w-75 mx-auto">
            <input type="password" class="form-control border border-dark" id="passwordInput" name="password" placeholder="Password"
                required oninvalid="this.setCustomValidity('Please Enter Password!')" oninput="setCustomValidity('')">
            <label for="passwordInput" class="placeholders"><svg class="svgsub me-1" width="20" height="20"><use href="#password"></svg>Password</label>
        </div>
        <div class="form-check mb-3 w-75 mx-auto">
            <input class="form-check-input" type="checkbox" name="remember_me" id="showPass">
            <label class="form-check-label" for="showPass">Show Password</label>
        </div>
        <div class="form-check mb-3 w-75 mx-auto">
            <input class="form-check-input" type="checkbox" id="rememberMeCheckbox" name="remember_me">
            <label class="form-check-label" for="rememberMeCheckbox">Remember Me</label>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary w-75 text-center">Login</button>
        </div>
    </form>
</div>
@endsection
