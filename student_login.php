        <!DOCTYPE html>
<html lang="en">
<head>
    <title>Index Page</title>
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
    margin-top: 100px;
}
.footer span {
    font-size: 20px;
}

   input[type=text],[type = submit]{
    width: 80%;
    padding: 10px;
    margin: 5px  20px ;
    display: inline-block;
    background:#A9A9A9;
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
    <div class="main" align="center">
        <div class="search">
            <form action="./Result.php" method="get">
                <fieldset style="width: 500px;height: 300px;">
                    <p align="center" style="font-size: 30px;color:#E9967A ">RESULTS</p>

                    <?php
                        include('init.php');

                        $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
                            echo '<select name="class" style="font-size:25px; width:80%;background-color: #ADD8E6;">';
                            echo '<option selected disabled>Select Class</option>';
                        while($row = mysqli_fetch_array($class_result)){
                            $display=$row['name'];
                            echo '<option value="'.$display.'">'.$display.'</option>';
                        }
                        echo'</select>'
                    ?>

                    <center><input type="text"  name="rn" placeholder="Roll No" align="center" style="font-size: 20px; width:75% ;height:15px;display: inline-block;background-color: #ADD8E6;">
                    <input type="submit" value="Get Result"  align="center" style="font-size: 20px;background-color: #9400D3;color: white;border-color: #E6E6FA;border-width: 3px ">
                </fieldset></center>
            </form>
        </div>
    </div>

</body>
</html>