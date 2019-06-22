 <?php

if(isset($_POST['submit']))
{
    $date=$_POST['date'];
    $time=$_POST['time'];
    $s=substr($time,0,4);//9
    echo "<br>";
    $today = date("Y-n-d");
    echo "<br>";
    //echo $today;

    echo "<br>";
    //echo $date;
    date_default_timezone_set('Asia/Kolkata');
    $current=date('H:i');//12
   

    if($today==$date)
    {
        if(date_parse_from_format('H:i',$s)<date_parse_from_format('H:i',"18:15"))
        {
            if(date_parse_from_format('H:i',$current)<=date_parse_from_format('H:i',$s))
            {
            
                echo "Success";
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

}
        else
        {
            
            echo '<script language="javascript">';
            echo 'alert("Slots are full")';
            header('refresh:1;url=Currentstatement.html');
        }
    }
    }
 
else
{
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

}

    
}

?>
   
