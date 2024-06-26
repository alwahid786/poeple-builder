@extends('layouts.company.company-default')
@section('content')
@include('includes.company.navbar')
<section class="home-section py-3">
    <div class="container-fluid">
        <div class="form-container">
            <div class="form-wrapper">
                <div class="col-12 form-wrapper-heading">
                    <h1>View Company</h1>
                    <a href="{{url('/company-dashboard')}}"><img src="{{asset('assets/images/arrow_back.png')}}" alt="" /></a>
                </div>
                <div class="form-box view-box">
                    <div class="company-view-image mb-5">
                        <img src="{{$user->image ?? ''}}" alt="" />
                    </div>
                    <div class="company-detail-table">
                        <div class="company-detail-table-row">
                            <div class="company-detail-table-col heading">
                                <h1>Name</h1>
                            </div>
                            <div class="company-detail-table-col descrition">
                                <h1>{{$user->name ?? ''}}</h1>
                            </div>
                        </div>
                        <div class="company-detail-table-row">
                            <div class="company-detail-table-col heading">
                                <h1>Email</h1>
                            </div>
                            <div class="company-detail-table-col descrition">
                                <h1>{{$user->email ?? ''}}</h1>
                            </div>
                        </div>
                        <div class="company-detail-table-row">
                            <div class="company-detail-table-col heading">
                                <h1>Phone Number</h1>
                            </div>
                            <div class="company-detail-table-col descrition">
                                <h1>{{$user->phone_number ?? ''}}</h1>
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
@endsection