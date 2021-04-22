<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="customerCrudModal">Create Category</h4>
        </div>
        {!! Form::open(['route' => 'category.store','name'=>'project_form', 'id'=>'project_form','class' => 'needs-validation ', 'novalidate', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) !!}     

        @include('category.form')
         {!! Form::close()  !!} 
    </div>
    
</div>