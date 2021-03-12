@extends('layouts.app')
@section('content')
<div class = "contant mt-2">
    <div class="card ">

      @if(Session::has('success'))
      <div class="alert alert-success">
          {{ Session::get('success') }}
          @php
              Session::forget('success');
          @endphp
      </div>
      @endif
      
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
                <th colspan="2" class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
             
                @if(@$employee )
                @foreach($employee as $employees)  
                    <tr>         
                      <td>{{$employees->employee_id}}</td>
                      <td>{{$employees->employee_name}}</td>
                      <td>{{$employees->phone_number}}</td>
                      <td>{{$employees->employee_email}}</td>
                      <td>{{$employees->gender}}</td>
                      <td>{{$employees->date_of_birth}}</td>
                      <td>{{$employees->department}}</td>
                      <td>{{$employees->employee_address}}</td>
                      <td>
                        <img src="{{ $employees->empolyee_image }}" width="100"/>
                      </td>
                      <td class="text-right"><a class="btn btn-success"  href="{{route('employee.edit',$employees->id)}}">Edit</a></td>
                      <td class="text-left">
                        <a>
                          {!! Form::open([ 'method'=> 'DELETE ','action' => ['EmployeeController@destroy',$employees->id], 'class' => 'form-horizontal']) !!} 
                          {!! Form::hidden('_method', 'DELETE')!!}
                          {!! Form::submit('Delete',['class'=> 'btn btn-danger'])!!}
                          {!! Form::close()!!}
                        </a>
                      </td>
                      {{-- <td> <a class="btn btn-success"  href="{{route('employee.edit',$employees->id)}}">Edit</a></td> --}}
                        {{-- <td> <a class="btn btn-success"  href="{{route('employee.edit',$employees->id)}}">Edit</a> --}}
                        <!-- <td><a class="btn btn-success"  href="/employee/{{$employees -> id}}/edit">Edit</a>&nbsp; -->
                      {{-- <td>
                        <a>
                          {!! Form::open([ 'method'=> 'DELETE ','action' => ['EmployeeController@destroy',$employees->id], 'class' => 'form-horizontal']) !!} 
                          {!! Form::hidden('_method', 'DELETE')!!}
                          {!! Form::submit('Delete',['class'=> 'btn btn-danger'])!!}
                          {!! Form::close()!!}
                        </a>
                      </td> --}}
                    </tr>
                    @endforeach
                @endif    
            </tbody>
          </table>
        </div>
      </div>   
    </div>
</div>
</div>
@stop