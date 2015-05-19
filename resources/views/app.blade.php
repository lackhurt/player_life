<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="/style/lib/bootstrap/bootstrap.css"/>
    <script src="/js/lib/jquery/jquery-2.1.3.js"></script>
    <script src="/js/lib/bootstrap/bootstrap.js"></script>
</head>
<body>
<div class="container">
    <div class="page-header">
        <h1>LOGO HERE <small> {{$title}} </small></h1>
    </div>
    <div>
        @yield('content')
    </div>
</div>
</body>
</html>