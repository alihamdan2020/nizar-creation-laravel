<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/mystyle.css')}}">
    <link rel="stylesheet" href="{{url('css/all.min.css')}}">
    <link rel="stylesheet" href="{{url('css/lightbox.min.css')}}">

    <title>blogs</title>
    <style>
    </style>
</head>

<body>
@include('header')

<div class="fontIcon" onclick="moveUp()">
<i class="fas fa-angle-double-up"></i>
</div>

<!-- here i got 2 response from portfolio controller, one form name of portfollio and esecond  for all images
first loop read the portfolio and create div for each portfolio and display portfolio name at top ofeach div,
after that  i create a div that contain images for each portfolio-->
<div class="container blogMedia">

@foreach($allBlogs as $blog)
<div class='blogSection'>
    <h1>{{$blog->blogTitle}}</h1>
    <div class="blogdesign">
    <img src='{{url("images/$blog->blogImage")}}'/>
    <p>{{$blog->blogText}}</p>
    </div>
    </div>
@endforeach


</div>



</body>
</html>