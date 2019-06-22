<html>
<head><title></title></head>


<body>
<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$server="localhost";
$username="root";
$password="root";
$dbname="project";
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect($server,$username,$password,$dbname);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else
{
    echo ".";
}
?>
    </body>
</html>