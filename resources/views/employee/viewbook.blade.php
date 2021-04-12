@extends('layouts.app')
@section('content')
<div class = "contant mt-2">
    <div class="card ">
      <div class="card-header py-1">
			<div class="col-md-12 text-center my-auto">     
				<div class="card-body py-1">
					<a href="addNewbook"class="btn btn-success float-right">New Book </a>
					<a href="{!! route('employee.index')!!}"class="btn btn-primary float-right mr-1">Back</a> 

					{{-- <a href="{!! route('employee.create')!!}"class="btn btn-primary float-right">New</a>  --}}
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
							<th>Book</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
                        {{-- @if(@$datas ) --}}
							@foreach($getRecords as $book)  
								<tr>       									
									<td class = "align-middle"> {{$book->id}}</td>									
									<td class = "align-middle">{{$book->book_name}}</td>									
									<td><a class="btn btn-success" href="{{route('book.edit',$book->id)}}"><i class="fa fa-pencil"></i></a>
									<a class="btn btn-danger" href="{{route('book.delete',$book->id)}}"><i class="fa fa-trash"></a></i>
									</td>
								</tr>
							@endforeach	
                           {{-- @endif --}}
					</tbody>           
				</table>
				 {{$getRecords->links()}} 
			</div>       
		</div>         
      </div>    
    </div>
</div>

@stop


