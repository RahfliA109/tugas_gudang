<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body{
            display:flex;
            justify-content:center;
            align-items:center;
        }
        form{
            width:350px;
            background-color:black;
            position: relative;
            top:250px;
            padding:20px;
            height:auto;
            box-sizing:border-box;
            border-radius:20px;
        }

        .judul{
            text-align:center;
            color:orangered;
            margin-bottom:20px;
        }

        input[type="text"],input[type="password"]{
            width:97%;
            height: 40px;
            margin-bottom: 25px;
            text-align:center;
            border-radius:20px;
        }
        button{
            width:100%;
            height:40px;
            background-color:orangered;
            border-radius:20px;
        }

        button:hover{
            background-color:gray;
            color:black;
        }



    </style>
</head>
<body>
    <form action="loginproses.php" method="post">
        <div class="judul">
            <h1>Login Gudang</h1>
        </div>
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password"  placeholder="password">
        <button type="submit">submit</button>
    </form>
    
</body>
</html>