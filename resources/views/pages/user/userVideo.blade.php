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
                    <strong>Success! </strong>{{ $message }}
                </div>
            @endif
            <div class="video-heading-wrapper">
                <h1 class="module-heading">Video’s</h1>
                {{-- <div class="video-heading-calender">
                <a class="create-video-btn" href="{{url('create-video')}}">Create New Video</a>
            </div> --}}
            </div>
            <div class="col-12 date-slider">
                <div class="filter-tabs-two scroll-container">
                    <div class="tab-list-two tab-list-video">
                        @for ($count = 0; $count < $day; $count++)
                            <div class="tab-box-two tab-hide-two videocard" data-no="{{ $count + 1 }}">
                                <h1>Day {{ $count + 1 }}</h1>
                                <ul class="mark-type">
                                    @foreach ($user_types as $utype)
                                        <li>
                                            <img src="{{ asset('assets/images/' . (isset($videoCounts['categories'][$utype]) && $videoCounts['categories'][$utype] >= $count + 1 ? 'check.png' : 'remove.png')) }}"
                                                alt="" />
                                            {{ $utype }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endfor
                    </div>

                    <div class="back-button scroll-left">
                        <img src="{{ asset('assets/images/back.png') }}" alt="" />
                    </div>
                    <div class="next-button scroll-right">
                        <img src="{{ asset('assets/images/next.png') }}" alt="" />
                    </div>
                </div>
            </div>
            <div id="videosDiv">
                @include('pages.user.partial-videos', ['videos' => $videos])
            </div>
        </div>
    </section>
@endsection
@section('admininsertjavascript')
    <script src="{{ asset('assets/js/userVideo.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.tab-hide-two:last-of-type').addClass('active');
        })
    </script>
@endsection
