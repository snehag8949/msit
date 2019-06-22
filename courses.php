<?php
require_once("config.php");
if(!empty($_POST["cname"]))
{
    //cname
$query =mysqli_query($link,"SELECT cname1,cname2,cname3,cname4,cname5 FROM cn WHERE cname = '" . $_POST["cname"] . "'");
?><!--select * from cn where cname = '".$_POST["cname"]."'");-->
<option value="">Select Courses</option>
<!--Select Courses-->
<?php
while($row=mysqli_fetch_array($query))
{
?>

<option value="<?php echo $row["cname1"]; ?>"><?php echo $row["cname1"]; ?></option>
<option value="<?php echo $row["cname2"]; ?>"><?php echo $row["cname2"]; ?></option>
<option value="<?php echo $row["cname3"]; ?>"><?php echo $row["cname3"]; ?></option>
<option value="<?php echo $row["cname4"]; ?>"><?php echo $row["cname4"]; ?></option>
<option value="<?php echo $row["cname5"]; ?>"><?php echo $row["cname5"]; ?></option>

<!--cname--><!--cname-->
<?php
}
}
?>