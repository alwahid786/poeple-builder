@extends('layouts.user.user-default')
@section('content')
    @include('includes.user.navbar')
    <section class="home-section pb-3">

        <div class="container-fluid">
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
            {{-- Temporary comment if condition, uncomment after testing}}
            {{-- @if ($is_show_reward) --}}
            <div class="reward-button-wrapper text-right">
                {{-- <a id="reward-btn" href="{{ url('/reward') }}?ft={{ base64_encode($free_hit_avaialble) }}" alt="">
                    Get
                    Reward
                </a> --}}
                {{-- <a id="reward-btn" href="{{ url('/user-video') }}" alt="">
                   Go to Reward!
                </a> --}}
            </div>
            {{-- @endif --}}
            <div class="video-heading-wrapper pt-3">
                <h1 class="module-heading">Watch Today’s Video (Day {{ $day }})</h1>
            </div>
            @if (count($videos))
                <div class="video-card-container row">
                    @foreach ($videos as $video)
                        <div class="col-xl-4 col-sm-6 p-2">
                            <div class="video-card-wrapper">
                                <div class="video-card-img" data-id="{{ $video['id'] }}"
                                    data-url="{{ $video['video_path'] }}">
                                    <img src="{{ $video['thumbnail'] ?? '' }}" alt="" />
                                </div>
                                <div class="video-card-desc">
                                    <div class="video-card-heading">
                                        <h1>{{ $video['name'] ?? '' }}</h1>
                                        <h2>{{ $video['daily_video_types'] ?? '' }}</h2>
                                    </div>
                                    <div class="video-card-detail">
                                        <p>
                                            {{ $video['description'] ?? '' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="video-card-action justify-content-end">
                                    @if ($video['is_replied'] == 0)
                                        <a class="video-replies-btn" id="video-replies-btn-{{ $video['id'] }}"
                                            @if (!$video['is_watched']) style="display: none" @endif
                                            href="{{ url('/user-reply', ['id' => $video['id']]) }}">Record Feedback
                                            <img src="{{ asset('assets/images/arrow-back-white.png') }}"
                                                alt="" /></a>
                                    @else
                                        <span class="badge badge-success">Reply Recorded</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="company-card no-record">
                    <h1>No Record Found!</h1>
                </div>
            @endif
        </div>
        <div class="modal" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel">
            <div class="modal-dialog modal-dialog-centered modal-xl custom-video-modal">
                <div class="modal-content video-modal-content">
                    <div class="modal-body video-modal-body p-0">
                        <div class="video-modal-close">
                            <img type="button" id="close-video" class="close" data-dismiss="modal" aria-label="Close"
                                src="{{ asset('assets/images/close-icon.png') }}" alt="">
                        </div>
                        <div class="video-wrapper">
                            <div id="videoLink">

                            </div>
                            <div class="video-size-wrapper">
                                <button class="video-size-toggler">16:9</button>
                                <ul class="video-size-menu">
                                    <li>9:16</li>
                                    <li>16:9</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- <div class="result-modal reward-modal" style="z-index: 100000;height: 240px;left: 40%">
        <div class="reward-inner-text" style="text-align: center">
            <h1 class="congrats-message">Now you can record your feed back</h1>
        </div>
        <h1 class="better-luck d-none text-center" style="width: 70%; font-size: 14px">Better luck for next time</h1>
    </div> --}}
        <div class="modal" id="watchedModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-xl ">
                <div class="result-modal reward-modal modal-content video-modal-content" style="height: 230px">
                    <div class="reward-inner-text" style="text-align: center">
                        <h1 class="congrats-message" style="margin-top: 30px">Now you can record your feed back</h1>

                        <div style="margin-top: 30px">
                            <a id="goToReward" href="#"><button class="btn btn-primary"><span
                                        class="reward-reveal">Okay</span></button></a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('admininsertjavascript')
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
