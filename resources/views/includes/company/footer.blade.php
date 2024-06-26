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
        $(document).on("click", ".setting-collapse", function() {
            $(".setting-dropdown").toggleClass('setting-dropdown-hide');
        });

    });
</script>
<script>
    $(document).ready(function() {
        $(".textToCopy").click(function() {
            alert('');
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
</script>
