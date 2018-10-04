<?php require("link.php"); ?>     
<br>
        <div class = "container">
            <div class = "col-xs-3"></div>
            <div class = "col-xs-6">
  
                <div class = "jumbotron">
                    <center>
                        <h3 class = "text-primary"> Administrator Login </h3>
                    </center>
                    <form method = "post" action = "register.php">
                        <div class = "form-group">
                            <label> <span class = "fa fa-user"> </span> Username </label>
                            <input type = "text" class = "form-control" required name = "username">
                        </div>
                        <div class = "form-group">
                            <label> <span class = "fa fa-lock"> </span> Password </label>
                            <input type = "password" class = "form-control" required name = "password">
                        </div>
                        <center>
                            <button type = "submit" class = "btn btn-primary" name = "signin"> Sign in </button>
                        </center>
                    </form>
                </div>
            </div>
            <div class = "col-xs-3"></div>
        </div>