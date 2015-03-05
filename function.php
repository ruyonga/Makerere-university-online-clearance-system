<?php
	include("includes/config.inc");

	global $name, $col, $stdnum, $regnum, $faculty;

	if(isset($_SESSION['username'])){
		 $reg = $_SESSION['username'];


		 $sql = "SELECT * FROM students WHERE regnum = '$reg'";
		 //check if the post includes the name and medical name
		 $result = mysqli_query($conn, $sql);
		 while ($row = mysqli_fetch_row($result)) {
		 	$name = $row[1]." ".$row[2];
		 	$regnum = $row[3];
		 	$col = $row[7];
		 	$faculty = $row[6];
		 	$stdnum = $row[4];

		 }
		}
	$conn->close();

?>