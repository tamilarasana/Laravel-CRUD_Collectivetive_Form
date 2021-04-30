<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
             <h4 class="modal-title" >{{__("lange.Create Contact")}}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
           
        </div>
        {!! Form::open(['route' => 'contact.store','name'=>'contact_form', 'id'=>'contact_form','class' => 'needs-validation', 'novalidate', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) !!}     
            @include('contact.form')
            {!! Form::close()  !!} 
    </div>    
</div>