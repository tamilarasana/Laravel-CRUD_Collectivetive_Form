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
    
      {{-- @if(count($errors-> all()))
            <div class="alert alert-danger">
               <ul>
                  @foreach($errors->all() as $error)
                   <li>Oops! {{$error}}</li>
                  @endforeach
                </ul>
            </div>
            @endif --}}

      <div class= "row">
        <div class= "col-3 col-md-12">           
            <div class="well"> <br>
                {!! Form::open(['route' => 'employee.store', 'id'=>'form','class' => 'needs-validation', 'novalidate', 'enctype' => 'multipart/form-data']) !!}           
                <fieldset>             
                    <!-- Employee ID -->
                    <div class="form-group row">
                        {!! Form::label('employee_id', 'Employee ID:', ['class'=>'col-md-1 col-form-label text-md-right custom_required']) !!}
                        <div class="col-lg-8">
                            {!! Form::text('employee_id', @$employee_id, ['class' => 'form-control', 'required','placeholder' => ' Enter Employee ID',  'pattern'=> '^[a-zA-Z0-9_.-]*$' ]) !!}
                            <div class="invalid-feedback">Please enter Employee ID.</div>
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
                            {!! Form::text('employee_name', @$employee_name, ['class' => 'form-control', 'required', 'placeholder' => 'Employee Name', 'pattern'=> '^[a-zA-Z0-9_.-]*$']) !!}
                            <div class="invalid-feedback">Please enter Employee Name.</div>
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
                            {!! Form::text('phone_number', @$phone_number, ['class' => 'form-control', 'placeholder' => 'Employee Phonenumber']) !!}
                           
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
                            {!! Form::email('employee_email', @$employee_email, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                           
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
                                {!! Form::radio('gender', 'Male', false, ['id' => 'male']) !!}             
                            </div>
                            <div class="radio">
                                {!! Form::label('Female', 'Female.') !!}
                                {!! Form::radio('gender', 'Female', false, ['id' => 'Female']) !!}
                            </div>
                                @if($errors->has('gender'))
                                    <span class="text-danger">
                                        <li>Oops!  {{$errors->first('gender')}} </li>
                                    </span>
                                @endif
                        </div>
                    </div>   

                     <!-- Date of Birth -->
                     <div class="form-group row ">
                        {!! Form::label('date_of_birth', 'Date of Birth:', ['class'=>'col-md-1 col-form-label text-md-right custom_required']) !!}
                        <div class="col-lg-8">
                            {!! Form::date('date_of_birth', @$date_of_birth, ['class' => 'form-control', ]) !!}
                           
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
                            {!!  Form::select('department', [ '' => 'Select',' fullstack developer' => 'FullStack Developer', 'web developer' => 'Web Developer', 'front end developer' => 'Front end developer', 'tester' => 'Tester'],  'S', ['class' => 'form-control',]) !!}
                            
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
                            {!! Form::textarea('employee_address', @$employee_address = null, ['class' => 'form-control', 'rows' => 3]) !!}
                             
                                @if($errors->has('employee_address'))
                                    <span class="text-danger">
                                        <li>Oops!{{$errors->first('employee_address')}} </li>
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
                        {!! Form::label('empolyee_image', 'Image:', ['class'=>'col-md-1 col-form-label text-md-right custom_required']) !!}
                        <div class="col-lg-8">
                            {!! Form::file('empolyee_image', @$empolyee_image, ['class' => 'form-control']) !!}
                           
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
                            {!! Form::submit('Submit', ['class' => 'btn btn-md btn-info pull-right employeeSave'] ) !!}
                        </div>
                    </div>             
                {!! Form::close()  !!}    
                <script>
                    (function() {
                    'use strict';
                      window.addEventListener('load', function() {               
                        var forms = document.getElementsByClassName('needs-validation');  
                        var validation = Array.prototype.filter.call(forms, function(form) {
                          form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                              event.preventDefault();
                              event.stopPropagation();
                              }
                            form.classList.add('was-validated');
                          }, false);
                        });
                      }, false);
                    })();
                  </script>         
            </div>       
        </div>
      </div>   
    </div>
</div>
</div>


@stop