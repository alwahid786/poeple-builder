<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

<script>
    $(document).ready(function() {
        $(document).on("click", ".sidebar-toggle-open", function() {
            $(".sidebar").addClass("open");
        });
        $(document).on("click", ".sidebar-toggle", function() {
            $(".sidebar").removeClass("open");
        });
        // $(document).on("click", ".menu-close", function() {
        //     $(".sidebar").removeClass("open");
        // });
        $(document).on("click", ".setting-collapse", function() {
            var dropdownContent = $(this).next(".setting-dropdown");
            dropdownContent.toggleClass('setting-dropdown-hide');
            // $(this).toggleClass('setting-collapse-radius');
        });
        // $(".setting-collapse, .setting-dropdown").on("mouseleave", function() {
        //     var dropdownContent = $(this).find(".setting-dropdown");
        //     dropdownContent.addClass('setting-dropdown-hide');
        //     $(".setting-collapse").removeClass('setting-collapse-radius');
        // });

    });

    // Delete data
    function delete_data(that) {
        event.preventDefault();

        swal({
                title: "Are you sure?",
                text: "But you will still not be able to retrieve this data.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    that.closest('form').submit();
                } else {
                    return false;
                }
            });
    }


    function showLoader() {
        $("button, input, textarea").prop("disabled", true);
        $("a").on("click", function(e) {
            e.preventDefault();
        });
        $('body').css('opacity', '0.3');
        $(".loader-image").removeClass('d-none');
    }

    function hideLoader() {
        $("button, input, textarea").prop("disabled", false);
        $("a").off("click");
        $('body').css('opacity', '1');
        $(".loader-image").addClass('d-none');
    }


    function ValidateField(form) {
        error = 0;
        $('#' + form + ' input:not(.exclude), #' + form + ' textarea:not(.exclude)').each(function() {
            if ($(this).attr('type') == 'file') {
                obj = $('.image-field');
            } else {
                obj = $(this);
            }
            if ($.trim($(this).val()) === "") {
                error++;
                obj.addClass('inputError');
            } else {
                obj.removeClass('inputError');
            }
        });
        // alert(error);
        if (error > 0) {
            swal({
                title: "System Error!",
                text: "Please fill all required fields.",
                icon: "error",
            });
            return false;
        }
        return true;
    }
    $(".allow_decimal").on("input", function(evt) {
        var self = $(this);
        self.val(self.val().replace(/[^0-9.]/g, ''));

        if (self.val().indexOf('.') !== self.val().lastIndexOf('.')) {
            // More than one dot, prevent input
            self.val(self.val().substring(0, self.val().lastIndexOf('.')));
        }

        if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) {
            evt.preventDefault();
        }
    });

    $(document).on("keyup", ".prizes_percentage", function() {
        var sum = 0;
        $('.prizes_percentage').each(function() {
            sum += parseFloat($(this).val()) || 0;
        });
        if (sum > 100) {
            $(this).val('');
            swal({
                title: "System Error!",
                text: "Total percentage should be less than or equal to 100.",
                icon: "error",
            });
        }
    });
    $(document).ready(function() {
        $(".textToCopy").click(function() {
            var textToCopy = $(this).text().trim();
            navigator.clipboard.writeText(textToCopy)
                .then(function() {
                    $(".text-copy h1").text("Text Copy");
                    $(".text-copy").show();
                })
                .catch(function(err) {
                    console.error('Unable to copy text', err);
                });
            setTimeout(function() {
                $(".text-copy").hide();
            }, 1500);
        });

    });
    $(document).on("click", ".video-size-menu li", function() {

        var selectedSize = $(this).text();
        $('.video-size-toggler').text(selectedSize);
        if (selectedSize === '9:16') {
            $('.custom-video-modal').css('max-width', '360px');
        } else if (selectedSize === '16:9') {
            $('.custom-video-modal').css('max-width', '1140px');
        }
        $('.video-size-menu').hide();
    })
    $(document).on("click", ".video-size-toggler", function() {
        var videoSizeWrapper = $(this).closest('.video-size-wrapper');
        var videoSizeMenu = videoSizeWrapper.find('.video-size-menu');
        videoSizeMenu.toggle();
    });
    $(document).on("click", function(event) {
        var videoSizeMenu = $('.video-size-menu');
        var videoSizeToggler = $('.video-size-toggler');
        if (!videoSizeMenu.is(event.target) && !videoSizeToggler.is(event.target) && videoSizeMenu
            .has(event.target).length === 0) {
            videoSizeMenu.hide();

        }
    });
</script>
