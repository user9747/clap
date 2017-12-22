<!DOCTYPE html>
<html>
<head>
<title>@yield('title')</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel='stylesheet' href={{URL::to('src/css/dashboard.css')}}>
</head>
<body>
@yield('content')
</body>
<script src={{URL::to('src/js/app.js')}}></script>
</html>