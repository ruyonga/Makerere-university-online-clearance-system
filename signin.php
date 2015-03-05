<?php include("header.php");?>
    <link href="includes/signin.css" rel="stylesheet">
    <div class="container">

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

    </div> <!-- /container -->

