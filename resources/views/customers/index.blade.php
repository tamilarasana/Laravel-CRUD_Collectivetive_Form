@extends('customers.layout')
    @section('content')
    <div class="row">
        <div class="col-lg-12" style="text-align: center">
            <div >
                <h2> Category List</h2>
            </div>
            <br/>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a href="javascript:void(0)" class="btn btn-success mb-2" id="new-customer" data-toggle="modal">New Customer</a>
            </div>
        </div>
    </div>
    <br/>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p id="msg">{{ $message }}</p>
    </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Project Name</th>
            <th>Description</th>
            <th>Feature</th>
            <th>Available Quantaty</th>
            <th>Project Number</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Sales Price</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Images</th>
            {{-- <th>Status</th> --}}
            <th width="280px">Action</th>
        </tr>

        @foreach ($customers as $customer)
            <tr id="customer_id_{{ $customer->id }}">
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->project_name }}</td>
                <td>{{ $customer->description }}</td>
                <td>{{ $customer->feature }}</td>
                <td>{{ $customer->available_qty }}</td>
                <td>{{ $customer->project_number }}</td>
                <td>{{ $customer->price }}</td>
                <td>{{ $customer->discount }}</td>
                <td>{{ $customer->sales_price }}</td>
                <td>{{ $customer->start_date }}</td>
                <td>{{ $customer->end_date }}</td>
                <td>{{ $customer->images }}</td>
                <td>
                    <form action="{{ route('customercategory.destroy',$customer->id) }}" method="POST">
                        {{-- <a class="btn btn-info" id="show-customer" data-toggle="modal" data-id="{{ $customer->id }}" >Show</a> --}}
                        <a href="javascript:void(0)" class="btn btn-success" id="edit-customer" data-toggle="modal" data-id="{{ $customer->id }}">Edit </a>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <a id="delete-customer" data-id="{{ $customer->id }}" class="btn btn-danger delete-user">Delete</a></td>
                    </form>
                    </td>
            </tr>
        @endforeach 

    </table>
    {!! $customers->links() !!}
    <!-- Add and Edit customer modal -->
    <div class="modal fade" id="crud-modal" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="customerCrudModal"></h4>
                </div>
                <div class="modal-body">
                   <form name="custForm" action="{{ route('customercategory.store') }}" method="POST">
                         <input type="hidden" name="cust_id" id="cust_id" >
                         @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Project ID:</strong>
                                <input type="text" name="project_category_id" id="project_category_id" class="form-control" placeholder="Project Name" onchange="validate()" >
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Project Name:</strong>
                                <input type="text" name="project_name" id="project_name" class="form-control" placeholder="Project Name" onchange="validate()" >
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Description:</strong>
                                <input type="textarea" name="description" id="description" class="form-control" placeholder="Description" onchange="validate()">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Feature:</strong>
                                <input type="textarea" name="feature" id="feature" class="form-control" placeholder="feature" onchange="validate()" onkeypress="validate()">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Available Quantaty:</strong>
                                <input type="text" name="available_qty" id="available_qty" class="form-control" placeholder="Available Quantaty" onchange="validate()" onkeypress="validate()">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Project Number:</strong>
                                <input type="text" name="project_number" id="project_number" class="form-control" placeholder="Project Number" onchange="validate()" onkeypress="validate()">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Price:</strong>
                                <input type="text" name="price" id="price" class="form-control" placeholder="Price" onchange="validate()" onkeypress="validate()">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Discount:</strong>
                                <input type="text" name="discount" id="discount" class="form-control" placeholder="Discount" onchange="validate()" onkeypress="validate()">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Sales Price:</strong>
                                <input type="text" name="sales_price" id="sales_price" class="form-control" placeholder="Sales Price" onchange="validate()" onkeypress="validate()">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Start Date:</strong>
                                <input type="date" name="start_date" id="start_date" class="form-control" placeholder="Start Date" onchange="validate()" onkeypress="validate()">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>End Date:</strong>
                                <input type="date" name="end_date" id="end_date" class="form-control" placeholder="End Date" onchange="validate()" onkeypress="validate()">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Images:</strong>
                                <input type="text" name="images" id="images" class="form-control" placeholder="Images" onchange="validate()" onkeypress="validate()">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Status:</strong>
                                <input type="text" name="status" id="status" class="form-control" placeholder="Status" onchange="validate()" onkeypress="validate()">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" >Submit</button>
                            <a href="" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Show customer modal -->
    <div class="modal fade" id="crud-modal-show" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                     <h4 class="modal-title" id="customerCrudModal-show"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-2"></div>
                        <div class="col-xs-10 col-sm-10 col-md-10 ">
                            @if(isset($customer->name))
                            <table>
                                <tr><td><strong>Name:</strong></td><td>{{$customer->name}}</td></tr>
                                <tr><td><strong>Email:</strong></td><td>{{$customer->email}}</td></tr>
                                <tr><td><strong>Address:</strong></td><td>{{$customer->address}}</td></tr>
                                <tr><td colspan="2" style="text-align: right "><a href="{{ route('customers.index') }}" class="btn btn-danger">OK</a> </td></tr>
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
error=false

// function validate()
// {
// 	if(document.custForm.name.value !='' && document.custForm.email.value !='' && document.custForm.address.value !='')
// 	    document.custForm.btnsave.disabled=false
// 	else
// 		document.custForm.btnsave.disabled=true
// }
</script>