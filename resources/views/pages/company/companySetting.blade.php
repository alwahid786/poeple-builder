@extends('layouts.company.company-default')
@section('content')
@include('includes.company.navbar')
<section class="home-section py-3">
    <div class="container-fluid">
        <form onsubmit="return settingsForm()" id="settingsForm" action="{{ route('video-settings') }}" method="POST" class="setting-container">

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
            @csrf
            <div class="setting-heading w-100">
                <h1 class="text-left">Prizes Details</h1>
            </div>
            <div class="row w-100">
                <div class="col-md-6">
                    <div class="form-field mb-3 w-100">
                        <label>Monthly Prize Budget</label>
                        <input type="text" class="allow_decimal" value="{{ old('monthly_budget', $user->monthly_budget ?? '') }}" name="monthly_budget" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-field">
                        <label>Grand Prize (%)</label>
                        <input type="text" class="prizes_percentage allow_decimal" value="{{ old('grand_prize', $user->grand_prize ?? '') }}" name="grand_prize" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-field">
                        <label>Super Prizes (%)</label>
                        <input type="text" class="prizes_percentage allow_decimal" value="{{ old('super_prize', $user->super_prize ?? '') }}" name="super_prize" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-field">
                        <label>Other Prizes (%)</label>
                        <input type="text" class="prizes_percentage allow_decimal" value="{{ old('other_prize', $user->other_prize ?? '') }}" name="other_prize" />
                    </div>
                </div>
            </div>


            <div class="setting-heading w-100">
                <h1 class="text-left">Who can See Replies Video’s</h1>
            </div>
            <div class="setting-checkbox-container">
                <div class="setting-checkbox-wrapper">
                    <label for="">All community </label>
                    <input value="1" name="is_community" type="checkbox" @if ($user->is_community) checked @endif>
                </div>
                <div class="setting-checkbox-wrapper">
                    <label for="">Employee’s only</label>
                    <input value="1" name="is_employee" type="checkbox" @if ($user->is_employee) checked @endif>
                </div>
            </div>
            <div class="setting-save-btn">
                <button type="submit">Save</button>
            </div>
        </form>
    </div>
</section>
@endsection
@section('admininsertjavascript')
<script>
    function settingsForm() {
        if (!ValidateField("settingsForm")) {
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