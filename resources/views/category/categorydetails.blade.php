<!DOCTYPE html>
<!-- Font Awesome JS -->
{{-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
        @if(\Session::has('success'))
        <div class="alert alert-success">
            <p>{{\Session::get('success')}}</p>
        </div>
        @endif
        <div class="continer">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"> New </button>
                        </div>
                </div>
                <br/>                     
                 <div class="col-md-12">
                     <h2 align="center">Category </h2>                                                
                        <table id="categoryTable" class="table table-hover table-striped">                        
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th width="280px">Action</th>
                                 </tr>
                            </thead>  
                            <tbody>
                                @foreach($category as $catageory)
                                <tr>
                                    <td>{{$catageory->id}}</td>
                                    <td>{{$catageory->name}}</td>
                                    <td><a class="edit-modal btn btn-info" href="{{route('category.edit',$catageory->id)}}"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                        <a class="delete-modal btn btn-danger" href="{{route('category.delete',$catageory->id)}}"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>                                                                   
                                    </tr>
                                 @endforeach
                            </tbody>
                        </table>
                    </div>
                 </div> 
            </div> 
         </div>
        <!--Add  Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Name</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['route' => 'category.store', 'id'=>'form','class' => 'needs-validation', 'novalidate', 'enctype' => 'multipart/form-data']) !!}           
                        <div class="modal-body">
                            <div class="form-group">
                                <label for ="name">Name</label>
                                {!! Form::text('name', @$name   , ['class' => 'form-control', 'required', 'placeholder' => 'Name', 'pattern'=> '^[a-z A-Z0-9_.-]*$']) !!}
                                <div class="invalid-feedback">Please enter Name.</div>
                                @if($errors->has('name'))
                                    <span class="text-danger">
                                        <li>Oops! {{$errors->first('name')}}</li>
                                    </span>
                                @endif
                        </div>
                                <div class="modal-footer">
                                     <div class="form-group">
                                        <div class="col-lg-8 col-lg-offset-2">
                                   {!! Form::submit('Submit', ['class' => 'btn btn-md btn-info employeeSave'] ) !!}
                                </div>
                    {!! Form::close()  !!} 
                </div>
            </div>
        </div>
        <script type="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://datatables.yajrabox.com/js/jquery.min.js"></script>
        <script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
            $('#categoryTable').DataTable();
        } );  
        </script>
        <script>
            (function() {
            'use strict';
              window.addEventListener('load', function() {               
                var forms = document.getElementsByClassName('needs-validation');  
                var validation = Array.prototype.filter.call(forms, function(form) {
                  form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                      event.preventDefault();
                      event.stopPropagation();
                      }
                    form.classList.add('was-validated');
                  }, false);
                });
              }, false);
            })();
          </script>  
          
          <script>
                function previewFile(input) {
                    var file = $("input[type=file]").get(0).files[0];
                        if (file) {
                            var reader = new FileReader();
                                reader.onload = function() {
                                $('#previewImg').attr("src", reader.result);
                                }
                            reader.readAsDataURL(file);
                       }
                }
          </script>
    </body>
</html>
