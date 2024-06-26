@extends('layouts.user.user-default')
@section('content')
@include('includes.user.navbar')
<section class="home-section pb-3">
    <div class="container-fluid">
        <div class="col-12 common-heading px-0">
            <h1>Get In Touch...</h1>
        </div>
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block" style="width: 100%;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Error! </strong>{{ $message }}
        </div>
        @elseif($message = Session::get('success'))
        <div class="alert alert-success alert-block" style="width: 100%;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Success! </strong>{!! $message !!}
        </div>
        @endif
        <form method='post' action="">
            @csrf
            <div class="row pt-4">
                <div class="col-md-6">
                    <div class="form-group form-input-wrapper">
                        <label>First Name :</label>
                        <div class="form-input">
                            <input type="text" class="form-control" name="first_name" value="{{ old('first_name', auth()->user()->name ?? '') }}" placeholder="First Name" />
                            <img src="{{asset('assets/images/user-icon.png')}}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-input-wrapper">
                        <label>Last Name :</label>
                        <div class="form-input">
                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" />
                            <img src="{{asset('assets/images/user-icon.png')}}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group form-input-wrapper">
                        <label>Phone Number :</label>
                        <div class="form-input">
                            <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number', auth()->user()->phone_number ?? '') }}" placeholder="Phone Number" />
                            <img src="{{asset('assets/images/phone-icon.png')}}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group form-input-wrapper">
                        <label>Email Address :</label>
                        <div class="form-input">
                            <input type="email" class="form-control" name="email" value="{{ old('email', auth()->user()->email ?? '') }}" placeholder="Email Address" />
                            <img src="{{asset('assets/images/mail-icon.png')}}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group form-input-wrapper">
                        <label>Message :</label>

                        <textarea name="message" placeholder="Type Here...">{{ old('message') }}</textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-input-wrapper">
                        <button type="submit">Send Message</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
@section('admininsertjavascript')
<script>
    $(document).ready(function() {
        const dropdownContent = $(".active").next(".setting-dropdown");
        console.log(dropdownContent, "dropdownContent")
        dropdownContent.removeClass('setting-dropdown-hide');
    })
</script>
@endsection