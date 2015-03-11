<?php

//This section of code is called by AJAX, its ment to stop double clearance by students
session_start();
include("includes/config.inc");   //include db connection class
if(isset($_REQUEST['selOption'])); 
 //get the selected value from the selection option
global $clear_date;
global $jv_depName;
$jv_depName=$_REQUEST['selOption'];   //get the selction value
$a= explode(" ", $jv_depName);   //split it cause of hall n facu
$q_depname = $a[0];
//get the students regnum from the session
$regnum = $_SESSION['username'];  

//make an SQL query to look for the department selected
$check = "SELECT * FROM clearance WHERE department = '$q_depname' && regnum = '$regnum'";  
//Excute MYSQL query
$check_result = mysqli_query($conn, $check)  or die("Error: ".mysqli_error($conn));
//Check if any rows are returned. if the rows are 0 then display the clearance form fields 
if(mysqli_num_rows($check_result) == 0){
	
	
}else{
	//if there is atleast one row that matches the query. display the fields disable and notify that the student has already cleared with that department
	echo '<div class="alert alert-dismissible alert-success">
	<button type="button" class="close" data-dismiss="alert">x</button>
	You have cleared with this department
</div>';
while ($cl_row = mysqli_fetch_row($check_result) ) {
			$clear_date = $cl_row[3];
			}

}


?>