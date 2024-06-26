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
        <div class="form-container">
            <div class="form-wrapper">
                <div class="col-12 form-wrapper-heading">
                    <h1>Message</h1>
                </div>
                <div class="form-box view-box">

                    <div class="company-detail-table">
                        <div class="company-detail-table-row">
                            <div class="company-detail-table-col heading">
                                <h1>First Name</h1>
                            </div>
                            <div class="company-detail-table-col descrition">
                                <h1>{{$help->first_name ?? ''}}</h1>
                            </div>
                        </div>
                        <div class="company-detail-table-row">
                            <div class="company-detail-table-col heading">
                                <h1>Last Name</h1>
                            </div>
                            <div class="company-detail-table-col descrition">
                                <h1>{{$help->last_name ?? ''}}</h1>
                            </div>
                        </div>
                        <div class="company-detail-table-row">
                            <div class="company-detail-table-col heading">
                                <h1>Email</h1>
                            </div>
                            <div class="company-detail-table-col descrition">
                                <h1>{{$help->email ?? ''}}</h1>
                            </div>
                        </div>
                        <div class="company-detail-table-row">
                            <div class="company-detail-table-col heading">
                                <h1>Phone Number</h1>
                            </div>
                            <div class="company-detail-table-col descrition">
                                <h1>{{$help->phone_number ?? ''}}</h1>
                            </div>
                        </div>
                        <div class="company-detail-table-row">
                            <div class="company-detail-table-col heading">
                                <h1>Message</h1>
                            </div>
                            <div class="company-detail-table-col descrition">
                                <h1>{{$help->message ?? ''}}</h1>

                            </div>
                        </div>

                        @if(!empty($help->reply))
                        <div class="company-detail-table-row">
                            <div class="company-detail-table-col heading">
                                <h1>Your Reply</h1>
                            </div>
                            <div class="company-detail-table-col descrition">
                                <h1>{{$help->reply ?? ''}}</h1>

                            </div>
                        </div>
                        @endif

                    </div>
                    @if(empty($help->reply))
                    <div class="reply-field-wrapper mt-4">
                        <form action="" method="POST">
                            @csrf
                            <textarea name="reply" id="reply" cols="30" rows="3"></textarea>
                            <button>Send</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('admininsertjavascript')

@endsection