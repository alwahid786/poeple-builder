@extends('layouts.company.company-default')
@section('content')
<div class="form-container login-container">
    <div class="login-wrapper">
        <div class="login-form">
            <img class="logo" src="{{asset('assets/images/login-logo.png')}}" alt="" />
            <h1 class="form-heading pt-2 pt-sm-3 pt-lg-5">Sign In</h1>
            <form action="{{ url('company-login') }}" method="POST">
                @csrf
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block" style="width: 100%;">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Error! </strong>{{ $message }}
                </div>
                @elseif($message = Session::get('success'))
                <div class="alert alert-success alert-block" style="width: 100%;">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Success! </strong>{{ $message }}
                </div>
                @endif
                <div class="form-field mb-3">
                    <label>Email</label>
                    <input type="email" name="email" />
                </div>
                <div class="form-field mb-3">
                    <label>Password</label>
                    <div class="form-field-input">
                        <input type="password" name="password" />
                        <img src="{{asset('assets/images/visibility.png')}}" alt="" class="showPass" />
                        <img src="{{asset('assets/images/visibility_off.png')}}" alt="" class="hidePass" />
                    </div>
                    <!-- <input type="password" name="password" /> -->
                    <a href="{{url('/forgot-password')}}" class="pt-4">Forgot Password?</a>
                    {{-- <a href="{{ url('user-signup') }}">Don’t have an account? <span style="color: rgb(98, 98, 197)">Sign Up</span></a> --}}
                </div>
                <div class="form-field pt-2 pt-sm-3 pt-lg-5">
                    <button>Sign In</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('admininsertjavascript')
<script src="{{ asset('assets/js/login.js') }}"></script>
@endsection