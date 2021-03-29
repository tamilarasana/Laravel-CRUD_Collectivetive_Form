@extends('layouts.app')
@section('content')
<div class = "contant mt-2">
    <div class="card ">
      <div class="card-header py-1">
      <div class="col-md-12 text-center my-auto">     
        <div class="card-body py-1">            
            <a href=""class="btn btn-primary float-right">Back</a> 
            <h3>Registration Page.</h3>         
          </div> 
      </div>
      </div> 
      <div class= "row">
        <div class= "col-3 col-md-12">           
            <div class="well"> <br>
                {!! Form::open(['method'=> 'Post','route' =>'book.update','class' => 'needs-validation', 'novalidate', 'enctype' => 'multipart/form-data']) !!}            
                <input type="hidden" name="id" value="{{$book->id}}"/>
                <fieldset>             
                    <!-- Employee ID -->
                    <div class="form-group row">
                        {!! Form::label('book_name', 'Book Name:', ['class'=>'col-md-1 col-form-label text-md-right custom_required']) !!}
                        <div class="col-lg-8">
                            {!! Form::text('book_name',$book->book_name,    ['class' => 'form-control', 'required', 'placeholder' => ' Enter Book Name']) !!}
                     </div>      
                      <!-- Submit Button -->
                    <div class="form-group">
                        <div class="col-lg-8 col-lg-offset-2">
                            {!! Form::submit('Update', ['class' => 'btn btn-md btn-info '] ) !!}
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