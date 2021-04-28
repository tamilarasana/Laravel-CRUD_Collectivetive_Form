<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="customerCrudModal">Create Project</h4>
        </div>
        {!! Form::open(['route' => 'project.store','name'=>'project_form', 'id'=>'project_form','class' => 'needs-validation', 'novalidate', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) !!}     

            @include('customers.form')
            {!! Form::close()  !!} 
    </div>    
</div>