<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $id =  $email = $password = $phoneno = $dob = $specn = $teamno = "";
$name_err = $id_err =  $email_err = $password_err = $phoneno_err = $dob_err = $specn_err = $teamno_err = "";
 

session_start();
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter your name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
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
    
    //Validate phone number
     $input_phoneno = trim($_POST["phoneno"]);
    if(empty($input_phoneno )){
        $phoneno_err = "Please enter your phone number.";
    }  else{
        $phoneno  = $input_phoneno ;
    }
    // date of birth
    $input_dob = trim($_POST["dob"]);
    if(empty($input_dob)){
        $dob_err = "Please enter your Date Of Birth.";
    }  else{
        $dob = $input_dob;
    } 
      
    //specialization
    $input_specn = trim($_POST["specn"]);
    if(empty($input_specn)){
        $specn_err = "Please confirm your specn";
    } elseif(!filter_var($input_specn, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $specn_err = "Please enter a valid name.";
    } else{
        $specn = $input_specn;
    }
    //team number
   $input_teamno = trim($_POST["teamno"]);
    if(empty($input_teamno)){
        $teamno_err = "Please enter your team number";
    }  else{
        $teamno = $input_teamno;
    } 
    
   
    // Check input errors before inserting in database
    if(empty($name_err) && empty($id_err)  && empty($email_err) && empty($password_err) && empty($phoneno_err)&& empty($dob_err)&&empty($specn_err)&&empty($teamno_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO sr (name, id, email, password, phoneno, dob, specn, teamno) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssissi", $param_name, $param_id,$param_email, $param_password,$param_phoneno,$param_dob,$param_specn,$param_teamno);
            
            // Set parameters
            $param_name         = $name;
            $param_id           = $id;
            $param_email        = $email;
            $param_password     = $password;
             $param_phoneno     = $phoneno;
             $param_dob         = $dob;
             $param_specn       = $specn;
             $param_teamno      = $teamno;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: createsl.php");
                exit();
            } 
        }
         
        // Close statement
    //    mysqli_stmt_close($stmt);
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
  <form class="form-inline">
    <!--<input class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-success" type="submit">Search</button> <br>-->
      <div><button class="btn btn-success" type="submit"><a href="index2.html">LogOut</a></button></div>
     </form>               

</nav>
        </ul>
    </div>

</nav>
<!--Nav bar-->
<!---Main frame--->
<div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="page-header">                        
                       <center><h2>Student Registration</h2></center>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        
                        
                        
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Student Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($id_err)) ? 'has-error' : ''; ?>">
                            <label>Student-Id</label>
                            <input type="text" name="id" class="form-control" value="<?php echo $id; ?>">
                            <span class="help-block"><?php echo $id_err;?></span>
                        </div>
                        
                        
                                    
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>
                        
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                            <span class="help-block"><?php echo $password_err;?></span>
                        </div>
                        
                        <div class="form-group <?php echo (!empty($phoneno_err)) ? 'has-error' : ''; ?>">
                            <label>Phone Number</label>
                            <input type="phoneno" name="phoneno" class="form-control" value="<?php echo $phoneno; ?>">
                            <span class="help-block"><?php echo $phoneno_err;?></span>
                        </div> 
                        
                           <div class="form-group <?php echo (!empty($dob_err)) ? 'has-error' : ''; ?>">
                            <label>Date of Birth</label>
                            <input type="date" name="dob" class="form-control" value="<?php echo $dob; ?>">
                            <span class="help-block"><?php echo $dob_err;?></span>
                        </div>
                        
                        <div class="form-group <?php echo (!empty($specn_err)) ? 'has-error' : ''; ?>">
                            <label>Specialisation Name</label>
                            <input type="text" name="specn" class="form-control" value="<?php echo $specn; ?>">
                            <span class="help-block"><?php echo $specn_err;?></span>
                        </div>
                        
                         <div class="form-group <?php echo (!empty($teamno_err)) ? 'has-error' : ''; ?>">
                            <label>Team Number</label>
                            <input type="teamno" name="teamno" class="form-control" value="<?php echo $teamno; ?>">
                            <span class="help-block"><?php echo $teamno_err;?></span>
                        </div>                       
                        
                        <center><input type="submit" class="btn btn-primary">
                        <a href="createsl.php" class="btn btn-default">Cancel</a></center>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
