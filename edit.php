<?php
// Include config file
include "config.php";

// Define variables and initialize with empty values
$specn = $cname1 = $cname2 = $cname3 = $cname4 = $cname5 = "";
$specn_err = $cname1_err = $cname2_err = $cname3_err = $cname4_err = $cname5_err = "";
// Processing form data when form is submitted
if(isset($_POST["specn"]) && !empty($_POST["specn"])){
    // Get hidden input value
     $specn= (isset($_POST['specn']) ? $_POST['specn'] : ''); 
        
   // Validate Project-Title
$input_specn= trim($_POST["specn"]);
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
    if(empty($status_err) && empty($comments_err)){
        // Prepare an update statement
        $sql = "UPDATE cn SET cname1 = ?, cname2 = ?,cname3 = ?,cname4 = ?,cname5 = ? WHERE specn=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss",$param_cname1, $param_cname2,$param_cname3,$param_cname4,$param_cname5,$param_specn);
            
            // Set parameters
            
            $param_cname1       = $cname1;
            $param_cname2       = $cname2;
            $param_cname3       = $cname3;
            $param_cname4       = $cname4;
            $param_cname5       = $cname5;
            $param_specn       = $specn;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to accept2.php
                header("location: addcourses.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <title>Edit Courses</title>
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<?php
    include_once "navbar.php";  
    
    ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Edit Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($specn_err)) ? 'has-error' : ''; ?>">
                            <label>Specialisation Name</label>
                            <input type="text" name="specn" class="form-control" value="<?php echo $specn; ?>">
                            <span class="help-block"><?php echo $specn_err;?></span>
                        </div>
                      <div class="form-group <?php echo (!empty($cname1_err)) ? 'has-error' : ''; ?>">
                            <label>Course Name-1</label>
                            <input type="text" name="cname1" class="form-control" value="<?php echo $cname1; ?>">
                            <span class="help-block"><?php echo $cname1_err;?></span>
                        </div>
                        
                        
                        <div class="form-group <?php echo (!empty($cname2_err)) ? 'has-error' : ''; ?>">
                            <label>Course Name - 2</label>
                            <input type="text" name="cname2" class="form-control" value="<?php echo $cname2; ?>">
                            <span class="help-block"><?php echo $cname2_err;?></span>
                        </div>  
                        <div class="form-group <?php echo (!empty($cname3_err)) ? 'has-error' : ''; ?>">
                            <label>Course Name - 3</label>
                            <input type="text" name="cname3" class="form-control" value="<?php echo $cname3; ?>">
                            <span class="help-block"><?php echo $cname3_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($cname4_err)) ? 'has-error' : ''; ?>">
                            <label>Course Name - 4</label>
                            <input type="text" name="cname4" class="form-control" value="<?php echo $cname4; ?>">
                            <span class="help-block"><?php echo $cname4_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($cname5_err)) ? 'has-error' : ''; ?>">
                            <label>Course Name - 5</label>
                            <input type="text" name="cname5" class="form-control" value="<?php echo $cname5; ?>">
                            <span class="help-block"><?php echo $cname5_err;?></span>
                        </div>
                        
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="addcourses.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>