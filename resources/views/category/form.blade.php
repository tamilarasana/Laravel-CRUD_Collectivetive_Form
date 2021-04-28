
<div class="modal-body">   
    <div class="col-xs-12 col-sm-12 col-md-12">       
        {!! Form::label('name',  trans('lange.Name') )  !!}
        {!! Form::text('name', @$category->name, ['class' => 'form-control', 'required','placeholder' => 'Category Name',  'pattern'=> '^[a-zA-Z0-9_.-]*$' ]) !!}
    </div>   
</div>

<div class="modal-footer">
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
   <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" >{{__("lange.Submit")}}</button>
   <a href="javascript:;"  data-dismiss="modal" class="btn btn-danger">{{__("lange.Cancel")}}</a>
</div>
</div>