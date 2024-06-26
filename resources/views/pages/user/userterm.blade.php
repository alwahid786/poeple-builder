@extends('layouts.user.user-default')
@section('content')
@include('includes.user.navbar')
<section class="home-section pb-3">
    <div class="container-fluid">
        <div class="col-12 term-heading">
            <h1>Terms & Conditions <span>Read and Accept below</span></h1>
        </div>
        <div class="content-wrapper mt-3">
            <div class="col-12 term-heading">
                {!! $terms['data'] ?? '' !!}
            </div>
        </div>
    </div>
</section>
@endsection
@section('admininsertjavascript')
<script>
    $(document).ready(function() {
        const dropdownContent = $(".active").next(".setting-dropdown");
        console.log(dropdownContent, "dropdownContent")
        dropdownContent.removeClass('setting-dropdown-hide');
    })
</script>
@endsection