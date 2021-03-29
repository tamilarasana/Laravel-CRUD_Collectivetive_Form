 @extends('layouts.app')
@section('content')
<div class = "contant mt-2">
    <div class="card ">
      <div class="card-header py-1">
       <div class="col-md-12 text-center my-auto">     
         <div class="card-body py-1">
             <a href="viewbook"class="btn btn-primary float-right">Back</a> 
             <h3>Registration Page.</h3>         
           </div> 
        </div>
    </div> 
    <div class= "row">
        <div class= "col-3 col-md-12">           
            <div class="well"> <br>
                {!! Form::open(['route' => 'storeBook', 'id'=>'form','class' => 'needs-validation', 'novalidate', 'enctype' => 'multipart/form-data']) !!}           
                <fieldset> 
                    
                    <!-- Employee ID -->
                    <div class="form-group row">
                        {!! Form::label('book_name', 'Book Name:', ['class'=>'col-md-1 col-form-label text-md-right custom_required']) !!}
                        <div class="col-lg-8">
                            {!! Form::text('book_name', @$book_name   , ['class' => 'form-control', 'required', 'placeholder' => 'Book Name', 'pattern'=> '^[a-z A-Z0-9_.-]*$']) !!}
                            {{-- <div class="invalid-feedback">Please Enter Employee Name.</div>
                                @if($errors->has('employee_name'))
                                    <span class="text-danger">
                                        <li>Oops!  {{$errors->first('employee_name')}}</li>
                                    </span>
                                @endif 
                        </div>                        --}}
                    </div>     
               
                 
                                                        
                    <!-- Submit Button -->
                    <div class="form-group">
                        <div class="col-lg-8 col-lg-offset-2">
                            {!! Form::submit('Submit', ['class' => 'btn btn-md btn-info employeeSave'] ) !!}
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