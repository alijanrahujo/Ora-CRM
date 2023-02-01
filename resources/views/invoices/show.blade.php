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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">invoices</a></li>
                                <li class="breadcrumb-item active">All Inovices</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Invoices</h4>
                    </div>
                </div>
            </div>

            <!-- end page title -->
            <a href="{{Route('invoices.index')}}" style="font-size: 20px;"><i class="fa fa-arrow-circle-left mb-2" aria-hidden="true"></i></a>

            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <div class="clearfix">
                            <div class="float-left mb-2">
                                <img src="assets/images/logo-dark.png" alt="" height="28">
                            </div>
                            <div class="float-right">
                                <h3 class="m-0 d-print-none">Invoice</h3>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mt-3">
                                    <p><b>Hello, {{$clients->name}}</b></p>
                                    <p class="text-muted">Thanks a lot because you keep purchasing our products. Our company
                                        promises to provide high quality products for you as well as outstanding
                                        customer service for every transaction. </p>
                                </div>

                            </div><!-- end col -->
                            <div class="col-md-6">
                                <div class="mt-3 text-md-right">
                                    <p><strong>Order Date: </strong> {{$purchase->purchased_date}}</p>
                                    <p><strong>Order Status: </strong> <span class="badge badge-success">Paid</span></p>
                                    <p><strong>Order ID: </strong> #{{$purchase->id}}</p>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <h5>Billing Address</h5>

                                <address class="line-h-24">
                                    City: {{$clients->city}}<br>
                                    Address: {{$clients->address}}<br>
                                    <abbr title="Phone">P:</abbr> {{$clients->contact}}
                                </address>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table mt-4 table-centered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th>Unit Cost</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="clearfix pt-4">
                                    <h6 class="text-muted">Notes:</h6>

                                    <small>
                                        All accounts are to be paid within 7 days from receipt of
                                        invoice. To be paid by cheque or credit card or direct payment
                                        online. If account is not paid within 7 days the credits details
                                        supplied as confirmation of work undertaken will be charged the
                                        agreed quoted fee noted above.
                                    </small>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="text-right">
                                    <h4>Total Cost: 749 </h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="hidden-print mt-4">
                            <div class="text-right d-print-none">
                                <a href="javascript:window.print()" class="btn btn-blue waves-effect waves-light"><i class="fa fa-print mr-1"></i> Print</a>
                                <a href="#" class="btn btn-info waves-effect waves-light">Submit</a>
                            </div>
                        </div>
                    </div>

                </div>
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
    @endsection