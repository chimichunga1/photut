<?php require_once('../connection.php'); ?>
<?php require_once('dataTables.php'); ?>

<div class="container">

	<br>
<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fa fa-plus"></i> Add Teacher Account
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">

<form action="save_data.php" method="POST">
First Name : 
<br>
  <input type="text" class="form-control col-md-12" placeholder="First Name" name="firstname">
<br>
Last Name : 
<br>
  <input type="text" class="form-control col-md-12" placeholder="Last Name" name="lastname">
<br>
Username : 
<br>
  <input type="text" class="form-control col-md-12" placeholder="Username" name="username">
<br>
Password : 
<br>
  <input type="text" class="form-control col-md-12" placeholder="Password" name="password">
<br>



 <br>
 <button type="submit" name="add_teacher" value="Create" class="btn btn-success">Create </button>

</form>
      </div>
    </div>
  </div>

</div>
<br>
<br>

<table class="table table-striped table-bordered" id = "teacher_table">
<thead>
<tr>
<th>Teacher ID</th>
<th> Full Name </th>
<th> Username </th>
<th> Password </th>
<th> Actions </th>

</tr>
</thead>
    <tbody>
<?php 
/*		$table2 = "SELECT user_accounts.user_id, user_accounts.user_fname, user_accounts.user_lname, user_accounts.username, user_accounts.password 
		FROM user_accounts RIGHT JOIN section_table ON section_table.user_id=user_accounts.user_id";*/
		$table2 = "SELECT * FROM user_accounts WHERE AccessRight = '2'";
        $run_query2b = mysqli_query($connect,$table2);

            while($row = mysqli_fetch_array($run_query2b))

        {


        	$get_event = $row["user_id"];
        	
        	?>
<tr>
            <td><?php echo $row['user_id'];?></td>
            <td><?php echo $row['user_fname'].' '.$row['user_lname'];?></td>
            <td><?php echo $row['username'];?></td>
            <td><?php echo $row['password'];?></td>
     
            <td> 
     
                <div class="dropdown">
                <a class = "dropdown-toggle" type="button" data-toggle="dropdown" href = ""> Options
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li> <a href = "" data-toggle = "modal" data-target = "#view_sections"> View Sections </a> </li>
                </ul>
                </div>
            </td>
</tr>


<?php
        }

        

?>    	



    </tbody>
</table>














<script type="text/javascript">
	$(document).ready( function () {
    $('#teacher_table').DataTable();
} );
</script>




</div>