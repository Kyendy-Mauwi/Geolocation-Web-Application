<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Personal Infomation</title>
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
      <span class="nav-item active"><a class="nav-link" href="logout.php">Logout<span class="sr-only">(current)</span></a></span></nav>
    <header>
      <div class="jumbotron">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h1 class="text-center">To change your personal information, fill up the form below</h1>
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
                <h2>Update Admin Personal Information</h2>
              </div>
              <div class="text-center col-12">
                <!-- CONTACT FORM https://github.com/jonmbake/bootstrap3-contact-form -->
                <form id="feedbackForm" action="reset_admin_personal_info.php" method="post" class="text-center">
                  <div class="form-group">
                    <label for="new_admin_name">New Admin Name</label>
                    <input type="text" class="form-control" id="new_admin_name" name="new_admin_name" placeholder="New Admin Name" aria-describedby="nameHelp">
                    <span id="nameHelp" class="form-text text-muted" style="display: none;">Please enter new admin name.</span>
                  </div>
                  <div class="form-group">
                    <label for="new_admin_phone_number">New Admin Phone Number</label>
                    <input type="text" class="form-control" id="new_admin_phone_number" name="new_admin_phone_number" placeholder="New Admin Phone Number">
                    <span  class="form-text text-muted" style="display: none;">Please enter your new admin phone number.</span> </div>
<button type="submit" id="feedbackSubmit" onclick="myFunction()" class="btn btn-primary btn-lg"> Update</button>
					<script>
						function myFunction() {
  							alert("Personal Information Changed Successfully");
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
	  <script>
	  function onclick(){
		  alert("Sucessfully updated");
	  }
	  </script>
  </body>
</html>