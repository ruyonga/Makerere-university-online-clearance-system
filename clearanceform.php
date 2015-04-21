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
	?>
	<div class="container">
		<?php
	//assign the regnum from the session to the variable $regnum
		$regnum = $_SESSION['username'];
	if(isset($_GET["msg"])){   //check if there is any message in the url to display
		$msg  = $_GET["msg"];
		echo '<div class="alert alert-dismissible alert-success">
		<button type="button" class="close" data-dismiss="alert">x</button>
		'.$msg.' </div>';
	}
	

if(isset($_POST['clear'])){  //listen for the form button click
	$dep = $_POST['selOption'];	

	//$department = mysql_real_escape_string($GLOBALS['jv_depName']);
		$all_check = explode(" ", $dep); //split the department value into and array
		
		//to make students clear from respective halls
		//THE SYSTEM QUERYS FOR THE ATTACHEMENT HALL
		$sql_dep ="";
		$result = "";
		if($all_check[0] == "hall"){
			if(isset($all_check[1])){
				$h_name = $all_check[1];
				$hall_clear = "SELECT * FROM $h_name WHERE regnum = '$regnum'";
				$act = mysqli_query($conn, $hall_clear);
				$cleareddate = date('y-m-d');
				if (mysqli_num_rows($act) > 0) {
					while ($row = mysqli_fetch_row($act)) {
						if($row[2] == 'yes'){

							$cleared_on = "INSERT INTO clearance(id,department,code,cl_date,regnum)
							VALUES ('', '$dep','cleared','$cleareddate','$regnum')";
	//if successful insertiion display alert dialog
							if ($conn->query($cleared_on) === TRUE) {
								$msg ="You have cleared with 	".$h_name ." hall";
								echo '<div class="alert alert-dismissible alert-success">
								<button type="button" class="close" data-dismiss="alert">x</button>
								'.$msg.' </div>';

							}
						}
					}
				}else{
					$msg = "Clearance Failed contact the person in charge";
					echo '<div class="alert alert-dismissible alert-warning">
					<button type="button" class="close" data-dismiss="alert">x</button>
					'.$msg.' </div>';	
				}
			}
		}else if($all_check[0] == "games_union"){

			$clear = "SELECT * FROM $all_check[0] WHERE regnum = '$regnum'";
			$act = mysqli_query($conn, $clear);
			$cleareddate = date('y-m-d');
			if (mysqli_num_rows($act) > 0) {
				while ($row = mysqli_fetch_row($act)) {
					if($row[2] == 'yes'){

						$cleared_on = "INSERT INTO clearance(id,department,code,cl_date,regnum)
						VALUES ('', '$dep','cleared','$cleareddate','$regnum')";
	//if successful insertiion display alert dialog
						if ($conn->query($cleared_on) === TRUE) {
							$msg ="You have cleared with 	".$all_check[0]." hall";
							echo '<div class="alert alert-dismissible alert-success">
							<button type="button" class="close" data-dismiss="alert">x</button>
							'.$msg.' </div>';

						}
					}
				}
			}else{
				$msg = "Clearance Failed contact the person in charge";
				echo '<div class="alert alert-dismissible alert-warning">
				<button type="button" class="close" data-dismiss="alert">x</button>
				'.$msg.' </div>';	
			}


		}else if($all_check[0] == "hospital"){
			$clear = "SELECT * FROM $all_check[0] WHERE regnum = '$regnum'";
			$act = mysqli_query($conn, $clear);
			$cleareddate = date('y-m-d');
			if (mysqli_num_rows($act) > 0) {
				while ($row = mysqli_fetch_row($act)) {
					if($row[2] == 'yes'){

						$cleared_on = "INSERT INTO clearance(id,department,code,cl_date,regnum)
						VALUES ('', '$dep','cleared','$cleareddate','$regnum')";
	//if successful insertiion display alert dialog
						if ($conn->query($cleared_on) === TRUE) {
							$msg ="You have cleared with 	".$all_check[0]." hall";
							echo '<div class="alert alert-dismissible alert-success">
							<button type="button" class="close" data-dismiss="alert">x</button>
							'.$msg.' </div>';

						}
					}
				}
			}else{
				$msg = "Clearance Failed contact the person in charge";
				echo '<div class="alert alert-dismissible alert-warning">
				<button type="button" class="close" data-dismiss="alert">x</button>
				'.$msg.' </div>';	
			}

		}else if($all_check[0] == "police"){
			$clear = "SELECT * FROM $all_check[0] WHERE regnum = '$regnum'";
			$act = mysqli_query($conn, $clear);
			$cleareddate = date('y-m-d');
			if (mysqli_num_rows($act) > 0) {
				while ($row = mysqli_fetch_row($act)) {
					if($row[2] == 'yes'){

						$cleared_on = "INSERT INTO clearance(id,department,code,cl_date,regnum)
						VALUES ('', '$dep','cleared','$cleareddate','$regnum')";
	//if successful insertiion display alert dialog
						if ($conn->query($cleared_on) === TRUE) {
							$msg ="You have cleared with 	".$all_check[0]." hall";
							echo '<div class="alert alert-dismissible alert-success">
							<button type="button" class="close" data-dismiss="alert">x</button>
							'.$msg.' </div>';

						}
					}
				}
			}else{
				$msg = "Clearance Failed contact the person in charge";
				echo '<div class="alert alert-dismissible alert-warning">
				<button type="button" class="close" data-dismiss="alert">x</button>
				'.$msg.' </div>';	
			}
		}else if($all_check[0] == "lib"){
			$clear = "SELECT * FROM $all_check[0] WHERE regnum = '$regnum'";
			$act = mysqli_query($conn, $clear);
			$cleareddate = date('y-m-d');
			if (mysqli_num_rows($act) > 0) {
				while ($row = mysqli_fetch_row($act)) {
					if($row[2] == 'yes'){

						$cleared_on = "INSERT INTO clearance(id,department,code,cl_date,regnum)
						VALUES ('', '$dep','cleared','$cleareddate','$regnum')";
	//if successful insertiion display alert dialog
						if ($conn->query($cleared_on) === TRUE) {
							$msg ="You have cleared with 	".$all_check[0]." hall";
							echo '<div class="alert alert-dismissible alert-success">
							<button type="button" class="close" data-dismiss="alert">x</button>
							'.$msg.' </div>';

						}
					}
				}
			}else{
				$msg = "Clearance Failed contact the person in charge";
				echo '<div class="alert alert-dismissible alert-warning">
				<button type="button" class="close" data-dismiss="alert">x</button>
				'.$msg.' </div>';	
			}
		}else if($all_check[0] == "finance"){
			$clear = "SELECT * FROM $all_check[0] WHERE regnum = '$regnum'";
			$act = mysqli_query($conn, $clear);
			$cleareddate = date('y-m-d');
			if (mysqli_num_rows($act) > 0) {
				while ($row = mysqli_fetch_row($act)) {
					if($row[2] == 'yes'){

						$cleared_on = "INSERT INTO clearance(id,department,code,cl_date,regnum)
						VALUES ('', '$dep','cleared','$cleareddate','$regnum')";
	//if successful insertiion display alert dialog
						if ($conn->query($cleared_on) === TRUE) {
							$msg ="You have cleared with 	".$all_check[0]." hall";
							echo '<div class="alert alert-dismissible alert-success">
							<button type="button" class="close" data-dismiss="alert">x</button>
							'.$msg.' </div>';

						}
					}
				}
			}else{
				$msg = "Clearance Failed contact the person in charge";
				echo '<div class="alert alert-dismissible alert-warning">
				<button type="button" class="close" data-dismiss="alert">x</button>
				'.$msg.' </div>';	
			}
		}else if($all_check[0] == "dean"){
			if($faculty_dean != "yes"){
				$msg = "Clearance Failed, please contact the  Dean of Studies at the Senate";
				echo '<div class="alert alert-dismissible alert-warning">
				<button type="button" class="close" data-dismiss="alert">x</button>
				'.$msg.' </div>';
			}else{
				$cleared_on = "INSERT INTO clearance(id,department,code,cl_date,regnum)
				VALUES ('', '$dep','cleared','$cleareddate','$regnum')";
	//if successful insertiion display alert dialog
				if ($conn->query($cleared_on) === TRUE) {
					$msg ="You have cleared with 	".$all_check[0]." hall";
					echo '<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">x</button>
					'.$msg.' </div>';

				}
			}
		}else if($all_check[0] == "faculty_dean"){
			if($faculty_dean != "yes"){
				$msg = "Clearance Failed, please contact the Faculty Dean";
				echo '<div class="alert alert-dismissible alert-warning">
				<button type="button" class="close" data-dismiss="alert">x</button>
				'.$msg.' </div>';
			}else{
				$cleared_on = "INSERT INTO clearance(id,department,code,cl_date,regnum)
				VALUES ('', '$dep','cleared','$cleareddate','$regnum')";
	//if successful insertiion display alert dialog
				if ($conn->query($cleared_on) === TRUE) {
					$msg ="You have cleared with 	".$all_check[0]." hall";
					echo '<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">x</button>
					'.$msg.' </div>';

				}
			}
		}

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
				<!-- <td>

												<div class="form-group">

													<input required class="form-control" placeholder="Department clearance code" id="inputDefault" style="width:100%;" name="code"type="password">
												</div>
												<div class="form-group">

													<input required class="form-control" placeholder="Cleared by code" id="inputDefault" style="width:100%;" name="clearedby"type="password">
												</div>



											</td> -->
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