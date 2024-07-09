@extends('layouts.user.user-default')
@section('content')
@include('includes.user.navbar')
<section class="home-section pb-3">
<style>
    .no-reward-modal{
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        padding: 3rem 1rem;
    text-align: center;
    color: red;
    background: #f8f9fd;
    height: unset !important;
    }
    .no-reward-modal img{
        width: 50px !important;
    }
</style>

    <div id="stage" class="perspective-on">
        <div class="result-modal no-reward-modal d-none">
            <img src="{{asset('assets/images/rewards/cross.png')}}" alt="" />
            <h1>Sorry, Play Again Tomorrow!</h1>
        </div>
        <div class="result-modal reward-modal d-none">
            <img src="{{asset('assets/images/rewards/1.jpg')}}" alt="" />
            <div class="reward-inner-text">
                <h1 class="congrats-message d-none">Congratulation</h1>
                {{-- <p>You win</p> --}}
            </div>
            <button class="claim-reward-btn"><span class="reward-reveal">Claim your reward</span></button>
            <h1 class="better-luck d-none text-center" style="width: 70%; font-size: 14px">Better luck for next time</h1>
        </div>
        <div id="rotate">
            <div id="ring1" class="ring"></div>
            <div id="ring2" class="ring"></div>
            <div id="ring3" class="ring"></div>
            <div id="ring4" class="ring"></div>
            <div id="ring5" class="ring"></div>
        </div>
        <div class="spin-btn-wrapper">
            <button class="go spin-btn">Play Now</button>
            <audio id="spin-sound">
                <source src="{{asset("assets/audio/spinner-sound.mp3")}}" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
            <audio id="winner-sound">
                <source src="{{asset("assets/audio/winner-sound.mp3")}}" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
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
    var imageSrcArray = @json($awards);
    var screenWidth, screenHeight;
    var spinCount = 0;
    var userPrice = 0;
    var midDivDimension = {
        heightlower: 0,
        heightupper: 0,
        widthlower: 0,
        widthupper: 0,
    }
    var REEL_RADIUS;
    measureScreenSize();
    const SLOTS_PER_REEL = 12;
    if (screenWidth > 1199) {
        REEL_RADIUS = 240;
        midDivDimension.widthlower = 184;
        midDivDimension.widthupper = 186;
        midDivDimension.heightlower = 170;
        midDivDimension.heightupper = 171;
    }
    if (screenWidth <= 1199 && screenWidth > 768) {
        REEL_RADIUS = 180;
        midDivDimension.widthlower = 131;
        midDivDimension.widthupper = 133;
        midDivDimension.heightlower = 119;
        midDivDimension.heightupper = 120;
    }

    if (screenWidth <= 767 && screenWidth > 576) {
        REEL_RADIUS = 130;
        midDivDimension.widthlower = 91;
        midDivDimension.widthupper = 93;
        midDivDimension.heightlower = 80;
        midDivDimension.heightupper = 81;
    }
    if (screenWidth <= 576 && screenWidth > 420) {
        REEL_RADIUS = 92;
        midDivDimension.widthlower = 66;
        midDivDimension.widthupper = 67;
        midDivDimension.heightlower = 55;
        midDivDimension.heightupper = 56;
    }
    if (screenWidth <= 420) {
        REEL_RADIUS = 80;
        midDivDimension.widthlower = 58;
        midDivDimension.widthupper = 59;
        midDivDimension.heightlower = 47;
        midDivDimension.heightupper = 48;
    }

    function createSlots(ring) {
        var slotAngle = 360 / SLOTS_PER_REEL;
        var seed = getSeed();
        shuffleArray(imageSrcArray);
        for (var i = 1; i <= SLOTS_PER_REEL; i++) {
            var slot = document.createElement("div");
            slot.className = "slot";
            var transform =
                "rotateX(" +
                slotAngle * i +
                "deg) translateZ(" +
                REEL_RADIUS +
                "px)";
            slot.style.transform = transform;
            var content = $(slot).append(
                `<img class="spinner-img" src='${imageSrcArray[i % 5]}' />`
            );
            ring.append(slot);
        }
    }

    function getSeed() {
        return Math.floor(Math.random() * 4) + 1;
    }

    function spin(timer) {
        for (var i = 1; i < 6; i++) {
            var oldSeed = -1;
            var oldClass = $("#ring" + i).attr("class");
            if (oldClass.length > 4) {
                oldSeed = parseInt(oldClass.slice(10));
            }
            var seed = getSeed();
            while (oldSeed == seed) {
                seed = getSeed();
            }
            $("#ring" + i)
                .css(
                    "animation",
                    "back-spin 1s, spin-" + seed + " " + (timer + i * 0.5) + "s"
                )
                .attr("class", "ring spin-" + seed);
        }
        setTimeout(function() {
            const midPictures = [];
            const midDiv = [];
            document.querySelectorAll(".slot").forEach(function(element, index) {
                const rect = element.getBoundingClientRect();
                const slotWidth = rect.width;
                const slotHeight = rect.height;
                if (
                    slotWidth > midDivDimension.widthlower &&
                    slotWidth < midDivDimension.widthupper &&
                    slotHeight > midDivDimension.heightlower &&
                    slotHeight < midDivDimension.heightupper
                ) {

                    midPictures.push($(element).find("img").attr("src"));
                    midDiv.push($(element));
                }
            });
            const duplicateElements = findDuplicates(midPictures);
            if (duplicateElements.length !== 0) {

                const duplicateElement = duplicateElements[0];
                var company_logo = @json(auth()->user()->company_logo);
                if(duplicateElement==company_logo){
                var awardType = 'grand_prize';
                }else{
                var awardType = duplicateElement.split("/").slice(-1)[0].split(".")[0];
                }
                updateUserAward(awardType);
                const unmatchedElementsWithIndexes = midPictures
                    .map((element, index) => ({
                        element,
                        index
                    }))
                    .filter(({
                        element
                    }) => element !== duplicateElement);
                for (let i = 0; i < unmatchedElementsWithIndexes.length; i++) {
                    const imageIndex = unmatchedElementsWithIndexes[i].index;
                    const imageName = unmatchedElementsWithIndexes[i].element;
                    $(`#ring${imageIndex + 1} .spinner-img`).each(function() {
                        if ($(this).attr("src") === imageName) {
                            $(this).attr("src", duplicateElement);

                        } else if ($(this).attr("src") === duplicateElement) {
                            $(this).attr("src", imageName);

                        }
                    });
                }
                midDiv
                    .map((element, index) => ({
                        element,
                        index
                    }))
                    .forEach(({
                        element,
                        index
                    }) => {
                        const imgElement = $('<lottie-player class="cross-image" src ="{{asset("assets/js/success-anim.json")}}" background="transparent" speed ="1" loop autoplay> </lottie-player>')

                        // const imgElement = $("<img>")
                        //     .addClass("cross-image")
                        //     .attr("src", "{{asset('assets/images/rewards/tick.png')}}");
                        $(element).append(imgElement);
                    });


                setTimeout(function() {
                    $(".no-reward-modal").addClass("d-none");
                    $(".reward-modal").removeClass("d-none");
                    $(".reward-modal img").attr("src", duplicateElements[0]);
                    // $(".cross-image").remove();
                    $("lottie-player").remove();

                    $(".claim-reward-btn").click(function() {

                        $(this).find(".reward-reveal").html("$" + userPrice)
                        $(this).find(".reward-reveal").addClass("reward-reveal-style")
                        if (userPrice == 0) {
                            $('.better-luck').removeClass('d-none');
                        } else {
                            $('.congrats-message').removeClass('d-none');
                        }

                        var spinSound = document.getElementById('winner-sound');
                        spinSound.play();
                        run();
                        setTimeout(function() {
                            window.location.href = "{{url('user-video')}}";
                        }, 6000)
                    })
                    run();
                }, 4000);

            } else {
                const unmatchedElementsWithIndexes = midDiv
                    .map((element, index) => ({
                        element,
                        index
                    }))
                    .forEach(({
                        element,
                        index
                    }) => {
                        const imgElement = $('<lottie-player class="cross-image" src = "{{asset("assets/js/bouncing-anim.json")}}" background="transparent" speed ="1" loop autoplay> </lottie-player>')
                        // const imgElement = $("<img>")
                        //     .addClass("cross-image")
                        //     .attr("src", "{{asset('assets/images/rewards/cross.png')}}");
                        $(element).append(imgElement);
                    });
                setTimeout(function() {
                    $(".no-reward-modal").removeClass("d-none");
                    $(".reward-modal").addClass("d-none");
                    $("lottie-player").remove();

                }, 3000);
                setTimeout(function() {
                    window.location.href = "{{url('user-video')}}";
                }, 4000);
            }
        }, 5000);
    }
    const findDuplicates = (arr) => {
        const counts = {};
        const duplicates = [];
        for (const element of arr) {
            counts[element] = (counts[element] || 0) + 1;
            // Temporary set 2, set 4 after testing
            if (counts[element] === 2) {
                duplicates.push(element);
            }
        }
        return duplicates;
    };

    function shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
    }

    function measureScreenSize() {
        screenWidth = $(window).width();
        screenHeight = $(window).height();

    }

    $(document).click(function(e) {
        var targetElement = $('.result-modal');
        if (!targetElement.is(event.target) && !targetElement.has(event.target).length) {
            $(".result-modal").addClass("d-none");
        }
    });
    $(window).resize(function() {
        measureScreenSize();
    });
    $(document).ready(function() {
        $(".reward-reveal").removeClass("reward-reveal-style")
        createSlots($("#ring1"));
        createSlots($("#ring2"));
        createSlots($("#ring3"));
        createSlots($("#ring4"));
        createSlots($("#ring5"));
        $(".go").on("click", function() {

            var spinSound = document.getElementById('spin-sound');
            spinSound.play();
            $(this).css('visibility', 'hidden');
            $(".cross-image").remove();
            $(this).prop("disabled", true);
            // $(this).hide();
            $(this).css("cursor", "no-drop");
            var timer = 2;

            setTimeout(function() {
            spin(timer);
                        }, 1500)

            // update user spin

            // $.ajax({
            //     url: "{{ url('add-award') }}",
            //     type: 'GET',
            // data: {
            //     free_hit_avaialble: @json($free_hit_avaialble),
            // },
            //     dataType: 'json',
            //     success: function(data) {

            //     },
            //     error: function(data) {
            //         console.log('error');
            //     }

            // })
        });
    });

    function updateUserAward(awardType) {
        $.ajax({
            url: "{{ url('add-award') }}",
            type: 'GET',
            data: {
                awardType: awardType,
                free_hit_avaialble: @json($free_hit_avaialble),
                video_id:'{{request()->video_id}}'
            },
            dataType: 'json',
            success: function(data) {
                userPrice = data?.data

                console.log('function', data?.data)
                // return priceVal;
                // $(".reward-reveal").html(data?.data)
            },
            error: function(data) {
                console.log('error');
            }

        })


    }


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
