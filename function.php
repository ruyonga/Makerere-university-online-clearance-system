<?php
include("includes/config.inc");

global $name, $col, $stdnum, $regnum, $faculty,$games_u,$hall,
$lib,$police,$hospital,$dean,$faculty_dean,$finance,$date_of_cl, $hall_of_residence;

global $dresult;

if(isset($_SESSION['username'])){
	$reg = $_SESSION['username'];


	$sql = "SELECT * FROM students WHERE regnum = '$reg'" ;
		 //check if the post includes the name and medical name
	$fresult = mysqli_query($conn, $sql)  or die("Error: ".mysqli_error($conn));
	while ($row = mysqli_fetch_row($fresult)) {
		$name = $row[1]." ".$row[2];
		$regnum = $row[3];
		$col = $row[7];
		$faculty = $row[6];
		$stdnum = $row[4];
		$games_u =$row[8];
		$dean =$row[9];
		$hospital = $row[12];			
		$police = $row[10];
		$hall = $row[11];
		$lib = $row[13];
		$finance = $row[14];
		$faculty_dean = $row[15];
		$hall_of_residence = $row[16];


	}
	$get_date ="SELECT * FROM `clearance` WHERE `regnum` = '$reg'";
	$dresult = mysqli_query($conn, $get_date)  or die("Error: ".mysqli_error($conn));
	
}


?>