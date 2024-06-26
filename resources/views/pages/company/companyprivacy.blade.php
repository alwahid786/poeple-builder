@extends('layouts.company.company-default')
@section('content')
@include('includes.company.navbar')
<section class="home-section py-3">
    <div class="container-fluid">
        <div class="col-12 term-heading">
            <h1>Privacy Policy <span>Read and Accept below</span></h1>
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