<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@extends('layouts.user.user-default')
<style>
    body {
        overflow-x: hidden !important;
    }

    .swiper-container {
        width: 100%;
        padding: 20px 0;
        position: relative;
        overflow-x: hidden;
    }

    .swiper-wrapper {
        height: unset !important;
    }

    .swiper-slide {
        display: flex !important;
        flex-direction: column;
        align-items: center;
        gap: 5px;
    }

    .swiper-slide img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        border: 1px solid #0199db;
    }

    .videos video {
        width: 100%;
        border-radius: 6px;
    }

    .videos img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }

    .videos h3,
    .slider h3 {
        font-size: 16px;
        font-weight: 500;
        margin-bottom: 0px;
    }

    .swiper-slide h3 {
        font-size: 12px;
    }

    .videos span {
        font-size: 13px;
    }

    .flex-grow {
        flex-grow: 1;
        flex-basis: 18%;
    }

    .cover {
        height: 300px;
        background: linear-gradient(180deg, #6dace4 0%, #08c8f6 74%);
    }

    .cover img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
    }

    .video-user{
        cursor: pointer !important;
    }

    @media (max-width: 576px) {
        .flex-grow {
            flex-basis: unset;
        }
    }
</style>
@section('content')
@include('includes.user.navbar')
<section class="home-section pb-3">
    <!-- cover -->
    <div class="cover w-100 d-flex align-items-center justify-content-center">
        <div class="d-flex flex-column align-items-center justify-content-center">
            <img src="{{$company->image}}" alt="img">
            <h4>{{$company->name}}</h4>
            <p>Employees: {{count($companyUsers)}}</p>
        </div>
    </div>
    <div class="w-100 p-4">
        <!-- slider -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide video-user" data-user-id="0">
                    <img src="https://cdn-icons-png.flaticon.com/512/33/33308.png" alt="img">
                    <h3>All</h3>
                </div>
                @if(isset($companyUsers) && $companyUsers != null)
                @foreach($companyUsers as $user)
                <div class="swiper-slide video-user" data-user-id="{{$user->id}}">
                    <img src="{{$user->image}}" alt="img">
                    <h3>{{$user->name}}</h3>
                </div>
                @endforeach
                @endif
            </div>
            <!-- navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

        <!-- videos -->
        <div class="videos row mt-4" style="row-gap:1.2rem;">
            @if(isset($companyVideoReplies) && $companyVideoReplies != null)
            @foreach($companyVideoReplies as $companyVideo)
            {{-- {{dd($companyVideo)}} --}}
            <div class="col-12 col-md-4 col-lg-3 replied-videos" data-user-id="{{$companyVideo->user_id}}">
                <video controls poster="{{$companyVideo['thumbnail']}}" data-video-id="{{$companyVideo['id']}}">
                    <source src="{{$companyVideo['video_path']}}">
                </video>
                <div class="d-flex justify-content-between align-items-end">
                    <div class="d-flex align-items-center" style="gap:0.5rem;">
                        <img src="{{$companyVideo['user']['image']}}" alt="img">
                        <div>
                            <h3>{{$companyVideo['user']['name']}}</h3>
                            <span>Day {{$companyVideo->day}} <span style="background-color:#0199db; border-radius:3px;color:white;padding:0px 3px;">{{$companyVideo->video->daily_video_types}}</span></span>
                        </div>
                    </div>
                    @if($companyVideo['is_watched'] == 1)
                    <div><i class="fas fa-eye"></i></div>
                    @else
                    <div><i class="fas fa-eye-slash"></i></div>
                    @endif
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endsection
@section('admininsertjavascript')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('video').on('play', function() {
            var videoId = $(this).data('video-id');
            $.ajax({
                url: `{{ route('videos.watch')}}`,
                type: 'POST',
                data: {
                    video_id: videoId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        // Optionally update the UI to reflect the watched status
                        console.log('Video marked as watched.');
                    }
                }
            });
        });

        // Filter videos on the basis of user
        $(".video-user").on("click", function(e) {
            e.preventDefault();
            let user_id = $(this).data('user-id'); 
            if(user_id == 0){
                $(".replied-videos").show();
                return;
            }
            let videos = $(".replied-videos").filter(`[data-user-id='${user_id}']`);
            $(".replied-videos").hide();
            videos.show();
        });

    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const swiper = new Swiper(".swiper-container", {
            spaceBetween: 13,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            loop: false,
            breakpoints: {
                640: {
                    slidesPerView: 3
                },
                768: {
                    slidesPerView: 7
                },
                1024: {
                    slidesPerView: 11
                },
                1440: {
                    slidesPerView: 15
                },
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.0.1"></script>
<script>
    $(document).ready(function() {

        $('#reward-btn').click(function() {
            $('.spinner-wrapper').toggle();
            $("#spinnerOuterContainer").toggleClass("spinner-outer-wrapper")
        });
        $(document).on("click", ".video-card-img", function() {

            var isEventTriggered = false;
            videoId = $(this).attr('data-id');
            $("#goToReward").attr('href', 'user-reply/' + videoId)
            $("#videoLink").html(`
                    <video id="myVideo" controls autoplay="true">
                        <source src="${$(this).attr("data-url")}" type="video/mp4">
                    </video>`);
            $("#videoModal").modal("show");
            var video = document.getElementById("myVideo");
            $(video).on('ended', function() {
                if ($("#video-replies-btn-" + videoId).length) {
                    $("#watchedModal").modal("show");
                }
            });


            video.addEventListener('timeupdate', function() {
                var percentage = (video.currentTime / video.duration) * 100;
                if (percentage >= 70 && !isEventTriggered) {
                    $("#video-replies-btn-" + videoId).show();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                .attr('content')
                        }
                    });

                    $.ajax({
                        // alert(videoId);
                        url: "{{ url('watched-video') }}",
                        type: 'POST',
                        data: {
                            videoId: videoId
                        },
                        // dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            isEventTriggered = true;
                        },
                        error: function(data) {
                            console.log(data);
                        }

                    })
                }
            });
        });
        $(document).on("click", "#close-video", function() {
            $("#videoLink").empty();
        });
    });
</script>
@endsection
