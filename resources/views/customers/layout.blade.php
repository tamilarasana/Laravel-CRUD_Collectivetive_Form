<!DOCTYPE html>
<html>
<head>
    <title>Project</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
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
</head>
<body>
    <div class="container-fluid">
        @yield('content')
    </div>
</body>
<script>
    $(document).ready(function () {
    
        $("body").on("click", ".create_or_update_project", function(e) {
            var action = $(this).attr('data-action');
            var $inventSubmodal = $("#createOrUpdateProject");
            if(typeof action != 'undefined'){
                $inventSubmodal.load( action, function(response) {
                    $inventSubmodal.modal('show');
                    $("#project_form").validate();
                    $( "#start_date,#end_date" ).datepicker({
               dateFormat:"dd.mm-yy",
               firstDay: 1
            });
                });
            }
           
        });

        /* Delete customer */
        $('body').on('click', '.delete-customer', function () {
            var customer_id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            confirm("Are You sure want to delete !");
        $.ajax({
                 type: "DELETE",
                     url: "http://127.0.0.1:8000/project/"+customer_id,
                      data: {
                           "id": customer_id,
                           "_token": token,
                       },
                        success: function (data) {
                            $('#msg').html('Customer entry deleted successfully');
                            $("#customer_id_" + customer_id).remove();
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                 });
             });
        });

        function cal() {
            var price = $("input[name='price']").val()
            var discount = $("input[name='discount']").val()
            var calcprice = (price - (price*discount/100)).toFixed(2);
            document.getElementById('sales_price').value = calcprice
        }
       
    //  var $price = $("input[name='price']"),
    //     $discount = $("input[name='discount']"),
    //     $total_cost = $("input[name='sales_price']"),

    //     function calculateprice (){
    //         alert('in')
            // var discount = $(this).val();
            // var price = $price.val();
            // var calcprice = (price - (price*discount/100)).toFixed(2);
            // total_cost.val(calcprice);
        // }
     
  
</script>
</html>