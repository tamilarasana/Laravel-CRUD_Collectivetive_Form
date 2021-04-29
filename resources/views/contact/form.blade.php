<div class="modal-body">   
    <div class="row">
        <div class="col-md-4">      
            {!! Form::label('first_name', trans('lange.First Name') )  !!}  
            {!! Form::text('first_name',@$contacts->first_name, ['class' => 'form-control', 'required','placeholder' => trans('lange.First Name'),  'pattern'=> '^[a-zA-Z.-]*$' ]) !!}
        </div>    
        <div class="col-md-4">      
            {!! Form::label('last_name', trans('lange.Last Name') )  !!}  
            {!! Form::text('last_name', @$contacts->last_name, ['class' => 'form-control', 'required','placeholder' => trans('lange.Last Name'),  'pattern'=> '^[a-zA-Z.-]*$' ]) !!}
        </div> 
        <div class="col-md-4">      
            {!! Form::label('phone_number', trans('lange.Phone Number') )  !!}  
            {!! Form::text('phone_number', @$contacts->phone_number, ['class' => 'form-control', 'required','placeholder' => trans('lange.Phone Number'),  'pattern'=> '^[a-zA-Z0-9_.-]*$' ]) !!}
        </div>     
        <div class="col-md-4 py-4">      
            {!! Form::label('email',trans('lange.Email'))  !!}  
            {!! Form::email('email', @$contacts->email, ['class' => 'form-control', 'required','placeholder' => trans('lange.Email') ]) !!}
        </div>  
        <div class="col-md-4 py-4">      
            {!! Form::label('date_of_birth',trans('lange.Date of Birth'))  !!}  
            {!! Form::text('date_of_birth', @$contacts->date_of_birth, ['class' => 'form-control','placeholder' => trans('lange.Date of Birth'),  'required','id' =>'date_of_birth']) !!}
        </div>  
        <div class="col-md-4 py-4">      
            {!! Form::label('about_me', trans('lange.About me'))  !!}  
            {!! Form::text('about_me', @$contacts->about_me, ['class' => 'form-control', 'required','placeholder' => trans('lange.About me'),  'pattern'=> '^[a-zA-Z0-9_.-]*$' ]) !!}
        </div>  
        <div class="col-md-4 ">      
            {!! Form::label('status',  trans('lange.Status'))  !!}  
            {!! Form::text('status', @$contacts->status, ['class' => 'form-control', 'required','placeholder' => ' Status',  'pattern'=> '^[a-zA-Z0-9_.-]*$' ]) !!}
        </div>     
    </div>
</div>
<div class="modal-footer">
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" >{{__("lange.Submit")}}</button>
        <a href="javascript:;"  data-dismiss="modal" class="btn btn-danger">{{__("lange.Cancel")}}</a>
    </div>
</div>


