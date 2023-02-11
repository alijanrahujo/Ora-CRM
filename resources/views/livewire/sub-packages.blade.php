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

            <form action="{{Route('sub_packages.store')}}" method="post" class="parsley-examples" novalidate="">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Select Package<span class="text-danger">*</span></label>
                            <select wire:model="packageid" name="packageid" required id="" parsley-trigger="change" class="form-control">
                                <option value="">Select Package</option>
                                @foreach($packages as $package)
                                <option value="{{$package->id}}">{{$package->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Select Service<span class="text-danger">*</span></label>
                            <select wire:model="serviceid" name="serviceid" required id="" parsley-trigger="change" class="form-control">
                                <option value="">Select Service</option>
                                @foreach($services as $service)
                                <option value="{{$service->id}}">{{$service->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <table class="table">
                                @foreach($subservices as $sub)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{$sub->title}}
                                    </td>
                                    <td>
                                        <input type="hidden" name="sub_service_id[]" value="{{$sub->id}}">
                                        <input name="description[]" required id="" parsley-trigger="change" type="text" class="form-control">
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="form-group text-left mb-0">
                            <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect waves-light">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>


    </div> <!-- end card-box -->
</div>