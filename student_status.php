
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
  <!--<form class="form-inline" action="https://www.google.com/">
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
<!---Main frame--->
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <center><h2 class="pull-left"><i>Status of Appointments</i></h2></center>                        
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    ?>
             <html>
                    <form class="form-group">
                    <div class="form-group <?php echo (!empty($teamno_err)) ? 'has-error' : ''; ?>">
                            <label>Team Number :</label>
                            <input type="teamno" name="teamno" class="form-control">                            
                    </div>
                    <center><button class="btn btn-primary">Submit</button></center>
                    <br>
                    <br>
     
                    <?php 
                    require_once "config.php";                        
                    $teamno = $_GET["teamno"];
                               
                    $sql = "SELECT * FROM sbook INNER JOIN courses on sbook.specid = courses.specid where teamno like '%$teamno'";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Team Number</th>";
                                        echo "<th>Specialisation Id</th>";
                                        echo "<th>Specialisation Name</th>";
                                        echo "<th>Course Name</th>";                                        
                                        echo "<th>Date</th>";
                                        echo "<th>Time</th>";
                                        echo "<th>Status</th>";
                                        echo "<th>Comments</th>";
                                        echo "<th>Roll Number</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";                                       
                                        echo "<td>" . $row['teamno'] . "</td>";
                                        echo "<td>" . $row['specid'] . "</td>";
                                        echo "<td>" . $row['specn'] . "</td>"; 
                                        echo "<td>" . $row['cname'] . "</td>";
                                        echo "<td>" . $row['date'] . "</td>";
                                        echo "<td>" . $row['time'] . "</td>";
                                        echo "<td>" . $row['status'] ."</td>";
                                        echo "<td>" . $row['comments'] . "</td>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                    <br>
                    <center>
                    <a href="studentdashboard.html">  <input type="button" class= "btn btn-primary"name="Submit" value="Student Home Page"></a> 
                    </center>
                            </form>
                    </html> 
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
