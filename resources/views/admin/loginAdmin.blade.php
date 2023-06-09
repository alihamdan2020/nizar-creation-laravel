<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mystyle.css">
    <title>Admin Log In</title>
    <style>
        *{
            padding:0;
            margin:0;
        }
        .main{
            height:100vh;
            display:flex;
            justify-content: center;
            align-items: center;
            background-color: gray;
        }
        form{
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            width:600px;
            background-color:goldenrod;
            padding: 50px 0px 50px 20px;    
        }
        .label{
            display: block;
            margin:10px 0px;
            font-weight: bold;
            color:black;
            text-transform: capitalize;
        }
        input{
            padding:5px;
            border:0px;
            outline:none;
        }
        input[type=submit]{
            margin: 30px 0px;
            background-color: transparent;
            border:3px solid white;
            color:black;
            padding:10px;
            cursor:pointer;
        }
        .adminImage{
            position: absolute;
            top:20px;
            left:20px;
            width:200px;
        }
    </style>
</head>
<body>
    <div class="main">
        <img src='{{url("images/logo.png")}}' class="adminImage">
        <form action="{{route('login')}}" method="post">
            @csrf
            <div class="userName">
                <label class="label" for="userName">User Name</label>
                <input type="text" name="username" id="userName"/>
            </div>
            <div class="password">
                <label class="label" for="password">password</label>
                <input type="password" name="password" id="password"/>
            </div>
            <div class="submit">
                <input type="submit" value="Log In">
            </div>
            <div class="error">
            <span>
                    {{
                        session()->get("message")
                    }}
                </span>
            </div>
        </form>
    </div>
</body>
</html>