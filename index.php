<?php
include("header.php");
include("nav.php");
if(isset($_GET["msg"])){
	$msg = $_GET["msg"];
	echo '<div class="alert alert-dismissible alert-danger" style="width:50%;">
	<button type="button" class="close" data-dismiss="alert">x</button>
	'.$msg.'
</div>';}
?>


<?php include("includes/footer.php")?>