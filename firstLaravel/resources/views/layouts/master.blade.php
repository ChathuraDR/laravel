<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Arizonia' rel='stylesheet' type='text/css'>

    <!-- facades, needs when including files in nested folders other than that public folder which create absolute path when including files => {{ URL::to('path of your file') }}-->
    <link rel="stylesheet" href="{{ URL::to('css/style.css') }}">
</head>
<body>
<!-- include partial "header" -->
@include('partials.header')
<div class="container">
    <!-- define a hook -->
    @yield('content')
</div>
</body>
</html>
