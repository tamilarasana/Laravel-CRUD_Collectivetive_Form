@extends('layouts.app')
@section('content')
<div class = "contant mt-2">
    <div class="card ">
      <div class="card-header py-1">
      <div class="col-md-12 text-center my-auto">     
        <div class="card-body py-1">
            
            <a href="{!! route('employee.index')!!}"class="btn btn-primary float-right">Back</a> 
            <h3>Registration Page.</h3>         
          </div> 
      </div>
      </div> 
      <div class= "row">
        <div class= "col-3 col-md-12">           
            <div class="well"> <br>
                {!! Form::open([ 'method'=> 'PATCH','route' => ['employee.update',$employee->id], 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}            
                <fieldset>             
                    <!-- Employee ID -->
                    <div class="form-group row">
                        {!! Form::label('employee_id', 'Employee ID:', ['class'=>'col-md-1 col-form-label text-md-right custom_required']) !!}
                        <div class="col-lg-8">
                            {!! Form::text('employee_id', $employee->employee_id,   ['class' => 'form-control', 'required', 'placeholder' => ' Enter Employee ID']) !!}
                                @if($errors->has('employee_id'))
                                    <span class="text-danger">
                                        <li>Oops!  {{$errors->first('employee_id')}}</li>
                                    </span>
                               @endif 
                        </div>
                    </div>          
                     <!-- Employee Name -->
                    </div>  
                     <div class="form-group row">
                        {!! Form::label('employee_name', 'Employee Name:', ['class'=>'col-md-1 col-form-label text-md-right custom_required']) !!}
                        <div class="col-lg-8">
                            {!! Form::text('employee_name', $employee->employee_name,   ['class' => 'form-control', 'required','placeholder' => 'Employee Name']) !!}
                                @if($errors->has('employee_name'))
                                    <span class="text-danger">
                                        <li>Oops! {{$errors->first('employee_name')}}</li>
                                    </span>
                                @endif
                        </div>
                    </div>          
                     <!-- Employee Phonenumber -->
                     <div class="form-group row">
                        {!! Form::label('phone_number', 'Phonenumber:', ['class'=>'col-md-1 col-form-label text-md-right custom_required']) !!}
                        <div class="col-lg-8">
                            {!! Form::text('phone_number',  $employee->phone_number, ['class' => 'form-control', 'required', 'placeholder' => 'Employee Phonenumber']) !!}
                                @if($errors->has('phone_number'))
                                    <span class="text-danger">
                                        <li>Oops! {{$errors->first('phone_number')}}</li>
                                    </span>
                                @endif
                        </div>
                    </div>          
                     <!-- Email -->
                     <div class="form-group row">
                        {!! Form::label('employee_email', 'Email:', ['class'=>'col-md-1 col-form-label text-md-right custom_required']) !!}
                        <div class="col-lg-8">
                            {!! Form::email('employee_email',  $employee->employee_email, ['class' => 'form-control','required', 'placeholder' => 'Email']) !!}
                                 @if($errors->has('employee_email'))
                                    <span class="text-danger">
                                        <li>Oops! {{$errors->first('employee_email')}}</li>
                                    </span>
                                 @endif
                        </div>

                    </div>  
                     <!-- Radio Buttons -->
                     <div class="form-group row">
                        {!! Form::label('gender', 'Gender:', ['class'=>'col-md-1 col-form-label text-md-right custom_required']) !!}
                        <div class="col-lg-8">
                            <div class="radio">
                                {!! Form::label('male', 'Male.') !!}
                                {!! Form::radio('gender', 'Male',$employee->gender =='Male' ? true : false, ['id' => 'male']) !!}             
                            </div>
                            <div class="radio">
                                {!! Form::label('Female', 'Female.') !!}
                                {!! Form::radio('gender', 'Female',$employee->gender == 'Female' ? true : false, ['id' => 'female']) !!}
                                    @if($errors->has('gender'))
                                        <span class="text-danger">
                                            <li>Oops!  {{$errors->first('gender')}} </li>
                                        </span>
                                    @endif
                             </div>
                        </div>
                    </div>   
                     <!-- Date of Birth -->
                     <div class="form-group row ">
                        {!! Form::label('date_of_birth', 'Date of Birth:', ['class'=>'col-md-1 col-form-label text-md-right custom_required']) !!}
                        <div class="col-lg-8">
                            {!! Form::date('date_of_birth', $employee->date_of_birth, ['class' => 'form-control','required', ]) !!}
                                 @if($errors->has('date_of_birth'))
                                    <span class="text-danger">
                                        <li>Oops!  {{$errors->first('date_of_birth')}} </li>
                                    </span>
                                 @endif
                        </div>
                    </div>    
                     <!-- Department -->         
                    <div class="form-group row">
                        {!! Form::label('select', 'Department:', ['class'=>'col-md-1 col-form-label text-md-right custom_required'] )  !!}
                        <div class="col-lg-8">
                            {!!  Form::select('department', [ '' => 'Select',' fullstack developer' => 'FullStack Developer', 'web developer' => 'Web Developer', 'front end developer' => 'Front end developer', 'tester' => 'Tester'],  $employee->department, ['class' => 'form-control','required',]) !!}
                                @if($errors->has('department'))
                                    <span class="text-danger">
                                        <li>Oops!  {{$errors->first('department')}} </li>
                                    </span>
                                @endif
                        </div>
                    </div>        
                            
                    <!-- Text Area -->
                    <div class="form-group row">
                        {!! Form::label('employee_address', 'Address:', ['class'=>'col-md-1 col-form-label text-md-right custom_required']) !!}
                        <div class="col-lg-8">
                            {!! Form::textarea('employee_address',  $employee->employee_address, ['class' => 'form-control', 'required','rows' => 3]) !!}
                                @if($errors->has('employee_address'))
                                    <span class="text-danger">
                                        <li>Oops!   {{$errors->first('employee_address')}} </li>
                                    </span>
                                @endif
                        </div>
                    </div>  
                    {{-- <div class="form-group row">
                        {!! Form::label('Nbr', __('Name'),array('class'=>'col-md-1 col-form-label text-md-right custom_required')) !!}
                        <div class="col-md-10">
                            {!! Form::text('Nbr',@$departments->Nbr,array('class'=>'form-control','required', 'maxlength' => 50)) !!}
                        </div>
                    </div>            --}}
                    <!-- Image -->         
                    <div class="form-group row">
                        {!! Form::label('employee_image', 'Image:', ['class'=>'col-md-1 col-form-label text-md-right custom_required']) !!}
                        <div class="col-lg-8">
                            {!! Form::file('empolyee_image',  $employee->employee_image, ['class' => 'form-control','required',]) !!}
                                 <img src="/{{ $employee->empolyee_image }}" width="120"/>
                                 {!! Form::hidden('old_image',  $employee->employee_image, ['class' => 'form-control','required',]) !!}
                                 <div class="invalid-feedback">Please Select your Image.</div>
                                @if($errors->has('empolyee_image'))
                                    <span class="text-danger">
                                        <li>Oops! {{$errors->first('empolyee_image')}} </li>
                                    </span>
                                @endif
                        </div>
                    </div>
                   
                                          
                    <!-- Submit Button -->
                    <div class="form-group">
                        <div class="col-lg-8 col-lg-offset-2">
                            {!! Form::submit('Update', ['class' => 'btn btn-md btn-info pull-right'] ) !!}
                        </div>
                    </div>             
                {!! Form::close()  !!}             
            </div>       
        </div>
      </div>   
    </div>
</div>
</div>
@stop