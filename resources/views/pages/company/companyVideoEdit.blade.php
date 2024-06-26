@extends('layouts.company.company-default')
@section('content')
@include('includes.company.navbar')
<section class="home-section py-3 videoActionPage">
    <div class="container-fluid">
        <div class="form-container">
            <div class="form-wrapper">
                <div class="col-12 form-wrapper-heading">
                    <h1>Edit Video</h1>
                </div>
                <div class="form-box">
                    <form class="create-video-form">
                        <div class="form-field mb-3">
                            <label class="upload-file">
                                <img src="{{asset('assets/images/upload-icon.png')}}" alt="" />
                                Upload Video
                                <input type="file" accept="video/*" id="image-upload" />
                            </label>
                            <div class="image-view" style="display: none">
                                <img class="image-viewer" id="image-viewer" src="{{asset('assets/images/profile.jpg')}}" alt="" />
                                <img class="close-icon" src="{{asset('assets/images/close-icon.png')}}" alt="" id="close-icon" style="display: none" />
                            </div>
                        </div>
                        <div class="form-field mb-3">
                            <label>Name</label>
                            <input type="text" name="username" value="Video Name" />
                        </div>
                        <div class="form-field mb-3">
                            <label>Description</label>
                            <textarea name="">
Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.</textarea>
                        </div>
                        <div class="form-field pt-2 pt-sm-3">
                            <button>Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="loader-section">
        <div class="loader1">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</section>
@endsection
@section('admininsertjavascript')
<script src="{{ asset('assets/js/companyEditVideo.js')}}"></script>
@endsection