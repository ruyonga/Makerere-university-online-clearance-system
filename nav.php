<?php include("function.php");
error_reporting(0);
?>

<div class="navbar  navbar-default" style="font-size:1.1em; font-weight:bold; height:130px; background:#51AD5F;">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php"><img id="logo"src="includes/img/maklogo.png" style="height:150px; width:100%; margin-top:-20%; padding:7%;"></a>
  </div>
  <div class="navbar-collapse collapse navbar-inverse-collapse">

  </li>
</ul>
<ul class="nav navbar-nav ">
  <?php 
  if(!isset($_SESSION['username'])){ 
        echo "<li ><h3 sytle='text-align:center;'>MAKERERE UNIVERSITY ONLINE CLEARANCE SYSTEM</h3></li>";
    echo '<li style="float:right; padding-right:-30%;"><a href="signin.php">Login</a></li>';
  }else {
    echo "<li> <a>Name: $name </a> </li>";

    echo "<li><a> Std Number: $stdnum </a></li>";

    echo " <li><a>Reg Number: $regnum </a></li>";
    echo '<li><a  href="includes/logout.php">Log out</a></li>';
    echo '<div class="nav navbar-nav navbar-right">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php"><img id="logo"src="includes/img/maklogo.png" style="height:150px; width:100%; margin-top:-20%; padding:7%;"></a>
  </div>';
}
?>
</ul>

</div>
</div>
</div>