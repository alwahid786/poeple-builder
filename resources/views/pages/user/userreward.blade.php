@extends('layouts.user.user-default')
@section('content')
@include('includes.user.navbar')
<section class="home-section">
    <div class="container-fluid">
        <div class="col-12 term-heading d-flex flex-column flex-sm-row justify-content-between align-items-sm-center pb-3">
            <h1>Rewards</h1>
            <!-- <div>
                <div class="search-field-wrapper">
                    <div class="search-field">
                        <input type="text" id="search-input" placeholder="Search..." />
                        <img src="{{asset('assets/images/search-icon.png')}}" alt="" />
                    </div>
                </div>
            </div> -->
        </div>
        <div class="reward-table">
            @include('pages.user.partial-reward', ['userAwards' => $userAwards])
        </div>
    </div>
</section>
@endsection
@section('admininsertjavascript')
<script>
    $(document).on('click', '#pagination-links a', function(e) {
        // $('#pagination-links').on('click', 'a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        showLoader();
        $.get(url, function(data) {
            hideLoader();
            $('.reward-table').html($(data));
        });
    });
</script>
@endsection