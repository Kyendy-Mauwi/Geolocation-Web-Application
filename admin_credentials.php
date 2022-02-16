<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Admin Password</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.3.1.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active"> <a class="nav-link" href="admin_profile.php">Home <span class="sr-only">(current)</span></a> </li>
          <li class="nav-item"> </li>
          
        </ul>
        <form class="form-inline my-2 my-lg-0">
</form>
      </div>
      <span class="nav-item active"><a class="nav-link" href="logout.php">Logout<span class="sr-only"></span></a></span></nav>
    <header>
      <div class="jumbotron">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h1 class="text-center">To Change Your Credentials, Fill Up The Form Below</h1>
              <p class="text-center">&nbsp;</p>
              <p>&nbsp;</p>
</div>
          </div>
        </div>
      </div>
    </header>
<div class="container">
  <div class="row">
        <div class="col-12 col-md-8 mx-auto">
          <div class="jumbotron">
            <div class="row text-center">
              <div class="text-center col-12">
                <h2>Update Admin Credential</h2>
              </div>
              <div class="text-center col-12">
                <!-- CONTACT FORM https://github.com/jonmbake/bootstrap3-contact-form -->
                <form id="feedbackForm" action="reset_admin_password.php" method="POST" class="text-center">
                 
							<div class="form-group">
                    <label for="new_admin_password">New Admin Password</label>
                    <input type="password" class="form-control" id="new_admin_password" name="new_admin_password" placeholder="New Admin Password">
                    <span id="nameHelp" class="form-text text-muted" style="display: none;">Please Enter New Admin Password</span>
                  </div>
                  <div class="form-group">
                    <label for="confirm_new_admin_password">Confirm New Admin Password</label>
                    <input type="password" class="form-control" id="confirm_new_admin_password" name="confirm_new_admin_password" placeholder="Confirm New Admin Password" >
                    <span id="emailHelp" class="form-text text-muted" style="display: none;">Please Confirm New Admin Password</span>
                  </div>
					<button type="submit" id="feedbackSubmit" 
					onclick="myFunction()" class="btn btn-primary btn-lg">Update</button>
					<script>
						function myFunction() {
  							alert("Password Changed Successfully");
						}
					</script>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="text-center">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <p>Copyright © RYAN KIBET. All rights reserved.</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="js/jquery-3.3.1.min.js"></script> 
    <!-- Include all compiled plugins (below), or include individual files as needed --> 
    <script src="js/popper.min.js"></script> 
    <script src="js/bootstrap-4.3.1.js"></script>
	  
  </body>
</html>