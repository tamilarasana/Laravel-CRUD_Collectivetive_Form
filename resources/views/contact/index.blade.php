@extends('contact.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12" style="text-align: center">
            <div >
                <h2> Contact List</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                 <a href="javascript:void(0)" class="btn btn-success mb-2 create_or_update_contact" data-action="" id="new-contact" data-toggle="modal">New Contact</a>
            </div>
        </div>
    </div>
        <div class="dropdown" style="float: right;">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Language</button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item"  href="{{ url('lang/en') }}">English</a>
                <a class="dropdown-item"  href="{{ url('lang/de') }}">German</a>
            </div>
        </div> 
   
    <table id="categoryTable" class="table table-striped table-bordered" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Date of Birth</th>
                    <th>Phone Number</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>          
        </table>  
   @endsection
