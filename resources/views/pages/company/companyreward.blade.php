@extends('layouts.company.company-default')
@section('content')
@include('includes.company.navbar')
<section class="home-section py-3">
  <div class="container-fluid">
    <div class="col-12 term-heading pt-1 d-flex flex-column flex-sm-row justify-content-between align-items-sm-center pb-3">
      <h1 class="mb-sm-0 mb-3">Rewards</h1>
      <div>
        <div class="search-field-wrapper">
          <div class="search-field">
            <input type="text" id="search-input" placeholder="Search..." />
            <img src="{{asset('assets/images/search-icon.png')}}" alt="" />
          </div>
        </div>
      </div>
    </div>
    <div class="reward-table">
      @include('pages.company.partial-reward', ['userAwards' => $userAwards])

    </div>
  </div>
</section>
@endsection
@section('admininsertjavascript')
<script src="{{ asset('assets/js/reward.js') }}"></script>
@endsection