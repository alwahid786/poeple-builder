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
            <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
            <h4>Company Name</h4>
            <p>Employees: 23</p>
        </div>
    </div>
    <div class="w-100 p-4">
        <!-- slider -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <h3>Full Name</h3>
                </div>
                <div class="swiper-slide">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <h3>Full Name</h3>
                </div>
                <div class="swiper-slide">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <h3>Full Name</h3>
                </div>
                <div class="swiper-slide">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <h3>Full Name</h3>
                </div>
                <div class="swiper-slide">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <h3>Full Name</h3>
                </div>
                <div class="swiper-slide">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <h3>Full Name</h3>
                </div>
                <div class="swiper-slide">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <h3>Full Name</h3>
                </div>
                <div class="swiper-slide">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <h3>Full Name</h3>
                </div>
                <div class="swiper-slide">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <h3>Full Name</h3>
                </div>
                <div class="swiper-slide">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <h3>Full Name</h3>
                </div>
                <div class="swiper-slide">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <h3>Full Name</h3>
                </div>
                <div class="swiper-slide">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <h3>Full Name</h3>
                </div>
                <div class="swiper-slide">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <h3>Full Name</h3>
                </div>
                <div class="swiper-slide">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <h3>Full Name</h3>
                </div>
                <div class="swiper-slide">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <h3>Full Name</h3>
                </div>
                <div class="swiper-slide">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <h3>Full Name</h3>
                </div>
                <div class="swiper-slide">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <h3>Full Name</h3>
                </div>
                <div class="swiper-slide">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <h3>Full Name</h3>
                </div>
                <div class="swiper-slide">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <h3>Full Name</h3>
                </div>
                <div class="swiper-slide">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <h3>Full Name</h3>
                </div>
                <div class="swiper-slide">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <h3>Full Name</h3>
                </div>
            </div>
            <!-- navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

        <!-- videos -->
        <div class="videos d-flex flex-wrap align-items-center mt-4" style="gap:1.2rem;">
            <div class="flex-grow">
                <video controls poster="https://i.ytimg.com/vi/j3gRSxB5OVg/hq720.jpg?sqp=-oaymwEcCNAFEJQDSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLDJT1Oh9iriCOQz9L9oCkcead9_jA">
                    <source src="">
                </video>
                <div class="d-flex align-items-center" style="gap:0.5rem;">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <div>
                        <h3>Full Name</h3>
                        <span>3 days ago</span>
                    </div>
                </div>
            </div>
            <div class="flex-grow">
                <video controls poster="https://i.ytimg.com/vi/j3gRSxB5OVg/hq720.jpg?sqp=-oaymwEcCNAFEJQDSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLDJT1Oh9iriCOQz9L9oCkcead9_jA">
                    <source src="">
                </video>
                <div class="d-flex align-items-center" style="gap:0.5rem;">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <div>
                        <h3>Full Name</h3>
                        <span>3 days ago</span>
                    </div>
                </div>
            </div>
            <div class="flex-grow">
                <video controls poster="https://i.ytimg.com/vi/j3gRSxB5OVg/hq720.jpg?sqp=-oaymwEcCNAFEJQDSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLDJT1Oh9iriCOQz9L9oCkcead9_jA">
                    <source src="">
                </video>
                <div class="d-flex align-items-center" style="gap:0.5rem;">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <div>
                        <h3>Full Name</h3>
                        <span>3 days ago</span>
                    </div>
                </div>
            </div>
            <div class="flex-grow">
                <video controls poster="https://i.ytimg.com/vi/j3gRSxB5OVg/hq720.jpg?sqp=-oaymwEcCNAFEJQDSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLDJT1Oh9iriCOQz9L9oCkcead9_jA">
                    <source src="">
                </video>
                <div class="d-flex align-items-center" style="gap:0.5rem;">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <div>
                        <h3>Full Name</h3>
                        <span>3 days ago</span>
                    </div>
                </div>
            </div>
            <div class="flex-grow">
                <video controls poster="https://i.ytimg.com/vi/j3gRSxB5OVg/hq720.jpg?sqp=-oaymwEcCNAFEJQDSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLDJT1Oh9iriCOQz9L9oCkcead9_jA">
                    <source src="">
                </video>
                <div class="d-flex align-items-center" style="gap:0.5rem;">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <div>
                        <h3>Full Name</h3>
                        <span>3 days ago</span>
                    </div>
                </div>
            </div>
            <div class="flex-grow">
                <video controls poster="https://i.ytimg.com/vi/j3gRSxB5OVg/hq720.jpg?sqp=-oaymwEcCNAFEJQDSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLDJT1Oh9iriCOQz9L9oCkcead9_jA">
                    <source src="">
                </video>
                <div class="d-flex align-items-center" style="gap:0.5rem;">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <div>
                        <h3>Full Name</h3>
                        <span>3 days ago</span>
                    </div>
                </div>
            </div>
            <div class="flex-grow">
                <video controls poster="https://i.ytimg.com/vi/j3gRSxB5OVg/hq720.jpg?sqp=-oaymwEcCNAFEJQDSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLDJT1Oh9iriCOQz9L9oCkcead9_jA">
                    <source src="">
                </video>
                <div class="d-flex align-items-center" style="gap:0.5rem;">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <div>
                        <h3>Full Name</h3>
                        <span>3 days ago</span>
                    </div>
                </div>
            </div>
            <div class="flex-grow">
                <video controls poster="https://i.ytimg.com/vi/j3gRSxB5OVg/hq720.jpg?sqp=-oaymwEcCNAFEJQDSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLDJT1Oh9iriCOQz9L9oCkcead9_jA">
                    <source src="">
                </video>
                <div class="d-flex align-items-center" style="gap:0.5rem;">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <div>
                        <h3>Full Name</h3>
                        <span>3 days ago</span>
                    </div>
                </div>
            </div>
            <div class="flex-grow">
                <video controls poster="https://i.ytimg.com/vi/j3gRSxB5OVg/hq720.jpg?sqp=-oaymwEcCNAFEJQDSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLDJT1Oh9iriCOQz9L9oCkcead9_jA">
                    <source src="">
                </video>
                <div class="d-flex align-items-center" style="gap:0.5rem;">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <div>
                        <h3>Full Name</h3>
                        <span>3 days ago</span>
                    </div>
                </div>
            </div>
            <div class="flex-grow">
                <video controls poster="https://i.ytimg.com/vi/j3gRSxB5OVg/hq720.jpg?sqp=-oaymwEcCNAFEJQDSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLDJT1Oh9iriCOQz9L9oCkcead9_jA">
                    <source src="">
                </video>
                <div class="d-flex align-items-center" style="gap:0.5rem;">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <div>
                        <h3>Full Name</h3>
                        <span>3 days ago</span>
                    </div>
                </div>
            </div>
            <div class="flex-grow">
                <video controls poster="https://i.ytimg.com/vi/j3gRSxB5OVg/hq720.jpg?sqp=-oaymwEcCNAFEJQDSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLDJT1Oh9iriCOQz9L9oCkcead9_jA">
                    <source src="">
                </video>
                <div class="d-flex align-items-center" style="gap:0.5rem;">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <div>
                        <h3>Full Name</h3>
                        <span>3 days ago</span>
                    </div>
                </div>
            </div>
            <div class="flex-grow">
                <video controls poster="https://i.ytimg.com/vi/j3gRSxB5OVg/hq720.jpg?sqp=-oaymwEcCNAFEJQDSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLDJT1Oh9iriCOQz9L9oCkcead9_jA">
                    <source src="">
                </video>
                <div class="d-flex align-items-center" style="gap:0.5rem;">
                    <img src="https://asifzulfiqar.vercel.app/assets/images/asif.png" alt="img">
                    <div>
                        <h3>Full Name</h3>
                        <span>3 days ago</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('admininsertjavascript')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

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