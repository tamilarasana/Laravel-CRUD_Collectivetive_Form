<!DOCTYPE html>
<html>
    <head>
        <title>Contact</title>      
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="{!! URL('/vendor/jquery-validate/jquery.validate.min.js') !!}"></script>
        <script src="{!! URL('/vendor/jquery-validate/additional-methods.min.js') !!}"></script>
            @if(app()->getLocale() != 'en'))
            <script src="{!! URL('/vendor/jquery-validate/localization/messages_'.app()->getLocale().'.min.js') !!}"></script>
            @endif    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
        rel = "stylesheet">
        <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 
    </head>
    <style>
        label.error {
             color: #dc3545;
             font-size: 14px;
        }
    </style>
   <body>
        <div class="container py-5">
            @yield('content')
        </div>
    </body> 
    {{--This Script is used to show the Create or Update Form--}}
    <script>
        $(document).ready(function () {      
            $("body").on("click", ".create_or_update_contact", function(e) { 
                var action = $(this).attr('data-action');
                var $inventSubmodal = $("#createOrUpdatecontact");
                if(typeof action != 'undefined'){
                    $inventSubmodal.load( action, function(response) {
                        $inventSubmodal.modal('show');
                        $("#contact_form").validate();
                        $( "#date_of_birth" ).datepicker({
                             dateFormat:"dd.mm.yy",
                            firstDay: 1
                        });
                    });
                }
            });       
        });  
        $('body').on('click', '.delete-customer', function () {
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            if(confirm("Are You sure want to delete !")){
                $.ajax({
                type: "POST",
                        url: `/contact/delete/${id}`,
                        dataType:'json',
                        data : {"_token":"{{ csrf_token() }}"},
                            success: function (response) {
                                location.reload(null, false);
                                console.log(response)
                            },
                            error: function (error) {
                                console.log(error);
                            }        
                });
            }
        });
    </script>     
</html>


            
             
           
            