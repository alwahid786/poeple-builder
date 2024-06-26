@extends('layouts.superadmin.superadmin-default')
@section('customhead')
@endsection
@section('content')
@include('includes.superadmin.navbar')
<section class="home-section pb-3">
    <div class="container-fluid">
        <div class="col-12 common-heading px-0">
            <h1>Get In Touch...</h1>
        </div>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <form method='post' action="{{ route('helpPostReq') }}">
            @csrf
            <div class="row pt-4">
                <div class="col-md-6">
                    <div class="form-group form-input-wrapper">
                        <label>First Name :</label>
                        <div class="form-input">
                            <input type="text" class="form-control" name="first_name" placeholder="First Name" />
                            <img src="{{asset('assets/images/user-icon.png')}}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-input-wrapper">
                        <label>Last Name :</label>
                        <div class="form-input">
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" />
                            <img src="{{asset('assets/images/user-icon.png')}}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group form-input-wrapper">
                        <label>Phone Number :</label>
                        <div class="form-input">
                            <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" />
                            <img src="{{asset('assets/images/phone-icon.png')}}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group form-input-wrapper">
                        <label>Email Address :</label>
                        <div class="form-input">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" />
                            <img src="{{asset('assets/images/mail-icon.png')}}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group form-input-wrapper">
                        <label>Message :</label>

                        <textarea name="message" placeholder="Type Here..."></textarea>
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
@endsection