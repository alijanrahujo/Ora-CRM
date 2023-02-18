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
            <a href="{{Route('packages.index')}}" style="font-size: 20px;"><i class="fa fa-arrow-circle-left mb-2" aria-hidden="true"></i></a>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <div class="row text-dark">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {{ $package->title }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Service Type:</strong>
                                    {{ $package->service_id }}
                                </div>
                            </div>
                        </div>
                        <div class="row text-dark">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Price:</strong>
                                    {{ $package->price }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>package Duration:</strong>
                                    {{ $package->duration}} Months
                                </div>
                            </div>
                        </div>
                        <div class="row text-dark">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Status: </strong>
                                    <?php if ($package->status == 1) {
                                        echo "<span class='bg-success text-white rounded p-1'>Active</span>";
                                    } else {
                                        echo "<span class='bg-danger text-white p-1 rounded'>Inactive</span>";
                                    }
                                    ?>
                                </div>
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
    <!-- Plugin js-->
    <script src="{{asset('assets/libs/parsleyjs/parsley.min.js')}}"></script>

    <!-- Validation init js-->
    <script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>
    @endsection