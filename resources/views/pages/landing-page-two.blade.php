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
    <div class="navbar-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light px-lg-5">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/landing-page-two/images/logo.png') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#home">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#feature">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>


                </ul>
                {{-- <form class="form-inline my-2 my-lg-0">
                    <button class="btn my-2 my-sm-0 navbar-btn" type="submit">
                        Get Started
                    </button>
                </form> --}}
            </div>
        </nav>
    </div>
    <div class="container-fluid banner-section pb-2" id="home">
        <div class="container">
            <div class="banner-content">
                <div class="banner-content-left">
                    <div class="common-heading banner-common-heading">
                        <h2><span>Introduc</span>ing Don's Mailbox Money</h2>
                        <h1>
                            Help your clients deliver better customer service and you make mailbox money…forever!
                        </h1>
                    </div>
                    <div class="common-para mt-3">
                        <p>
                            Are you ready to help your clients dominate their competition by delivering the best
                            customer experiences in their industry? Don Williams literally wrote the book on exceptional
                            service – Romancing Your Customer. You can share Don’s 1 Minute Trainer where a client’s
                            staff learns how to deliver the best experiences anywhere and you earn Mailbox Money.
                        </p>
                    </div>
                    <div class="common-btn mt-3">
                        <a href="javascript::0">
                            <button  onclick="joinMailBoxMoney()">Get Mailbox Money</button>
                        </a>

                    </div>
                </div>
                <div class="banner-content-right px-4">
                    <img src="{{ asset('assets/landing-page-two/images/banner-img.svg') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-5 pb-2" data-aos="fade-down">
        <div class="video-banner-section ">
            <video class="banner-video" id="video-element">
                <source src="https://firebasestorage.googleapis.com/v0/b/people-builder-8bd66.appspot.com/o/landing_pages_videos%2Fvideo.mp4?alt=media" type="video/mp4" />
            </video>
            <div class="banner-video-play" id="video-play-btn">
                <img src="{{ asset('assets/landing-page/images/play-icon.png') }}" alt="" />
            </div>
        </div>
    </div>
    <div class="container py-5 my-4" id="feature">
        <div class="common-heading text-center">
            <h2><span>How it Wo</span>rks</h2>
            <h1>A Simple Recipe for Success</h1>
        </div>
        <div class="row mt-5">
            <div class="col-md-6 col-lg-4 mt-4 custom-card-wrapper">
                <div class="custom-card">
                    <div class="custom-card-content">
                        <div class="custom-card-header text-center">
                            <svg width="90" height="90" viewBox="0 0 101 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="path-bg" d="M100.603 88.8994C100.603 91.8463 99.4335 94.6724 97.3511 96.7562C95.2687 98.8399 92.4444 100.011 89.4994 100.011H11.2018C8.40774 100.011 5.7281 98.8999 3.75237 96.9229C1.77663 94.9459 0.666656 92.2646 0.666656 89.4687V10.5419C0.666656 7.74598 1.77663 5.06462 3.75237 3.08764C5.7281 1.11066 8.40774 0 11.2018 0H90.0682C92.8624 0 95.5421 1.11066 97.5178 3.08764C99.4935 5.06462 100.603 7.74598 100.603 10.5419V88.8994Z" fill="#2257BF" />
                                <path style="mix-blend-mode: multiply" opacity="0.5" d="M17.8495 77.9886L39.4046 99.7259L89.4677 99.9578C90.9291 99.9634 92.3772 99.6805 93.7292 99.1254C95.0812 98.5703 96.3105 97.7538 97.3468 96.7227C98.3831 95.6917 99.206 94.4663 99.7684 93.1166C100.331 91.7669 100.622 90.3195 100.625 88.8572V54.3537L76.3936 30.3921L71.874 28.3576L60.6856 16.4136L50.6245 19.1861V28.3576L21.2103 52.6987L28.6481 60.3521L17.8495 77.9886Z" fill="url(#paint0_linear_46_333)" />
                                <path d="M59.9376 60.3521H56.7455V88.6359H59.9376V60.3521Z" fill="#828282" />
                                <path d="M77.9422 34.4192V60.3521H43.1129L32.6831 56.3146V33.4177C32.6831 32.0775 33.2144 30.792 34.1605 29.8434C35.1066 28.8947 36.3901 28.3604 37.7294 28.3576H71.8845C72.68 28.3576 73.4677 28.5144 74.2027 28.819C74.9377 29.1236 75.6055 29.5701 76.168 30.133C76.7305 30.6959 77.1767 31.3641 77.4811 32.0995C77.7856 32.8349 77.9422 33.6232 77.9422 34.4192Z" fill="#D1D3D4" />
                                <path d="M43.0287 37.7082H77.9422V34.4297C77.9436 34.0765 77.9155 33.7239 77.858 33.3755H43.0287V37.7082Z" fill="#E6E7E8" />
                                <path d="M77.858 33.4177C77.6713 32.3255 77.1905 31.305 76.4673 30.4659H33.6523C33.0213 31.3204 32.6816 32.3552 32.6831 33.4177H77.858Z" fill="white" />
                                <path d="M43.1129 34.4192V60.3521L32.6831 56.3146V33.4177C32.6847 32.1188 33.1874 30.8707 34.0864 29.9338C34.9854 28.9969 36.2113 28.4436 37.5082 28.3892C39.0305 28.501 40.4543 29.1846 41.4938 30.303C42.5333 31.4214 43.1117 32.8918 43.1129 34.4192Z" fill="#BCBEC0" />
                                <path d="M50.7088 34.4192V60.3521H49.6553V34.4192C49.6553 31.362 47.169 28.3576 44.1032 28.3576H46.6317C47.834 28.8515 48.863 29.691 49.5887 30.7699C50.3143 31.8488 50.7041 33.1187 50.7088 34.4192Z" fill="#BCBEC0" />
                                <path d="M52.2891 38.6359C52.2891 39.2197 52.1161 39.7903 51.792 40.2757C51.4679 40.7611 51.0071 41.1395 50.4681 41.3629C49.9291 41.5863 49.336 41.6448 48.7638 41.5309C48.1916 41.417 47.6659 41.1358 47.2534 40.723C46.8408 40.3102 46.5599 39.7843 46.4461 39.2117C46.3323 38.6391 46.3907 38.0456 46.614 37.5063C46.8372 36.9669 47.2153 36.5059 47.7004 36.1816C48.1855 35.8573 48.7558 35.6841 49.3393 35.6841C50.1208 35.6869 50.8695 35.9988 51.4221 36.5518C51.9747 37.1047 52.2863 37.8539 52.2891 38.6359Z" fill="#939598" />
                                <path d="M50.7088 38.6359C50.7088 38.9154 50.5978 39.1836 50.4002 39.3813C50.2026 39.579 49.9347 39.69 49.6553 39.69H49.0232C48.7438 39.69 48.4758 39.579 48.2782 39.3813C48.0806 39.1836 47.9697 38.9154 47.9697 38.6359V16.4136H50.7088V38.6359Z" fill="#D3321E" />
                                <path d="M60.7067 16.4136H48.0223V23.6559H60.7067V16.4136Z" fill="#D3321E" />
                                <path d="M18.4184 78.6317C20.3569 80.2235 24.0653 79.8018 25.9722 77.8937L43.1129 60.3521L32.6831 56.3146L18.724 70.3985C16.4695 72.6544 15.6371 75.8486 18.4184 78.6317Z" fill="#D1D3D4" />
                                <path d="M33.6945 55.6188V33.4177C33.6956 32.3888 34.0903 31.3993 34.7976 30.6524C35.5048 29.9055 36.471 29.4578 37.4977 29.4012C38.7516 29.5141 39.9184 30.0909 40.7698 31.0189C41.6213 31.947 42.0962 33.1594 42.1016 34.4192V58.8763L33.6945 55.6188Z" fill="#939598" />
                                <path d="M42.1121 37.3814V57.3477L31.6717 55.0284L21.2524 52.6882L25.4981 33.6707L31.6717 35.0516L42.1121 37.3814Z" fill="#E6E7E8" />
                                <path d="M42.1121 42.7999H34.0316V57.3477H42.1121V42.7999Z" fill="#F1F2F2" />
                                <path d="M72.3903 34.4192V60.3521H71.3367V34.4192C71.3367 31.362 68.8504 28.3576 65.7847 28.3576H68.3026C69.5077 28.8487 70.5397 29.6872 71.2675 30.7665C71.9953 31.8458 72.3861 33.1172 72.3903 34.4192Z" fill="#BCBEC0" />
                                <defs>
                                    <linearGradient id="paint0_linear_46_333" x1="17.8495" y1="58.1804" x2="100.667" y2="58.1804" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#A0A0A0" />
                                        <stop offset="1" stop-color="#C8C8C8" />
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <div class="custom-card-body mt-3">
                            <div class="common-para">
                                <p>Join Mailbox Money</p>
                                <p>
                                    When you join Mailbox Money, you become part of an elite
                                    community of trailblazers.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mt-4 custom-card-wrapper">
                <div class="custom-card">
                    <div class="custom-card-content">
                        <div class="custom-card-header text-center">
                            <svg width="90" height="90" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_78_134)">
                                    <path class="path-bg" d="M99.9895 88.8994C99.9895 91.8463
                      98.8189 94.6724 96.7354 96.7562C94.6519 98.8399 91.826
                      100.011 88.8795 100.011H10.5407C7.74516 100.011 5.06408
                      98.8999 3.08731 96.9229C1.11054 94.9459 0 92.2646 0
                      89.4687V10.5419C0 7.74598 1.11054 5.06462 3.08731
                      3.08764C5.06408 1.11066 7.74516 0 10.5407 0H89.4487C92.2443
                      0 94.9254 1.11066 96.9021 3.08764C98.8789 5.06462 99.9895
                      7.74598 99.9895 10.5419V88.8994Z" fill="#2257BF" />
                                    <path style="mix-blend-mode: multiply" opacity="0.5" d="M14.7043 71.3894L42.9746 99.7048L88.8268 99.9473C90.2906 99.9556 91.7416 99.6743 93.0963 99.1195C94.4509 98.5647 95.6824 97.7475 96.7199 96.7147C97.7575 95.682 98.5805 94.4542 99.1416 93.1021C99.7027 91.7499 99.9909 90.3001 99.9895 88.8362V46.2998L84.9584 31.5412L14.7043 71.3894Z" fill="url(#paint0_linear_78_134)" />
                                    <path d="M82.9766 30.8349H17.0232C15.2942 30.8349 13.8926 32.2367 13.8926 33.9658V69.2916C13.8926 71.0207 15.2942 72.4225 17.0232 72.4225H82.9766C84.7056 72.4225 86.1072 71.0207 86.1072 69.2916V33.9658C86.1072 32.2367 84.7056 30.8349 82.9766 30.8349Z" fill="white" />
                                    <path class="path-icon" d="M82.9767 32.9222H17.0128C16.4364 32.9222 15.9692 33.3894 15.9692 33.9658V69.2916C15.9692 69.868 16.4364 70.3352 17.0128 70.3352H82.9767C83.553 70.3352 84.0202 69.868 84.0202 69.2916V33.9658C84.0202 33.3894 83.553 32.9222 82.9767 32.9222Z" fill="white" />
                                    <path d="M82.5656 34.4824H73.7852V46.8269H82.5656V34.4824Z" fill="#FFEB3C" />
                                    <path d="M81.1743 53.2785H53.8843V54.8387H81.1743V53.2785Z" fill="#E6E7E8" />
                                    <path d="M81.1743 57.0841H53.8843V58.6443H81.1743V57.0841Z" fill="#E6E7E8" />
                                    <path d="M81.1743 60.8897H53.8843V62.4499H81.1743V60.8897Z" fill="#E6E7E8" />
                                    <path d="M81.1743 64.7059H53.8843V66.2661H81.1743V64.7059Z" fill="#E6E7E8" />
                                    <path d="M46.1369 37.1073H18.8469V38.6675H46.1369V37.1073Z" fill="#E6E7E8" />
                                    <path d="M46.1369 40.9235H18.8469V42.4837H46.1369V40.9235Z" fill="#E6E7E8" />
                                    <path d="M46.1369 44.7291H18.8469V46.2893H46.1369V44.7291Z" fill="#E6E7E8" />
                                    <path d="M46.1369 48.5347H18.8469V50.0949H46.1369V48.5347Z" fill="#E6E7E8" />
                                    <path d="M81.1743 53.2785H53.8843V54.8387H81.1743V53.2785Z" fill="#E6E7E8" />
                                    <path d="M81.1743 57.0841H53.8843V58.6443H81.1743V57.0841Z" fill="#E6E7E8" />
                                    <path d="M81.1743 60.8897H53.8843V62.4499H81.1743V60.8897Z" fill="#E6E7E8" />
                                    <path d="M81.1743 64.7059H53.8843V66.2661H81.1743V64.7059Z" fill="#E6E7E8" />
                                </g>
                                <defs>
                                    <linearGradient id="paint0_linear_78_134" x1="14.7043" y1="65.76" x2="99.9895" y2="65.76" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#DFDFDF" />
                                        <stop offset="1" stop-color="#DCDCDC" />
                                    </linearGradient>
                                    <clipPath id="clip0_78_134">
                                        <rect width="100" height="100" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <div class="custom-card-body mt-3">
                            <div class="common-para">
                                <p>Spread the Magic</p>
                                <p>
                                    Armed with the 1 Minute Trainer, it's time to sprinkle a
                                    little customer service magic everywhere you go.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mt-4 custom-card-wrapper">
                <div class="custom-card">
                    <div class="custom-card-content">
                        <div class="custom-card-header text-center">
                            <svg width="90" height="90" viewBox="0 0 101 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="path-bg" d="M100.344 88.8889C100.344 90.3489 100.056 91.7946 99.4972 93.1434C98.9382 94.4921 98.1188 95.7175 97.0859 96.7494C96.053 97.7813 94.8269 98.5995 93.4776 99.1573C92.1283 99.715 90.6824 100.001 89.2223 100H10.8753C8.07941 100 5.39805 98.8893 3.42107 96.9124C1.44409 94.9354 0.333435 92.254 0.333435 89.4582V10.5419C0.333435 7.74598 1.44409 5.06463 3.42107 3.08764C5.39805 1.11066 8.07941 0 10.8753 0H89.8021C92.598 0 95.2794 1.11066 97.2563 3.08764C99.2333 5.06463 100.344 7.74598 100.344 10.5419V88.8889Z" fill="#2257BF" />
                                <path style="mix-blend-mode: multiply" opacity="0.5" d="M18.107 76.1965L41.9105 100H89.2223C90.6819 100.001 92.1273 99.7149 93.476 99.1571C94.8247 98.5992 96.0501 97.7808 97.0822 96.7487C98.1142 95.7167 98.9326 94.4913 99.4905 93.1426C100.048 91.7939 100.335 90.3484 100.333 88.8889V43.6644L82.1488 25.7432L18.107 76.1965Z" fill="url(#paint0_linear_46_408)" />
                                <path d="M83.6668 29.4856V72.8969C83.664 74.3527 83.0845 75.7481 82.0551 76.7775C81.0257 77.8069 79.6303 78.3865 78.1745 78.3892H22.4924C21.0366 78.3865 19.6413 77.8069 18.6119 76.7775C17.5825 75.7481 17.0029 74.3527 17.0001 72.8969V29.4856C17.0057 28.0306 17.5861 26.6369 18.6149 25.6081C19.6437 24.5793 21.0375 23.9988 22.4924 23.9933H78.1745C79.6294 23.9988 81.0232 24.5793 82.052 25.6081C83.0808 26.6369 83.6612 28.0306 83.6668 29.4856Z" fill="#70C3FF" />
                                <path d="M78.1639 26.1965H22.4924C20.6701 26.1965 19.1928 27.6738 19.1928 29.4961V72.8969C19.1928 74.7192 20.6701 76.1965 22.4924 76.1965H78.1639C79.9862 76.1965 81.4635 74.7192 81.4635 72.8969V29.4961C81.4635 27.6738 79.9862 26.1965 78.1639 26.1965Z" fill="white" />
                                <path d="M83.6668 36.4115V45.3932L62.2773 23.9932H71.2695L83.6668 36.4115Z" fill="#70C3FF" />
                                <path d="M44.314 23.9932L83.6457 63.3249V49.3147L58.3241 23.9932H44.314Z" fill="#70C3FF" />
                                <path d="M83.6668 40.8391H17.0001V41.9355H83.6668V40.8391Z" fill="#70C3FF" />
                                <path d="M35.8595 23.9932H34.7631V78.3892H35.8595V23.9932Z" fill="#70C3FF" />
                                <path d="M71.8656 58.3715H48.1407V70.7042H71.8656V58.3715Z" fill="#70C3FF" />
                                <path d="M35.227 42.0304V41.4189C35.134 40.6325 35.202 39.8354 35.4267 39.0761C35.6514 38.3168 36.0282 37.6111 36.5341 37.0019C36.904 36.6235 37.3473 36.3246 37.8367 36.1234C38.3261 35.9222 38.8514 35.823 39.3804 35.8318C41.0988 35.8318 42.543 36.8016 42.796 38.0561C42.912 38.8046 42.6484 40.1645 39.7178 41.2186L39.2539 41.3557H39.138H38.9271L35.8911 41.7879L35.227 42.0304ZM39.3804 36.907C38.9904 36.8915 38.6014 36.9575 38.2384 37.1009C37.8753 37.2443 37.5462 37.4619 37.2721 37.7398C36.5596 38.5797 36.184 39.654 36.2179 40.7548L38.7163 40.4175L39.0115 40.3226H39.1064C41.0671 39.6163 41.6997 38.8046 41.6153 38.2142C41.531 37.6239 40.5084 36.907 39.3804 36.907Z" fill="#70C3FF" />
                                <path d="M36.102 41.7879L31.822 40.8918L31.5479 40.8286H31.4635H31.3581L31.0524 40.7653C27.9636 39.8798 27.8899 38.035 27.9847 37.4657C28.0943 36.7695 28.4529 36.1368 28.9939 35.685C29.5348 35.2333 30.2213 34.9932 30.9259 35.0094C31.9801 35.0094 34.5945 35.5892 35.9438 41.0078L36.102 41.7879ZM30.831 36.0426C30.401 36.0372 29.9828 36.1832 29.6495 36.4549C29.3161 36.7265 29.0888 37.1067 29.0073 37.529C28.9019 38.4988 29.8717 39.3211 31.6111 39.7216L34.5839 40.3436C33.7511 37.6344 32.3912 36.0426 30.8732 36.0426H30.831Z" fill="#70C3FF" />
                                <path d="M31.2843 53.9427C31.2285 53.9528 31.1714 53.9528 31.1156 53.9427C29.4817 53.3945 27.7739 52.5723 27.426 50.7169C27.3057 49.4978 27.4394 48.267 27.8187 47.1021C28.1979 45.9373 28.8144 44.8637 29.6292 43.949C30.2743 43.0413 31.1052 42.2813 32.0667 41.7197C33.0283 41.158 34.0984 40.8075 35.2059 40.6916C35.3523 40.6887 35.494 40.7435 35.6005 40.844C35.7069 40.9446 35.7696 41.0829 35.7751 41.2292C35.778 41.3756 35.7233 41.5173 35.6227 41.6238C35.5222 41.7302 35.3839 41.793 35.2375 41.7985C34.2912 41.9138 33.3794 42.2257 32.5607 42.714C31.742 43.2024 31.0343 43.8564 30.4831 44.6342C29.7746 45.4313 29.2339 46.363 28.8934 47.3737C28.5529 48.3843 28.4195 49.4532 28.5013 50.5166C28.7437 51.8132 30.072 52.4352 31.4635 52.899C31.5785 52.9464 31.6739 53.0315 31.7342 53.1403C31.7944 53.2491 31.8159 53.3751 31.7951 53.4977C31.7742 53.6203 31.7123 53.7322 31.6195 53.815C31.5267 53.8977 31.4085 53.9465 31.2843 53.9532V53.9427Z" fill="#70C3FF" />
                                <path d="M41.141 52.4035H41.0461C40.6813 52.3504 40.3384 52.1972 40.0555 51.9608C39.7726 51.7245 39.5608 51.4143 39.4437 51.0647C39.2432 50.5863 39.1803 50.0613 39.2623 49.5491C39.3442 49.0368 39.5677 48.5577 39.9076 48.1657C40.3369 47.6921 40.8301 47.2806 41.3729 46.9428C41.0634 46.4256 40.7107 45.9354 40.3187 45.4775C38.9387 43.7533 37.0732 42.4827 34.9634 41.83C34.8307 41.7849 34.7202 41.6907 34.6548 41.5667C34.5894 41.4426 34.574 41.2982 34.6119 41.1632C34.6497 41.0282 34.7378 40.9128 34.8581 40.8407C34.9784 40.7687 35.1217 40.7455 35.2586 40.7759C37.5881 41.4857 39.6492 42.8819 41.1726 44.7818C41.6073 45.2981 41.9954 45.8519 42.3322 46.4369C42.9973 46.1349 43.7116 45.9563 44.4406 45.9098C45.6006 45.8925 46.7324 46.2687 47.6513 46.977C48.5702 47.6853 49.222 48.684 49.5006 49.8102C49.5006 49.937 49.4567 50.0598 49.3764 50.1578C49.2961 50.2558 49.1842 50.3229 49.06 50.3478C48.9357 50.3726 48.8067 50.3537 48.6948 50.2941C48.583 50.2345 48.4952 50.1381 48.4465 50.0211C48.1937 49.1695 47.6784 48.4196 46.9742 47.8782C46.27 47.3368 45.4128 47.0315 44.5249 47.0061C43.9462 47.0423 43.3785 47.1815 42.8487 47.4172C43.1462 48.0212 43.2947 48.6876 43.2818 49.3606C43.269 50.0337 43.0952 50.6939 42.7749 51.2861C42.6328 51.6054 42.4048 51.879 42.1162 52.0763C41.8277 52.2736 41.4901 52.3869 41.141 52.4035ZM41.8578 47.9443C41.4445 48.2091 41.0687 48.5282 40.7404 48.8931C40.5327 49.1305 40.3967 49.4219 40.3481 49.7336C40.2996 50.0453 40.3406 50.3643 40.4663 50.6536C40.5122 50.8083 40.5961 50.9491 40.7102 51.0633C40.8243 51.1774 40.9651 51.2612 41.1199 51.3072C41.3307 51.3072 41.5837 51.1069 41.8051 50.7379C42.0273 50.3074 42.1475 49.8316 42.1567 49.3473C42.1658 48.8629 42.0636 48.3829 41.8578 47.9443Z" fill="#70C3FF" />
                                <defs>
                                    <linearGradient id="paint0_linear_46_408" x1="18.107" y1="62.8505" x2="100.333" y2="62.8505" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#A0A0A0" />
                                        <stop offset="1" stop-color="#C8C8C8" />
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <div class="custom-card-body mt-3">
                            <div class="common-para">
                                <p>Sit Back and Watch Mailbox Money</p>
                                <p>
                                    We get paid, you get paid.
                                    Nice and Simple.

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5" id="about">
        <div class="clip-card-container">
            <div class="clip-card-container-left">
                <div class="common-heading">
                    <h1>
                        Why Choose Mailbox Money? The Perks Are Just Too Good to Resist!
                    </h1>
                </div>
                <div class="check-points mt-4">
                    <ul>
                        <li>
                            <img src="{{ asset('assets/landing-page-two/images/check-icon.svg') }}" alt="" />
                            “Never-Ending” Income
                        </li>
                        <li>
                            <img src="{{ asset('assets/landing-page-two/images/check-icon.svg') }}" alt="" />
                            Expert Support
                        </li>
                        <li>
                            <img src="{{ asset('assets/landing-page-two/images/check-icon.svg') }}" alt="" />Make a Real Difference
                        </li>
                    </ul>
                </div>
                <div class="common-btn mt-4">
                    <a  href="javascript::0">
                        <button  onclick="joinMailBoxMoney()">Get Mailbox Money</button>
                    </a>

                </div>
            </div>
            <div class="clip-card-container-right">
                <div class="hex">
                    <div class="hex-content">
                        <svg width="40" height="40" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_46_1553)">
                                <path class="send-icon-bg" d="M40.3499 35.8514C40.3499 37.03 39.8817 38.1604 39.0483 38.9938C38.2149 39.8272 37.0845 40.2954 35.9059 40.2954H4.57042C3.45219 40.2954 2.37976 39.8512 1.58905 39.0605C0.798338 38.2698 0.354126 37.1973 0.354126 36.0791V4.5117C0.354126 3.39347 0.798338 2.32104 1.58905 1.53033C2.37976 0.739626 3.45219 0.29541 4.57042 0.29541H36.1336C37.2518 0.29541 38.3243 0.739626 39.115 1.53033C39.9057 2.32104 40.3499 3.39347 40.3499 4.5117V35.8514Z" />
                                <path style="mix-blend-mode: multiply" opacity="0.5" d="M15.2798 27.773L27.6167 40.2364L35.8848 40.2743C36.4705 40.2771 37.051 40.1642 37.5929 39.942C38.1349 39.7199 38.6276 39.3929 39.0428 38.9799C39.4575 38.567 39.7865 38.0761 40.0108 37.5356C40.2351 36.9951 40.3504 36.4155 40.3499 35.8303V16.6335L32.6847 9.04419L7.1297 15.1915L13.8758 21.8828L15.2798 27.773Z" fill="url(#paint0_linear_46_1553)" />
                                <path class="send-icon" d="M32.6847 9.03162L7.1297 15.179L13.7999 21.4739L32.6847 9.03162Z" />
                                <path class="send-icon" d="M15.2798 27.7688L13.7999 21.4739L32.6847 9.03162L15.2798 27.7688Z" />
                                <path class="send-icon" d="M26.3898 34.2872L32.6847 9.03162L16.9832 24.1428L26.3898 34.2872Z" />
                                <path d="M15.2798 27.7688L16.9832 24.1428L17.818 25.0409L15.2798 27.7688Z" fill="#BCBEC0" />
                            </g>
                            <defs>
                                <linearGradient id="paint0_linear_46_1553" x1="7.1297" y1="24.6529" x2="40.3499" y2="24.6529" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#A0A0A0" />
                                    <stop offset="1" stop-color="#C8C8C8" />
                                </linearGradient>
                                <clipPath id="clip0_46_1553">
                                    <rect width="40" height="40" fill="white" transform="translate(0.354126 0.29541)" />
                                </clipPath>
                            </defs>
                        </svg>

                        <div class="common-para pt-3">
                            <p>“Never-Ending” Income</p>
                            <p>
                                As long as your client is active, you receive your mailbox money!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="hex">
                    <div class="hex-content">
                        <svg width="40" height="40" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_46_1553)">
                                <path class="send-icon-bg" d="M40.3499 35.8514C40.3499 37.03 39.8817 38.1604 39.0483 38.9938C38.2149 39.8272 37.0845 40.2954 35.9059 40.2954H4.57042C3.45219 40.2954 2.37976 39.8512 1.58905 39.0605C0.798338 38.2698 0.354126 37.1973 0.354126 36.0791V4.5117C0.354126 3.39347 0.798338 2.32104 1.58905 1.53033C2.37976 0.739626 3.45219 0.29541 4.57042 0.29541H36.1336C37.2518 0.29541 38.3243 0.739626 39.115 1.53033C39.9057 2.32104 40.3499 3.39347 40.3499 4.5117V35.8514Z" />
                                <path style="mix-blend-mode: multiply" opacity="0.5" d="M15.2798 27.773L27.6167 40.2364L35.8848 40.2743C36.4705 40.2771 37.051 40.1642 37.5929 39.942C38.1349 39.7199 38.6276 39.3929 39.0428 38.9799C39.4575 38.567 39.7865 38.0761 40.0108 37.5356C40.2351 36.9951 40.3504 36.4155 40.3499 35.8303V16.6335L32.6847 9.04419L7.1297 15.1915L13.8758 21.8828L15.2798 27.773Z" fill="url(#paint0_linear_46_1553)" />
                                <path class="send-icon" d="M32.6847 9.03162L7.1297 15.179L13.7999 21.4739L32.6847 9.03162Z" />
                                <path class="send-icon" d="M15.2798 27.7688L13.7999 21.4739L32.6847 9.03162L15.2798 27.7688Z" />
                                <path class="send-icon" d="M26.3898 34.2872L32.6847 9.03162L16.9832 24.1428L26.3898 34.2872Z" />
                                <path d="M15.2798 27.7688L16.9832 24.1428L17.818 25.0409L15.2798 27.7688Z" fill="#BCBEC0" />
                            </g>
                            <defs>
                                <linearGradient id="paint0_linear_46_1553" x1="7.1297" y1="24.6529" x2="40.3499" y2="24.6529" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#A0A0A0" />
                                    <stop offset="1" stop-color="#C8C8C8" />
                                </linearGradient>
                                <clipPath id="clip0_46_1553">
                                    <rect width="40" height="40" fill="white" transform="translate(0.354126 0.29541)" />
                                </clipPath>
                            </defs>
                        </svg>

                        <div class="common-para pt-3">
                            <p>Expert Support at Your Fingertips</p>
                            <p>
                                If you need anything, help is one-step away.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="hex">
                    <div class="hex-content">
                        <svg width="40" height="40" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_46_1553)">
                                <path class="send-icon-bg" d="M40.3499 35.8514C40.3499 37.03 39.8817 38.1604 39.0483 38.9938C38.2149 39.8272 37.0845 40.2954 35.9059 40.2954H4.57042C3.45219 40.2954 2.37976 39.8512 1.58905 39.0605C0.798338 38.2698 0.354126 37.1973 0.354126 36.0791V4.5117C0.354126 3.39347 0.798338 2.32104 1.58905 1.53033C2.37976 0.739626 3.45219 0.29541 4.57042 0.29541H36.1336C37.2518 0.29541 38.3243 0.739626 39.115 1.53033C39.9057 2.32104 40.3499 3.39347 40.3499 4.5117V35.8514Z" />
                                <path style="mix-blend-mode: multiply" opacity="0.5" d="M15.2798 27.773L27.6167 40.2364L35.8848 40.2743C36.4705 40.2771 37.051 40.1642 37.5929 39.942C38.1349 39.7199 38.6276 39.3929 39.0428 38.9799C39.4575 38.567 39.7865 38.0761 40.0108 37.5356C40.2351 36.9951 40.3504 36.4155 40.3499 35.8303V16.6335L32.6847 9.04419L7.1297 15.1915L13.8758 21.8828L15.2798 27.773Z" fill="url(#paint0_linear_46_1553)" />
                                <path class="send-icon" d="M32.6847 9.03162L7.1297 15.179L13.7999 21.4739L32.6847 9.03162Z" />
                                <path class="send-icon" d="M15.2798 27.7688L13.7999 21.4739L32.6847 9.03162L15.2798 27.7688Z" />
                                <path class="send-icon" d="M26.3898 34.2872L32.6847 9.03162L16.9832 24.1428L26.3898 34.2872Z" />
                                <path d="M15.2798 27.7688L16.9832 24.1428L17.818 25.0409L15.2798 27.7688Z" fill="#BCBEC0" />
                            </g>
                            <defs>
                                <linearGradient id="paint0_linear_46_1553" x1="7.1297" y1="24.6529" x2="40.3499" y2="24.6529" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#A0A0A0" />
                                    <stop offset="1" stop-color="#C8C8C8" />
                                </linearGradient>
                                <clipPath id="clip0_46_1553">
                                    <rect width="40" height="40" fill="white" transform="translate(0.354126 0.29541)" />
                                </clipPath>
                            </defs>
                        </svg>

                        <div class="common-para pt-3">
                            <p>Make a Real Difference</p>
                            <p>
                                Customers, employees, companies and owners all WIN when customers are put first!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid join-section">
        <img class="join-left-img" src="{{ asset('assets/landing-page-two/images/join-left.png') }}" alt="" />
        <img class="join-right-img" src="{{ asset('assets/landing-page-two/images/join-right.png') }}" alt="" />
        <div class="container">
            <div class="join-section-content">
                <div class="join-section-left">
                    <img src="{{ asset('assets/landing-page-two/images/join-banner-img.svg') }}" alt="" />
                </div>
                <div class="join-section-right">
                    <div class="common-heading">
                        <h2><span>Setu</span>p Your Mailbox Money</h2>
                        <h1>
                            Are You Ready for More Income – Join Mailbox Money Today!
                        </h1>
                    </div>
                    <div class="common-para mt-4">
                        <p>
                            Now is the time to seize this opportunity. Be a visionary. Be a trailblazer. Join Mailbox
                            Money and add a supplemental stream to your income. Help your clients succeed and earn easy
                            income at the same time.
                        </p>
                    </div>
                    <div class="common-btn mt-4">
                        <a href="{{ url('user-signup') }}"><button>Join Now</button></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer section -->
    <div class="container-fluid footer-section pt-5">
        <div class="container common-width">
            <div class="row pb-2">
                <div class="col-12 px-md-1">
                    <div class="footer-logo-section text-center">
                        <img src="{{ asset('assets/landing-page-two/images/logo.png') }}" alt="" />


                    </div>
                </div>
                <div class="col-12  mt-md-0 px-0">
                    <div class="footer-link-wrapper">
                        <div class="footer-links text-center">
                            <a href="mailto:info@mks.com" class="footer-contact-link">
                                <img src="{{ asset('assets/landing-page/images/footer-email-icon.png') }}" alt="" />
                                info@donwilliamsglobal.com</a>

                        </div>
                        <div class="footer-links text-center">

                            <a href="tel:(800)823-0403">
                                <img src="{{ asset('assets/landing-page/images/footer-phone-icon.png') }}" alt="" />
                                (800)823-0403</a>

                        </div>
                        <div class="footer-links text-center">

                            <a target="_blank" href="https://www.google.com/maps?q=KOdex Technologies 46 K DHA Phase 1 Lahore, Punjab Pakistan">
                                <img src="{{ asset('assets/landing-page/images/footer-location-icon.png') }}" alt="" />
                                KOdex Technologies 46 K DHA Phase 1 Lahore, Punjab Pakistan
                            </a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="col-12  copy-right-wrapper py-2">
            <div class="container copy-right px-1">
                <p>
                    <a data-toggle="modal" data-target="#termModal"> Terms & Conditions </a>
                    |
                    <a data-toggle="modal" data-target="#policyModal">Privacy Policy</a>
                </p>
                <p>Copyright © 2020. All right reserved</p>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="termModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Terms and Conditions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam incidunt fugit pariatur labore
                    vero. Reiciendis animi, deleniti facere minus pariatur dolorem autem ducimus consequuntur ex
                    obcaecati in eaque, quos odit delectus vitae, adipisci minima iste quam quo beatae ipsam! Maxime
                    asperiores quaerat ipsam tempora? Rerum aspernatur eum nobis, officiis nam assumenda nulla aperiam
                    similique fugit! Odit quis, dolor vero sequi architecto ab, dolorem quos accusamus at obcaecati odio
                    doloremque ducimus. Tempore ea, error facilis blanditiis necessitatibus hic explicabo reprehenderit
                    quod assumenda rerum in, aperiam odit nostrum ducimus, unde sint nesciunt quasi? Esse vitae ipsa
                    nesciunt quo aliquid accusantium nam ut qui nemo nobis. Voluptates nemo mollitia ducimus quidem
                    officia asperiores nisi nobis laudantium ullam, eaque et provident. Eveniet labore eum nemo neque,
                    possimus, ea perferendis amet repellat deleniti fuga minima. Reprehenderit, pariatur esse. Expedita
                    dolorum consectetur iste amet. Vitae officiis aspernatur velit dignissimos? Tenetur possimus
                    pariatur, voluptate voluptatum libero porro sunt ut impedit dolorem sed inventore debitis corrupti
                    repellat in fugiat ex. Eum fugit possimus magni. Itaque, similique nemo impedit incidunt
                    reprehenderit distinctio provident nostrum dicta, nesciunt consectetur adipisci eligendi beatae,
                    praesentium officia tenetur voluptas illo aliquam qui quos natus vero temporibus ratione? Autem ea
                    nulla accusantium adipisci veniam unde!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="policyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Privacy Policy</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam incidunt fugit pariatur labore
                    vero. Reiciendis animi, deleniti facere minus pariatur dolorem autem ducimus consequuntur ex
                    obcaecati in eaque, quos odit delectus vitae, adipisci minima iste quam quo beatae ipsam! Maxime
                    asperiores quaerat ipsam tempora? Rerum aspernatur eum nobis, officiis nam assumenda nulla aperiam
                    similique fugit! Odit quis, dolor vero sequi architecto ab, dolorem quos accusamus at obcaecati odio
                    doloremque ducimus. Tempore ea, error facilis blanditiis necessitatibus hic explicabo reprehenderit
                    quod assumenda rerum in, aperiam odit nostrum ducimus, unde sint nesciunt quasi? Esse vitae ipsa
                    nesciunt quo aliquid accusantium nam ut qui nemo nobis. Voluptates nemo mollitia ducimus quidem
                    officia asperiores nisi nobis laudantium ullam, eaque et provident. Eveniet labore eum nemo neque,
                    possimus, ea perferendis amet repellat deleniti fuga minima. Reprehenderit, pariatur esse. Expedita
                    dolorum consectetur iste amet. Vitae officiis aspernatur velit dignissimos? Tenetur possimus
                    pariatur, voluptate voluptatum libero porro sunt ut impedit dolorem sed inventore debitis corrupti
                    repellat in fugiat ex. Eum fugit possimus magni. Itaque, similique nemo impedit incidunt
                    reprehenderit distinctio provident nostrum dicta, nesciunt consectetur adipisci eligendi beatae,
                    praesentium officia tenetur voluptas illo aliquam qui quos natus vero temporibus ratione? Autem ea
                    nulla accusantium adipisci veniam unde!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
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
        function joinMailBoxMoney() {
            window.location.href = "{{url('mailbox-money')}}";
        }

        $(document).ready(function() {
            var playButton = document.getElementById("video-play-btn");
            var completePlay = document.getElementById("play-btn");
            var videoElement = document.getElementById("video-element");

            function togglePlay() {
                if (videoElement.paused || videoElement.ended) {
                    videoElement.play();
                } else {
                    videoElement.pause();
                }
            }

            playButton.addEventListener("click", togglePlay);
            videoElement.addEventListener("click", function() {
                videoElement.pause();
            });

            videoElement.addEventListener("playing", function() {
                playButton.style.display = "none";
            });
            videoElement.addEventListener("pause", function() {
                playButton.style.display = "flex";
            });
        });
    </script>
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
    <script>
        var testslider = $(".testimonial-slick-slider");
        testslider.on("init reInit afterChange");
        testslider.slick({

            adaptiveHeight: true,
            arrows: true,
            infinite: true,
            prevArrow: "<i class='fa fa-arrow-left slick-prev arrow ser-left' aria-hidden='true'></i> ",
            nextArrow: "<i class='fa fa-arrow-right slick-next arrow ser-right' aria-hidden='true'></i>",
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    },
                },

                {
                    breakpoint: 576,
                    settings: {
                        arrows: false,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },
                },
            ],
        })
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
