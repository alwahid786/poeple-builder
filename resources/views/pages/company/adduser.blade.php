@extends('layouts.company.company-default')
@section('content')
@include('includes.company.navbar')
@php
if(isset($user->id)){
$exclude = 'exclude';
}else{
$exclude = '';
}
@endphp
<section class="home-section py-3">
    <div class="container-fluid">
        <div class="form-container">
            <div class="form-wrapper">
                <div class="col-12 form-wrapper-heading">
                <h1>{{ isset($user) && !empty($user) ? "Update" : "Add New" }} User</h1>
                    <!-- <h1>Create New User</h1> -->
                    <a href="{{url('/company-dashboard')}}"><img src="{{asset('assets/images/arrow_back.png')}}" alt="" /></a>
                </div>
                <div class="form-box">
                    <form onsubmit="return userForm()" id="userForm" action="{{ url('store-user') }}" method="POST" enctype="multipart/form-data">
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
                        @if(isset($user) && !empty($user->image))
                        <div class="form-field mb-3">
                            <label class="upload-file image-field" style="display: none">
                                <img src="{{asset('assets/images/upload-icon.png')}}" alt="" />
                                Upload Image
                                <input type="file" name="image" class="{{$exclude}}" accept="image/*" id="image-upload" />
                            </label>
                            <div class="image-view">
                                <img class="image-viewer image-field" id="image-viewer" src="{{$user->image}}" alt="" />
                                <img class="close-icon" src="{{asset('assets/images/close-icon.png')}}" alt="" id="close-icon" />
                            </div>
                        </div>
                        @else
                        <div class="form-field mb-3">
                            <label class="upload-file image-field">
                                <img src="{{asset('assets/images/upload-icon.png')}}" alt="" />
                                Upload Image
                                <input type="file" name="image" class="{{$exclude}}" accept="image/*" id="image-upload" />
                            </label>
                            <div class="image-view image-field" style="display: none">
                                <img class="image-viewer" id="image-viewer" src="" alt="" />
                                <img class="close-icon" src="{{asset('assets/images/close-icon.png')}}" alt="" id="close-icon" style="display: none" />
                            </div>
                        </div>
                        @endif
                        
                        <input type="hidden" class="exclude" name="user_id" id="user_id" value="{{$user->id ?? ''}}">
                        <div class="form-field mb-3">
                            <label>Name</label>
                            <input type="text" value="{{ old('name', $user->name ?? '') }}" name="name" />
                        </div>


                        <div class="form-field mb-3">
                            <label>Email</label>
                            <input type="email" value="{{ old('email', $user->email ?? '') }}" name="email" />
                        </div>
                        <div class="form-field mb-3">
                            <label>Phone</label>
                            <input type="text" value="{{ old('phone_number', $user->phone_number ?? '') }}" name="phone_number" />
                        </div>
                        <div class="form-field mb-3">
                            <label>Password</label>
                            <div class="form-field-input">
                                <input type="password" name="password" class="{{$exclude}}" id="passInput1" />
                                <img src="{{asset('assets/images/visibility.png')}}" alt="" class="showPass" />
                                <img src="{{asset('assets/images/visibility_off.png')}}" alt="" class="hidePass" />
                            </div>
                        </div>
                        <div class="form-field mb-3">
                            <label>Confirm Password</label>
                            <div class="form-field-input">
                                <input type="password" class="{{$exclude}}" name="password_confirmation" id="passInput2" />
                                <img src="{{asset('assets/images/visibility.png')}}" alt="" class="showPass" />
                                <img src="{{asset('assets/images/visibility_off.png')}}" alt="" class="hidePass" />
                            </div>
                        </div>


                        <div class="form-field pt-2 pt-sm-3 pt-lg-5">
                            <button>Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('admininsertjavascript')
<script src="{{ asset('assets/js/adduser.js') }}"></script>
<script>
    function userForm(){
        if (!ValidateField("userForm")) {
            return false;
        }
        return true;
    };
</script>
@endsection