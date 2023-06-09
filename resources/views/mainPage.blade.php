<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="{{url('css/mystyle.css')}}">
    <link rel="stylesheet" href="{{url('css/all.min.css')}}">
    <link rel="stylesheet" href="{{url('css/lightbox.min.css')}}">
   
    <title>@yield('title')</title>
</head>
<body>
<div class="fontIcon" onclick="moveUp()">
<i class="fas fa-angle-double-up"></i>
</div>

@include('header')

@if (request()->is('/'))
@include('partial.landing')
@endif


<div class="container"> 
@yield('content')
</div>


@include('footer/footer')
<script src="{{url('script/myscript.js')}}"></script>
</body>
</html>