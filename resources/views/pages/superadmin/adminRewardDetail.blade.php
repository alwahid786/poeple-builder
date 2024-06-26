@extends('layouts.superadmin.superadmin-default')
@section('customhead')
@endsection
@section('content')
    @include('includes.superadmin.navbar')
    <section class="home-section pb-3">
        <div class="container-fluid">
            <div class="form-container">
                <div class="form-wrapper">
                    <div class="col-12 form-wrapper-heading">
                        <h1>View Reward</h1>
                        <a href="{{ url('/adminReward') }}"><img src="{{ asset('assets/images/arrow_back.png') }}"
                                alt="" /></a>
                    </div>
                    <div class="form-box view-box">
                        <div class="reward-view-image mb-5">
                            <img src="{{ asset('assets/images/video-card-pic-1.png') }}" alt="" />
                        </div>
                        <div class="company-detail-table">
                            <div class="company-detail-table-row">
                                <div class="company-detail-table-col heading">
                                    <h1>Title</h1>
                                </div>
                                <div class="company-detail-table-col descrition">
                                    <h1>Lorem, ipsum dolor.</h1>
                                </div>
                            </div>
                            <div class="company-detail-table-row">
                                <div class="company-detail-table-col heading">
                                    <h1>Description</h1>
                                </div>
                                <div class="company-detail-table-col descrition">
                                    <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla unde hic quae quam
                                        odit. Aliquid pariatur modi quae ratione provident.</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('admininsertjavascript')
    <script src="{{ asset('assets/js/addcompany.js') }}"></script>
@endsection
