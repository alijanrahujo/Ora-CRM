@extends('layouts.web')
@section('title', 'Dashboard')
@section('content')

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">purchases</a></li>
                                <li class="breadcrumb-item active">All Purchases</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Purchases</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <a href="{{Route('purchases.index')}}" style="font-size: 20px;"><i class="fa fa-arrow-circle-left mb-2" aria-hidden="true"></i></a>
            <div class="row">
                <div class="col-lg-12">

                    <div class="card-box">

                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{Route('packages.store')}}" method="post" class="parsley-examples" novalidate="">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Service <span class="text-danger">*</span></label>
                                        <select name="service_id" class="form-control" required>
                                            <option value="">Select Service</option>
                                            @foreach($services as $service)
                                            <option value="{{$service->id}}">{{$service->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Package <span class="text-danger">*</span></label>
                                        <select name="package_id" class="form-control" required>
                                            <option value="">Select package</option>
                                            @foreach($packages as $package)
                                            <option value="{{$package->id}}">{{$package->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Client Name <span class="text-danger">*</span></label>
                                        <select name="client_id" class="form-control" required>
                                            <option value="">Select Service</option>
                                            @foreach($clients as $client)
                                            <option value="{{$client->id}}">{{$client->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Package Duration <span class="text-danger">*</span></label>
                                        <input type="number" name="duration" min="1" max="12" parsley-trigger="change" required placeholder="Enter Month" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-left mb-0">
                                <button class="btn btn-primary waves-effect waves-light mr-1 add" type="button">
                                    Add
                                </button>

                                <!-- <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect waves-light">
                                    Cancel
                                </button> -->
                            </div>

                        </form>
                    </div> <!-- end card-box -->
                </div>
                <!-- end col -->
            </div>

            <div class="row">
                <div class="col-lg-12">

                    <div class="card-box">
                        <form action="{{Route('packages.store')}}" method="post" class="parsley-examples" novalidate="">
                            {{ csrf_field() }}

                            <table id="datatable-buttons" class="table table-striped table-bordered text-center dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>ClientName</th>
                                        <th>PackageType</th>
                                        <th>PackageType</th>
                                        <th>Package Duration</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="result">
                                </tbody>
                            </table>

                        </form>
                    </div> <!-- end card-box -->
                </div>
                <!-- end col -->
            </div>

            <!-- end row -->
        </div> <!-- end container-fluid -->
    </div> <!-- end content -->

    @endsection

    @section('script')
    <!-- Plugin js-->
    <script src="{{asset('assets/libs/parsleyjs/parsley.min.js')}}"></script>

    <!-- Validation init js-->
    <script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>

    <script src="{{asset('assets/libs/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
    <script src="{{asset('assets/libs/autonumeric/autoNumeric-min.js')}}"></script>
    <script src="{{asset('assets/js/pages/form-masks.init.js')}}"></script>
    <script>
        $('.add').click(function() {
            let package_id = $('select[name=package_id] option:selected').text();
            let service_id = $('select[name=service_id] option:selected').text();
            let client_id = $('select[name=client_id] option:selected').text();
            let duration = $('input[name=duration]').val();
            // alert(client_id);

            $('#result').append(
                '<tr id="demo"><td>' + client_id + '</td><td>' + service_id + '</td><td>' + package_id + '</td><td>' + duration + '<td><button onclick="dlt()" class="btn btn-small btn-danger"><i class="fa fa-trash"></i></button></td></tr><tr><td colspan="5"><button class="btn btn-primary waves-effect waves-light mr-1" type="submit">Submit</button></td></tr>');
        })

        function dlt() {
            // alert('working');
            const element = document.getElementById("demo");
            element.remove();
        }
    </script>
    @endsection