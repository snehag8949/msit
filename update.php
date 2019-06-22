<?php
// Include config file
$link = mysqli_connect("localhost","root","root","project");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else
{
    echo ".";
}

// Define variables and initialize with empty values
$id = $status = $comments = "";
$id_err = $status_err = $comments_err  = "";
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
     $id = (isset($_POST['id']) ? $_POST['id'] : ''); 
        
   // Validate Project-Title
$input_status = trim($_POST["status"]);
if(empty($input_status)){
    $status_err = "Enter the status";
    } elseif(!filter_var($input_status, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
    $ptitle_err = "Please enter status";
    } else{
        $status = $input_status;
   }
    
    //Validate comments
    $input_comments = trim($_POST["comments"]);
    if(empty($input_comments)){
    $comments_err = "Enter the comments";
    } elseif(!filter_var($input_comments, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
    $comments_err = "Please enter comments";
    } else{
    $comments = $input_comments;
   }

    
    
       // Check input errors before inserting in database
    if(empty($status_err) && empty($comments_err)){
        // Prepare an update statement
        $sql = "UPDATE sbook SET status=?, comments=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssi",$param_status, $param_comments,$param_id);
            
            // Set parameters
            
            $param_status       = $status;
            $param_comments     = $comments;
            $param_id           = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to accept2.php
                header("location: accept2.php");
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
  <title>Update Record</title>
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
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($id_err)) ? 'has-error' : ''; ?>">
                            <label>Roll Number</label>
                            <input type="text" name="id" class="form-control" value="<?php echo $id; ?>">
                            <span class="help-block"><?php echo $id_err;?></span>
                        </div>
                       <div class="form-group <?php echo (!empty($status_err)) ? 'has-error' : ''; ?>">
                        <label for="status">Status</label><span style="color: red !important; display: inline; float: none;"></span>
                        
                        <select name="status" class="form-control">
                            <option value="">None</option>
                            <option value="Accepted">Accepted</option>
                            <option value="Denied">Denied</option>
                            <option value="Reschedule">Reschedule</option>
                        </select>
                    </div>
                        
                        
                        <div class="form-group <?php echo (!empty($comments_err)) ? 'has-error' : ''; ?>">
                            <label>Comments</label>
                            <textarea name="comments" class="form-control"><?php echo $comments; ?></textarea>
                            <span class="help-block"><?php echo $comments_err;?></span>
                        </div>                     
                        
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="mentordashboard.html" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>