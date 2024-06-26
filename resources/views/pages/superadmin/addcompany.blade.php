@extends('layouts.superadmin.superadmin-default')
@section('customhead')
@endsection
@section('content')
    @include('includes.superadmin.navbar')
    @php
        if (isset($company->id)) {
            $exclude = 'exclude';
        } else {
            $exclude = '';
        }
    @endphp
    <section class="home-section pb-3">
        <div class="container-fluid">
            <div class="form-container ">
                <div class="form-wrapper">
                    <div class="col-12 form-wrapper-heading">
                        <h1>{{ isset($company) && !empty($company) ? 'Update' : 'Add New' }} Company</h1>
                        <a href="{{ url('/dashboard') }}"><img src="{{ asset('assets/images/arrow_back.png') }}"
                                alt="" /></a>
                    </div>
                    <div class="form-box">
                        <form onsubmit="return companyForm()" id="companyForm" action="{{ url('store-company') }}"
                            method="POST" enctype="multipart/form-data">
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
                            @if (isset($company) && !empty($company->image))
                                <div class="form-field mb-3">
                                    <label class="upload-file image-field" style="display: none">
                                        <img src="{{ asset('assets/images/upload-icon.png') }}" alt="" />
                                        Upload Image
                                        <input type="file" name="image" class="{{ $exclude }}" accept="image/*"
                                            id="image-upload" />
                                    </label>
                                    <div class="image-view">
                                        <img class="image-viewer image-field" id="image-viewer" src="{{ $company->image }}"
                                            alt="" />
                                        <img class="close-icon" src="{{ asset('assets/images/close-icon.png') }}"
                                            alt="" id="close-icon" />
                                    </div>
                                </div>
                            @else
                                <div class="form-field mb-3">
                                    <label class="upload-file image-field">
                                        <img src="{{ asset('assets/images/upload-icon.png') }}" alt="" />
                                        Upload Image
                                        <input type="file" name="image" class="{{ $exclude }}" accept="image/*"
                                            id="image-upload" />
                                    </label>
                                    <div class="image-view image-field" style="display: none">
                                        <img class="image-viewer" id="image-viewer" src="" alt="" />
                                        <img class="close-icon" src="{{ asset('assets/images/close-icon.png') }}"
                                            alt="" id="close-icon" style="display: none" />
                                    </div>
                                </div>
                            @endif

                            <input type="hidden" class="exclude" name="company_id" id="company_id"
                                value="{{ $company->id ?? '' }}">

                            <div class="form-field mb-3">
                                <label>Name</label>
                                <input type="text" value="{{ old('name', $company->name ?? '') }}" name="name" />
                            </div>
                            <div class="form-field mb-3">
                                <label>Location</label>
                                <input type="text" value="{{ old('location', $company->location ?? '') }}"
                                    name="location" />
                            </div>
                            <div class="form-field mb-3">
                                <label>Bio</label>
                                <textarea name="bio">{{ old('bio', $company->bio ?? '') }}</textarea>
                            </div>
                            <div class="form-field mb-3">
                                <label>Email</label>
                                <input type="email" value="{{ old('email', $company->email ?? '') }}" name="email" />
                            </div>
                            <div class="form-field mb-3">
                                <label>Password</label>
                                <div class="form-field-input">
                                    <input type="password" name="password" class="{{ $exclude }}" id="passInput1" />
                                    <img src="{{ asset('assets/images/visibility.png') }}" alt=""
                                        class="showPass" />
                                    <img src="{{ asset('assets/images/visibility_off.png') }}" alt=""
                                        class="hidePass" />
                                </div>
                            </div>
                            <div class="form-field mb-3">
                                <label>Confirm Password</label>
                                <div class="form-field-input">
                                    <input type="password" class="{{ $exclude }}" name="password_confirmation"
                                        id="passInput2" />
                                    <img src="{{ asset('assets/images/visibility.png') }}" alt=""
                                        class="showPass" />
                                    <img src="{{ asset('assets/images/visibility_off.png') }}" alt=""
                                        class="hidePass" />
                                </div>
                            </div>
                            <div class="form-field mb-3">
                                <label>Monthly Prize Budget</label>
                                <input type="text" class="allow_decimal"
                                    value="{{ old('monthly_budget', $company->monthly_budget ?? '') }}" name="monthly_budget" />
                            </div>
                            <div class="budget-wrapper mb-3">
                                <div class="form-field">

                                    <label>Grand Prize</label>
                                    <input type="text" class="prizes_percentage allow_decimal"
                                        value="{{ old('grand_prize', $company->grand_prize ?? '') }}" name="grand_prize"
                                        placeholder="%" />
                                </div>
                                <div class="form-field">
                                    <label>Super Prizes</label>
                                    <input type="text" class="prizes_percentage allow_decimal"
                                        value="{{ old('super_prize', $company->super_prize ?? '') }}" name="super_prize"
                                        placeholder="%" />
                                </div>
                                <div class="form-field">
                                    <label>Other Prizes</label>
                                    <input type="text" class="prizes_percentage allow_decimal"
                                        value="{{ old('other_prize', $company->other_prize ?? '') }}" name="other_prize"
                                        placeholder="%" />
                                </div>
                            </div>
                            <div class="form-field mb-3">
                                <label>Daily Video Types</label>
                                @foreach (config('constants.DAILY_VIDEO_TYPES') as $video_types)
                                    <div class="form-field-checkbox">
                                        <input type="checkbox" name="daily_video_types[]" class=""
                                            id="{{ $video_types['label'] }}" value="{{ $video_types['label'] }}"
                                            @if (old('daily_video_types') !== null && in_array($video_types['label'], old('daily_video_types'))) checked="checked" @elseif(isset($company->daily_video_types) && in_array($video_types['label'], explode(',', $company->daily_video_types)))
                                checked="checked" @endif>
                                        <label class="form-check-label"
                                            for="{{ $video_types['label'] }}">{{ $video_types['label'] }}</label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-field pt-2 pt-sm-3 ">
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
    <script src="{{ asset('assets/js/addcompany.js') }}"></script>
    <script>
        function companyForm() {
            if (!ValidateField("companyForm")) {
                swal({
                    title: "System Error!",
                    text: "Please fill all the required fields.",
                    icon: "error",
                });
                return false;
            }
            return true;
        };
    </script>
@endsection
