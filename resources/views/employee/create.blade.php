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
                {!! Form::open(['route' => 'employee.store', 'id'=>'form','class' => 'needs-validation', 'novalidate', 'enctype' => 'multipart/form-data']) !!}           
                <fieldset> 
                    <div class="form-group row">
                        {!! Form::label('employee_id', 'Employee ID:', ['class'=>'col-md-1 col-form-label text-md-right custom_required']) !!}
                        <div class="col-lg-8">
                            {!! Form::text('employee_id', @$employee_id, ['class' => 'form-control', 'required','placeholder' => ' Enter Employee ID',  'pattern'=> '^[a-zA-Z0-9_.-]*$' ]) !!}
                            <div class="invalid-feedback">Please enter Employee ID.</div>
                                @if($errors->has('employee_id'))
                                    <span class="text-danger">
                                        <li>Oops! {{$errors->first('employee_id')}}</li>
                                    </span>
                                @endif
                        </div>
                    </div>           
                    <!-- Employee ID -->
                    <div class="form-group row">
                        {!! Form::label('employee_name', 'Employee Name:', ['class'=>'col-md-1 col-form-label text-md-right custom_required']) !!}
                        <div class="col-lg-8">
                            {!! Form::text('employee_name', @$employee_id, ['class' => 'form-control', 'required', 'placeholder' => 'Employee Name', 'pattern'=> '^[a-z A-Z0-9_.-]*$']) !!}
                            <div class="invalid-feedback">Please Enter Employee Name.</div>
                                @if($errors->has('employee_name'))
                                    <span class="text-danger">
                                        <li>Oops!  {{$errors->first('employee_name')}}</li>
                                    </span>
                                @endif 
                        </div>                       
                    </div>     
                     <!-- Employee Phonenumber -->
                     <div class="form-group row">
                        {!! Form::label('phone_number', 'Phonenumber:', ['class'=>'col-md-1 col-form-label text-md-right custom_required']) !!}
                        <div class="col-lg-8">
                            {!! Form::text('phone_number', @$phone_number, ['class' => 'form-control', 'required','placeholder' => 'Employee Phonenumber']) !!}
                               <div class="invalid-feedback">Please Enter Phone Number.</div>
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
                            {!! Form::email('employee_email', @$employee_email, ['class' => 'form-control','required', 'placeholder' => 'Email']) !!}
                            <div class="invalid-feedback">Please Enter Email.</div>
                                 @if($errors->has('employee_email'))
                                    <span class="text-danger">
                                        <li>Oops! {{$errors->first('employee_email')}}</li>
                                    </span>
                                 @endif
                        </div>
                    </div>  
                     <!-- Radio Buttons -->
                    <div class="form-group row">
                        {!! Form::label('gender', 'Gender:', ['class'=>'col-md-1 col-form-label text-md-right custom_required',]) !!}
                        <div class="invalid-feedback">Please Enter Gender.</div>
                        <div class="col-lg-8">
                            <div class="radio">
                                {!! Form::radio('gender', 'Male',  false, ['required'=>'required']) !!} 
                                {!! Form::label('male', 'Male.') !!}            
                            </div>
                            <div class="radio">
                                {!! Form::radio('gender', 'Female', false, ['required'=>'required']) !!}
                                {!! Form::label('Female', 'Female.') !!}
                                <div class="invalid-feedback">Please Enter Gender.</div> 
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
                            {!! Form::date('date_of_birth', @$date_of_birth, ['class' => 'form-control','required' ]) !!}
                            <div class="invalid-feedback">Please Enter Your Date Of Birth.</div>
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
                            {!!  Form::select('department', [ '' => 'Select',' fullstack developer' => 'FullStack Developer', 'web developer' => 'Web Developer', 'front end developer' => 'Front end developer', 'tester' => 'Tester'],'', ['class' => 'form-control','required']) !!}
                            <div class="invalid-feedback">Please Select Your Department.</div>
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
                            {!! Form::textarea('employee_address', @$employee_address = null, ['class' => 'form-control','required', 'rows' => 3]) !!}
                            <div class="invalid-feedback">Please Enter Your Address.</div>
                                @if($errors->has('employee_address'))
                                    <span class="text-danger">
                                        <li>Oops!{{$errors->first('employee_address')}} </li>
                                    </span>
                                @endif
                        </div>
                    </div>                          
                    <div class="form-group row">
                        {!! Form::label('empolyee_image', 'Image:', ['class'=>'col-md-1 col-form-label text-md-right custom_required']) !!}
                        <div class="col-lg-8">
                            {{-- {!! Form::file('empolyee_image',['onchange'=>'previewFile(this)']) !!} --}}
                            {!! Form::file('empolyee_image', ['required' ,'onchange'=>'previewFile(this)']) !!}
                            {{-- {!! Form::file('empolyee_image', @$empolyee_image,null, ['class' => 'form-control','required' ,'onchange'=>'previewFile(this)']) !!} --}}
                            <img id="previewImg" style="max-width:120px;margin-top:30px;">
                            <div class="invalid-feedback">Please Select Your Image.</div>
                            @if($errors->has('empolyee_image'))
                                <span class="text-danger">
                                    <li>Oops! {{$errors->first('empolyee_image')}} </li>
                                </span>
                            @endif
                        </div>                        
                    </div>  
                    
                    {{-- mulltiselect --}}
                     <div class="form-group row">
                        {!! Form::label('book_name', 'Book:', ['class'=>'col-md-1 col-form-label text-md-right custom_required']) !!}
                        <div class="col-lg-8">
                            {!!  Form::select('book_name[]',$book,null,['class'=>'selectpicker','multiple data-live-search'=>true]) !!}   
                                                                    
                    </div>  

                    <!-- Submit Button -->
                    <div class="form-group">
                        <div class="col-lg-8 col-lg-offset-2">
                            {!! Form::submit('Submit', ['class' => 'btn btn-md btn-info employeeSave','on'=>'previewFile(this)'] ) !!}
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
                  
                  <script>
                        function previewFile(input) {
                            var file = $("input[type=file]").get(0).files[0];
                                if (file) {
                                    var reader = new FileReader();
                                        reader.onload = function() {
                                        $('#previewImg').attr("src", reader.result);
                                        }
                                    reader.readAsDataURL(file);
                               }
                        }
                  </script>
             </div>       
          </div>
       </div>   
    </div>
  </div>
</div>
@stop