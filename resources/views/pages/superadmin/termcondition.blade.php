@extends('layouts.superadmin.superadmin-default')
@section('customhead')

@endsection
@section('content')
@include('includes.superadmin.navbar')
<section class="home-section pb-3">
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
    <div class="container-fluid">
        <div class="col-12 term-heading">
            <h1>Terms & Conditions </h1>
        </div>
        <div class="content-wrapper mt-3">

            <form action="" method="post">
                @csrf
                <textarea class="ckeditor form-control" name="data">{!! html_entity_decode($terms->data ?? null) !!}</textarea>
                <button class="btn btn-primary mt-5">Save</button>
            </form>
        </div>
    </div>
</section>
@endsection
@section('admininsertjavascript')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        const dropdownContent = $(".active").next(".setting-dropdown");
        console.log(dropdownContent, "dropdownContent")
        dropdownContent.removeClass('setting-dropdown-hide');
    })
</script>
@endsection