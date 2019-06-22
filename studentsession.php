<?php


//Login for an student

if(isset($_POST['login'])){
$id=$_POST['id'];
$email=$_POST['email'];
$_SESSION['id']=$id;
$_SESSION['email']=$email;

if($email=="" and $pass=="")
 {
echo "You are now logged in as '$email";
echo "<br>";
header('refresh:3;url=studentdashboard.html');
     
echo "<br>";
}
    if(isset($_SESSION['id'])) {
echo "Your session is running " . $_SESSION['id'];

        
        echo "<br>";
        echo "<a href='loginsession.html'>Login</a>";
    }
    else
    {
        echo "Password is incorrect";
        echo "<br>";
        echo "<a href='loginsession.html'>Login</a>";
    }
}