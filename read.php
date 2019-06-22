<?php

// Check existence of id parameter before processing further
if(isset($_GET["teamno"]) && !empty(trim($_GET["teamno"]))){
      // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM sbook where teamno = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_teamno);
        
        // Set parameters
        $param_teamno = trim($_GET["teamno"]);
       
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                 
                 $specn     = $row["specn"];
                 $cname     = $row["cname"];
                 $date      = $row["date"];
                 $time      = $row["time"];
                 $status    = $row["status"];
                 $id        = $row["id"];
                 $comments  = $row["comments"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    
     
    // Close statement
  mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} 
}
include_once "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>   
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Record</h1>
                    </div>
                    
                    <div class="form-group">
                        <label>Specialisation Name</label>
                        <p class="form-control-static"><?php echo $row["specn"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Course Name</label>
                        <p class="form-control-static"><?php echo $row["cname"]; ?></p>
                    </div>
                   <div class="form-group">
                        <label>Date</label>
                        <p class="form-control-static"><?php echo $row["date"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Time</label>
                        <p class="form-control-static"><?php echo $row["time"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <p class="form-control-static"><?php echo $row["status"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Roll Number</label>
                        <p class="form-control-static"><?php echo $row["id"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Comments</label>
                        <p class="form-control-static"><?php echo $row["comments"]; ?></p>
                    </div>
                    <p><a href="accept2.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>