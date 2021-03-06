@extends('category.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12" style="text-align: center">
            <div >
                <h2>{{__("lange.Category List")}}</h2>
            </div>
            <br/>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a href="javascript:void(0)" class="btn btn-success mb-2 create_or_update_project" data-action="{!! route('category.create') !!}" id="new-customer" data-toggle="modal">{{__("lange.New category")}}</a>
            </div>
        </div>
    </div>
    <div class="dropdown" style="float: right;">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Language
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item"  href="{{ url('lang/en') }}">English</a>
          <a class="dropdown-item"  href="{{ url('lang/de') }}">German</a>
        </div>
      </div>
    <br/>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p id="msg">{{ $message }}</p>
        </div>
    @endif
    <table id="categoryTable" class="table table-striped table-bordered" >
        <div class="col-md-12">                                              
            {{-- <table id="categoryTable" class="table table-hover ">--}}
            <thead>
                <tr>
                    <th>{{__("lange.Id")}}</th>
                    <th>{{__("lange.Name")}}</th>
                    <th width="280px">{{__("lange.Action")}}</th>
                </tr>
            </thead>  
            <tbody>
                @foreach($category as $catageory)
                    <tr>
                        {{-- <tr id="catageory_id{{ $catageory->id }}"> --}}
                        <td>{{$catageory->id}}</td>
                        <td>{{$catageory->name}}</td>
                        <td>
                            <a href="javascript:void(0)" class="btn btn-success create_or_update_project" id="edit-customer{!! $catageory->id !!}"  data-id="{{ $catageory->id }}" data-action="{!! route('category.edit', [$catageory->id]) !!}" >{{__("lange.Edit")}}</a>
                            <a href="" id="delete-category{!!  $catageory->id !!}" data-id="{{ $catageory->id }}" class="btn btn-danger delete-user delete-category create_or_update_project">{{__("lange.Delete")}}</a></td>
                        </td>                                                                  
                    </tr>
                @endforeach
            </tbody>
            {{-- </table> --}}
        </div>
    </table>
    <!-- Add and Edit customer modal -->
    <div class="modal fade" id="createOrUpdateProject" aria-hidden="true" >   
    </div>
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
