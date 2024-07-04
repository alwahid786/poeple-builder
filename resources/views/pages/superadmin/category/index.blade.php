@extends('layouts.superadmin.superadmin-default')

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
            <strong>Success! </strong>{{ $message }}
        </div>
        @endif
        <div class="video-heading-wrapper">
            <h1 class="module-heading">{{$title}}</h1>
            <div class="video-heading-calender">
                <a class="create-video-btn" href="{{url('category/create')}}">Create New {{$title}}</a>
            </div>
        </div>

    </div>
    <div class="company-table container-fluid">
        @include('pages.superadmin.category.partial-category', ['categories' => $categories])
      </div>
    </div>
</section>
@endsection
@section('admininsertjavascript')

@endsection
