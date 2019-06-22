<?php
//Login for an admin
if(isset($_POST['login'])){
$email=$_POST['email'];
$pass=$_POST['password'];
if($email=="sriram.pavani@gmail.com" and $pass=="password")
 {
    echo "You are now logged in as '$email'(Admin)";
    echo "<br>";
    header('refresh:2;url=mentordashboard.html');     
    echo "<br>";
}
else if($email!="admin")
{
        echo "Email is incorrect";
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
?>