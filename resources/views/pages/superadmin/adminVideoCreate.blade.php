@extends('layouts.superadmin.superadmin-default')

@section('content')
@include('includes.superadmin.navbar')
@php
if(isset($video->id)){
$exclude = 'exclude';
}else{
$exclude = '';
}
@endphp
<section class="home-section pb-3 videoActionPage">
    <div class="container-fluid">
        <div class="form-container">
            <div class="form-wrapper">
                <div class="col-12 form-wrapper-heading">
                    <h1>{{ isset($video) && !empty($video) ? "Update" : "Add New" }} Video</h1>
                </div>
                <div class="col-12 date-slider">
                    <div class="filter-tabs-two scroll-container">
                        <div class="tab-list-two">
                            @for($count = 0; $count<$videoCounts['max']; $count++)
                            <div class="tab-box-two tab-hide-two">
                                <h1>Day {{$count+1}}</h1>
                                <ul class="mark-type">
                                    @foreach ($all_categories as $category_name)
                                             <li>
                                            <img src="{{ asset('assets/images/' . (isset($videoCounts['categories'][$category_name]) && $videoCounts['categories'][$category_name] >= $count+1 ? 'check.png' : 'remove.png')) }}" alt="" />
                                                 {{$category_name}}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endfor
                        </div>

                        <div class="back-button scroll-left">
                            <img src="{{asset('assets/images/back.png')}}" alt="" />
                        </div>
                        <div class="next-button scroll-right">
                            <img src="{{asset('assets/images/next.png')}}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="form-box">
                    <form onsubmit="return videoForm()" class="create-video-form" id="videoForm" action="{{ url('store-video') }}" method="POST" enctype="multipart/form-data">
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
                            <label>Daily Video Types</label>
                            @foreach(config('constants.DAILY_VIDEO_TYPES') as $video_types)
                           @php
                            $dn = '';
                            @endphp
                            <div class="form-field-checkbox">
                                <input type="radio" name="daily_video_types" class="" id="{{$video_types['label']}}" value="{{$video_types['label']}}"
                                @if(isset($video->daily_video_types) && $video_types['label']==$video->daily_video_types)
                                @php
                                    $dn = $d_no ?? '';
                                @endphp
                                checked
                                @endif
                                >
                                <label class="form-check-label" for="{{$video_types['label']}}">{{$video_types['label']}} (Day {{ (!empty($dn)) ? $dn : (isset($videoCounts['categories'][$video_types['label']]) ? $videoCounts['categories'][$video_types['label']] : 0)+1 }})</label>
                            </div>
                            @endforeach
                        </div>
                        <div class="form-field mb-3">
                            @if(isset($video['thumbnail']) && !empty($video['thumbnail']))
                            <label class="upload-file image-field" style="display: none">
                                <img src="{{asset('assets/images/upload-icon.png')}}" alt="" />
                                Upload Video
                                <input type="file" accept="video/*" class="{{$exclude}}" name="video" id="image-upload" />
                            </label>
                            <div class="image-view">
                                <img class="image-viewer" id="image-viewer" src="{{$video['thumbnail']}}" alt="" />
                                <img class="close-icon" src="{{asset('assets/images/close-icon.png')}}" alt="" id="close-icon" />
                            </div>
                            @else
                            <label class="upload-file image-field">
                                <img src="{{asset('assets/images/upload-icon.png')}}" alt="" />
                                Upload Video
                                <input type="file" accept="video/*" class="{{$exclude}}" name="video" id="image-upload" />
                            </label>
                            <div class="image-view" style="display: none">
                                <img class="image-viewer" id="image-viewer" src="{{asset('assets/images/profile.jpg')}}" alt="" />
                                <img class="close-icon" src="{{asset('assets/images/close-icon.png')}}" alt="" id="close-icon" style="display: none" />
                            </div>
                            @endif
                        </div>
                        <div class="form-field mb-3">
                        <input type="hidden" class="exclude" name="video_id" id="video_id" value="{{$video->id ?? ''}}">
                            <input type="hidden" class="exclude" name="thumbnail_field" id="thumbnail">
                            <label>Name</label>
                            <input type="text" value="{{$video->name ?? ''}}" name="name" />
                        </div>
                        <div class="form-field mb-3">
                            <label>Description</label>
                            <textarea name="description">{{$video->description ?? ''}}</textarea>
                        </div>
                        <div class="form-field pt-2 pt-sm-3 ">
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
<script src="{{ asset('assets/js/companyCreateVideo.js')}}"></script>
@endsection

