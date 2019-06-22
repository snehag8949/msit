<?php
 if(isset($_SESSION['email']))
{
     unset($_SESSION['email']);
}
echo '<h1>You have been successfully logout</h1>';
header('refresh:3;url=index2.html');
?>