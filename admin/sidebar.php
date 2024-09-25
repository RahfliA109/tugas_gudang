<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        body{
            margin:0;
            padding:0;
        }
        
        .sidebar{
            width:150px;
            background-color:black;
            color:orangered;
            text-decoration:none;
            height:100vh;
            position: fixed;
        }

        li{
            margin-bottom:40px;
        }

        li a{
           text-decoration:none;
           color:orangered;
        }

        .logout{
           position: absolute;
           bottom:10px;
        }
        .tampil{
            margin-left:170px;

        }

        h1 a{
            text-decoration:none;
           color:orangered;
        }
        .navbar{
            width:100%;
            background-color:black;
            color:orangered;
            padding:2px;
            position: relative;
            margin-bottom:10px;
            display:flex;
        }


        .navbar h1{
            margin-left:10px
        }

        table{
            background-color:black;
            width:100%;
        }
        table tr{
            background-color:orangered;
        }

        table td{
            background-color:white;
            padding:10px;
        }

    </style>
</head>
<body>
    <div class="sidebar">
        <ul>
           <h1><a href="dashboard.php">Menu</a></h1>
            <li><a href="inventory.php">Inventory</a></li>
            <li><a href="storage.php">Storage</a></li>
            <li><a href="supplier.php">Supplier</a></li>
       <div class="logout"><li><a href="../index.php">KELUAR</a></li> </div>

            
        </ul>
    </div>
    
</body>
</html>