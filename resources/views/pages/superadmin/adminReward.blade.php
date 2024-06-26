@extends('layouts.superadmin.superadmin-default')
@section('content')
@include('includes.superadmin.navbar')
<section class="home-section">
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
        <div class="col-12 term-heading d-flex flex-column flex-sm-row justify-content-between align-items-sm-center pb-3">
            <h1 class="mb-sm-0 mb-3">Rewards</h1>
            <div>
                <div class="search-field-wrapper">
                    <div class="search-field">
                        <input type="text" id="search-input" placeholder="Search..." />
                        <img src="{{asset('assets/images/search-icon.png')}}" alt="" />
                    </div>
                    <a href="{{url('/addReward')}}">
                        <button class="add-reward-btn">Add Reward</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="reward-table">
            @include('pages.superadmin.partial-adminReward', ['rewards' => $rewards])
        </div>
    </div>
</section>
@endsection
@section('admininsertjavascript')
<script src="{{ asset('assets/js/reward.js') }}"></script>
@endsection