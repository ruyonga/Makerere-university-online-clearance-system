
    <link href="includes/signin.css" rel="stylesheet">
    <div class="container">
    <?php include("header.php");
    if(isset($_GET["msg"])){
  $msg = $_GET["msg"];
  echo '<div class="alert alert-dismissible alert-danger" style="width:50%; text-align:center;margin-left:20%;">
  <button type="button" class="close" data-dismiss="alert">x</button>
  '.$msg.'
</div>';}

?>
<link href="includes/signin.css" rel="stylesheet">
<fieldset>

      <form class="form-signin" action="loginproc.php" method="post">
        <h2 class="form-signin-heading" style="color:#ffffff">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Registration Number</label>
        <input type="text" id="inputEmail" class="form-control" name="username" placeholder="Registration Number" required autofocus>
        <label for="inputPassword" class="sr-only">Student Number</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="student number" required>
        <div class="checkbox" style="color:#ffffff">
          <label>
            <input type="checkbox" value="remember-me" style="color:#ffffff"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-success btn-block" type="submit">Sign in</button>
      </form>
</fieldset>
    </div> <!-- /container -->

