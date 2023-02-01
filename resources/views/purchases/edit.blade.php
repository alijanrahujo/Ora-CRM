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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">purchase service</a></li>
                                <li class="breadcrumb-item active">Edit Purchase Service</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Purchase Service</h4>
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

                        {!! Form::model($purchase, ['method' => 'PATCH','route' => ['purchases.update', $purchase->id]]) !!}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Client Name <span class="text-danger">*</span></label>
                                    {!! Form::select('client_id', $clients,$purchase->client_id, array('class' => 'form-control')) !!}
                                    @error('client')<ul class="parsley-errors-list filled" id="parsley-id-5">
                                        <li class="parsley-required">{{$message}}</li>
                                    </ul>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Service <span class="text-danger">*</span></label>
                                    {!! Form::select('service_id', $services,$purchase->service_id, array('class' => 'form-control')) !!}
                                    @error('service')<ul class="parsley-errors-list filled" id="parsley-id-5">
                                        <li class="parsley-required">{{$message}}</li>
                                    </ul>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Package <span class="text-danger">*</span></label>
                                    {!! Form::select('package_id', $packages,$purchase->package_id, array('class' => 'form-control')) !!}
                                    @error('package')<ul class="parsley-errors-list filled" id="parsley-id-5">
                                        <li class="parsley-required">{{$message}}</li>
                                    </ul>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Package Duration <span class="text-danger">*</span></label>
                                    {!! Form::text('duration', null, array('class' => 'form-control')) !!}
                                    @error('duration')<ul class="parsley-errors-list filled" id="parsley-id-5">
                                        <li class="parsley-required">{{$message}}</li>
                                    </ul>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Our Offer <span class="text-danger">*</span></label>
                                    {!! Form::text('our_offer', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                    @error('ouroffer')<ul class="parsley-errors-list filled" id="parsley-id-5">
                                        <li class="parsley-required">{{$message}}</li>
                                    </ul>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date <span class="text-danger">*</span></label>
                                    {!! Form::date('purchased_date', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                    @error('date')<ul class="parsley-errors-list filled" id="parsley-id-5">
                                        <li class="parsley-required">{{$message}}</li>
                                    </ul>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <?php
                                        if ($purchase->status == '1') {
                                            echo '<option vlaue="1">Active</option>';
                                            echo '<option value="0">In Active</option>';
                                        } else {
                                            echo '<option ="0">Inactive</option>';
                                            echo '<option value="1">Active</option>';
                                        }
                                        ?>
                                    </select>
                                    @error('status')<ul class="parsley-errors-list filled" id="parsley-id-5">
                                        <li class="parsley-required">{{$message}}</li>
                                    </ul>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-right mt-3">
                                    <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect waves-light">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>

                        {!! Form::close() !!}
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