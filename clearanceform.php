<?php

// Inialize session
session_start();

//check if user is logged in
if(!isset($_SESSION['username'])){
	//if user aint logged in redirect to the index page with
	header("Location:signin.php?msg='login here please!!'");
}else{
   //if the user is logged in display this page
	//get the header file that includes the links to style sheets
	include("header.php");
	//call the functions file
	include("function.php");
	//load the navigation bar
	include("nav.php");
	include("getClearance.php");
	//assign the regnum from the session to the variable $regnum
	$regnum = $_SESSION['username'];
	if(isset($_GET["msg"])){   //check if there is any message in the url to display
		$msg  = $_GET["msg"];
		echo '<div class="alert alert-dismissible alert-success">
		<button type="button" class="close" data-dismiss="alert">x</button>
		'.$msg.' </div>';
	}
	

if(isset($_POST['clear'])){  //listen for the form button click
	    //protect from mysql injection and get form values and MD5 encrypt them

	$secretcode = mysql_real_escape_string(md5($_POST["code"]));
	$inchargecode = mysql_real_escape_string(md5($_POST["clearedby"]));

	    $department = mysql_real_escape_string($GLOBALS['jv_depName']);
		$all_check = explode(" ", $department); //split the department value into and array
		
		//to make students clear from respective halls
		$sql_dep ="";
		$result = "";
		if(isset($all_check[1])){
			$h_name = $all_check[1];
		}else{

		}

		if($all_check[0] == "hall"){

				//create a select query to compare the hall of residence code and incharge code if 
				//they match with those save in the dp. {more like authentication}
			$sql_dep = "SELECT * FROM hall WHERE secretcode = '$secretcode' && inchargecode = '$inchargecode'";
				//Excute Mysqli Query 
			$result = mysqli_query($conn, $sql_dep)  or die("Error: ".mysqli_error($conn));
			$department = "hall";
					//check if there are any rows returned
			if (mysqli_num_rows($result) > 0) {
			//get mysql array and assign it to a varable and loop through it
				while($row = mysqli_fetch_row($result)) {



				//get current date of clearance
					$cleareddate = date("Y-m-d");
				//check if lower department is cleared.
				//order games =>hospi=>police=>hall=>lib=>finance=>facu=>dean

				//update the students table with a yes when the student is cleared
					$clear = "UPDATE students SET $department = 'yes' WHERE regnum = '$regnum'";   
					$result = mysqli_query($conn, $clear)  or die("Error: ".mysqli_error($conn));

					//Here we are building atable of departeds students have cleared with
					$cleared_on = "INSERT INTO clearance(id,department,code,cl_date,regnum)
					VALUES ('', '$department','cleared','$cleareddate','$regnum')";
				//if successful insertiion display alert dialog
					if ($conn->query($cleared_on) === TRUE) {
						echo '<div class="alert alert-dismissible alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						You have been cleared.
					</div>';

				}else{
					echo '<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">x</button>
					Record update failed
				</div>';
				die("Error: ".mysqli_error($conn));

			}
		}

	} else {
		echo '<div class="alert alert-dismissible alert-danger">
		<button type="button" class="close" data-dismiss="alert">x</button>
		Wrong department '.$department.' clearance code;
	</div>';
}

}
else if($all_check[0]== "faculty_dean"){

				//create a select query to compare the faculty code and incharge code if 
				//they match with those save in the dp. {more like authentication}
	$sql_dep = "SELECT secretcode,inchargecode FROM `faculty` WHERE `name` = '$h_name'";

					//Excute Mysqli Query
	$result = mysqli_query($conn, $sql_dep)  or die("Error: ".mysqli_error($conn));
	$department = "faculty_dean";
					//check if there are any rows returned
	if (mysqli_num_rows($result) > 0) {
			//get mysql array and assign it to a varable and loop through it
		while($row = mysqli_fetch_row($result)) {



				//get current date of clearance
			$cleareddate = date("Y-m-d");
				//check if lower department is cleared.
				//order games =>hospi=>police=>hall=>lib=>finance=>facu=>dean

				//update the students table with a yes when the student is cleared
			$clear = "UPDATE students SET $department = 'yes' WHERE regnum = '$regnum'";   
			$result = mysqli_query($conn, $clear)  or die("Error: ".mysqli_error($conn));

					//Here we are building atable of departeds students have cleared with
			$cleared_on = "INSERT INTO clearance(id,department,code,cl_date,regnum)
			VALUES ('', '$department','cleared','$cleareddate','$regnum')";
				//if successful insertiion display alert dialog
			if ($conn->query($cleared_on) === TRUE) {
				echo '<div class="alert alert-dismissible alert-success">
				<button type="button" class="close" data-dismiss="alert">x</button>
				You have been cleared.
			</div>';

		}else{
			echo '<div class="alert alert-dismissible alert-danger">
			<button type="button" class="close" data-dismiss="alert">x</button>
			Record update failed
		</div>';
		die("Error: ".mysqli_error($conn));

	}
}

} else {
	echo '<div class="alert alert-dismissible alert-danger">
	<button type="button" class="close" data-dismiss="alert">x</button>
	Wrong department '.$department.' clearance code;
</div>';
}

}



else{		
				//create a select query to compare the departments code and incharge code if 
				//they match with those save in the dp. {more like authentication}
	$department = $all_check[0];
	
	$sql_dep = "SELECT * FROM `department` WHERE secretcode = '$secretcode' && inchargecode = '$inchargecode'";
				//Excute Mysqli Query
	$result = mysqli_query($conn, $sql_dep)  or die("Error: ".mysqli_error($conn));
					//check if there are any rows returned
	if (mysqli_num_rows($result) > 0) {
			//get mysql array and assign it to a varable and loop through it
		while($row = mysqli_fetch_row($result)) {



				//get current date of clearance
			$cleareddate = date("Y-m-d");
				//check if lower department is cleared.
				//order games =>hospi=>police=>hall=>lib=>finance=>facu=>dean

				//update the students table with a yes when the student is cleared
			$clear = "UPDATE students SET $department = 'yes' WHERE regnum = '$regnum'";   
			$result = mysqli_query($conn, $clear)  or die("Error: ".mysqli_error($conn));

					//Here we are building atable of departeds students have cleared with
			$cleared_on = "INSERT INTO clearance(id,department,code,cl_date,regnum)
			VALUES ('', '$department','cleared','$cleareddate','$regnum')";
				//if successful insertiion display alert dialog
			if ($conn->query($cleared_on) === TRUE) {
				echo '<div class="alert alert-dismissible alert-success">
				<button type="button" class="close" data-dismiss="alert">x</button>
				You have been cleared.
			</div>';

		}else{
			echo '<div class="alert alert-dismissible alert-danger">
			<button type="button" class="close" data-dismiss="alert">x</button>
			Record update failed
		</div>';
		die("Error: ".mysqli_error($conn));

	}
}

} else {
	echo '<div class="alert alert-dismissible alert-danger">
	<button type="button" class="close" data-dismiss="alert">x</button>
	Wrong department '.$department.' clearance code;
</div>';
}

}



	// $page = $_SERVER['PHP_SELF'];
	// $sec = "1";
	// header("Refresh: $sec; url=$page");
}

?>
<script>
//scrip snippet for checking the clearance form
function getData()
{
	var formData = new FormData($("#myform")[0]);
	$.ajax({
		url: 'getClearance.php',
		type:'POST',
		data: formData,
		processData: false,
		contentType: false,
		cache: false,
		mimeType: 'multipart/form-data',
		success: function(html)
		{               
			$("#dataDiv").html(html);


		} 
	});
	return false;
}

</script>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="row clearfix">
				<div class="col-md-8 column">
					<div style="background:#eee;">
						<div id="dataDiv">
						</div>
						<div class="panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Clearance Form</h3>
							</div>
							<div class="panel-body">
								<table class="table">
									<tr>
										<th>
											Department 
										</th>
										<th>
											Clearance
										</th>
										<th>
											Date
										</th>
									</tr>
									<tr>
										<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="myform" accept-charset="UTF-8">
											<td>
												<div class="form-group ">
													<select class="form-control"  onchange='getData()' name='selOption' >
														<option>select Department</option>
														<option value="games_union">Games Union</option>
														<option value="hospital">Hospital</option>
														<option value="hall <?php echo $hall_of_residence;?>">Hall of residence</option>
														<option value="police">Police</option>
														<option value="lib">Library</option>
														<option value="dean">Dean of Students</option>
														<option value="finance">Finace</option>
														<option value="faculty_dean <?php echo $faculty;?>" >Faculty dean</option>
													</select>
												</div>
											</td>
											<td>

												<div class="form-group">

													<input required class="form-control" placeholder="Department clearance code" id="inputDefault" style="width:100%;" name="code"type="password">
												</div>
												<div class="form-group">

													<input required class="form-control" placeholder="Cleared by code" id="inputDefault" style="width:100%;" name="clearedby"type="password">
												</div>



											</td>
											<td>
												<div class="form-group">

													<input class="form-control" disabled=""  placeholder="system generated" value="<?php echo date("Y-m-d");?>" name="name"type="text" >
												</div>

												<div class="form-group" style="float:right;">
													<div class="col-lg-10 col-lg-offset-2" >

														<button type="submit" class="btn btn-primary" name="clear">Submit</button>
													</div>
												</div>
											</td>
										</form>
									</tr>

								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4 column">
					<div class="list-group">
						<a href="#" class="list-group-item active">Cleared Departments</a>
						<?php while ($cl_row = mysqli_fetch_row($dresult) ) {
							
							echo '<div class="list-group-item">
							'.$cl_row[1].'
						</div>';
					}?>

				</div>
			</div>
		</div>
	</div>
</div>
<?php include("includes/footer.php"); } ?>