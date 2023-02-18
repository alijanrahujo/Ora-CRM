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
                        <h4 class="page-title">Purchases Multipel</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <a href="{{Route('purchases.index')}}" style="font-size: 20px;"><i class="fa fa-arrow-circle-left mb-2" aria-hidden="true"></i></a>
            <div class="row">
                <div class="col-lg-12">

                    <div class="card-box">
                        <form action="{{Route('purchases.store')}}" method="post" class="parsley-examples" novalidate="">
                            {{ csrf_field() }}
                            <table id="data_table" class="table table-triped ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Client Name</th>
                                        <th>Service Type</th>
                                        <th>Package Type</th>
                                        <th>Package Duration</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-1">
                                    <label>No.</label>
                                    <input type="text" class="form-control input-sm text-right" readonly id="no">
                                </div>
                                <div class="col-md-3">
                                    <label>Client Name</label>
                                    <select id="client_id" class="form-control" required>
                                        <option value="">Select Service</option>
                                        @foreach($clients as $client)
                                        <option value="{{$client->id}}">{{$client->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Service</label>
                                    <select id="service_id" class="form-control" required>
                                        <option value="">Select Service</option>
                                        @foreach($services as $service)
                                        <option value="{{$service->id}}">{{$service->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Package</label>
                                    <select id="package_id" class="form-control" required>
                                        <option value="">Select package</option>
                                        @foreach($packages as $package)
                                        <option value="{{$package->id}}">{{$package->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <label>Duration</label>
                                    <input type="number" id="duration" min="1" max="12" parsley-trigger="change" required class="form-control">
                                </div>
                            </div>

                            <div class="mt-3 row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary" id="add_table">Add In Table</button>
                                    <button class="btn btn-success">Add in Database</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end card-box -->
            </div>
            <!-- end col -->
        </div>

        <!-- end row -->
    </div> <!-- end container-fluid -->
</div> <!-- end content -->

@endsection

@section('script')

<script>
    $(function() {
        var set_number = function() {
            var $table_len = $('#data_table tbody tr').length + 1;
            $('#no').val($table_len);
        }
        set_number();
        $('#add_table').click(function() {
            var no = $("#no").val();
            let package = $('select[id=package_id] option:selected').text();
            let package_id = $('select[id=package_id] option:selected').val();
            let service = $('select[id=service_id] option:selected').text();
            let service_id = $('select[id=service_id] option:selected').val();
            let client = $('select[id=client_id] option:selected').text();
            let client_id = $('select[id=client_id] option:selected').val();
            let duration = $('#duration').val();
            $('#data_table tbody:last-child').append(
                '<tr>' +
                '<td>' + no + '</td>' +
                '<td>' + client + '</td>' +
                '<td>' + service + '</td>' +
                '<td>' + package + '</td>' +
                '<td>' + duration + '<td>' +
                '</tr>' +
                '<input type="hidden" name="client_id[]" value="' + client_id + '">' +
                '<input type="hidden" name="service_id[]" value="' + service_id + '">' +
                '<input type="hidden" name="package_id[]" value="' + package_id + '">' +
                '<input type="hidden" name="duration[]" value="' + duration + '">'
            );
            // $("#client");
            // $("#service").val('');
            // $("#package").val('');
            // $("#duration").val('');
            set_number();
        });

    });
</script>

<!-- Plugin js-->
<script src="{{asset('assets/libs/parsleyjs/parsley.min.js')}}"></script>
<!-- Validation init js-->
<script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>
<script src="{{asset('assets/libs/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
<script src="{{asset('assets/libs/autonumeric/autoNumeric-min.js')}}"></script>
<script src="{{asset('assets/js/pages/form-masks.init.js')}}"></script>

@endsection