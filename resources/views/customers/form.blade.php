<div class="modal-body">
    <div class="col-xs-12 col-sm-12 col-md-12">       
        {!! Form::label('project_category_id', 'Project Category:' )  !!}
        {!! Form::select('project_category_id', $categories,  @$project->project_category_id, ['class' => 'form-control', 'required','placeholder' => 'Project Category',  'pattern'=> '^[a-zA-Z0-9_.-]*$' ]) !!}
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">       
        {!! Form::label('project_name', 'Project Name:' )  !!}
        {!! Form::text('project_name', @$project->project_name, ['class' => 'form-control', 'required','placeholder' => 'Project Name',  'pattern'=> '^[a-zA-Z0-9_.-]*$' ]) !!}
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        {!! Form::label('description', 'Description:' )  !!}
        {!! Form::textarea('description', @$project->description, ['class' => 'form-control', 'required','placeholder' => 'Description',  'pattern'=> '^[a-zA-Z0-9_.-]*$' ]) !!}
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        {!! Form::label('feature', 'Feature:' )  !!}
        {!! Form::textarea('feature', @$project->feature, ['class' => 'form-control', 'required','placeholder' => 'Feature',  'pattern'=> '^[a-zA-Z0-9_.-]*$' ]) !!}
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        {!! Form::label('available_qty', 'Available Quantaty:' )  !!}
        {!! Form::text('available_qty', @$project->available_qty, ['class' => 'form-control', 'required','placeholder' => 'Available Quantaty',  'pattern'=> '^[a-zA-Z0-9_.-]*$' ]) !!}
        @if($errors->has('available_qty'))
            <span class="text-danger">
             <li>Oops! {{$errors->first('available_qty')}} </li>
            </span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        {!! Form::label('project_number', 'Project Number:' )  !!}
        {!! Form::text('project_number', @$project->project_number, ['class' => 'form-control', 'required','placeholder' => 'Project Number',  'pattern'=> '^[a-zA-Z0-9_.-]*$' ]) !!}
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        {!! Form::label('price', 'Price:' )  !!}
        {!! Form::text('price', @$project->price, ['class' => 'form-control', 'required','placeholder' => 'Price',  'pattern'=> '^[a-zA-Z0-9_.-]*$' ]) !!}
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        {!! Form::label('discount', 'Discount:' ) !!}
        {!! Form::text('discount', @$project->discount, ['oninput'=>"cal()", 'class' => 'form-control', 'required','placeholder' => 'Discount',  'pattern'=> '^[a-zA-Z0-9_.-]*$' ]) !!}
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        {!! Form::label('sales_price', 'Sales Price:' )  !!}
        {!! Form::text('sales_price', @$project->sales_price, ['id' => 'sales_price', 'class' => 'form-control', 'required','placeholder' => 'Sales Price',  'pattern'=> '^[a-zA-Z0-9_.-]*$','disabled' ]) !!}
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        {!! Form::label('start_date', 'Start Date:' )  !!}
        {!! Form::text('start_date', @$project->start_date, ['class' => 'form-control', 'required','placeholder' => 'Start Date',  'id' => 'start_date']) !!}
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        {!! Form::label('end_date', 'End Date:' )  !!}
        {{-- @php
        print_r($project->end_date);
        @endphp --}}
        {!! Form::text('end_date', @$project->end_date, ['class' => 'form-control', 'required','placeholder' => 'End Date',  'id'=> 'end_date', ]) !!}
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Images:</strong>
            <input type="file"  name="images" id="images" class="form-control" placeholder="Images"    value="{!! @$project->images !!}">
            <div class="invalid-feedback">Please Select Image.</div>
            @if($errors->has('images'))
                <span class="text-danger">
                <li>Oops! {{$errors->first('images')}}</li>
                </span>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-10 col-md-12">       
        {!! Form::label('status', 'Status:', ['class'=>'col-md-1 col-form-label text-md-right custom_required'] )  !!}
        {!!  Form::select('status', [ '' => 'Select','1' => 'Active', '2' => 'Deactive'],@$project->status, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="modal-footer">
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" >Submit</button>
        <a href="javascript:;"  data-dismiss="modal" class="btn btn-danger">Cancel</a>
    </div>
</div>

