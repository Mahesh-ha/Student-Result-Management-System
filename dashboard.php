<?php
    include("init.php");
    $no_of_classes=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `class`"));
    $no_of_students=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `student`"));
    $no_of_result=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `result`"));
?>
        
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
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
        <a href="dashboard.php"><img src="./images/logo.png" height="80" width="100" alt="" class="logo"></a>
        <span class="" style="margin-left: 450px;color: #FFA500">Dashboard</span>
        <a href="logout.php" style="color: white;margin-left: 300px ;font-size: 25px;text-decoration: none;color:#ff00ff "><span>Logout</span></a>
    </div>

    <div >
        <ul>
            <li class="dropdown" style="margin-left: 200px;" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn">Classes &nbsp;
                  
                </a>
                <div class="dropdown-content" id="1" >
                    <a href="add_classes.php">Add Class</a>
                    <a href="manage_classes.php">Manage Class</a>
                </div>
            </li>
            <li class="dropdown"style="margin-left: 200px;" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn">Students &nbsp;
                   
                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_students.php">Add Students</a>
                    <a href="manage_students.php">Manage Students</a>
                </div>
            </li>
            <li class="dropdown" style="margin-left: 200px;"onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn">Results &nbsp;
                    
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
            echo '<h3>Number of classes:'.$no_of_classes[0].'</h3>';
            echo '<h3>Number of students:'.$no_of_students[0].'</h3>';
            echo '<h3>Number of results:'.$no_of_result[0].'</h3>';
        ?>
    </div>

</body>
</html>

<?php
   include('session.php');
?>