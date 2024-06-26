@extends('layouts.superadmin.superadmin-default')
@section('customhead')

@endsection
@section('content')
@include('includes.superadmin.navbar')
<section class="home-section py-3">
    <div class="container-fluid">
        <div class="form-container">
            <div class="form-wrapper">
                <div class="col-12 form-wrapper-heading">
                    <h1>Update Password</h1>
                    <a href=""><img src="{{ asset('assets/images/arrow_back.png') }}" alt="" /></a>
                </div>

                <div class="form-box">
                    <form>

                        <div class="form-field mb-3">
                            <label>Old Password</label>
                            <div class="form-field-input">
                                <input type="password" name="password" id="passInput1" />
                                <img src="{{ asset('assets/images/visibility.png') }}" alt="" class="showPass" />
                                <img src="{{ asset('assets/images/visibility_off.png') }}" alt="" class="hidePass" />
                            </div>
                        </div>
                        <div class="form-field mb-3">
                            <label>New Password</label>
                            <div class="form-field-input">
                                <input type="password" name="password" id="passInput1" />
                                <img src="{{ asset('assets/images/visibility.png') }}" alt="" class="showPass" />
                                <img src="{{ asset('assets/images/visibility_off.png') }}" alt="" class="hidePass" />
                            </div>
                        </div>
                        <div class="form-field mb-3">
                            <label>Confirm Password</label>
                            <div class="form-field-input">
                                <input type="password" name="confirmpassword" id="passInput2" />
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
    $(document).ready(function() {
        const dropdownContent = $(".active").next(".setting-dropdown");
        console.log(dropdownContent, "dropdownContent")
        dropdownContent.removeClass('setting-dropdown-hide');
    })
</script>
@endsection