<div class="company-list-table pt-4">
    @if (count($users))
        @foreach ($users as $user)
            <div class="company-card company-card-table">
                <div class="company-card-profile">
                    <img class="profile-image" src="{{ $user['image'] }}" alt="" />
                    <h1>{{ $user['name'] }} <span>{{ $user['email'] }}</span>
                        <span>{{ date('d M Y', strtotime($user['created_at'])) ?? '' }}</span>
                    </h1>
                </div>
                <div class="company-user-status">
                    <p>User Status</p>
                    @if ($user['status'] == 1)
                        <span class="badge badge-success">Approved</span>
                    @elseif ($user['status'] == 2)
                        <span class="badge badge-danger">Reject</span>
                    @else
                        <span class="badge badge-warning">Pending</span>
                        {{-- <div> --}}
                        <img onclick="acceptUserRequest({{ $user['id'] }})" style="width: 20px;cursor: pointer"
                            src="{{ asset('assets/images/check.png') }}" alt="">
                        <img onclick="rejectUserRequest({{ $user['id'] }})" style="width: 20px;cursor: pointer"
                            src="{{ asset('assets/images/remove.png') }}" alt="">
                        {{-- Accept
                    Reject --}}
                        {{-- </div> --}}
                    @endif
                </div>
                <div class="company-card-action">
                    <a href="{{ url('/view-user', ['id' => $user['id']]) }}"><img
                            src="{{ asset('assets/images/view-icon.png') }}" alt="" /></a>
                    <a href="{{ url('/add-user', ['id' => $user['id']]) }}"><img
                            src="{{ asset('assets/images/edit-icon.svg') }}" alt="" /></a>
                    <form method="POST" action="{{ url('delete-user', $user['id']) }}">
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
        {{ $users->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
