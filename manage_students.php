<!DOCTYPE html>
<html lang="en">
<head>
   <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type='text/css' href="css/manage.css">
    <title>Dashboard</title>-->
     <style type="text/css">
        
        body{
                margin: 0;
                font-family: 'Roboto';
                background-color: black;
                color: white;
            }

        .main{
            border-radius: 10px;
            border-width: 5px;
            border-style: solid;
            padding: 20px;
            margin: 7% 20% 0 20%;
        }
        .title{
                height: 80px;
                display: flex;
                font-size: 3em;
                color: white;
                align-items: center;
               
            }
                    ul{
                list-style-type: none;
                margin: 30px 0;
                padding: 0;
                display: flex;
                overflow: hidden;
                    
                border-style: solid;
                border-width: 1px 0 1px 0;
            }


            li a,.dropbtn{
                display: inline-block;
                text-decoration: none;
                color: white;
                height: 40px;
                display: flex;
                align-items: center;
                padding: 5px 50px;
            }

li a:hover, .dropdown:hover {
    background-color: #61892f
}

li.dropdown {
    display: inline-block;
}

.dropdown-content{
    display: none;
    position: absolute;
    background-color:  #474b4f;
}

.dropdown-content a {
    color: white;
    text-decoration: none;
    display: flex;
    align-items: center;

}

.dropdown:hover .dropdown-content {
    display: block;
}
    </style>
</head>
<body>
        
    <div class="title">
        <a href="dashboard.php"><img src="./images/logo.png" height="80" width="100" class="logo"></a>
        <span class="heading" style="margin-left: 450px;color: #FFA500">Dashboard</span>
        <a href="logout.php" style="color: white;margin-left: 300px ;font-size: 25px;text-decoration: none;color:#ff00ff"><span>Logout</span></a>
    </div>

    <div class="nav">
        <ul>
            <li class="dropdown" style="margin-left: 200px;" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn">Classes &nbsp
                    
                </a>
                <div class="dropdown-content" id="1">
                    <a href="add_classes.php">Add Class</a>
                    <a href="manage_classes.php">Manage Class</a>
                </div>
            </li>
            <li class="dropdown" style="margin-left: 200px;" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn">Students &nbsp
                    
                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_students.php">Add Students</a>
                    <a href="manage_students.php">Manage Students</a>
                </div>
            </li>
            <li class="dropdown"  style="margin-left: 200px;" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn">Results &nbsp
                    
                </a>
                <div class="dropdown-content" id="3">
                    <a href="add_results.php">Add Results</a>
                    <a href="manage_results.php">Manage Results</a>
                </div>
            </li>
        </ul>
    </div>

    <div class="main">
        <?php
            include('init.php');
            include('session.php');

            $sql = "SELECT `name`, `rno`, `class_name` FROM `student`";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
               echo "<center><table cellpadding='10' style='width:100%'>
                <caption style='font-size: 30px;color:#E9967A'>Manage Students</caption>
                <tr style='background-color:#A9A9A9;color:black'>
                <th>NAME</th>
                <th >ROLL NO</th>
                <th>CLASS</th>
                </tr>";

                while($row = mysqli_fetch_array($result))
                  {
                    echo "<tr align='center'style='background-color:#A9A9A9;color:black'>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['rno'] . "</td>";
                    echo "<td>" . $row['class_name'] . "</td>";
                    echo "</tr>";
                  }

                echo "</table></center>";
            } else {
                echo "0 Students";
            }
        ?>
    </div>

</body>
</html>
