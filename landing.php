<!DOCTYPE html>
<html lang="en">
<head>
  <title>List Of Courses</title>
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

    <!-- Dropdown 
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Students
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="createsr.php">Register</a>
        <a class="dropdown-item" href="createsl.php">Login</a>
    </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Appointment
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="sbook2.php">Book</a>
        </div>
    </li>-->
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
    <input class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-success" type="submit">Search</button>
  </form>
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
                        <h2 class="pull-left">Courses List</h2>
                        
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "select courses.specid,cn.specn,cn.cname1,cn.cname2,cn.cname3,cn.cname4,cn.cname5 from courses INNER JOIN cn on courses.specn=cn.specn";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Specialisation Id</th>";
                                        echo "<th>Specialisation Name</th>";
                                        echo "<th>Course 1</th>";
                                        echo "<th>Course 2</th>";
                                        echo "<th>Course 3</th>";
                                        echo "<th>Course 4</th>";
                                        echo "<th>Course 5</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                       
                                        echo "<td>" . $row['specid'] . "</td>";
                                        echo "<td>" . $row['specn'] . "</td>";
                                        echo "<td>" . $row['cname1'] . "</td>";
                                        echo "<td>" . $row['cname2'] . "</td>";
                                        echo "<td>" . $row['cname3'] . "</td>";
                                        echo "<td>" . $row['cname4'] . "</td>";
                                        echo "<td>" . $row['cname5'] . "</td>";
                                       // echo "<td>";
                                         /*   echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";*/
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
                    <a href="mentordashboard.html">  <input type="button" name="Submit" class="btn btn-primary" value="Home Page"></a> 
                    </center>
                </div>
            </div>        
        </div>
    </div>
   
</body>
</html>