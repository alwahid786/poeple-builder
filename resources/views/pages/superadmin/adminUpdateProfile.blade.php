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
                    <h1>Update Profile</h1>
                    {{-- <a href=""><img src="{{ asset('assets/images/arrow_back.png') }}" alt="" /></a> --}}
                </div>

                <div class="form-box">
                    <form onsubmit="return profileForm()" id="profileForm" action="" method="POST" enctype="multipart/form-data">
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
                            <label class="upload-file image-field" style="display: none">
                                <img src="{{asset('assets/images/upload-icon.png')}}" alt="" />
                                Upload Image
                                <input type="file" name="image" class="exclude" accept="image/*" id="image-upload" />
                            </label>
                            <div class="image-view">
                                <img class="image-viewer image-field" id="image-viewer" src="{{auth()->user()->image}}" alt="" />
                                <img class="close-icon" src="{{asset('assets/images/close-icon.png')}}" alt="" id="close-icon" />
                            </div>
                        </div>
                        <div class="form-field mb-3">
                            <label>Name</label>
                            <input type="text" value="{{auth()->user()->name ?? ''}}" name="name" />
                        </div>

                        <div class="form-field mb-3">
                            <label>Email</label>
                            <input type="email" value="{{auth()->user()->email ?? ''}}" disabled readonly />
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
        const UploadFile = $(".upload-file");
        const imageUpload = $("#image-upload");
        const imageView = $(".image-view");
        const imageViewer = $("#image-viewer");
        const closeIcon = $("#close-icon");

        $(document).on('change', '#image-upload', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    UploadFile.hide();
                    imageViewer.attr("src", e.target.result);
                    imageView.show();
                    closeIcon.show();
                };

                reader.readAsDataURL(file);
            }
        });

        closeIcon.click(function() {
            imageView.hide();
            closeIcon.hide();
            UploadFile.show();
            var currentFile = $('.upload-file #image-upload');
            var fileName = currentFile.attr('name');
            var fileAccept = currentFile.attr('accept');
            currentFile.remove();
            $('.upload-file').append(
                `<input type="file" name="${fileName}" class="" accept="${fileAccept}" id="image-upload">`
            );
        });
    });

    function profileForm() {
        if (!ValidateField("profileForm")) {
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