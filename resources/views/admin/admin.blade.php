<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mystyle.css">
    <link rel="stylesheet" href="{{url('css/all.min.css')}}">
    <link rel="shortcut icon" href="{{url('images/logo.png')}}" type="image/x-icon">
    <title>Admin Log In</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        img {
            width: 200px;
            position: absolute;
            top: 20px;
            left: 20px
        }

        body {
            background-color: gray;
        }

        a {
            font-size: 24px;
            text-decoration-line: none;
            color: goldenrod;
        }

        .main {
            background-color: gray;
            margin: 0 auto;
            width: 80vw;
        }

        .notice {
            font-size: 24px;
            text-transform: capitalize;
            font-weight: bold;
            padding: 20px 30px;
            display: inline-block;
            line-height: 60px;
        }

        .forms {
            background-color: goldenrod;
            padding: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            width: 50%;
        }

        .smallForm {
            display: flex;
            flex-direction: row
        }

        .label {
            display: block;
            margin: 10px 0px;
            font-weight: bold;
            color: black;
            text-transform: capitalize;
        }

        input {
            padding: 5px;
            border: 0px;
            outline: none;
        }

        input[type=submit] {
            margin: 30px 0px;
            background-color: transparent;
            border: 3px solid white;
            color: black;
            padding: 10px;
            cursor: pointer;
        }

        .adminImage {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 200px;
        }

        table a {
            color: white
        }

        form label {
            margin: 5px 0px;
            width: 50%;
        }

        form input,
        select {
            margin: 5px 0px;
            width: 50%;
        }

        .smallForm {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            width: 100%;
            gap: 20px;
            align-items: center;
        }

        .smallForm input[type=text] {
            width: 80%;
            height: 20px;
            padding: 20px;
        }
        .fas{
            color:red;
        }
        .far{
            font-size: 20px;
            color:black;
        }
    </style>
</head>

<body>
    <img src="{{url('/images/logo.png')}}">

    <div class="main">


        @if (session()->has("message"))

        <div>
            <h1 align="center">ADMIN DASHBOARD</h1>
            <p><a href="{{route('index')}}">Home</a></p>
            <p><a href="{{route('logout')}}">Log oUt</a></p>


            <div class="forms">
                <h1>Add new portfolio</h1>
                <form action="{{route('addNewPortfolio')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="portfolio">Portfolio Name</label>
                    <input type="text" name="portfolioName" id="portfolio">
                    <span>
                        @error('portfolioName')
                        {{$message}}
                        @enderror
                    </span>
                    <label for="portfolioImage">portfolio image</label>
                    <input type="file" name="portfolioImage" id="portfolioImage">
                    <span>
                        @error('portfolioImage')
                        {{$message}}
                        @enderror
                    </span>
                    <input type="submit" value="submit">
                </form>

                <h2>All Portfolios</h2>
                <table border="1" width="90%">
                    @foreach($allportfolios as $portfolio)
                    <tr>
                        <td>{{$portfolio->portfolioName}}</td>
                        <td align="center"><a href="delete/{{$portfolio->id}}"><i class="fas fa-trash-alt"></i></a></td>
                        <td>
                            <form class="smallForm" action="update/{{$portfolio->id}}" method="POST">@csrf<input type="text" name="portfolioName" value="{{$portfolio->portfolioName}}">
                                <button type="submit"><i class="far fa-edit"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>

            <div class="forms">
                <h1>Add Images for portfolio</h1>
                <form action="{{route('addPortfolioImages')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label>Portfolio Name</label>
                    <select id="sel" name="portfolioId" style="height:40px">
                        @foreach($allportfolios as $portfolio)
                        <option value="{{$portfolio->id}}">{{$portfolio->portfolioName}}</option>
                        @endforeach
                    </select>

                    <label>portfolio image</label>
                    <input type="file" name="portfolioImage[]" multiple>
                    <span>
                        @error('portfolio Image')
                        {{$message}}
                        @enderror
                    </span>
                    <input type="submit" value="submit">

                </form>
            </div>
            <hr>
            <div class="forms">
                <h1>Add new services</h1>
                <form action="{{route('addNewService')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label>Service Name</label>
                    <input type="text" name="serviceName" id="service"/>
                    <span>
                        @error('serviceName')
                        {{$message}}
                        @enderror
                    </span>
                    <label>service description</label>
                    <textarea id="serviceDescription" name="serviceDescription" rows="4" cols="50">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque recusandae odio voluptatem neque, libero voluptatibus necessitatibus velit sunt, inventore et tempora. Enim consequuntur quas delectus animi dolor illo, reiciendis natus.       </textarea>
                    <span>
                        @error('serviceDescription')
                        {{$message}}
                        @enderror
                    </span>
                    <label>service image</label>
                    <input type="file" name="serviceImage">
                    <span>
                        @error('serviceImage')
                        {{$message}}
                        @enderror
                    </span>
                    <input type="submit" value="submit">
                </form>
            </div>
            <hr>
            
            <div class="forms">
                <h1>Add Images for services</h1>
                <form action="{{route('addServicesImages')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label>Services Name</label>
                    <select id="sel" name="serviceId" style="height:40px">
                        @foreach($allservices as $service)
                        <option value="{{$service->id}}">{{$service->serviceName}}</option>
                        @endforeach
                    </select>

                    <label>service image</label>
                    <input type="file" name="serviceImage[]" multiple>
                    <span>
                        @error('portfolio Image')
                        {{$message}}
                        @enderror
                    </span>
                    <input type="submit" value="submit">

                </form>
            </div>
            
            <hr>
            <div class="forms">
                <h1>Add a Blog</h1>
                <form action="{{route('addBlogs')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="blogName">Blog Title</label>
                    <input type="text" name="blogTitle" id="blogname">
                    @error("blogTitle")
                    {{message}}
                    @enderror
                    <label for="blogImage">Image</label>
                    <input type="file" name="blogImage">
                    <label for="blogText"></label>
                    <textarea name="blogText" id="" cols="30" rows="10"></textarea>
                    @error("blogText")
                    {{message}}
                    @enderror
                    <input type="submit" value="submit">
                </form>
            </div>
        </div>

        @else
        <div class="notice">
            <span>Not Logged In, You shhoul Log in first</span>
            <p><a href="{{route('loginpage')}}">Log In</a></p>
        </div>
        @endif
    </div>