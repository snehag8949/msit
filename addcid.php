<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$specid = $specn =  "";
$specid_err = $specn_err  = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate specialisation
    $input_specid = trim($_POST["specid"]);
    if(empty($input_specid)){
        $specid_err = "Please enter Specialisation Id.";
    }  else{
        $specid = $input_specid;
    } 
    
    // Validate Course Name 1
    $input_specn = trim($_POST["specn"]);
    if(empty($input_specn)){
        $specn_err = "Please enter your Course Specialisation";
    } elseif(!filter_var($input_specn, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $specn_err = "Please enter a valid name.";
    } else{
        $specn = $input_specn;
    }
    
  
    
  
    // Check input errors before inserting in database
    if(empty($specid_err) && empty($specn_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO courses (specid , specn) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "is", $param_specid, $param_specn);
            
            // Set parameters
            $param_specid     = $specid;
            $param_specn   = $specn;
            
            
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: addcourses.php");
                exit();
            } else{
                echo "Already exists.";
            }
        }
         
        // Close statement
    //    mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Specialisation-Id</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
    div
        {
            margin:20px;
        }    </style>
 </head>
<body>

<br>
<!---Nav Bar---->
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index2.html">Home</a>
            </li>
            <ul class="navbar-nav">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Mentors
      </a>
      <div class="dropdown-menu">
        <!--<a class="dropdown-item" href="mr.php">Register</a>-->
        <a class="dropdown-item" href="loginsession.html">Login</a>
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
  <!--<form class="form-inline" action="/action_page.php">
    <input class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-success" type="submit">Search</button>
  </form>-->
<!--Profile dropdown-->
<div> <button class="btn btn-success" type="submit"><a href="logout.php" tite="Logout">Logout.</a></button>
</div>                
<!--Profile dropdown--->

                </nav>
</ul>
</div>
</nav>
<!--Nav bar-->
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <center><h2 class="pull-left">Add Specialisation-Id</h2>
                            <br>
                        <a href="create1.php" class="btn btn-success pull-right">Add Specialisation Id</a></center>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        
                        <div class="form-group <?php echo (!empty($specid_err)) ? 'has-error' : ''; ?>">
                            <label>Specialisation-Id</label>
                            <input type="text" name="specid" class="form-control" value="<?php echo $specid; ?>">
                            <span class="help-block"><?php echo $specid_err;?></span>
                        </div>                        
                        
                        <div class="form-group <?php echo (!empty($specn_err)) ? 'has-error' : ''; ?>">
                            <label>Specialisation Name</label>
                            <input type="text" name="specn" class="form-control" value="<?php echo $specn; ?>">
                            <span class="help-block"><?php echo $specn_err;?></span>
                        </div>
                        <center><input type="submit" class="btn btn-primary">
                         <a href="mentordashboard.html" class="btn btn-default">Cancel</a> </center>        
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
    