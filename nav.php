<?php include("function.php");?>

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
</ul><ul class="nav navbar-nav ">

       <li> <a>Name:<?php echo $name;?></a> </li>
      
       <li><a> Std Number: <?php echo $stdnum;?></a></li>
           
        <li><a>Reg Number: <?php echo $regnum;?></a></li>
 </ul> 
<ul class="nav navbar-nav navbar-right">
  <?php 
  if(!isset($_SESSION['username'])){

    echo '<li ><a href="signin.php">Clearance System</a></li>';
  }else {
  
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