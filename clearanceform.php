<?php

// Inialize session
session_start();

//check if user is logged in
if(!isset($_SESSION['username'])){
	//if user aint logged in redirect to the index page with
	header("Location:index.php?msg='login please!!'");
}else{

	include("header.php");
	include("function.php");
	include("nav.php");
	if(isset($_GET["msg"])){
		$msg  = $_GET["msg"];
		echo '<div class="alert alert-dismissible alert-success">
		<button type="button" class="close" data-dismiss="alert">x</button>
		'.$msg.' </div>';
	}
	if(isset($_POST['gamesunion'])){
		$secretcode = $_POST["code"];
		$sql = "INSERT INTO drugs (id, name , medical)
			VALUES ('', '$name', '$medical')";

			if ($conn->query($sql) === TRUE) {

				echo '<div class="alert alert-dismissible alert-success">
				<button type="button" class="close" data-dismiss="alert">x</button>
				New record created successfully
			</div>';
			$page = $_SERVER['PHP_SELF'];
			$sec = "1";
			header("Refresh: $sec; url=$page");
		
	}
}
	?>
	<div class="main" style="background:#eee;">
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
						<td>
							Games Union
						</td>
						<td>
							<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="formLogin" accept-charset="UTF-8">
								<div class="form-group">
									
									<input class="form-control" placeholder="Department clearance code" id="inputDefault" style="width:100%;" name="code"type="password">
								</div>

								
							</td>
							<td>
								<div class="form-group">
									
									<input class="form-control" disabled=""value='<?php echo date("Y-m-d");?>'  name="name"type="text" >
								</div>
								<div class="form-group" style="float:right;">
									<div class="col-lg-10 col-lg-offset-2" >
										
										<button type="submit" class="btn btn-primary" name="adddrug">Submit</button>
									</div>
								</div>
							</td>
						</form>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<?php include("includes/footer.php"); } ?>