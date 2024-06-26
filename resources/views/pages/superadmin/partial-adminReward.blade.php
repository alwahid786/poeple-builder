@forelse($rewards as $reward)
    <div class="reward-card">
        <div class="reward-table-content title-column px-sm-1">
            <h1>Title<span>{{ $reward['title'] ?? '-' }}</span></h1>
        </div>
        <div class="reward-table-content description-column ">
            <h1>Description <span class="discription-content">
                    {{ $reward['description'] ?? '-' }}
                </span></h1>
        </div>
        <div class="reward-table-content  reward-column">
            <h1>Reward <a href="{{ $reward['image_path'] ?? '-' }}" target="_blank"><img
                        src="{{ $reward['image_path'] ?? '-' }}" alt=""></a> </h1>
        </div>
        <div class="reward-table-content action-column action-column">
            <h1>Action <span class="mt-sm-2 d-flex justify-content-center">

                    <!-- <a href="{{ url('/adminRewardDetail') }}"><img src="{{ asset('assets/images/view-icon.png') }}" alt=""></a> -->
                    <a class="mx-2" href="{{ url('/addReward', ['id' => $reward['id']]) }}"><img
                            src="{{ asset('assets/images/edit-icon.svg') }}" alt=""></a>
                    <form method="POST" action="{{ url('delete-reward', $reward['id']) }}">
                        @csrf
                        <img onclick="delete_data(this)" src="{{ asset('assets/images/delete-icon.svg') }}"
                            alt="">
                    </form>
                </span></h1>

        </div>
    </div>
@empty
    <div class="company-card no-record">
        <h1>No Record Found!</h1>
    </div>
@endforelse

<div class="container pagination-wrapper py-4">
    <div id="pagination-links" class="pagination">
        {{ $rewards->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
