<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agent Personal Information</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.3.1.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active"> <a class="nav-link" href="agent.php">Home <span class="sr-only">(current)</span></a> </li>
          <li class="nav-item"> </li>
          <li class="nav-item dropdown">
  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Something else here</a> 
    </div>
          </li>
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
              <h1 class="text-center">To Change Your Personal Information, Fill Up Th Form Below</h1>
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
                <h2>Update Agent Personal Information</h2>
              </div>
              <div class="text-center col-12">
                <!-- CONTACT FORM https://github.com/jonmbake/bootstrap3-contact-form -->
                <form id="feedbackForm" action="reset_agent_personal_info.php" method="POST" class="text-center">
                  <div class="form-group">
                    <label for="new_agent_name">New Agent Name</label>
                    <input type="text" class="form-control" id="new_agent_name" name="new_agent_name" placeholder="New Agent Name" aria-describedby="nameHelp">
                    <span id="nameHelp" class="form-text text-muted" style="display: none;">Please Enter New Agent Name.</span>
                  </div>
                  <div class="form-group">
                    <label for="new_agent_email">New Agent Email</label>
                    <input type="email" class="form-control" id="new_agent_email" name="new_agent_email" placeholder="New Agent Email" aria-describedby="emailHelp">
                    <span id="emailHelp" class="form-text text-muted" style="display: none;">Please Enter A Valid New Agent Email</span>
                  </div>
                  <div class="form-group">
                    <label for="new_agent_phone_number">New Agent Phone Number</label>
                    <input type="text" class="form-control" id="new_agent_phone_number" name="new_agent_phone_number" placeholder="New Agent Phone Number" aria-describedby="emailHelp">
                    <span id="emailHelp2" class="form-text text-muted" style="display: none;">Please Enter New Agent Phone Number</span> </div>
<button type="submit" id="feedbackSubmit" onclick="myFunction()" class="btn btn-primary btn-lg">Update</button>
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
  </body>
</html>