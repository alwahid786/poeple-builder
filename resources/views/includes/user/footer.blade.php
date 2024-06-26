<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script>
    $(document).ready(function() {
        $(document).on("click", ".sidebar-toggle", function() {
            $(".sidebar").toggleClass("open");
        });
        $(document).on("click", ".dropdown-icon", function() {
            $(".setting-dropdown").toggleClass('setting-dropdown-hide');
        });
    });
</script>
