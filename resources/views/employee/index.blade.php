@extends('layouts.app')
@section('content')
<div class = "contant mt-2">
    <div class="card ">

      {{-- @if(Session::has('success'))
      <div class="alert alert-success">
          {{ Session::get('success') }}
          @php
              Session::forget('success');
          @endphp
      </div>
      @endif --}}

      
      <div class="card-header py-1">
      <div class="col-md-12 text-center my-auto">     
        <div class="card-body py-1">
            <a href="{!! route('employee.create')!!}"class="btn btn-primary float-right">New</a> 
            <h3>Employee Details</h3>         
          </div> 
      </div>
      </div> 
      <div class= "row">
        <div class= "col-3 col-md-12">
          <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Department</th>
                <th>Address</th>
                <th>Image</th>
                <th colspan="3" class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
             
                @if(@$employee )
                @foreach($employee as $employees)  
                    <tr>       
                      <tr id= "sid{{$employees->id}}">  
                      <td class = "align-middle">{{$employees->employee_id}}</td>
                      <td class = "align-middle">{{$employees->employee_name}}</td>
                      <td class = "align-middle">{{$employees->phone_number}}</td>
                      <td class = "align-middle">{{$employees->employee_email}}</td>
                      <td class = "align-middle">{{$employees->gender}}</td>
                      <td class = "align-middle">{{$employees->date_of_birth}}</td>
                      <td class = "align-middle">{{$employees->department}}</td>
                      <td class = "align-middle">{{$employees->employee_address}}</td>
                      <td>
                        <img src="{{ $employees->empolyee_image }}" width="100"/>
                      </td>
                      <td class="text-right"><a class="btn btn-success" href="{{route('employee.edit',$employees->id)}}"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-success" data-bs-toggle="modal" onClick="editemployee({{$employees->id}})"  data-bs-target="#employeeModel"><i class="fa fa-pencil"></i></a>

                        <a class="btn btn-danger" href="{{route('employee.deleteRec',$employees->id)}}"><i class="fa fa-trash"></a></i></td>
                      <!-- <td class="text-right"><a class="btn btn-success"  href="/download/{{$employees->id}}">Download</a></td> -->
                      {{-- <td class="text-left">
                        <a>
                         
                          {!! Form::open([ 'method'=> 'DELETE ','action' => ['EmployeeController@destroy',$employees->id], 'class' => 'form-horizontal']) !!} 
                          {!! Form::hidden('_method', 'DELETE')!!}
                          {!! Form::submit('',['class'=> 'btn btn-danger'])!!}
                          {!! Form::close()!!}
                        </a>
                      </td> --}}
                    </tr>
                    @endforeach
                @endif    
            </tbody>           
          </table>
          {{$employee->links()}}         
        </div>       
      </div>         
    </div>    
 </div>
</div>


<!-- Modal -->
<div class="modal fade" id="employeeModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Address</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form  id ="empployeeForm">
          @csrf
          <input type="hidden" id="id" name="id"/>
            <div class="form-group">
               <label for ="address">Address</label>
               <input type ="textarea" name ="employee_address" class ="form-control" rows = 3  id="employee_address"/>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

@if(Session::has('success'))
<script>
      toastr.success("{!! Session::get('success')!!}");
  // swal("great job!","{!! Session::get('success') !!}", "success",{
  //   button:"OK",
  // }) 
  </script>
      
  <script>
         function editemployee(id){
           alert("hello");
         $.get('/employee.update/'+id,function(employee){
           $("#id").val(employee.id);
           $("#employee_address").val(employee.employee_address)
           $("#employeeModel").model('toggle');
         } )
       }
    </script>
@endif
@stop


