<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->


       <link rel="stylesheet" href="{{ url('public/css/app.css') }}">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #0A4D79;
            height: 100vh;
        }
        #login .container #login-row #login-column #login-box {
            margin-top: 120px;
            max-width: 600px;
            height: 320px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
        }
        #login .container #login-row #login-column #login-box #login-form {
            padding: 20px;
        }
        #login .container #login-row #login-column #login-box #login-form #register-link {
            margin-top: -85px;
        }
        .btn-info {
            color: #fff;
            background-color: #0A4D79;
            border-color: #0A4D79;
        }
        .text-info {
            color: #0A4D79!important;
        }
        .form-control {
            border:1px solid #0A4D79;
        }
        .form-control:focus {
            border:1px solid #0A4D79;
        }
    </style>
</head>
<body>
    @yield('content')
    <script src="{{ url('public/js/app.js') }}"></script>
</body>
</html>
