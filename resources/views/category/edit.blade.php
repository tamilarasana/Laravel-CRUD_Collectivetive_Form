<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="customerCrudModal">Edit Category</h4>
        </div>
                {!! Form::open(['route' => array('category.update',[$category->id]) , 'autocomplete' => 'off', 'method' => 'PUT', 'name'=>'project_form', 'id'=>'project_form','class' => 'needs-validation', 'novalidate', 'enctype' => 'multipart/form-data']) !!}     
                @include('category.form')
                {!! Form::close()  !!} 
    </div>
</div>