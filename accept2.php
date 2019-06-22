<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Status</title>
    
    <style type="text/css">
       
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    
    
    <?php
     require_once "navbar.php"; 
    

    ?>
</head>

<body>
    <center><h1><i>Status of the Applicants</i></h1></center>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">                   
                    <?php
                    // Include config file
                    require_once "config.php";                 
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM sbook INNER JOIN courses on sbook.specid = courses.specid";
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
                                        echo "<th>Roll Number</th>";
                                        echo "<th>Update</th>";                                        
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
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>";
                                        //echo "<a href='read.php?teamno=". $row['teamno'] ."' title='View Record' data-toggle='tooltip'>View</a>";
                                        //echo "/";
                                        echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'>Update</a>"; 
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
                    <center><a href="mentordashboard.html"><input type="button" class="btn btn-primary" value="Home Page"></a></center>
                 </div>
            </div>        
        </div>
    </div>
</body>
</html>