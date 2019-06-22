

<?php
// Include config file
require_once "config.php";
session_start();

// Define variables and initialize with empty values
$email =$id = $password  = "";
$email_err = $id_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    //Validate id
    $input_id = trim($_POST["id"]);
    if(empty($input_id)){
        $id_err = "Please enter your id.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $id_err = "Please enter a valid id.";
    } else{
        $id = $input_id;
    }
    
    
   //Validate email
    if (empty($_POST["email"])) {
    $email_err = "Email is required";
  } else {
    $email = trim($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_err = "Invalid email format"; 
    }
  }  
    
    //Validate password
    $input_password = trim($_POST["password"]);
    if(empty($input_password)){
        $password_err = "Please enter your password.";
    } elseif(!filter_var($input_password, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $password_err = "Please enter a valid password.";
    } else{
        $password = $input_password;
    }
}

function getUserById($id){
	global $db;
	$query = "SELECT * FROM sr WHERE id=" . $id;
	$result = mysqli_query($db, $query);
	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
} 	



    // Close connection
    mysqli_close($link);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>MSIT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
 </head>
<body>
<center><h1><i>Master of Science in Information Technology</i></h1></center>
<br>
<br>
<!---Nav Bar---->
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index2.html">Home</a>
            </li>
            <ul class="navbar-nav">
    

    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Students
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="createsr.php">Register</a>
        <a class="dropdown-item" href="createsl.php">Login</a>
    </div>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="Team.html">About Us</a>
    </li>
  </ul>
    </ul>
    
    </div>
    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <form class="form-inline" action="https://www.google.com/">
    <!--<input class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-success" type="submit">Search</button>-->
      <div> 
    <button class="btn btn-success" type="submit"><a href="index2.html">LogOut</a></button>
</div> 
     </form>

</nav>
        </ul>
    </div>

</nav>
<!--Nav bar-->
<!---Main frame--->
<?php
    $_SESSION["id"] = $id;
    
    
    ?>

<div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                   <div class="page-header">
                        <center><h2>Student Login</h2></center>
                  </div>
                    <form method="post" align="center" action="checkstudentlogin.php">
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>
                        
                        <div class="form-group <?php echo (!empty($id_err)) ? 'has-error' : ''; ?>">
                            <label>Student-Id</label>
                            <input type="text" name="id" class="form-control" value="<?php echo $id; ?>">
                            <span class="help-block"><?php echo $id_err;?></span>
                        </div>
                        
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                            <span class="help-block"><?php echo $password_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" name="login" value="login">
                        <a href="createsr.php" class="btn btn-default">Register</a>
                        <!--<a href="reset.html" class="btn btn-primary">Reset Password</a>-->
                    </form>
               </div>                    
            </div>        
        </div>
    </div>
</body>
</html>
