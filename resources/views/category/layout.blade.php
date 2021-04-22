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
        $('body').on('click', '.delete-category', function () {
            var id= $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            if (confirm("Are You sure want to delete !")) {
        $.ajax({
                 type: "POST",
                     url: `/category/delete/${id}`,
                      data: {
                           "id": id,
                           "_token": token,
                       },
                       dataType:'json',
                        success: function (data) {
                            $('#msg').html('Category deleted successfully');
                            $("#customer_id_" + customer_id).remove();
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                 });
            }
             });
        });

</script>
</html>