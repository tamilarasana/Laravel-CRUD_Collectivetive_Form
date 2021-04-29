<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
             <h4 class="modal-title">Update Contact</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>           
        </div>
            {!! Form::open(['route' => array('contact.update',[$contacts->id]) , 'autocomplete' => 'off', 'method' => 'PUT', 'name'=>'contact_form', 'id'=>'contact_form','class' => 'needs-validation', 'novalidate', 'enctype' => 'multipart/form-data']) !!}     
                @include('contact.form')
            {!! Form::close()  !!} 
    </div>
</div>