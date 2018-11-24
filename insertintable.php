<?php

include("init.php");

$sql = "INSERT INTO admin_login (userid, password)
VALUES ('admin', '123')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>