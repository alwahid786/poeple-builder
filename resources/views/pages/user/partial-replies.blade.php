
<div class="replies-wrapper row">
@if(sizeof($videos))
@foreach($videos as $repliedVideo)
<div class="col-lg-3 col-md-4 col-sm-6 p-1">
    <div class="video-reply-card" data-url="{{$repliedVideo['video_path']}}">
        <img src="{{$repliedVideo['thumbnail']}}" alt="">
        <div class="video-reply-detail">
            <h1>{{$repliedVideo['user']['name']}}</h1>
            <p>{{date("d/m/Y", strtotime($repliedVideo['created_at'])) ?? ''}}</p>
        </div>
    </div>
</div>
@endforeach
@else
<div class="company-card no-record" style="width: 100%;">
    <h1>No Record Found!</h1>
</div>
@endif
</div>


<div class="container pagination-wrapper py-4">
    <div id="pagination-links" class="pagination">
        {{ $videos->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>