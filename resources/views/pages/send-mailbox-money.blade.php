<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/landing-page-two/css/style.css') }}" />
</head>

<body>


    <div class="container-fluid">
        <div class="container join-mail-container"> <!-- Vertically and horizontally center -->
            <div class="join-mail-inner"> <!-- Adjust column sizes as needed -->
                <a class="home-two-anchor" href="{{url('/home-two')}}">
                    <img src="{{ asset('assets/landing-page-two/images/back-arrow-mail.png') }}" alt="" />
                </a>
                <form action="{{ route('send.mailbox') }}" method="post">
                    @csrf
                    <p style="text-align: center">Congratulations!</p>
                    <div class="mb-3 join-mail-input">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 join-mail-input">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <small id="emailHelp" class="form-text text-muted">We'll send your Mailbox Money documents right away.</small>
                    <button type="submit" class="btn btn-primary join-mail-btn">Submit</button>
                </form>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{asset('assets/js/landingPageTwo.js')}}"></script>

    <script>
        $(document).ready(function() {
            $(this).scrollTop(0);
            $(window).scroll(function() {
                if ($(this).scrollTop() > 150) {
                    $('.navbar-wrapper').addClass('scrolled-navbar');
                } else {
                    $('.navbar-wrapper').removeClass('scrolled-navbar');
                }
            });

            $(".navbar-nav .nav-link").click(function() {
                $(".navbar-nav .nav-item").removeClass("active");
                $(this).closest(".nav-item").addClass("active");
            });

        });
    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            delay: 200,
        });
    </script>
</body>

</html>