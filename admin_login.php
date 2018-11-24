
<?php
    
    session_start();
    include("init.php");
    
    
    if (isset($_POST["userid"],$_POST["password"]))
    {
        $username=$_POST["userid"];
        $password=$_POST["password"];
        $sql = "SELECT userid FROM admin_login WHERE userid='$username' and password = '$password'";
        $result=mysqli_query($conn,$sql);

        // $row=mysqli_fetch_array($result);
        $count=mysqli_num_rows($result);
        
        
        if($count==1) {
            $_SESSION['login_user']=$username;
            header("Location: dashboard.php");
        }else {
            echo '<script language="javascript">';
            echo 'alert("Invalid Username or Password")';
            echo '</script>';
        }
        
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin </title>
    <style type="text/css">
    .title{ 
            height: 80px;
            display: flex;
            font-size: 50px;
            color: white;
            align-items: center;
            font-family: monospace;
            margin-left: 180px;
            color: #841ef5;
               
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
.footer {
    display: grid;
    
    line-height: 2;
    
}

.footer span {
    font-size: 20px;
    color:#86c232
}
input[type=text],[type=password]{
    width: 80%;
    padding: 10px;
    margin: 5px  20px ;
    display: inline-block;
    border :none;
    background-color: #ADD8E6;
}


    </style>

    
</head>
<body style="background-color: black;color: white;">
    
    <div style="padding: 20px;">
        <div class="title">
            <p >Student Result Management System</p>
        </div>
        
        <div >
            <ul>
                <li>
                    <a href="index.html"style="margin-left: 100px;">Home</a>
                </li>
                <li>
                    <a href="admin_login.php"style="margin-left: 100px;">Admin Login</a>
                </li>
                <li class="dropdown"style="margin-left: 100px; onclick="toggleDisplay('1')">
                    <a href="#" class="dropbtn" ">Faculties &nbsp;
                      
                    </a>
                    <div class="dropdown-content" id="1">
                        <a href="">Science</a>
                        <a href="">Technology</a>
                        <a href="">Sports</a>
                        <a href="">Others</a>
                    </div>
                </li>
                <li class="dropdown"style="margin-left: 100px;" onclick="toggleDisplay('2')">
                    <a href="#" class="dropbtn">Student &nbsp
                       
                    </a>
                    <div class="dropdown-content" id="2">
                        <a href="">Admissions</a>
                        <a href="">Scholarship</a>
                        <a href="">Examination</a>
                        <a href="./student_login.php">Results</a>
                        <a href="./admin_login.php">Manage Results</a>
                    </div>
                </li>
            </ul>
        </div>
    	<div class="main">
        	
            	<form method="post" action=""  name="login">
                	<fieldset style="width: 500px;height: 300px;margin-left: 290px; ">
                    	<center>
                        <p align="center" style="font-size: 30px;color:#E9967A">Admin Login</p>
                    	<input type="text" name="userid" placeholder="Email" autocomplete="off" align="center"><br><br>
                    	<input type="password" name="password" placeholder="Password" autocomplete="off" align="center"><br><br>
                    	<input type="submit" value="Login" align="center"style="font-size:20px ;width: 85%;background-color: #9400D3;color: white;border-color: #E6E6FA;border-width: 3px;" >
                        </center>
                	</fieldset>
            	</form>    
        	
        </div>
        <div class="footer">

            <div>
                <span>Contact Us<hr></span>
                <p>admissions@pes.edu</p>
                <p>+91 80 26721983</p>

            </div>

        </div>
    

</body>
</html>

