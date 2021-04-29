@extends('customers.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12" style="text-align: center">
            <div >
                <h2> Project List</h2>
            </div>
            <br/>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a href="javascript:void(0)" class="btn btn-success mb-2 create_or_update_project" data-action="{!! route('project.create') !!}" id="new-customer" data-toggle="modal">New Project</a>
            </div>
        </div>
    </div>
    <br/>
    @if ($cust = Session::get('success'))
    <div class="alert alert-success">
        <p id="msg">{{ $cust }} </p>
    </div>
    @endif
    {{-- <table id="categoryTable" class="table table-striped table-bordered" > --}}
        <table id="categoryTable" class="table table-striped table-bordered" >
            <thead>
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
                    <th>Status</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers  as $customer)
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
                            @if($customer->status == 1)
                                <td>Active</td>
                            @else
                                <td>Deactive</td>
                            @endif
                        <td>
                            <a href="javascript:void(0)" class="btn btn-success create_or_update_project" id="edit-customer{!! $customer->id !!}"  data-id="{{ $customer->id }}" data-action="{!! route('project    .edit', [$customer->id]) !!}" >Edit </a>
                            <a id="delete-customer{!!  $customer->id !!}" data-id="{{ $customer->id }}" class="btn btn-danger delete-user delete-customer">Delete</a></td>
                        </td>
                    </tr>
                @endforeach 
            </tbody>
        </table>   
    <div class="modal fade" id="createOrUpdateProject" aria-hidden="true" ></div>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    {{-- <script src="https://datatables.yajrabox.com/js/jquery.min.js"></script> --}}
    <script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
            $('#categoryTable').DataTable();
             } );  
        </script>
@endsection
