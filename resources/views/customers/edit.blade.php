<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="customerCrudModal">Edit Project</h4>
        </div>
            {!! Form::open(['route' => array('customercategory.update',[$project->id]) , 'autocomplete' => 'off', 'method' => 'PUT', 'name'=>'project_form', 'id'=>'project_form','class' => 'needs-validation', 'novalidate', 'enctype' => 'multipart/form-data']) !!}     
               @include('customers.form')
            {!! Form::close()  !!} 
    </div>
</div>