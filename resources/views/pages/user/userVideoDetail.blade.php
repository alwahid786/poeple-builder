@extends('layouts.user.user-default')
@section('content')
    @include('includes.user.navbar')
    <section class="home-section pb-3">
        <div class="container-fluid">
            <div class="video-play-container ">
                <div class="video-play video-wrapper custom-video-modal">

                    <video controls poster="{{$video->thumbnail}}" data-video-id="{{$video->id}}">
                        <source src="{{$video->video_path}}">
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
                            <h1>{{ $video['name' ?? ''] }} </h1>
                            <p>{{ date('D j M Y', strtotime($video['created_at'])) ?? '' }}</p>
                        </div>
                    </div>
                    <div class="video-detail-description">
                        <p>
                            {{ $video['description' ?? ''] }}
                        </p>
                    </div>
                    <div class="video-total-replies">
                        <h1>{{ sizeof($repliedVideo) }} Replies</h1>
                    </div>
                </div>

            </div>
            <div class="video-replies-container pt-3">
                <h1 class="video-replies-heading">People Replies</h1>
                <div id="partial-replies">
                    @include('pages.user.partial-replies', ['videos' => $repliedVideo])
                </div>
            </div>
            <!-- Modal -->
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
        </div>
        </div>
    </section>
@endsection
@section('admininsertjavascript')
    <script src="{{ asset('assets/js/companyVideoDetail.js') }}"></script>
@endsection
