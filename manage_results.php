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
        <a href="logout.php"style="color: white;margin-left: 300px ;font-size: 25px;text-decoration: none;color:#ff00ff" ><span class="">Logout</span></a>
    </div>

    <div >
        <ul>
            <li class="dropdown"style="margin-left: 200px;" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn">Classes &nbsp
                   
                </a>
                <div class="dropdown-content" id="1">
                    <a href="add_classes.php">Add Class</a>
                    <a href="manage_classes.php">Manage Class</a>
                </div>
            </li>
            <li class="dropdown"style="margin-left: 200px;" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn">Students &nbsp
                    
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
        <br><br>
        <form action="" method="post">
            <fieldset style="width: 800px;height: 230px;margin-left: 180px;">
                <center><p style="font-size: 30px;color:#E9967A ">Delete Result</p>
                <?php
                    include('init.php');
                    include('session.php');
                    
                    $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
                        echo '<select name="class_name" style="font-size:20px; width:83%;background-color: #ADD8E6;">';
                        echo '<option selected disabled>Select Class</option>';
                    while($row = mysqli_fetch_array($class_result)){
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?><br>
                <input type="text" name="rno" placeholder="Roll No"><br><br>
                <input type="submit" value="Delete" style="font-size: 20px;background-color: #9400D3;color: white;border-color: #E6E6FA;border-width: 3px;width: 80% "></center>
            </fieldset>
        </form>
        <br><br>

        <form action="" method="post">
            <fieldset style="width: 800px;height: 470px;margin-left: 180px;">
                <center><p style="font-size: 30px;color:#E9967A ">Update Result</p>
                
                <?php
                    $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
                        echo '<select name="class" style="font-size:20px; width:83%;background-color: #ADD8E6;">';
                        echo '<option selected disabled>Select Class</option>';
                    while($row = mysqli_fetch_array($class_result)){
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                <br>
                <input type="text" name="rn" placeholder="Roll No">
                <input type="text" name="p1" id="" placeholder="Paper 1">
                <input type="text" name="p2" id="" placeholder="Paper 2">
                <input type="text" name="p3" id="" placeholder="Paper 3">
                <input type="text" name="p4" id="" placeholder="Paper 4">
                <input type="text" name="p5" id="" placeholder="Paper 5"><br><br>
                <input type="submit" value="Update" style="font-size: 20px;background-color: #9400D3;color: white;border-color: #E6E6FA;border-width: 3px;width: 80% "></center>
            </fieldset>
        </form>
    </div>

    
</body>
</html>

<?php
    if(isset($_POST['class_name'],$_POST['rno'])) {
        $class_name=$_POST['class_name'];
        $rno=$_POST['rno'];
        echo $class_name;
        echo $rno;
        $delete_sql=mysqli_query($conn,"DELETE from `result` where `rno`='$rno' and `class`='$class_name'");
        if(!$delete_sql){
            echo '<script language="javascript">';
            echo 'alert("Not available")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Deleted")';
            echo '</script>';
        }
    }

    if(isset($_POST['rn'],$_POST['p1'],$_POST['p2'],$_POST['p3'],$_POST['p4'],$_POST['p5'],$_POST['class'])) {
        $rno=$_POST['rn'];
        $class_name=$_POST['class'];
        $p1=(int)$_POST['p1'];
        $p2=(int)$_POST['p2'];
        $p3=(int)$_POST['p3'];
        $p4=(int)$_POST['p4'];
        $p5=(int)$_POST['p5'];

        $marks=$p1+$p2+$p3+$p4+$p5;
        $percentage=$marks/5;
        

        $sql="UPDATE `result` SET `p1`='$p1',`p2`='$p2',`p3`='$p3',`p4`='$p4',`p5`='$p5',`marks`='$marks',`percentage`='$percentage' WHERE `rno`='$rno' and `class`='$class_name'";
        $update_sql=mysqli_query($conn,$sql);

        if(!$update_sql){
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Updated")';
            echo '</script>';
        }
    }
?>