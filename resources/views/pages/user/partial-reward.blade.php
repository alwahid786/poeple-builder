@forelse($userAwards as $userAward)
<div class="reward-card">
    <div class="reward-table-content">
        <h1>Day<span class="day-number">{{$userAward['day'] ?? '-'}}</span></h1>
    </div>
    <div class="reward-table-content">
        <h1>Date<span>{{date("d/m/Y", strtotime($userAward['created_at'])) ?? '-'}}</span></h1>
    </div>
    <div class="reward-table-content">
        <!-- <h1>Reward <a href="{{$userAward['award']['image_path'] ?? '-'}}" target="_blank"><img src="{{$userAward['award']['image_path'] ?? '-'}}" alt=""></a> </h1> -->
        <h1>Reward Price <a href="#">{{$userAward['price'] ?? '-'}}</a> </h1>
    </div>
</div>
@empty
<div class="company-card no-record">
    <h1>No Record Found!</h1>
</div>
@endforelse

<div class="container pagination-wrapper py-4">
    <div id="pagination-links" class="pagination">
        {{ $userAwards->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>