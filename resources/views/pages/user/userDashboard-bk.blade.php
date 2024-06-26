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
            @if ($is_replied > 0 && !$is_got_award)
                <div class="reward-button-wrapper text-right">
                    <button id="reward-btn"><img src="{{ asset('assets/images/reward.png') }}" alt=""> Get
                        Reward</button>
                </div>
            @endif
            <div class="container-fluid spinner-wrapper" id="spinnerOuterContainer">
                <div class="container spinner-container">
                    <div class="zoom-view">
                        <img src="" alt="">
                    </div>
                    <div class="outer-wrapper outer-one">
                        <div class="all-images-wrapper div-one">
                            <div class="image-wrapper">
                                <div class="overlay-div">
                                    <img src="{{ asset('assets/images/question-mark.png') }}" alt="" />
                                </div>
                                <img class="spin-images" id="image-1" alt="" />
                            </div>
                            <div class="image-wrapper">
                                <div class="overlay-div">
                                    <img src="{{ asset('assets/images/question-mark.png') }}" alt="" />
                                </div>
                                <img class="spin-images" id="image-2" alt="" />
                            </div>
                            <div class="image-wrapper">
                                <div class="overlay-div">
                                    <img src="{{ asset('assets/images/question-mark.png') }}" alt="" />
                                </div>
                                <img class="spin-images" id="image-3" alt="" />
                            </div>
                            <div class="image-wrapper">
                                <div class="overlay-div">
                                    <img src="{{ asset('assets/images/question-mark.png') }}" alt="" />
                                </div>
                                <img class="spin-images" id="image-4" alt="" />
                            </div>
                            <div class="image-wrapper">
                                <div class="overlay-div">
                                    <img src="{{ asset('assets/images/question-mark.png') }}" alt="" />
                                </div>
                                <img class="spin-images" id="image-5" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="outer-wrapper outer-two">
                        <div class="all-images-wrapper div-two">
                            <div class="image-wrapper">
                                <div class="overlay-div">
                                    <img src="{{ asset('assets/images/question-mark.png') }}" alt="" />
                                </div>
                                <img class="spin-images" id="image-6" alt="" />
                            </div>
                            <div class="image-wrapper">
                                <div class="overlay-div">
                                    <img src="{{ asset('assets/images/question-mark.png') }}" alt="" />
                                </div>
                                <img class="spin-images" id="image-7" alt="" />
                            </div>
                            <div class="image-wrapper">
                                <div class="overlay-div">
                                    <img src="{{ asset('assets/images/question-mark.png') }}" alt="" />
                                </div>
                                <img class="spin-images" id="image-8" alt="" />
                            </div>
                            <div class="image-wrapper">
                                <div class="overlay-div">
                                    <img src="{{ asset('assets/images/question-mark.png') }}" alt="" />
                                </div>
                                <img class="spin-images" id="image-9" alt="" />
                            </div>
                            <div class="image-wrapper">
                                <div class="overlay-div">
                                    <img src="{{ asset('assets/images/question-mark.png') }}" alt="" />
                                </div>
                                <img class="spin-images" id="image-10" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="outer-wrapper outer-three">
                        <div class="all-images-wrapper div-three">
                            <div class="image-wrapper">
                                <div class="overlay-div">
                                    <img src="{{ asset('assets/images/question-mark.png') }}" alt="" />
                                </div>
                                <img class="spin-images" id="image-11" alt="" />
                            </div>
                            <div class="image-wrapper">
                                <div class="overlay-div">
                                    <img src="{{ asset('assets/images/question-mark.png') }}" alt="" />
                                </div>
                                <img class="spin-images" id="image-12" alt="" />
                            </div>
                            <div class="image-wrapper">
                                <div class="overlay-div">
                                    <img src="{{ asset('assets/images/question-mark.png') }}" alt="" />
                                </div>
                                <img class="spin-images" id="image-13" alt="" />
                            </div>
                            <div class="image-wrapper">
                                <div class="overlay-div">
                                    <img src="{{ asset('assets/images/question-mark.png') }}" alt="" />
                                </div>
                                <img class="spin-images" id="image-14" alt="" />
                            </div>
                            <div class="image-wrapper">
                                <div class="overlay-div">
                                    <img src="{{ asset('assets/images/question-mark.png') }}" alt="" />
                                </div>
                                <img class="spin-images" id="image-15" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="outer-wrapper outer-four">
                        <div class="all-images-wrapper div-four">
                            <div class="image-wrapper">
                                <div class="overlay-div">
                                    <img src="{{ asset('assets/images/question-mark.png') }}" alt="" />
                                </div>
                                <img class="spin-images" id="image-16" alt="" />
                            </div>
                            <div class="image-wrapper">
                                <div class="overlay-div">
                                    <img src="{{ asset('assets/images/question-mark.png') }}" alt="" />
                                </div>
                                <img class="spin-images" id="image-17" alt="" />
                            </div>
                            <div class="image-wrapper">
                                <div class="overlay-div">
                                    <img src="{{ asset('assets/images/question-mark.png') }}" alt="" />
                                </div>
                                <img class="spin-images" id="image-18" alt="" />
                            </div>
                            <div class="image-wrapper">
                                <div class="overlay-div">
                                    <img src="{{ asset('assets/images/question-mark.png') }}" alt="" />
                                </div>
                                <img class="spin-images" id="image-19" alt="" />
                            </div>
                            <div class="image-wrapper">
                                <div class="overlay-div">
                                    <img src="{{ asset('assets/images/question-mark.png') }}" alt="" />
                                </div>
                                <img class="spin-images" id="image-20" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="outer-wrapper outer-five">
                        <div class="all-images-wrapper div-five">
                            <div class="image-wrapper">
                                <div class="overlay-div">
                                    <img src="{{ asset('assets/images/question-mark.png') }}" alt="" />
                                </div>
                                <img class="spin-images" id="image-21" alt="" />
                            </div>
                            <div class="image-wrapper">
                                <div class="overlay-div">
                                    <img src="{{ asset('assets/images/question-mark.png') }}" alt="" />
                                </div>
                                <img class="spin-images" id="image-22" alt="" />
                            </div>
                            <div class="image-wrapper">
                                <div class="overlay-div">
                                    <img src="{{ asset('assets/images/question-mark.png') }}" alt="" />
                                </div>
                                <img class="spin-images" id="image-23" alt="" />
                            </div>
                            <div class="image-wrapper">
                                <div class="overlay-div">
                                    <img src="{{ asset('assets/images/question-mark.png') }}" alt="" />
                                </div>
                                <img class="spin-images" id="image-24" alt="" />
                            </div>
                            <div class="image-wrapper">
                                <div class="overlay-div">
                                    <img src="{{ asset('assets/images/question-mark.png') }}" alt="" />
                                </div>
                                <img class="spin-images" id="image-25" alt="" />
                            </div>
                        </div>
                    </div>
                    <button class="spin-btn">Win your prize</button>
                </div>
            </div>
            <div class="video-heading-wrapper">
                <h1 class="module-heading">Day {{ $day }} Video’s</h1>
            </div>
            @if (count($videos))
                <div class="video-card-container row">
                    @foreach ($videos as $video)
                        <div class="col-xl-4 col-sm-6 p-2">
                            <div class="video-card-wrapper">
                                <div class="video-card-img" data-url="{{ $video['video_path'] }}">
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
                                        <a class="video-replies-btn"
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
                            <img type="button" class="close" data-dismiss="modal" aria-label="Close"
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
                $("#videoLink").html(`
      <video controls autoplay="true">
          <source src="${$(this).attr("data-url")}" type="video/mp4">
      </video>`);
                $("#videoModal").modal("show");
            });
        });
    </script>
    <script>
        const imagesArryTwo = @json($awards);

        function handleSpin() {
            for (let i = 1; i <= imagesArryTwo.length; i++) {
                $(`#image-${i}`).attr("src", imagesArryTwo[i - 1]);
            }
        }
        handleSpin();

        function generateUniqueArray(length, min, max) {
            if (length > (max - min + 1)) {
                console.error("Cannot generate unique array with specified length and range.");
                return;
            }
            var uniqueArray = [];
            while (uniqueArray.length < length) {
                var randomNumber = Math.floor(Math.random() * (max - min + 1)) + min;
                if (uniqueArray.indexOf(randomNumber) === -1) {
                    uniqueArray.push(randomNumber);
                }
            }
            return uniqueArray;
        }


        $(".spin-btn").click(function() {
            $(this).prop("disabled", true);
            $(this).css("cursor", "no-drop");

            const arrayLength = 5;
            const totalIterations = 50;
            let currentIteration = 0;
            let currentIndex = 0;
            var arrayIndex = 0;
            var intervalId = setInterval(rotateArray, 100);
            setTimeout(function() {
                $(".spin-images").attr(
                    "src", "{{ asset('assets/images/dummy-black.jpg') }}"

                );
                clearInterval(intervalId);
                $(".overlay-div").click(function() {
                    $.ajax({

                        url: '{{ route('add-award') }}',
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            if (data.success) {
                                $(".spin-btn").css("cursor", "no-drop");
                                $('.spin-btn').prop("disabled", true);
                                $(this).addClass("hide-overlay-div");
                                $(this)
                                    .closest(".image-wrapper")
                                    .find(".spin-images")
                                    .css("filter", "blur(0px)");
                                $(".overlay-div").off("click");
                                var imgSrc = data.data.image_url;
                                $('.zoom-view').show();
                                $(".zoom-view img").attr("src", imgSrc);
                                run();
                                setTimeout(function() {
                                    window.location.reload();
                                }, 3000);
                            } else {
                                alert('Something went wrong.');
                            }
                        }
                    })
                });
            }, totalIterations * 100);


            function rotateArray() {
                var uniqueArray = generateUniqueArray(25, 0, 24);
                for (let i = 1; i <= imagesArryTwo.length; i++) {
                    $(`#image-${i}`).attr(
                        "src",
                        imagesArryTwo[uniqueArray[arrayIndex]]
                    );
                    arrayIndex++;
                    if (arrayIndex === 25) {
                        arrayIndex = 0;
                    }
                }
            }
        });


        const count = 300;
        var defaults;
        if (window.innerWidth > 992) {

            defaults = {
                origin: {
                    x: 0.6,
                    y: 0.7
                }
            };
        } else {
            defaults = {
                origin: {
                    x: 0.5,
                    y: 0.7
                }
            };
        }



        function fire(particleRatio, opts) {
            confetti(
                Object.assign({}, defaults, opts, {
                    particleCount: Math.floor(count * particleRatio)
                })
            );
        }

        const run = () => {
            fire(0.25, {
                spread: 26,
                startVelocity: 55
            });

            fire(0.2, {
                spread: 60
            });

            fire(0.35, {
                spread: 100,
                decay: 0.91,
                scalar: 0.8
            });

            fire(0.1, {
                spread: 120,
                startVelocity: 25,
                decay: 0.92,
                scalar: 1.2
            });

            fire(0.1, {
                spread: 120,
                startVelocity: 45
            });
        };
    </script>
@endsection
