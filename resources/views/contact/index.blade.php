@extends('contact.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12" style="text-align: center">
            <div >
                <h2>{{__("lange.Contact List")}}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-11">  
            <div class="pull-left">
                 <a href="javascript:void(0)" class="btn btn-success mb-2 create_or_update_contact" data-action="{!! route('contact.create') !!}" id="new-contact" data-toggle="modal"><i class="fa fa-plus" aria-hidden="true"></i></a>
            </div>
        </div>    
        <div class="dropdown" style="float: right;">
            <button class="btn btn-secondary dropdown-toggle mb-4" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-language" aria-hidden="true"></i></button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item"  href="{{ url('lang/en') }}">English</a>
                <a class="dropdown-item"  href="{{ url('lang/de') }}">German</a>
            </div>
        </div> 
    </div>
    <table id="contactTable" class="table table-striped table-bordered" >
            <thead>
                <tr>
                    <th>{{__("lange.ID")}}</th>
                    <th>{{__("lange.First Name")}}</th>
                    <th>{{__("lange.Last Name")}}</th>
                    <th>{{__("lange.Phone Number")}}</th>
                    <th>{{__("lange.Email")}}</th>
                    <th>{{__("lange.Date of Birth")}}</th>
                    <th>{{__("lange.About me")}}</th>
                    <th>{{__("lange.Status")}}</th>
                    <th>{{__("lange.Action")}}</th>
                </tr>
            </thead> 
            <tbody>
                @foreach ($contact  as $contacts)
                    {{-- <tr id="customer_id_{{ $contacts->id }}"> --}}
                        <td>{{ $contacts->id }}</td>
                        <td>{{ $contacts->first_name }}</td>
                        <td>{{ $contacts->last_name }}</td>
                        <td>{{ $contacts->phone_number }}</td>
                        <td>{{ $contacts->email }}</td>
                        <td>{{ $contacts->date_of_birth }}</td>
                        <td>{{ $contacts->about_me }}</td>
                            @if($contacts->status == 1)
                                <td>Active</td>
                            @else
                                <td>Deactive</td>
                            @endif
                        <td>
                            <a href="javascript:void(0)" class="btn btn-success create_or_update_contact" id="edit-contact{!! $contacts->id !!}" data-action="{!! route('contact.edit', [$contacts->id]) !!}" ><i class="fa fa-pencil"></i> </a>
                            <a  href="javascript:void(0)" id="delete-customer{!!  $contacts->id !!}" data-id="{{ $contacts->id }}" class="btn btn-danger delete-user delete-customer"><i class="fa fa-trash"></a></td>
                        </td>                        
                        </tr>
                @endforeach 
            </tbody>         
        </table> 
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
        @if(Session::has('success'))
            <script>
                toastr.success("{!! Session::get('success')!!}");
            </script>
        @endif        
    <div class="modal fade" id="createOrUpdatecontact" aria-hidden="true" ></div>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">   
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#contactTable').DataTable();
            } );  
    </script>
    
   

@endsection
