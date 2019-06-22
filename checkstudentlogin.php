<?php
    error_reporting(E_ALL & ~E_NOTICE);
    require_once('config.php');
    if(isset($_POST["login"]))
    {
        $error = 0;
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $id=mysqli_real_escape_string($link,trim($_POST['id']));
        }else{
            $error = 1;
            $empty_id="Roll number Cannot be empty.";
            echo $empty_id.'<br>';
        }
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $email=mysqli_real_escape_string($link,trim($_POST['email']));
        }else{
            $error =1;
            $empty_email="Email cannot be empty.";
            echo $empty_email.'<br>';
        }

        /*if (isset($_POST['category']) && !empty($_POST['category'])) {
            $category=mysqli_real_escape_string($conn,trim($_POST['category']));
        }else{
            $error = 1;
            $empty_category="Category cannot be empty.";
            echo $empty_category.'<br>';
        }*/

        if (isset($_POST['password']) && !empty($_POST['password'])) {
            $psw=mysqli_real_escape_string($link,trim($_POST['password']));
        }else{
            $error = 1;
            $empty_password="Password cannot be empty";
            echo $empty_password.'<br>';
        }

        /*if (isset($_POST['re_password']) && !empty($_POST['re_password'])) {
            $repsw=mysqli_real_escape_string($conn,trim($_POST['re_password']));
        }else{
            $error = 1;
            $empty_repassword="Retype password cannot be empty";
            echo $empty_repassword.'<br>';
        }*/

        /*$password=password_hash('$psw',PASSWORD_BCRYPT);
        $date=mysqli_real_escape_string($link, trim('now()'));
        if($psw!=$repsw)
        {
            echo "password not Matched";
            echo "<br>";
        }*/

        if(!$error) {
            $sql="select * from sr where (id='$id' and email='$email');";
            $res=mysqli_query($link,$sql);
            if (mysqli_num_rows($res) > 0) {
            // output data of each row
            $row = mysqli_fetch_assoc($res);
            if ($id==$row['id'] && $email!=$row['email'])
            {
                echo "Roll number entered is correct";
                echo "<br>";
                echo "Email is incorrect";
                echo "<br>";
                header('refresh:3;url=createsl.php');
            }
                else if($email==$row['email'] && $id!=$row['id'])
                {
                echo "Email entered is correct";
                echo "<br>";
                echo "Roll number is incorrect";
                echo "<br>";
                header('refresh:3;url=createsl.php');
                    
                }
                else
                {
                    echo "Logged in as '$id'";
                    header('refresh:3;url=studentdashboard.html');
                    
                }
            
        }else { //here you need to add else condition
            echo "Register Here";
            header('refresh:3;url=createsr.php');
        }
        }
    }
    ?>