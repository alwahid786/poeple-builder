@extends('layouts.user.user-default')
@section('content')

<div class="form-container py-3">
    <div class="form-wrapper">
        <div class="col-12 form-wrapper-heading">
            <h1>Create New User</h1>
            <a href="{{url('/')}}"><img src="{{asset('assets/images/arrow_back.png')}}" alt="" /></a>
        </div>
        <div class="form-box">
            <form method="post" action="{{ route('user.signup') }}" enctype="multipart/form-data">
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
                    <label class="upload-file">
                        <img src="{{asset('assets/images/upload-icon.png')}}" alt="" />
                        Upload Image
                        <input type="file" name="image" accept="image/*" id="image-upload" />
                    </label>
                    <div class="image-view" style="display: none">
                        <img class="image-viewer" id="image-viewer" src="{{asset('assets/images/profile.jpg')}}" alt="" />
                        <img class="close-icon" src="{{asset('assets/images/close-icon.png')}}" alt="" id="close-icon" style="display: none" />
                    </div>
                </div>
                <div class="form-field mb-3">
                    <label>Name</label>
                    <input value="{{old('name')}}" name="name" type="text"  />
                </div>
                <div class="form-field mb-3">
                    <label>Email</label>
                    <input value="{{old('email', $_GET['email'] ?? '')}}" name="email" type="email"  />
                </div>

                <div class="form-field mb-3">
                    <label>Phone</label>
                    <input value="{{old('phone_number')}}" name="phone_number" type="text" />
                </div>

                <div class="form-field mb-3">
                    <label>Password</label>
                    <div class="form-field-input">
                        <input type="password" name="password" id="passInput1" />
                        <img src="{{asset('assets/images/visibility.png')}}" alt="" class="showPass" />
                        <img src="{{asset('assets/images/visibility_off.png')}}" alt="" class="hidePass" />
                    </div>
                </div>

                <div class="form-field mb-3">
                    <label>Confirm Password</label>
                    <div class="form-field-input">
                        <input type="password" name="password_confirmation" id="passInput1" />
                        <img src="{{asset('assets/images/visibility.png')}}" alt="" class="showPass" />
                        <img src="{{asset('assets/images/visibility_off.png')}}" alt="" class="hidePass" />
                    </div>
                </div>

                <div class="form-field mb-3">
                    <label>Enter company id</label>
                    <input value="{{old('system_id')}}" name="system_id" type="text"  />
                </div>

                <div class="form-field pt-2 pt-sm-3 pt-lg-5">
                    <button>Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('admininsertjavascript')
<script src="{{ asset('assets/js/signup.js') }}"></script>
@endsection
