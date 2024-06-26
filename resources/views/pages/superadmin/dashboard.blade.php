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
    <div class="row p-2">
      <div class="col-sm-6 col-md-4 col-lg-3 my-2 stat-card-wrapper-outer">
        <div class="stat-card-wrapper">
          <h1>Total Companies</h1>
          <p>{{$stats['total_companies']}}</p>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3 my-2 stat-card-wrapper-outer">
        <div class="stat-card-wrapper">
          <h1>Total Videos</h1>
          <p>{{$stats['total_videos']}}</p>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3 my-2 stat-card-wrapper-outer">
        <div class="stat-card-wrapper">
          <h1>Total Users</h1>
          <p>{{$stats['total_users']}}</p>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3 my-2 stat-card-wrapper-outer">
        <div class="stat-card-wrapper">
          <h1>Gratitude Share Videos</h1>
          <p>{{$stats['gratitude_videos']}}</p>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3 my-2 stat-card-wrapper-outer">
        <div class="stat-card-wrapper">
          <h1>Win Share Videos</h1>
          <p>{{$stats['win_videos']}}</p>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3 my-2 stat-card-wrapper-outer">
        <div class="stat-card-wrapper">
          <h1>WOW Share Videos</h1>
          <p>{{$stats['wow_videos']}}</p>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3 my-2 stat-card-wrapper-outer">
        <div class="stat-card-wrapper">
          <h1>CX Tip Videos</h1>
          <p>{{$stats['cxtip_videos']}}</p>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3 my-2 stat-card-wrapper-outer">
        <div class="stat-card-wrapper">
          <h1>Sales Tip Videos</h1>
          <p>{{$stats['salestip_videos']}}</p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6 my-auto">
        <div class="common-heading">
          <h1>List of Companies</h1>
        </div>
      </div>
      <div class="col-lg-6 my-2">
        <div class="search-field-wrapper">
          <a href="{{url('/add-company')}}">
            <button>Create New Company</button>
          </a>
          {{-- <a href="{{ route('export.user') }}">
          <button>Export User</button>
          </a> --}}

          <form id="importForm" action="{{ route('export.company') }}" class="" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="user_file" id="user_file" class="form-control col d-none" accept=".xls, .xlsx">
            <label id="user_file_label" style="white-space: nowrap; height: 45px; border-radius: 10px;" class="btn btn-success  import-btn">Import Companies</label>
          </form>

        </div>
      </div>

    </div>
    <div class="row pt-3 px-2">
      <div class="filter-wrapper col-12">
        <div class="common-heading">
          <h1>Filter</h1>
        </div>
        <div class="filter-right">
          <div class="search-field-wrapper">
            <div class="search-field">
              <input type="text" id="search-input" placeholder="Search..." />
              <img src="{{asset('assets/images/search-icon.png')}}" alt="" />
            </div>


          </div>
          <div class="form-field pl-1">

            <div class="filter-check">
              @foreach(config('constants.DAILY_VIDEO_TYPES') as $video_types)
              <div class="form-field-checkbox ">
                <input type="checkbox" value="{{$video_types['label']}}" name="daily_types[]" id="daily_types{{$video_types['label']}}">
                <label class="form-check-label" for="daily_types{{$video_types['label']}}">{{$video_types['label']}}</label>
              </div>
              @endforeach
            </div>



          </div>
        </div>

      </div>





    </div>

    <div id="partial-dashboard">
      @include('pages.superadmin.partial-dashboard', ['companies' => $companies])
    </div>
  </div>
</section>
@endsection
@section('admininsertjavascript')
<script>
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

  $('input[name="daily_types[]"]').on('click', function() {
    // Call your custom function or perform any action here
    url = window.location.href;
    search(url);
  });
  // Search function
  function search(url) {
    obj = {
      search: $("#search-input").val(),
      dailyTypes: $('input[name="daily_types[]"]:checked').map(function() {
        return $(this).val();
      }).get()
    };

    console.log(obj);
    showLoader();
    $.get(url, obj, function(data) {
      hideLoader();
      $('#partial-dashboard').html($(data));
    });
  }

  $(document).on("change", "#user_file", function () {
//   $("#user_file").change(function() {
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
