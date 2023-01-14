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
            <a href="{{Route('services.index')}}" style="font-size: 20px;"><i class="fa fa-arrow-circle-left mb-2" aria-hidden="true"></i></a>
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

                        {!! Form::model($package, ['method' => 'PATCH','route' => ['packages.update', $package->id]]) !!}
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {!! Form::text('title', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Price:</strong>
                                    {!! Form::number('price', null, array('min'=>'2000','max'=>'10000','placeholder' => 'Price','class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Duration:</strong>
                                    {!! Form::number('duration', null, array('min'=>'2','max'=>'12','placeholder' => 'Duration','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Service:</strong>
                                    <select name="service_id" class="form-control" required>
                                        @foreach($services as $service)
                                        <option selected="{{$service->id}}" value="{{$service->id}}">{{$service->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Current Status:</strong>
                                    <select name="status" class="form-control">
                                        <?php
                                        if ($package->status == '1') {
                                            echo '<option vlaue="1">Active</option>';
                                            echo '<option value="0">In Active</option>';
                                        } else {
                                            echo '<option ="0">Inactive</option>';
                                            echo '<option value="1">Active</option>';
                                        }
                                        ?>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
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