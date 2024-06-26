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
                    <h1>View Company</h1>
                    <a href="{{url('/dashboard')}}"><img src="{{asset('assets/images/arrow_back.png')}}" alt="" /></a>
                </div>
                <div class="form-box view-box">
                    <div class="company-view-image mb-5">
                        <img src="{{$company->image ?? ''}}" alt="" />
                    </div>
                    <div class="company-detail-table">
                        <div class="company-detail-table-row">
                            <div class="company-detail-table-col heading">
                                <h1>Name</h1>
                            </div>
                            <div class="company-detail-table-col descrition">
                                <h1>{{$company->name ?? ''}}</h1>
                            </div>
                        </div>
                        <div class="company-detail-table-row">
                            <div class="company-detail-table-col heading">
                                <h1>Location</h1>
                            </div>
                            <div class="company-detail-table-col descrition">
                                <h1>{{$company->location ?? ''}}</h1>
                            </div>
                        </div>
                        <div class="company-detail-table-row">
                            <div class="company-detail-table-col heading">
                                <h1>Bio</h1>
                            </div>
                            <div class="company-detail-table-col descrition">
                                <h1>
                                {{$company->bio ?? ''}}
                                </h1>
                            </div>
                        </div>
                        <div class="company-detail-table-row">
                            <div class="company-detail-table-col heading">
                                <h1>Email</h1>
                            </div>
                            <div class="company-detail-table-col descrition">
                                <h1>{{$company->email ?? ''}}</h1>
                            </div>
                        </div>
                        <div class="company-detail-table-row">
                            <div class="company-detail-table-col heading">
                                <h1>Monthly Prize Budget</h1>
                            </div>
                            <div class="company-detail-table-col descrition">
                                <h1>{{$company->monthly_budget ?? '-'}}</h1>
                            </div>
                        </div>
                        <div class="company-detail-table-row">
                            <div class="company-detail-table-col heading">
                                <h1>Grand Prize</h1>
                            </div>
                            <div class="company-detail-table-col descrition">
                                <h1>{{$company->grand_prize ?? '-'}}%</h1>
                            </div>
                        </div>
                        <div class="company-detail-table-row">
                            <div class="company-detail-table-col heading">
                                <h1>Super Prizes</h1>
                            </div>
                            <div class="company-detail-table-col descrition">
                                <h1>{{$company->super_prize ?? '-'}}%</h1>
                            </div>
                        </div>
                        <div class="company-detail-table-row">
                            <div class="company-detail-table-col heading">
                                <h1>Other Prizes</h1>
                            </div>
                            <div class="company-detail-table-col descrition">
                                <h1>{{$company->other_prize ?? '-'}}%</h1>
                            </div>
                        </div>
                        <div class="company-detail-table-row">
                            <div class="company-detail-table-col heading">
                                <h1>Daily Video Types</h1>
                            </div>
                            <div class="company-detail-table-col descrition">
                            <div style="padding: 1rem;">
                            @foreach(explode(',', $company->daily_video_types) as $video_types)
                            <span class="badge badge-primary">{{$video_types}}</span>
                                @endforeach
                                </div>
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

