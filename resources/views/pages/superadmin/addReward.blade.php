@extends('layouts.superadmin.superadmin-default')
@section('customhead')
@endsection
@section('content')
@include('includes.superadmin.navbar')
@php
if(isset($reward->id)){
$exclude = 'exclude';
}else{
$exclude = '';
}
@endphp
<section class="home-section pb-3">
    <div class="container-fluid">
        <div class="form-container ">
            <div class="form-wrapper">
                <div class="col-12 form-wrapper-heading">
                    <!-- <h1>Add New Reward</h1> -->
                    <h1>{{ isset($reward) && !empty($reward) ? "Update" : "Add New" }} Reward</h1>
                    <a href="{{url('/adminReward')}}"><img src="{{asset('assets/images/arrow_back.png')}}" alt="" /></a>
                </div>
                <div class="form-box">
                    <form onsubmit="return rewardForm()" id="rewardForm" action="{{ url('store-reward') }}" method="POST" enctype="multipart/form-data">
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
                        @if(isset($reward) && !empty($reward->image_path))
                        <div class="form-field mb-3">
                            <label class="upload-file image-field" style="display: none">
                                <img src="{{asset('assets/images/upload-icon.png')}}" alt="" />
                                Upload Image
                                <input type="file" name="image_path" class="{{$exclude}}" accept="image/*" id="image-upload" />
                            </label>
                            <div class="image-view">
                                <img class="image-viewer image-field" id="image-viewer" src="{{$reward->image_path}}" alt="" />
                                <img class="close-icon" src="{{asset('assets/images/close-icon.png')}}" alt="" id="close-icon" />
                            </div>
                        </div>
                        @else
                        <div class="form-field mb-3">
                            <label class="upload-file image-field">
                                <img src="{{asset('assets/images/upload-icon.png')}}" alt="" />
                                Upload Image
                                <input type="file" name="image_path" class="{{$exclude}}" accept="image/*" id="image-upload" />
                            </label>
                            <div class="image-view image-field" style="display: none">
                                <img class="image-viewer" id="image-viewer" src="" alt="" />
                                <img class="close-icon" src="{{asset('assets/images/close-icon.png')}}" alt="" id="close-icon" style="display: none" />
                            </div>
                        </div>
                        @endif
                        <input type="hidden" class="exclude" name="reward_id" id="reward_id" value="{{$reward->id ?? ''}}">

                        <div class="form-field mb-3">
                            <label>Title</label>
                            <input type="text" value="{{$reward['title'] ?? ''}}" name="title" />
                        </div>
                        <div class="form-field mb-3">
                            <label>Description</label>
                            <textarea name="description" rows="5">{{$reward['description'] ?? ''}}</textarea>
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
function rewardForm() {
        if (!ValidateField("rewardForm")) {
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