<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <form wire:submit.prevent="storePurchaseService" method="post" class="parsley-examples" novalidate="">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Client Name <span class="text-danger">*</span></label>
                                <select wire:model="client" name="client" class="form-control" required>
                                    <option value="">Select Client</option>
                                    @foreach($clients as $val)
                                    <option value="{{$val->id}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                                @error('client')<ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{{$message}}</li>
                                </ul>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Service <span class="text-danger">*</span></label>
                                <select wire:model="service" name="service" class="form-control" required>
                                    <option value="">Select Service</option>
                                    @foreach($services as $val)
                                    <option value="{{$val->id}}">{{$val->title}}</option>
                                    @endforeach
                                </select>
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
                                <select wire:model="package" name="package" class="form-control" required>
                                    <option value="">Select package</option>
                                    @foreach($packages as $val)
                                    <option value="{{$val->id}}">{{$val->title}}</option>
                                    @endforeach
                                </select>
                                @error('package')<ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{{$message}}</li>
                                </ul>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Package Duration <span class="text-danger">*</span></label>
                                <input type="number" wire:model="duration" name="duration" min="1" max="12" parsley-trigger="change" required placeholder="Enter Month" class="form-control">
                                @error('duration')<ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{{$message}}</li>
                                </ul>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Actual price <span class="text-danger">*</span></label>
                                <select wire:model="package" disabled name="package" class="form-control" required>
                                    <option value="">Select price</option>
                                    @foreach($packages as $val)
                                    <option value="{{$val->id}}">{{$val->price}}</option>
                                    @endforeach
                                </select>
                                @error('package')<ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{{$message}}</li>
                                </ul>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Our Offer <span class="text-danger">*</span></label>
                                <input type="text" wire:model="ouroffer" name="ouroffer" parsley-trigger="change" required placeholder="Enter Amount" class="form-control">
                                @error('ouroffer')<ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{{$message}}</li>
                                </ul>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date <span class="text-danger">*</span></label>
                                <input type="date" wire:model="date" name="date" parsley-trigger="change" required placeholder="Enter Month" class="form-control">
                                @error('date')<ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{{$message}}</li>
                                </ul>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status <span class="text-danger">*</span></label>
                                <select wire:model="status" name="status" class="form-control" required>
                                    <option value="">Select package</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                @error('status')<ul class="parsley-errors-list filled" id="parsley-id-5">
                                    <li class="parsley-required">{{$message}}</li>
                                </ul>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-left mb-0">
                        <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                            Submit
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
                            <th>ClientName</th>
                            <th>Service Type</th>
                            <th>Package Type</th>
                            <th>Package Duration</th>
                            <th>Our Offer</th>
                            <th>Purchased Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchase_services as $purchase_service)
                        <tr>
                            <td>{{$purchase_service->client->name}}</td>
                            <td>{{$purchase_service->service->title}}</td>
                            <td>{{$purchase_service->package->title}}</td>
                            <td>{{$purchase_service->duration}}</td>
                            <td>{{$purchase_service->our_offer}}</td>
                            <td>{{$purchase_service->purchased_date}}</td>
                            <td>
                                <a class="btn btn-success btn-xs" href="{{ route('purchases.show',$purchase_service-> id) }}">
                                    <i class="fas fa-check-square"></i>
                                </a>
                                <button class="btn btn-warning btn-xs" wire:click="updateData({{$purchase_service['id']}})"><i class="far fa-edit"></i></button>
                                <button wire:click="deleteData({{$purchase_service->id}})" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div> <!-- end card-box -->
        </div>
        <!-- end col -->
    </div>
    @if($message = Session::get('success'))
    <script>
        $.toast({
            heading: "Well done!",
            text: "{!! $message !!}",
            position: "top-right",
            loaderBg: "#5ba035",
            icon: "success",
            hideAfter: 3e3,
            stack: 1
        })
    </script>
    @endif

    @if($message = Session::get('error'))
    <script>
        $.toast({
            heading: "Oh snap!",
            text: "{!! $message !!}",
            position: "top-right",
            loaderBg: "#bf441d",
            icon: "error",
            hideAfter: 3e3,
            stack: 1
        })
    </script>
    @endif
</div>