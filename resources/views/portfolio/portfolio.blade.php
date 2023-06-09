<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/mystyle.css')}}">
    <link rel="stylesheet" href="{{url('css/all.min.css')}}">
    <link rel="stylesheet" href="{{url('css/lightbox.min.css')}}">
    <link rel="shortcut icon" href="{{url('images/logo.png')}}" type="image/x-icon">
    <title>Portfolio</title>
    <style>
        .portfolioImageSection {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap:10px;
        }

        .portfolioSection h1 {
            text-transform: uppercase;
            padding: 10px 0px;
        }

        .portfolioSection {
            margin-top: 100px;
        }
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
<div class="container">

@foreach($allportfolio as $portfolio)
<div class='portfolioSection'>
    <h1 id="{{$portfolio->id}}">{{$portfolio->portfolioName}}</h1>
    <div class="portfolioImageSection" id="{{$portfolio->id}}">
        @foreach($allportfoliosImages as $portfolioImage)
        @if($portfolio->id==$portfolioImage->portfolioId)

        <a href='{{url("images/$portfolioImage->portfolioImage")}}' data-lightbox="{{$portfolio->id}}">
            <div>
                <img src='{{url("images/$portfolioImage->portfolioImage")}}' style="width:100%" />
            </div>
        </a>

        @endif
        @endforeach
    </div>

</div>
@endforeach
</div>


@include('footer/footer')
<script src="{{url('script/lightbox-plus-jquery.min.js')}}" type="text/javascript"></script>
<script src="{{url('script/myscript.js')}}"></script>
<script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true,
        'albumLabel': '',
        'disableScrolling': true

    })
</script>

</body>
</html>