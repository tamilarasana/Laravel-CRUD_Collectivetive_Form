@extends('layouts.app')
@section('content')
<div class = "contant mt-2">
    <div class="card ">
      <div class="card-header py-1">
			<div class="col-md-12 text-center my-auto">     
				<div class="card-body py-1">
					<a href="viewbook"class="btn btn-success float-right">View Book</a> 
					<a href="{!! route('employee.create')!!}"class="btn btn-primary float-right  mr-1">New</a> 
					<h3>Employee Details</h3>         
				</div> 
			</div>
		</div> 
		<div class= "row">
			<div class= "col-3 col-md-12">
				<table class="table table-hover">
					<thead class="thead-dark">
						<tr>
							<th>ID</th>
							<th>Employee ID</th>
							<th>Employee Name</th>
							<th>Phone Number</th>
							<th>Email</th>
							<th>Gender</th>
							<th>Date of Birth</th>
							<th>Department</th>
							<th>Book</th>
							<th>Address</th>
							<th>Image</th>
							<th colspan="3" class="text-center">Actions</th>
						</tr>
					</thead>
					<tbody>
						@if(@$employee )
							@foreach($employee as $employees)  
								<tr>       
									<tr id= "sid_{{$employees->id}}"> 
									<td class = "align-middle"> {{$employees->id}}</td>
									<td class = "align-middle">{{$employees->employee_id}}</td>
									<td class = "align-middle">{{$employees->employee_name}}</td>
									<td class = "align-middle">{{$employees->phone_number}}</td>
									<td class = "align-middle">{{$employees->employee_email}}</td>
									<td class = "align-middle">{{$employees->gender}}</td>
									<td class = "align-middle">{{$employees->date_of_birth}}</td>
									<td class = "align-middle">{{$employees->department}}</td>
									<td class = "align-middle">
									@foreach ($employees->empbook as $key => $value) 
										{{-- echo ($value->book_name); --}}
									{{-- <dl>{{ $value->book_name}}</dl>  --}}
									<dd>{{ $value->book_name}}</dd>
									@endforeach
									</td>
									<td class = "align-middle">	{{$employees->employee_address}}</td>
									<td>
										<img src="{{ $employees->empolyee_image }}" width="100"/>
									</td>								
									<td class="text-right"><a class="btn btn-success" href="{{route('employee.edit',$employees->id)}}"><i class="fa fa-pencil"></i></a>
										<a class="btn btn-success" data-toggle="modal" onClick="editemployee({{$employees->id}})"  data-target="#employeeEditModel">Edit</a>
										<a class="btn btn-danger" href="{{route('employee.deleteRec',$employees->id)}}"><i class="fa fa-trash"></a></i>
									</td>
								</tr>	 	 	
							@endforeach
						@endif    
					</tbody>           
				</table>
				{{$employee->links()}} 
			</div>       
		</div>         
      </div>    
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="employeeEditModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add New Address</h5>
				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form  id ="empployeeEditForm">
				@csrf
				<input type="hidden" id="id" name="id"/>
					<div class="form-group">
						<label for ="address">Address</label>
						<input type ="textarea" name ="employee_address" class ="form-control" rows = 3  id="employee_address"/>
					</div>
				</div>
		    <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id= "updateaddress">Save changes</button>
		   </div> 
		</div>
    </div>	
</div>
{{-- <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script> --}}
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
	{!! Toastr::message() !!}
	@if(Session::has('success'))
		<script>
			toastr.success("{!! Session::get('success')!!}");
		</script>
	@endif
<script>
	function editemployee(id){
		$.get('/emp/'+id,function(employee){
			$("#id").val(id);
			$("#employee_address").val(employee.employee_address)
			$("#employeeEditModel").modal('show');
		});
	} 
	$('#updateaddress').click(function (e) {
		$.ajax({
			url:"{{ route('address.update') }}",
			type:"post",
			data:{
				"_token": "{{ csrf_token() }}",
				'employee_address': $("#employee_address").val(),
				'id' : $("#id").val(),
			},
			success:function(response){
				// alert("success");
				location.reload();
			}
		});
	});
 </script>
@stop


