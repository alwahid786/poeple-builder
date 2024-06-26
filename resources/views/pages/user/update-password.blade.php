@php
if (auth()->user()->user_type == 'admin') {
$type = 'superadmin';
} else {
$type = auth()->user()->user_type;
}
@endphp
@extends('layouts.' . $type . '.' . $type . '-default')
@section('content')
@include('includes.' . $type . '.navbar')
<section class="home-section py-3">
    <div class="container-fluid">
        <div class="form-container">
            <div class="form-wrapper">
                <div class="col-12 form-wrapper-heading">
                    <h1>Update Password</h1>
                    {{-- <a href=""><img src="{{asset('assets/images/arrow_back.png')}}" alt="" /></a> --}}
                </div>

                <div class="form-box">
                    <form onsubmit="return updatePasswordForm()" id="updatePasswordForm" action="{{ url('storePassword') }}" method="POST">
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
                            <label>Old Password</label>
                            <div class="form-field-input">
                                <input type="password" name="old_password" />
                                <img src="{{ asset('assets/images/visibility.png') }}" alt="" class="showPass" />
                                <img src="{{ asset('assets/images/visibility_off.png') }}" alt="" class="hidePass" />
                            </div>
                        </div>
                        <div class="form-field mb-3">
                            <label>New Password</label>
                            <div class="form-field-input">
                                <input type="password" name="new_password" />
                                <img src="{{ asset('assets/images/visibility.png') }}" alt="" class="showPass" />
                                <img src="{{ asset('assets/images/visibility_off.png') }}" alt="" class="hidePass" />
                            </div>
                        </div>
                        <div class="form-field mb-3">
                            <label>Confirm Password</label>
                            <div class="form-field-input">
                                <input type="password" name="password_confirmation" />
                                <img src="{{ asset('assets/images/visibility.png') }}" alt="" class="showPass" />
                                <img src="{{ asset('assets/images/visibility_off.png') }}" alt="" class="hidePass" />
                            </div>
                        </div>

                        <div class="form-field pt-2 pt-sm-3 pt-lg-5">
                            <button>Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('admininsertjavascript')
<script>
    $(document).ready(function() {
        $(".hidePass").hide();
        $(".showPass").click(function() {
            const input = $(this).siblings("input[type='password']");
            input.attr("type", "text");
            $(this).hide();
            $(this).siblings(".hidePass").show();
        });

        $(".hidePass").click(function() {
            const input = $(this).siblings("input[type='text']");
            input.attr("type", "password");
            $(this).hide();
            $(this).siblings(".showPass").show();
        });

    });

    function updatePasswordForm() {
        if (!ValidateField("updatePasswordForm")) {
            swal({
                title: "System Error!",
                text: "Please fill all the required fields.",
                icon: "error",
            });
            return false;
        }
        return true;
    };
    $(document).ready(function() {
        const dropdownContent = $(".active").next(".setting-dropdown");
        console.log(dropdownContent, "dropdownContent")
        dropdownContent.removeClass('setting-dropdown-hide');
    })
</script>
@endsection