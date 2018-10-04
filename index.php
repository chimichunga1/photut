<!DOCTYPE html>
<html>

<?php require("link.php"); ?>

<head>
	<title>Home</title>
</head>
    <!--Navbar-->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
                <a class="navbar-brand" href="#">System name</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
        
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li> <a href="" data-toggle="modal" data-target="#signin"> <span class = "fa fa-sign-in-alt"></span> Sign in </a> </li>
                    <li> <a href="" data-toggle="modal" data-target="#create"> <span class = "fa fa-pencil-alt"></span> Create Account </a> </li>
                </ul>
            </div>
        </div>
    </nav>
<body>

</body>




<!-- Modal -->
<div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Log in</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form method="POST" action="accounts_login.php">
      <div class="modal-body">

            <div class="input-group  col-md-12">
              <label id="basic-addon1">Username</label>
              <input type="text" class="form-control" placeholder="Username..." aria-describedby="basic-addon1" name="username" required>
            </div>
                    <br>
            <div class="input-group  col-md-12">
              <label id="basic-addon1">Password</label>
              <input type="password" class="form-control" placeholder="Password..." aria-describedby="basic-addon1" name="password" required=""> 
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="account_login">Login</button>
      </div>
    </form>
    </div>
  </div>
</div>
    <!--End Modal Signup-->
    <!--End Modal Signup-->
    <!--End Modal Signup-->
    <!--End Modal Signup-->


    <div id="create" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Fill up the information </h4>
                </div>
                <div class="modal-body">
                    <!--Signup Form-->
                    <form method="post" action="register.php">
<!--                         <div class = "form-group">                        
                            <label> User Type </label>
                            <select class = "form-control" required name = "user_type" id = "usertype">
        
                                <option value = "Student" selected="selected" disabled>Student</option>
            
                            </select>
                        </div> -->
                        <div class = "form-group">
                            <label> First name </label>
                            <input type = "text" class = "form-control"  name = "user_firstname" required>
                        </div>
                        <div class = "form-group">
                            <label> Last name </label>
                            <input type = "text" class = "form-control" name = "user_lastname" required>
                        </div>
                        <div class = "form-group">
                            <label> Username </label>
                            <input type = "text" class = "form-control" id = "username" name = "user_username" required>
                            <p id = "result"> </p>
   
                        </div>
                        <div class = "form-group">
                            <label> Password </label>
                            <input type = "password" class = "form-control" id = "password" name="password" required>
                        </div>
                        <div class = "form-group">
                            <label> Confirm Password </label>
                            <input type = "password" class = "form-control" id = "password_confirm"  name = "password_confirm" required>
                        </div>
                        <center>
                            <button type = "submit" class = "btn btn-success" name = "create_account"> Create account </button>
                        </center>
                    </form>
                    <!--End Signup Form-->
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!--End Modal Signup-->




</html>