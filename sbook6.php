<?php
// Include config file
//require_once "config.php";
 include "config.php";

// Define variables and initialize with empty values
$teamno = $specid = $cname = $date  = $time = $status = $id =  $comments = "";
$teamno_err = $specid_err = $cname_err = $date_err  = $time_err = $status_err = $id_err  = $comments_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
   $input_teamno = trim($_POST["teamno"]);
    if(empty($input_teamno)){
        $teamno_err = "Please enter your team no.";
    }  else{
        $teamno = $input_teamno;
    } 
    
    $input_specid = trim($_POST["specid"]);
    if(empty($input_specid)){
        $specid_err = "Please enter specialisation id.";
    }  else{
        $specid = $input_specid;
    } 

    //Validate password
    $input_cname = trim($_POST["cname"]);
    if(empty($input_cname)){
        $cname_err = "Please enter your course title.";
    } elseif(!filter_var($input_cname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $cname_err = "Please enter a valid course title.";
    } else{
        $cname = $input_cname;
    }
    
    $input_date = trim($_POST["date"]);
    if(empty($input_date)){
        $date_err = "Please enter your date.";
    }  else{
        $date = $input_date;
    } 
    
    $input_time = trim($_POST["time"]);
    if(empty($input_time)){
        $time_err = "Please enter time.";
    }  else{
        $time = $input_time;
    }
    
    
    //Validate Roll number
    $input_id = trim($_POST["id"]);
    if(empty($input_id)){
        $id_err = "Please enter your Roll number.";
    }  else{
        $id = $input_id;
    } 
    
    // Check input errors before inserting in database
    if(empty($teamno_err) && empty($specid_err) && empty($cname_err) && empty($date_err) && empty($time_err)  && empty($id_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO sbook (teamno , specid, cname , date ,time ,id) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "iissss", $param_teamno,$param_specid,$param_cname,$param_date,$param_time,$param_id);
            
            // Set parameters
            $param_teamno   = $teamno;
             $param_specid  = $specid;
            $param_cname    = $cname;
            $param_date     = $date;
            $param_time     = $time;
            $param_id       = $id;
           
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to response page
                header("location: response.html");
                exit();
            } else{
                echo "Already exists.";
            }
        }
         
       
    }

    // Close connection
    mysqli_close($link);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<title>Bookings</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
    $(function() {
  var $dp1 = $("#datepicker1");
  $dp1.datepicker({
    changeYear: true,
    changeMonth: true,
    minDate: 0,
    dateFormat: "yy-m-dd",
    yearRange: "-100:+20",
  });

  var $dp2 = $("#datepicker2");
  $dp2.datepicker({
    changeYear: true,
    changeMonth: true,
    yearRange: "-100:+20",
    dateFormat: "yy-m-dd",
  });
});
    </script>
    <script>
     onclick="hello();"
    
    
    
    
    </script>
   
   
    <script src="myscripts.js"></script>
    
     <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>  
    <style>
    div
        {
            margin:20px;
        }    </style>
 </head>
<body>
<center><h1><i>Book an Appointment</i></h1>
    
<br>
    <h2><i></i></h2></center>

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
  <form class="form-inline" action="/action_page.php">
    <!--<input class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-success" type="submit">Search</button>--->
<div>
    <button class="btn btn-success" type="submit"><a href="index2.html">LogOut</a></button>
</div> 
  </form>
</nav>
</ul>
</div>
</nav>
<!--Nav bar-->   
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="page-header">
                        <!--<h2>Book</h2>-->
                    </div>
                    <form method="post" action="s.php">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                       <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Team number</label><span style="color: red !important; display: inline; float: none;">*</span>      
                            <input type="number" name="teamno" class="form-control" value="<?php echo $teamno; ?>">
                            <span class="help-block"><?php echo $teamno_err;?></span>
                        </div>
                       
                         <div class="form-group <?php echo (!empty($specid_err)) ? 'has-error' : ''; ?>">
                            <label>Specialisation Id</label>
                            <label for="specid"></label><span style="color: red !important; display: inline; float: none;">*</span>
                        
                        <select name="specid" class="form-control">
                            <option value="">None</option>
                            <option value="1-DADV">1-DADV</option>
                            <option value="2-ECommerce">2-ECommerce</option>
                            <option value="3-Information Security">3-Information Security</option>
                        </select>                             
                        </div>
                        
                        
                        <div class="form-group <?php echo (!empty($cname_err)) ? 'has-error' : ''; ?>">
                            <label>Course Name</label>
                            <label for="cname"></label><span style="color: red !important; display: inline; float: none;">*</span>
                        
                        <select name="cname" class="form-control">
                            <option value="">None</option>
                            <option value="Machine Learning">Machine Learning</option>
                             <option value="Data Mining">Data Mining</option>
                             <option value="Front End Engg">Front End Engg</option>
                             <option value="Backend Engg">Backend Engg</option>
                             <option value="Mobile Web Engg">Mobile Web Engg</option>
                            <option value="CS Project">CS Project</option>
                            <option value="Practicum">Practicum</option>
                             
                        </select>                             
                        </div>
                        
                        <!--<div class="form-group <?php echo (!empty($cname_err)) ? 'has-error' : ''; ?>">
                            <label>Course Name</label><span style="color: red !important; display: inline; float: none;">*</span>      
                            <input type="text" name="cname" class="form-control" value="<?php echo $cname; ?>">
                            <span class="help-block"><?php echo $cname_err;?></span>
                        </div>-->

                    <div class="form-group <?php echo (!empty($date_err)) ? 'has-error' : ''; ?>">
                             <label for="datepicker1">Date</label><span style="color: red !important; display: inline; float: none;">*</span>      
                            <input type="text" name="date" class="form-control" id="datepicker1" value="<?php echo $date; ?>">
                            <span class="help-block"><?php echo $date_err;?></span>
                    </div>
                      
            <div class="form-group <?php echo (!empty($time_err)) ? 'has-error' : ''; ?>">
                            <label>Time</label>
                            <label for="time"></label><span style="color: red !important; display: inline; float: none;">*</span>
                            
                <select name="time" class="form-control">
                            <option value="">None</option>
                            <option value="9:30am-10:15am">9:30am-10:15am</option>
                            <option value="10:15am-10:45am">10:15am-10:45am</option>
                            <option value="10:45am-11:15am">10:45am-11:15am</option>
                            <option value="11:15am-12Noon">11:15am-12Noon</option>
                            <option value="15:00pm-15:30pm">15:00pm-15:30pm</option>
                            <option value="15:30pm-16:15pm">15:30pm-16:15pm</option>
                            <option value="16:15pm-17:15pm">16:15pm-17:15pm</option>

                </select>
            </div>
                        
                        <div class="form-group <?php echo (!empty($id_err)) ? 'has-error' : ''; ?>">
                            <label>Roll number</label><span style="color: red !important; display: inline; float: none;">*</span>      
                            <input type="text" name="id" class="form-control" value="<?php echo $id; ?>">
                            <span class="help-block"><?php echo $id_err;?></span>
                        </div>                   
                        <br>
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        <a href="studentdashboard.html" class="btn btn-default">Cancel</a>
                        </form>               
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>