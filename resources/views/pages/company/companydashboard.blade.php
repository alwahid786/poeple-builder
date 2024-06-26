@extends('layouts.company.company-default')
@section('content')
@include('includes.company.navbar')
<section class="home-section py-3">
    <div class="container-fluid">
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block mt-3 mb-0" style="width: 100%;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Error! </strong>{{ $message }}
        </div>
        @elseif($message = Session::get('success'))
        <div class="alert alert-success alert-block mt-3 mb-0" style="width: 100%;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Success! </strong>{!! $message !!}
        </div>
        @endif
        <div class="row p-2">
            <div class="col-sm-6 col-md-4 col-lg-3 my-2 stat-card-wrapper-outer">
                <div class="stat-card-wrapper">
                    <h1>Total Users</h1>
                    <p>{{$stats['total_users'] ?? '-'}}</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 my-2 stat-card-wrapper-outer">
                <div class="stat-card-wrapper">
                    <h1>Approved Users</h1>
                    <p>{{$stats['approved_users'] ?? '-'}}</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 my-2 stat-card-wrapper-outer">
                <div class="stat-card-wrapper">
                    <h1>Pending Users</h1>
                    <p>{{$stats['pending_users'] ?? '-'}}</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 my-2 stat-card-wrapper-outer">
                <div class="stat-card-wrapper">
                    <h1>Latest Video Day</h1>
                    <p>{{$stats['latest_video_day'] ?? '-'}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 my-auto">
                <div class="common-heading">
                    <h1>List of User’s</h1>
                </div>
            </div>
            <div class="col-md-6 my-2">
                <div class="search-field-wrapper">
                    <div class="search-field">
                        <input type="text" id="search-input" placeholder="Search..." />
                        <img src="{{asset('assets/images/search-icon.png')}}" alt="" />
                    </div>
                    <a href="{{url('/add-user')}}">
                        <button>Create New User</button>
                    </a>
                    <form id="importForm" action="{{ route('export.user') }}" class="" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="user_file" id="user_file" class="form-control col d-none" accept=".xls, .xlsx">
                        <label id="user_file_label" style="white-space: nowrap; height: 45px; border-radius: 10px;" class="btn btn-success  import-btn">Import Users</label>
                    </form>
                </div>
            </div>
        </div>

        <div id="partial-company-dashboard">
            @include('pages.company.partial-company-dashboard', ['users' => $users])
        </div>

    </div>
</section>
@endsection
@section('admininsertjavascript')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('assets/js/common.js') }}"></script>

<script>
    // url
    var rejecUserUrl = "{{ route('reject-user-status') }}"
    var acceptUserUrl = "{{ route('accept-user-status') }}"
    // paginate link
    $(document).on('click', '#pagination-links a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        search(url);
    });

    var searchTimer; // Timer variable to track typing timeout
    var searchTimeout = 1000;
    $(document).on('keyup', '#search-input', function(event) {
        url = window.location.href;
        clearTimeout(searchTimer);
        searchTimer = setTimeout(function() {
            search(url);
        }, 1000);
    });


    $(document).on('keydown', '#search-input', function(event) {
        clearTimeout(searchTimer); // Clear the timer when a key is pressed
    });

    // Search function
    function search(url) {
        obj = {
            search: $("#search-input").val()
        };
        showLoader();
        $.get(url, obj, function(data) {
            hideLoader();
            $('#partial-company-dashboard').html($(data));
        });
    }

    $(document).on("change", "#user_file", function () {
    // $("#user_file").change(function() {
        swal({
                title: "Are you sure you want to import this file?",
                // text: "Are you want to import this file.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $("#importForm").submit();
                    showLoader();
                } else {
                    return false;
                }
            });
    });

  $(document).on("click", "#user_file_label", function () {
    $("#user_file").remove();
    $("#importForm").append(`<input type="file" name="user_file" id="user_file" class="form-control col d-none" accept=".xls, .xlsx">`);
    $("#user_file").trigger("click");
  });
</script>
@endsection
