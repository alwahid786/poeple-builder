@extends('layouts.user.user-default')
@section('content')
<div class="form-container login-container">
    <div class="login-wrapper">
        <div class="login-form">
            <img class="logo" src="{{asset('assets/images/login-logo.png')}}" alt="" />
            <h1 class="form-heading pt-2 pt-sm-3 pt-lg-5">Forgot Password</h1>
            <form action="{{route('user-otp')}}" method="GET">
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
                    <label>Enter Email Address</label>
                    <input type="email" name="email" />
                </div>

                <div class="form-field pt-2 pt-sm-3 pt-lg-5">
                    <button>Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('admininsertjavascript')
@endsection