@extends('layouts.superadmin.superadmin-default')
@section('customhead')
@endsection
@section('content')
@include('includes.superadmin.navbar')
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
            <strong>Success! </strong>{!! $message !!}
        </div>
        @endif
        <div class="help-card-wrapper">
            @include('pages.superadmin.partial-help', ['help' => $help])

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
            $('.help-card-wrapper').html($(data));
        });
    });
    $(document).ready(function() {
        const dropdownContent = $(".active").next(".setting-dropdown");
        console.log(dropdownContent, "dropdownContent")
        dropdownContent.removeClass('setting-dropdown-hide');
    })
</script>
@endsection