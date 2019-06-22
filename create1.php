<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$specn = $cname1 = $cname2 = $cname3 = $cname4 = $cname5 = "";
$specn_err = $cname1_err = $cname2_err = $cname3_err = $cname4_err = $cname5_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate specialisation
    $input_specn = trim($_POST["specn"]);
    if(empty($input_specn)){
        $specn_err = "Please enter your Course Specialisation";
    } elseif(!filter_var($input_specn, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $specn_err = "Please enter a valid specialisation name.";
    } else{
        $specn = $input_specn;
    }
    
    // Validate Course Name 1
    $input_cname1 = trim($_POST["cname1"]);
    if(empty($input_cname1)){
        $cname1_err = "Please enter your Course Specialisation";
    } elseif(!filter_var($input_cname1, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $cname1_err = "Please enter a valid course name.";
    } else{
        $cname1 = $input_cname1;
    }
    
  // Validate Course Name 2
   $input_cname2 = trim($_POST["cname2"]);
    if(empty($input_cname2)){
        $cname2_err = "Please enter your Course Specialisation";
    } elseif(!filter_var($input_cname2, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $cname2_err = "Please enter a valid course name.";
    } else{
        $cname2 = $input_cname2;
    }
    
     // Validate Course Name 3
    
   
    $input_cname3 = trim($_POST["cname3"]);
    if(empty($input_cname3)){
        $cname3_err = "Please enter your Course Specialisation";
    } elseif(!filter_var($input_cname3, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $cname3_err = "Please enter a valid course name.";
    } else{
        $cname3 = $input_cname3;
    }
    
     // Validate Course Name 4
    $input_cname4 = trim($_POST["cname4"]);
    if(empty($input_cname4)){
        $cname4_err = "Please enter your Course Specialisation";
    } elseif(!filter_var($input_cname4, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $cname4_err = "Please enter a valid course name.";
    } else{
        $cname4 = $input_cname4;
    }
    
     // Validate Course Name 5
    
    $input_cname5= trim($_POST["cname5"]);
    if(empty($input_cname5)){
        $cname5_err = "Please enter your Course Specialisation";
    } elseif(!filter_var($input_cname5, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $cname5_err = "Please enter a valid course name.";
    } else{
        $cname5 = $input_cname5;
    }
    
  
    // Check input errors before inserting in database
    if(empty($specn_err_err) && empty($cname1_err) && empty($cname2_err) && empty($cname3_err) && empty($cname4_err) && empty($cname5_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO cn (specn,cname1,cname2,cname3,cname4,cname5) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_specn, $param_cname1, $param_cname2,  $param_cname3, $param_cname4, $param_cname5);
            
            // Set parameters
            $param_specn     = $specn;
            $param_cname1   = $cname1;
            $param_cname2   = $cname2;
            $param_cname3   = $cname3;
            $param_cname4   = $cname4;
            $param_cname5   = $cname5;
            
            
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: landing.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
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
  <title>Add Internal Courses</title>
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
<center>
    
<br>
    <h2><i>Course Specialisation</i></h2></center>

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
<div> <button class="btn btn-success" type="submit"><a href="index2.html">LogOut</a></button>
</div>                
<!--Profile dropdown-->
</nav>
</ul>
</div>
</nav>
<!--Nav bar-->
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Add Course</h2>
                    </div>
                    <p>Please fill this form and submit to add new course.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        
                        <div class="form-group <?php echo (!empty($specn_err)) ? 'has-error' : ''; ?>">
                            <label>Specialisation</label>
                            <input type="text" name="specn" class="form-control" value="<?php echo $specn; ?>">
                            <span class="help-block"><?php echo $specn_err;?></span>
                        </div>
                        
                        
                        <div class="form-group <?php echo (!empty($cname1_err)) ? 'has-error' : ''; ?>">
                            <label>Course 1</label>
                            <input type="text" name="cname1" class="form-control" value="<?php echo $cname1; ?>">
                            <span class="help-block"><?php echo $cname1_err;?></span>
                        </div>
                        
                        
                        <div class="form-group <?php echo (!empty($cname2_err)) ? 'has-error' : ''; ?>">
                            <label>Course 2</label>
                            <input type="text" name="cname2" class="form-control" value="<?php echo $cname2; ?>">
                            <span class="help-block"><?php echo $cname2_err;?></span>
                        </div>
                        
                        
                        <div class="form-group <?php echo (!empty($cname3_err)) ? 'has-error' : ''; ?>">
                            <label>Course 3</label>
                            <input type="text" name="cname3" class="form-control" value="<?php echo $cname3; ?>">
                            <span class="help-block"><?php echo $cname3_err;?></span>
                        </div>
                        
                        
                        <div class="form-group <?php echo (!empty($cname4_err)) ? 'has-error' : ''; ?>">
                            <label>Course 4</label>
                            <input type="text" name="cname4" class="form-control" value="<?php echo $cname4; ?>">
                            <span class="help-block"><?php echo $cname4_err;?></span>
                        </div>
                        
                        
                        <div class="form-group <?php echo (!empty($cname5_err)) ? 'has-error' : ''; ?>">
                            <label>Course 5</label>
                            <input type="text" name="cname5" class="form-control" value="<?php echo $cname5; ?>">
                            <span class="help-block"><?php echo $cname5_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary">
                         <a href="mentordashboard.html" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>