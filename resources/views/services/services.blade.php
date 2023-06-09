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
    <title>Services</title>

    <style>
        .serviceImageSection {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        img {
            width: 100px;
        }

        .serviceSection h1 {
            text-transform: uppercase;
        }

        .serviceSection {
            margin-top: 100px;
        }

        .serviceDesc {
            line-height: 50px;
            font-size: 24px;
            color: goldenrod;
            font-weight: bolder;
        }
    </style>
</head>

<body>
    @include('header')

    <div class="fontIcon" onclick="moveUp()">
        <i class="fas fa-angle-double-up"></i>
    </div>
    <div class="container">
        <!-- here i got 2 response from $service controller, one form name of portfollio and esecond  for all images
first loop read the $service and create div for each $service and display $service name at top ofeach div,
after that  i create a div that contain images for each $service-->
        @foreach($allservices as $service)
        <div class='serviceSection' id="{{$service->id}}">
            <h1>{{$service->serviceName}}</h1>
            <div class="serviceImageSection">
                @foreach($allserviceimages as $serviceImage)
                @if($service->id==$serviceImage->serviceId)
                <a href='{{url("images/$serviceImage->serviceImage")}}' data-lightbox="{{$service->id}}">
                <img src='images/{{$serviceImage->serviceImage}}' data-id="{{$service->id}}">
    </a>
                @endif
                @endforeach
            </div>
                <p class="serviceDesc">

                    <?php
                    $a = explode(':', $service->serviceDesc);
                    $counter=1;
                    if (count($a) == 1)
                        echo $a[0];
                    else {
                        for ($i = 0; $i < count($a); $i++)
                            if ($i == 0)
                                echo "<p class='serviceDesc'>" . $a[$i] . ":</p>";
                            else {
                               
                                if (strlen($a[$i]) < 25)
                                {
                                    echo "<p class='serviceDesc' style='color:green'>" .$counter. '-'. $a[$i] . ":</p>";
$counter++;
                                }
                                else
                                    echo "<p class='serviceDesc' style='color:red'>" . $a[$i] . "</p>";
                            }
                    }



                    ?>
                </p>
            

        </div>

        @endforeach

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