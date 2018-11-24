<!DOCTYPE html>
<html>
<head>
	<title>RESULTS</title>
</head>
<?php
	$count=0;
	$s="a";
	$min=35;
	$max=100;
	$dd='DDCO';
	$d='DS';
	$ids='IDS';
	$w='WT';
	$dm='DML';

	include("init.php");

        if(!isset($_GET['class']))
            $class=null;
        else
            $class=$_GET['class'];
        $rn=$_GET['rn'];

        // validation
        if (empty($class) or empty($rn) or preg_match("/[a-z]/i",$rn)) {
            if(empty($class))
                echo '<p class="error">Please select your class</p>';
            if(empty($rn))
                echo '<p class="error">Please enter your roll number</p>';
            if(preg_match("/[a-z]/i",$rn))
                echo '<p class="error">Please enter valid roll number</p>';
            exit();
        }

        $name_sql=mysqli_query($conn,"SELECT `name` FROM `student` WHERE `rno`='$rn' and `class_name`='$class'");
        while($row = mysqli_fetch_assoc($name_sql))
        {
        	$name = $row['name'];
        }

        $result_sql=mysqli_query($conn,"SELECT `p1`, `p2`, `p3`, `p4`, `p5`, `marks`, `percentage` FROM `result` WHERE `rno`='$rn' and `class`='$class'");
        while($row = mysqli_fetch_assoc($result_sql))
        {
            $DDCO = $row['p1'];
            $DS = $row['p2'];
            $IDS = $row['p3'];
            $WT = $row['p4'];
            $DML = $row['p5'];
            $mark = $row['marks'];
            $percentage = $row['percentage'];
            $total=$DDCO+$DS+$IDS+$WT+$DML;
        }
       
        if(mysqli_num_rows($result_sql)==0){
            echo "no result";
            exit();
        }
	if($DDCO<35){
		$remark1="<font color='red'>*</font>";
		$count++;
		$s=$s.' and '.$dd;
	}else if($DDCO>85){
		$remark1="<font color='green'>Dist</font>";
	}else{
		$remark1='-';
	}
	
	if($DS<35){
		$remark2="<font color='red'>*</font>";
		$count++;
		$s=$s.' and '.$d;
	}else if($DS>85){
		$remark2="<font color='green'>Dist</font>";
	}else{
		$remark2='-';
	}

	if($IDS<35){
		$remark3="<font color='red'>*</font>";
		$count++;
		$s=$s.' and '.$ids;
	}else if($IDS>85){
		$remark3="<font color='green'>Dist</font>";
	}else{
		$remark3='-';
	}

	if($WT<35){
		$remark4="<font color='red'>*</font>";
		$count++;
		$s=$s.' and '.$w;
	}else if($WT>85){
		$remark4="<font color='green'>Dist</font>";
	}else{
		$remark4='-';
	}
	
	if($DML<35){
		$remark5="<font color='red'>*</font>";
		$count++;
		$s=$s.' and '.$dm;
	}else if($DML>85){
		$remark5="<font color='green'>Dist</font>";
	}else{
		$remark5='-';
	}

	$s=str_replace('a and', '', $s);
	if($count>2){
		$s="Fail";
	}else if($count==0){
		$s="Pass";
	}else if($count<=2){
		$s="Compartment in ".' '.$s;
	}
?>
<body >
<center >
	<table border=1 >
		<tr>
		<td>
			<table  width=100%>
			<tr>
				<td rowspan="3">
					<img src='./images/pes.jpg' width=120 height=120>
				</td>
				<tr >
				<td align="center">
					<b><font size='5' color=#005fff>PES University</font>
					
				</td></tr><tr>
				<td><font color="#005fff">(Established under Karnataka Act No. 16 of 2013)</font></td>
			</tr>
			</table>
		</td>
		</tr>
		<tr>
		<td>

			<table width=100%  >
				<tr><td><font size='4'>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "$name"; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "Date :&nbsp;&nbsp;&nbsp;"; echo date(" jS \of F Y"); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></td></tr>
				<tr><td><font size='4'>Roll No. :&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "$rn"?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Class:&nbsp;&nbsp;&nbsp;<?php echo"$class";?></font></td></tr>
			</table>
		</td>
		</tr>
		<tr>
		<td>
			<table border=1 width=100% cellpadding="5" >
				<tr ><th><i>Subject code</i></th><th><i>Subject name</i></th><th><i>Min marks</i></th><th><i>Max marks</i></th><th><i>Marks obtained</i></th><th><i>Remark</i></th></tr>
				<tr><td>UE17CS201</td><td>DDCO</td><td>35</td><td>100</td><td><?php echo "$DDCO"; ?></td><td><?php echo "$remark1"; ?></td></tr>
				<tr><td>UE17CS202</td><td>DS</td><td>35</td><td>100</td><td><?php echo "$DS"; ?></td><td><?php echo "$remark2"; ?></td></tr>
				<tr><td>UE17CS203</td><td>IDS</td><td>35</td><td>100</td><td><?php echo "$IDS"; ?></td><td><?php echo "$remark3"; ?></td></tr>
				<tr><td>UE17CS204</td><td>WT</td><td>35</td><td>100</td><td><?php echo "$WT"; ?></td><td><?php echo "$remark4"; ?></td></tr>
				<tr><td>UE17CS205</td><td>DML</td><td>35</td><td>100</td><td><?php echo "$DML"; ?></td><td><?php echo "$remark5"; ?></td></tr>
				<tr><td colspan="2"><b>Percentage  : <?php echo "$percentage" ?></b></td><td><b>Total</b></td><td><b>400</b></td><td><b><?php echo "$total"; ?><b></td><td></td></tr>
			</table>
		</td>
		</tr>

		<tr>
		<td>
			<table >
				<tr><td><b><font size='4'>Result:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "$s"; ?></font></b></td></tr>
			</table>
		</td>
		</tr>
	</table>
	<div class="button" >
			<br><br>
            <button style="font-size: 20px;background-color: #9400D3;color: black;border-color: #E6E6FA;border-width: 3px ;width:25%" onclick="window.print()">Print Result</button>
        </div>
</center>
</body>
</html>