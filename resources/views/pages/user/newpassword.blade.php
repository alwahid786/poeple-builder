@extends('layouts.user.user-default')
@section('content')
<div class="form-container login-container">
    <div class="login-wrapper">
        <div class="login-form reset-form">
            <img class="logo" src="{{asset('assets/images/login-logo.png')}}" alt="" />
            <h1 class="form-heading pt-2 pt-sm-3 pt-lg-5">New Password</h1>
            <form action="{{route('change-password')}}" method="POST">
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
                @csrf
                <div class="form-field mb-3">
                    <label>Enter New Password</label>
                    <div class="form-field-input">
                        <input type="password" name="password" id="passInput1" />
                        <img src="{{asset('assets/images/visibility.png')}}" alt="" class="showPass" />
                        <img src="{{asset('assets/images/visibility_off.png')}}" alt="" class="hidePass" />
                    </div>
                    <input type="hidden" name="pin_code" value="{{$_GET['pin_code'] ?? ''}}">
                    <input type="hidden" name="email" value="{{$_GET['email'] ?? ''}}">
                </div>
                <div class="form-field mb-3">
                    <label>Confirm Password</label>
                    <div class="form-field-input">
                        <input type="password" name="password_confirmation" id="passInput2" />
                        <img src="{{asset('assets/images/visibility.png')}}" alt="" class="showPass" />
                        <img src="{{asset('assets/images/visibility_off.png')}}" alt="" class="hidePass" />
                    </div>
                </div>
                <div class="form-field pt-2 pt-sm-3 pt-lg-5">
                    <button type="submit">Reset Password</button>
                </div>
            </form>
        </div>
        <div class="verfication-successfull text-center py-3 py-sm-5">

            <svg width="120" height="120" viewBox="0 0 130 130" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0 65C0 47.7609 6.84819 31.2279 19.0381 19.0381C31.2279 6.84819 47.7609 0 65 0C82.2391 0 98.7721 6.84819 110.962 19.0381C123.152 31.2279 130 47.7609 130 65C130 82.2391 123.152 98.7721 110.962 110.962C98.7721 123.152 82.2391 130 65 130C47.7609 130 31.2279 123.152 19.0381 110.962C6.84819 98.7721 0 82.2391 0 65ZM61.2907 92.82L98.7133 46.0373L91.9533 40.6293L60.0427 80.5047L37.44 61.672L31.8933 68.328L61.2907 92.8287V92.82Z" fill="#6DACE4" />
            </svg>
            <h1 class="form-heading pt-2 pt-sm-4">Verified</h1>
            <div class="form-field pt-4">
                <h1>you have successful verified account.</h1>
            </div>
        </div>
    </div>
</div>
@endsection
@section('admininsertjavascript')
<script src="{{ asset('assets/js/reset.js') }}"></script>
@endsection