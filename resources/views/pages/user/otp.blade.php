@extends('layouts.user.user-default')
@section('content')
<div class="form-container login-container">
    <div class="login-wrapper">
        <div class="login-form">
            <img class="logo" src="{{asset('assets/images/login-logo.png')}}" alt="" />
            <h1 class="form-heading pt-2 pt-sm-3 pt-lg-5">Verification</h1>
            <form id="reset-password" action="{{route('reset-password')}}" method="GET">
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
                <div class="form-field mb-3 text-center">
                    <label>Enter Verification Code</label>
                    <div class="otp-container">
                        <input type="text" id="digit1" name="otp[]" maxlength="1" onkeyup='tabChange(1)' oninput="moveToNext(this)" autofocus>
                        <input type="text" id="digit2" name="otp[]" maxlength="1" onkeyup='tabChange(2)' oninput="moveToNext(this)">
                        <input type="text" id="digit3" name="otp[]" maxlength="1" onkeyup='tabChange(3)' oninput="moveToNext(this)">
                        <input type="text" id="digit4" name="otp[]" maxlength="1" onkeyup='tabChange(4)' oninput="moveToNext(this)">
                    </div>
                </div>

                <div class="form-field pt-2 pt-sm-3">
                <input type="hidden" name="pin_code" id="otpCodeField">
                <input type="hidden" name="email" value="{{$_GET['email'] ?? ''}}" id="email">
                    <button type="submit" id="continue-btn">Continue</button>
                </div>
                <div class="form-field pt-2">
                    <h1>Didn’t Receive Code? <a href="">Resend code</a></h1>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('admininsertjavascript')
<script src="{{ asset('assets/js/otp.js') }}"></script>
@endsection