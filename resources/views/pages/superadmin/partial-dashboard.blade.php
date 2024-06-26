<div class="company-list-table pt-4">
    @if (count($companies))
        @foreach ($companies as $company)
            <div class="company-card company-card-dashboard ">
                <div class="company-card-profile">
                    <img class="profile-image" src="{{ $company['image'] }}" alt="" />
                    <h1>{{ $company['name'] }} <span>{{ $company['email'] }}</span>
                        <span>{{ date('d M Y', strtotime($company['created_at'])) ?? '' }}</span>
                    </h1>
                </div>
                <div class="total-user">
                    <h1>Total Users<span>{{ $company['total_users'] }}</span></h1>
                </div>
                <div class="video-type">
                    <h1 class="mb-1">Daily Video Types </h1>
                    <div>
                        @foreach (explode(',', $company['daily_video_types']) as $video_types)
                            <span class="badge badge-primary">{{ $video_types }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="company-card-action my-auto">
                    <a href="{{ url('/view-company', ['id' => $company['id']]) }}"><img
                            src="{{ asset('assets/images/view-icon.png') }}" alt="" /></a>
                    <a href="{{ url('/add-company', ['id' => $company['id']]) }}"><img
                            src="{{ asset('assets/images/edit-icon.svg') }}" alt="" /></a>
                    <form method="POST" action="{{ url('delete-company', $company['id']) }}">
                        @csrf
                        <a href="javascript::void(0)" onclick="delete_data(this)"><img
                                src="{{ asset('assets/images/delete-icon.svg') }}" alt="" /></a>
                    </form>
                </div>
            </div>
        @endforeach
    @else
        <div class="company-card no-record">
            <h1>No Record Found!</h1>
        </div>
    @endif

</div>

<div class="container pagination-wrapper py-4">
    <div id="pagination-links" class="pagination">
        {{ $companies->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
