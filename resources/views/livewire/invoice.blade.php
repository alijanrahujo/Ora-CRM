<div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <form action="{{Route('invoices.store')}}" method="post" class="parsley-examples" novalidate="">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Client <span class="text-danger">*</span></label>
                                <select wire:model="clientid" name="clientid" class="form-control" required>
                                    <option value="">Select Client</option>
                                    @foreach($clients as $val)
                                    <option value="{{$val->id}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Service <span class="text-danger">*</span></label>
                                <select wire:model="serviceid" name="serviceid" class="form-control" required>
                                    <option value="">Select Service</option>
                                    @foreach($services as $val)
                                    <option value="{{$val->id}}">{{$val->service->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Package <span class="text-danger">*</span></label>
                                <select name="package_id[]" multiple class="form-control" required>
                                    <option value="">Select Package</option>
                                    @foreach($packages as $val)
                                    <option value="{{$val->id}}">{{$val->package->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Invoice Status <span class="text-danger">*</span></label>
                                <select name="invoice_status" class="form-control" required>
                                    <option selected value="1">Active</option>
                                    <option value="0">In Active</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Invoice Type <span class="text-danger">*</span></label>
                                <select name="invoice_type" class="form-control" required>
                                    <option selected value="Buying New Service">Buying New Service</option>
                                    <option value="Renew Service">Renew Service</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Expiry Date <span class="text-danger">*</span></label>
                                <input type="date" name="expiry_date" require class="form-control">
                            </div>
                            @foreach($purchases as $val)
                            <input type="hidden" name="purchase_id" class="form-control" value="{{$val->id}}">
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group text-left mb-0">
                        <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                            View
                        </button>
                        <button type="reset" class="btn btn-secondary waves-effect waves-light">
                            Cancel
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <table id="datatable-buttons" class="table table-striped table-bordered text-center dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Client Name</th>
                            <th>Service Type</th>
                            <th>Package Type</th>
                            <th>invoice Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{$invoice->client->name}}</td>
                            <td>{{$invoice->purchase->service->title}}</td>
                            <td>{{$invoice->purchase->package->title}}</td>
                            <td>{{$invoice->invoice_type}}</td>
                            <td>
                                <button class="btn btn-warning btn-xs" wire:click="updateData({{$invoice['id']}})"><i class="far fa-edit"></i></button>
                            </td>
                        </tr>
                        @endforeach
                        {{$data}}
                    </tbody>
                </table>

            </div> <!-- end card-box -->
        </div>
        <!-- end col -->
    </div>

</div>