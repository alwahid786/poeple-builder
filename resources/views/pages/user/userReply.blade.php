@extends('layouts.user.user-default')
@section('content')
    @include('includes.user.navbar')
    <section class="home-section pb-3">
        <div class="container-fluid">
            <div class="video-play-container pb-3">
                <div class="video-play custom-video-modal video-wrapper">
                    <video controls>
                        <source src="{{ $video['video_path' ?? ''] }}" type="video/mp4">
                    </video>
                    <div class="video-size-wrapper">
                        <button class="video-size-toggler">16:9</button>
                        <ul class="video-size-menu">
                            <li>9:16</li>
                            <li>16:9</li>
                        </ul>
                    </div>
                </div>
                <div class="video-detail-wrapper">
                    <div class="video-detail-heading">
                        <div class="video-detail-name">
                            <h1>{{ $video['name'] ?? '' }} test</h1>
                            <p>{{ date('D j M Y', strtotime($video['created_at'])) ?? '' }}</p>
                        </div>
                    </div>
                    <div class="video-detail-description">
                        <p>
                            {{ $video['description' ?? ''] }}
                        </p>
                    </div>

                    <form id="recorded-video" method="POST" action="">
                        @csrf
                        <input type="hidden" name="thumbnail" id="thumbnail">
                    </form>
                </div>

            </div>
            <div class="col-12 px-0 ">
                <div class="user-record-video">
                    <a id="record-review">
                        <img src="{{ asset('assets/images/record-icon-2.png') }}" alt="">
                        Record your Review</a>
                </div>
            </div>

            <div class="video-container">
                <div class="col-12 record-heading px-0 ">
                    <h1>Record Your Video</h1>
                </div>
                <div class="video-record-wrapper">
                    <video id="record-video" autoplay></video>
                    <div class="record-icon-wrapper">
                        <div class="record-icon"></div>
                        <h1>REC</h1>
                    </div>
                    <div class="record-frame">
                        <div class="record-frame-top-left"></div>
                        <div class="record-frame-top-left-side"></div>
                        <div class="record-frame-top-right"></div>
                        <div class="record-frame-top-right-side"></div>
                        <div class="record-frame-bottom-left"></div>
                        <div class="record-frame-bottom-left-side"></div>
                        <div class="record-frame-bottom-right"></div>
                        <div class="record-frame-bottom-right-side"></div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button id="start-recording" class="start-recording">Start Recording</button>
                </div>
                <div class="controls">
                    <div class="controls-btn">
                        <button id="start" class="d-none">Start</button>
                        <button class="pause-btn">
                            <img id="pause" disabled src="{{ asset('assets/images/pause.png') }}" alt="" />
                        </button>
                        <button class="stop-btn">
                            <img id="stop" disabled src="{{ asset('assets/images/stop.png') }}" alt="" />
                        </button>
                    </div>

                    <div id="timer" class="timer">00:00</div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="videoconfirmupload" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content confirm-modal-content">
                <div class="modal-body confirm-modal-body text-center">
                    <svg width="98" height="98" viewBox="0 0 98 98" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M49.0001 0.666687C75.6946 0.666687 97.3334 22.3055 97.3334 49C97.3334 75.6945 75.6946 97.3334 49.0001 97.3334C22.3056 97.3334 0.666748 75.6945 0.666748 49C0.666748 22.3055 22.3056 0.666687 49.0001 0.666687ZM49.0001 68.3334C47.7182 68.3334 46.4888 68.8426 45.5824 69.749C44.676 70.6554 44.1667 71.8848 44.1667 73.1667C44.1667 74.4486 44.676 75.6779 45.5824 76.5844C46.4888 77.4908 47.7182 78 49.0001 78C50.282 78 51.5113 77.4908 52.4178 76.5844C53.3242 75.6779 53.8334 74.4486 53.8334 73.1667C53.8334 71.8848 53.3242 70.6554 52.4178 69.749C51.5113 68.8426 50.282 68.3334 49.0001 68.3334ZM49.0001 22.4167C44.3533 22.4167 39.8968 24.2626 36.611 27.5484C33.3252 30.8342 31.4792 35.2907 31.4792 39.9375C31.4792 41.2194 31.9885 42.4488 32.8949 43.3552C33.8013 44.2616 35.0307 44.7709 36.3126 44.7709C37.5945 44.7709 38.8238 44.2616 39.7303 43.3552C40.6367 42.4488 41.1459 41.2194 41.1459 39.9375C41.1475 38.5119 41.5371 37.1135 42.273 35.8924C43.0088 34.6714 44.0631 33.6736 45.3229 33.0061C46.5827 32.3387 48.0003 32.0267 49.4239 32.1036C50.8475 32.1805 52.2233 32.6435 53.4038 33.4428C54.5843 34.2422 55.5249 35.3478 56.1249 36.641C56.7249 37.9343 56.9615 39.3665 56.8094 40.784C56.6574 42.2015 56.1224 43.551 55.2618 44.6876C54.4012 45.8242 53.2474 46.7051 51.9242 47.2359C48.6569 48.5409 44.1667 51.8855 44.1667 57.4584V58.6667C44.1667 59.9486 44.676 61.1779 45.5824 62.0844C46.4888 62.9908 47.7182 63.5 49.0001 63.5C50.282 63.5 51.5113 62.9908 52.4178 62.0844C53.3242 61.1779 53.8334 59.9486 53.8334 58.6667C53.8334 57.4874 54.0751 56.8977 55.0949 56.395L55.5154 56.2017C59.2893 54.6835 62.4176 51.8998 64.364 48.3278C66.3103 44.7558 66.9535 40.618 66.1832 36.6237C65.4129 32.6295 63.2772 29.0275 60.1421 26.4355C57.007 23.8434 53.0679 22.4226 49.0001 22.4167Z"
                            fill="#6DACE4" />
                    </svg>
                    <h1>Are you want to sure to upload this video?</h1>
                    <div class="confirm-modal-body-btn">
                        <button id="yes">Yes</button>
                        <button id="no">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('admininsertjavascript')
    <script>
        $(document).ready(function() {
            $('#record-review').click(function() {
                $('.video-container').show();
                $("#start-recording").show();
                $('.video-play-container').hide();
                $(this).hide();

            })
        });
    </script>
    <script>
        $(document).ready(function() {
            const videoElement = document.getElementById("record-video");
            const startButton = document.getElementById("start-recording");
            const pauseButton = document.getElementById("pause");
            const stopButton = document.getElementById("stop");
            const timerDisplay = document.getElementById("timer");
            const yesButton = document.getElementById("yes");
            const noButton = document.getElementById("no");
            const recordReviewButton = document.getElementById("record-review");

            let mediaRecorder;
            let recordedChunks = [];
            let startTime;
            let timerInterval;
            let elapsedTimeBeforePause = 0;
            let isRecording = false;

            function startTimer() {
                startTime = new Date() - elapsedTimeBeforePause;
                timerInterval = setInterval(function() {
                    const currentTime = new Date();
                    const elapsedTime = new Date(currentTime - startTime);
                    const minutes = elapsedTime.getUTCMinutes();
                    const seconds = elapsedTime.getUTCSeconds();
                    timerDisplay.textContent = `${String(minutes).padStart(
              2,
              "0"
            )}:${String(seconds).padStart(2, "0")}`;
                }, 1000);
            }

            function resetTimer() {
                clearInterval(timerInterval);
                timerDisplay.textContent = "00:00";
                elapsedTimeBeforePause = 0;
            }

            function pauseTimer() {
                clearInterval(timerInterval);
                const currentTime = new Date();
                elapsedTimeBeforePause = currentTime - startTime;
            }

            function showPopup() {
                popup.style.display = "block";
            }

            function hidePopup() {
                popup.style.display = "none";
            }

            async function setupCamera() {
                const videoStream = await navigator.mediaDevices.getUserMedia({
                    video: true,
                });
                const audioStream = await navigator.mediaDevices.getUserMedia({
                    audio: true,
                });

                const combinedStream = new MediaStream();
                combinedStream.addTrack(videoStream.getVideoTracks()[0]);
                combinedStream.addTrack(audioStream.getAudioTracks()[0]);

                videoElement.srcObject = combinedStream;

                mediaRecorder = new MediaRecorder(combinedStream);

                mediaRecorder.ondataavailable = (event) => {
                    if (event.data.size > 0) {
                        recordedChunks.push(event.data);
                    }
                };

                mediaRecorder.onstart = () => {
                    startTimer();
                };

                mediaRecorder.onpause = () => {
                    pauseTimer();
                };

                mediaRecorder.onresume = () => {
                    startTimer();
                };

                mediaRecorder.onstop = () => {
                    pauseTimer();
                    resetTimer();
                    if (videoStream) {
                        const tracks = videoStream.getTracks();
                        tracks.forEach(track => track.stop());
                    }
                };
            }

            startButton.addEventListener("click", () => {
                if (!isRecording) {
                    mediaRecorder.start();
                    isRecording = true;
                    startButton.disabled = true;
                    pauseButton.disabled = false;
                    stopButton.disabled = false;
                    $(".record-icon-wrapper").addClass("visible-element");
                    $(".record-frame ").addClass("visible-element");
                    $(".pause-btn,.stop-btn,.timer ").addClass("visible-element");
                    $("#start").hide();
                    $("#start-recording").hide();
                    pauseButton.src = "{{ asset('assets/images/pause.png') }}";

                    // THumbnail

                    const canvas = document.createElement('canvas');
                    const context = canvas.getContext('2d');

                    canvas.width = videoElement.videoWidth;
                    canvas.height = videoElement.videoHeight;

                    context.drawImage(videoElement,

                        0, 0, canvas.width, canvas.height);

                    const imageDataUrl = canvas.toDataURL('image/png');

                    // Now you can use the imageDataUrl as needed (e.g., set it as the source for an <img> element)
                    $("#thumbnail").val(imageDataUrl);

                    // Clean up resources
                    URL.revokeObjectURL(imageDataUrl);
                }
            });

            pauseButton.addEventListener("click", () => {
                if (mediaRecorder.state === "recording") {
                    mediaRecorder.pause();
                    $(".record-icon-wrapper").removeClass("visible-element");
                    $(".record-frame ").removeClass("visible-element");
                    isRecording = false;
                    pauseButton.src = "{{ asset('assets/images/play.png') }}";
                } else if (mediaRecorder.state === "paused") {
                    mediaRecorder.resume();
                    isRecording = true;
                    pauseButton.src = "{{ asset('assets/images/pause.png') }}";
                    $(".record-icon-wrapper").addClass("visible-element");
                    $(".record-frame ").addClass("visible-element");
                }
            });

            stopButton.addEventListener("click", () => {
                mediaRecorder.stop();
                startButton.disabled = false;
                pauseButton.disabled = true;
                stopButton.disabled = true;
                isRecording = false;
                $("#videoconfirmupload").modal("show");
                $(".record-icon-wrapper").removeClass("visible-element");
                $(".record-frame ").removeClass("visible-element");
                $(".pause-btn,.stop-btn,.timer ").removeClass("visible-element");
                $("#start").show();
            });

            yesButton.addEventListener("click", () => {

                $("#videoconfirmupload").modal("hide");
                const blob = new Blob(recordedChunks, {
                    type: "video/webm"
                });

                var formData = new FormData($("#recorded-video")[0]);

                formData.append('video', blob, 'filename.webm');
                // formData.append('thumbnail', getThumbnail());
                formData.append('video_id', '{{ $video['id'] }}');
                showLoader();
                $.ajax({
                    type: "POST",
                    url: "{{ route('recorded-video') }}",
                    data: formData,
                    processData: false, // Prevent jQuery from automatically processing the data
                    contentType: false,
                    success: function(success) {
                        hideLoader();
                        if (success.success) {
                            swal({
                                    title: "Reply Added",
                                    text: success.message,
                                    icon: "success",
                                })
                                .then(function() {
                                    location.href = '{{ url('user-dashboard') }}';
                                });
                        } else {
                            swal({
                                title: "Reply Not Added",
                                text: success.message,
                                icon: "error",
                            });
                        }
                    },
                    error: function(error) {
                        hideLoader();
                        swal({
                            title: "System Error",
                            text: 'Something when wrong. Please try again later',
                            icon: "error",
                        });
                    }
                });
            });

            noButton.addEventListener("click", () => {
                $("#videoconfirmupload").modal("hide");
                $('.video-container').hide();
                $('.video-play-container').show();
                $('#record-review').show();
            });

            recordReviewButton.addEventListener("click", () => {
                setupCamera();
            });

            // function getThumbnail(blob) {

            //     const videoElement = document.createElement('video');
            //     const url = URL.createObjectURL(blob);

            //     videoElement.src = url;

            //     videoElement.addEventListener('loadeddata', () => {
            //         // Set the canvas size to match the video size
            //         const canvas = document.createElement('canvas');
            //         canvas.width = videoElement.videoWidth;
            //         canvas.height = videoElement.videoHeight;

            //         // Draw the first frame of the video onto the canvas
            //         const context = canvas.getContext('2d');
            //         context.drawImage(videoElement, 0, 0, canvas.width, canvas.height);

            //         // Convert the canvas content to a data URL representing the image
            //         const thumbnailDataUrl = canvas.toDataURL('image/png');

            //         // Now you can use the thumbnailDataUrl as needed (e.g., set it as the source for an <img> element)
            //         console.log(thumbnailDataUrl);

            //         // Clean up resources
            //         URL.revokeObjectURL(url);

            //         return thumbnailDataUrl;
            //     });
            // }
        });
    </script>
@endsection
