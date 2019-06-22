<?php

if(isset($_POST['login'])){
$id=$_POST['id']; 
    echo "You are now logged in as '$id'";
    echo "<br>";
    header('refresh:3;url=studentdashboard.html');     
    echo "<br>";
}

?>