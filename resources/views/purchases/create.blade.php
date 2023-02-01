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

            <livewire:purchase-service />

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
    @endsection