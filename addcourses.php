<!DOCTYPE html>
<html lang="en">
<head>
  <title>Adding Courses</title>
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
                    <div class="page-header clearfix">
                        <center><h2 class="pull-left">Add Courses</h2>
                            <br>
                        <a href="create1.php" class="btn btn-success pull-right">Add New Course</a></center>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM cn INNER JOIN courses ON cn.specn = courses.specn;";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                      //  echo "<th>id</th>";
                                        echo "<th>Specialisation</th>";
                                        echo "<th>Course 1</th>";
                                        echo "<th>Course 2</th>";
                                        echo "<th>Course 3</th>";
                                        echo "<th>Course 4</th>";
                                        echo "<th>Course 5</th>";
                                        echo "<th>Edit/Delete</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['specn'] . "</td>";
                                        echo "<td>" . $row['cname1'] . "</td>";
                                        echo "<td>" . $row['cname2'] . "</td>";
                                        echo "<td>" . $row['cname3'] . "</td>";
                                        echo "<td>" . $row['cname4'] . "</td>";
                                        echo "<td>" . $row['cname5'] . "</td>";
                                       echo "<td>";
                                            echo "<a href='edit.php?specn=". $row['specn'] ."' title='Edit Record' data-toggle='tooltip'>Edit</a>";
                                            echo "/";
                                            echo "<a href='delete.php?specn=". $row['specn'] ."' title='Delete Record' data-toggle='tooltip'>Delete</a>";
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
                    <center><a href="mentordashboard.html" class="btn btn-primary">Home Page</a></center>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>