<!DOCTYPE html>
<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    </head>
    <body>
        <div class="continer">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                          <a href="newCategory" class="btn btn-success mb-2" id="new-customer" data-toggle="modal">New Customer</a>
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
                                    {{-- <th>Status</th> --}}
                                    <th width="280px">Action</th>
                                 </tr>
                            </thead>  
                            <tbody>
                                @foreach($category as $catageory)
                                <tr>
                                    <td>{{$catageory->id}}</td>
                                    <td>{{$catageory->name}}</td>
                                    {{-- <td>{{$catageory->status}}</td> --}}
                                    <td><button class="edit-modal btn btn-info" data-toggle="modal" onClick="editemployee({{$catageory->id}})"  data-target="#employeeEditModel"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                                        <button class="delete-modal btn btn-danger"data-info="{{$catageory->id}},{{$catageory->name}}"><span class="glyphicon glyphicon-trash"></span> Delete</button></td>                                                                   
                                 </tr>
                                 @endforeach
                            </tbody>
                        </table>
                    </div>
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
       
         
    </body>
</html>
