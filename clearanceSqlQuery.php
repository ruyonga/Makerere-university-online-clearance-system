<?php
if(isset($_POST['clear'])){  //listen for the form button click
	    //protect from mysql injection and get form values and MD5 encrypt them

		$secretcode = mysql_real_escape_string(md5($_POST["code"]));
		$inchargecode = mysql_real_escape_string(md5($_POST["clearedby"]));

		echo $department = mysql_real_escape_string($GLOBALS['jv_depName']);
		$all_check = explode(" ", $department); //split the department value into and array
		
		//to make students clear from respective halls
		$sql_dep ="";
		$result = "";
		echo $h_name = $all_check[1];
		
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


if($all_check[0]== "faculty_dean"){

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



if($department != ("hall" || "faculty_dean")){		
				//create a select query to compare the departments code and incharge code if 
				//they match with those save in the dp. {more like authentication}
	$sql_dep = "SELECT secretcode,inchargecode FROM `department` WHERE `name` = '$department'";
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