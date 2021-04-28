<!DOCTYPE html>
<html>
    <head>
        <title>Contact</title>
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
    <div class="container py-5">
        @yield('content')
    </div>
</body>
</html>