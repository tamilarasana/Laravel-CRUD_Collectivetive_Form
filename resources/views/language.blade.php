<!DOCTYPE html>
<html>
<head>
    <title>How to Create Multi Language Website in Laravel - Online Web Tutor Blog</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row" style="text-align: center;margin-top: 40px;">
            <h2>How to Create Multi Language Website in Laravel - Online Web Tutor Blog</h2><br>
            <div class="col-md-2 col-md-offset-3 text-right">
                <strong>Select Language: </strong>
            </div>
            <div class="col-md-4">
                <select class="form-control Langchange">
                    <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                    <option value="es" {{ session()->get('locale') == 'es' ? 'selected' : '' }}>Spanish</option>
                </select>
            </div>
            <h1 style="margin-top: 80px;">{{ __('message.page_title') }}</h1>
            <h2 style="margin-top: 80px;">{{ __('message.welcome_message') }}</h2>
            <h3 style="margin-top: 80px;">{{ __('message.author_information') }}</h3>
        </div>
    </div>
</body>

<script type="text/javascript">
    var url = "{{ route('LangChange') }}";
    $(".Langchange").change(function(){
        window.location.href = url + "?lang="+ $(this).val();
    });
</script>
</html>