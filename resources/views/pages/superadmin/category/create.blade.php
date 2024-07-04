@extends('layouts.superadmin.superadmin-default')
@section('customhead')
@endsection
@section('content')
    @include('includes.superadmin.navbar')

    <section class="home-section pb-3">
        <div class="container-fluid">
            <div class="form-container ">
                <div class="form-wrapper">
                    <div class="col-12 form-wrapper-heading">
                        <h1>Add {{$title}}</h1>
                        <a href="{{ url()->previous() }}"><img src="{{ asset('assets/images/arrow_back.png') }}"
                                alt="" /></a>
                    </div>
                    <div class="form-box">
                        <form onsubmit="return categoryForm()" id="categoryForm" action="{{ url('category') }}"
                            method="POST" enctype="multipart/form-data">
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
                            @csrf
                            <div class="form-field mb-3">
                                <label>Name</label>
                                <input type="text" value="{{ old('name', $category->name ?? '') }}" name="name" />
                            </div>
                            <div class="form-field mb-3">
                                <label>Description</label>
                                <textarea name="description">{{ old('description', $category->description ?? '') }}</textarea>
                            </div>
                            <div class="form-field pt-2 pt-sm-3 ">
                                <button>Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('admininsertjavascript')
    <script>
        function categoryForm() {
            if (!ValidateField("categoryForm")) {
                swal({
                    title: "System Error!",
                    text: "Please fill all the required fields.",
                    icon: "error",
                });
                return false;
            }
            return true;
        };
    </script>
@endsection
