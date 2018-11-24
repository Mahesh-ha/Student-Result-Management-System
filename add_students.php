<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Students</title>
    <style type="text/css">
                     body{
                margin: 0;
                font-family: 'Roboto';
                background-color: black;
                color: white;
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
input[type=text]{
    width: 80%;
    padding: 10px;
    margin: 5px  20px ;
    line-height: 1.5;
    display: inline-block;
    border :none;
    background-color: #ADD8E6;
}

</style>
</head>
<body>
        
 <div class="title">
        <a href="dashboard.php"><img src="./images/logo.png" height="80" width="100" class="logo"></a>
        <span class="heading" style="margin-left: 450px;color: #FFA500">Dashboard</span>
        <a href="logout.php" style="color: white;margin-left: 300px ;font-size: 25px;text-decoration: none;color:#ff00ff"><span >Logout</span></a>
    </div>

    <div >
        <ul>
            <li class="dropdown"style="margin-left: 200px;" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn">Classes &nbsp;
                  
                </a>
                <div class="dropdown-content" id="1">
                    <a href="add_classes.php">Add Class</a>
                    <a href="manage_classes.php">Manage Class</a>
                </div>
            </li>
            <li class="dropdown" style="margin-left: 200px;"onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn">Students &nbsp;

                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_students.php">Add Students</a>
                    <a href="manage_students.php">Manage Students</a>
                </div>
            </li>
            <li class="dropdown"style="margin-left: 200px;" onclick="toggleDisplay('3')">
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
        <form action="" method="post">
            <fieldset style="width: 500px;height: 300px;margin-left: 290px;">
                <center>
                <p align="center" style="font-size: 30px;color:#E9967A">Add Student</p><br>
                <input type="text" name="student_name" placeholder="Student Name" >
                <input type="text" name="roll_no" placeholder="Roll No"  ><br>
                <?php
                    include('init.php');
                    include('session.php');
                    
                    $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
                        echo '<select name="class_name" style="width:85%; font-size:20px;background-color: #ADD8E6;">';
                        echo '<option selected disabled >Select Class</option>';
                    while($row = mysqli_fetch_array($class_result)){
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select><br><br>'
                ?>
                <input type="submit" value="Submit" style="font-size: 20px;background-color: #9400D3;color: white;border-color: #E6E6FA;border-width: 3px ;width:80%">
                </center>
            </fieldset>
        </form>
    </div>

</body>
</html>

<?php

    if(isset($_POST['student_name'],$_POST['roll_no'])) {
        $name=$_POST['student_name'];
        $rno=$_POST['roll_no'];
        if(!isset($_POST['class_name']))
            $class_name=null;
        else
            $class_name=$_POST['class_name'];

        // validation
        if (empty($name) or empty($rno) or empty($class_name) or preg_match("/[a-z]/i",$rno) or !preg_match("/^[a-zA-Z ]*$/",$name)) {
            if(empty($name))
                echo '<p class="error">Please enter name</p>';
            if(empty($class_name))
                echo '<p class="error">Please select your class</p>';
            if(empty($rno))
                echo '<p class="error">Please enter your roll number</p>';
            if(preg_match("/[a-z]/i",$rno))
                echo '<p class="error">Please enter valid roll number</p>';
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    echo '<p class="error">No numbers or symbols allowed in name</p>'; 
                  }
            exit();
        }

        
        $sql = "INSERT INTO `student` (`name`, `rno`, `class_name`) VALUES ('$name', '$rno', '$class_name')";
        $result=mysqli_query($conn,$sql);
        
        if (!$result) {
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Successful")';
            echo '</script>';
        
        }

    }
?>