@if (count($videos))
    <div class="video-card-container row">
        @foreach ($videos as $video)
            <div class="col-xl-4 col-sm-6 p-2">
                <div class="video-card-wrapper">
                    <div class="video-card-img">

                        <a href="{{ url('/admin-video-detail', ['id' => $video['id']]) }}"><img
                                src="{{ $video['thumbnail'] ?? '' }}" alt="" /></a>
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
                    <div class="video-card-action">
                        <div class="video-action">
                            @if ($video['total_replies'] < 1)
                                <a href="{{ url('/create-video', ['id' => $video['id']]) }}?dn={{ $d_no }}">
                                    <img class="video-edit-icon" src="{{ asset('assets/images/edit-icon.svg') }}"
                                        alt="" />
                                </a>
                                <form method="POST" action="{{ url('delete-video', $video['id']) }}">
                                    @csrf
                                    <a href="javascript::void(0)" onclick="delete_data(this)"><img
                                            class="video-delete-icon" src="{{ asset('assets/images/delete-icon.svg') }}"
                                            alt="" /></a>
                                </form>
                            @endif
                        </div>
                        <a class="video-replies-btn" href="{{ url('/admin-video-detail', ['id' => $video['id']]) }}">
                            @if ($video['total_replies'] > 1)
                                {{ $video['total_replies'] }} Replies
                            @else
                                {{ $video['total_replies'] }} Reply
                            @endif
                            <img src="{{ asset('assets/images/arrow-back-white.png') }}" alt="" />
                        </a>
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
