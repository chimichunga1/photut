<?php require_once('../connection.php'); ?>
<?php require_once('dataTables.php'); ?>

<div class="container">

	<br>
<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fa fa-plus"></i> Add Section
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">

<form action="save_data.php" method="POST">
Section Code : 
<br>
  <input type="text" class="form-control col-md-12" placeholder="Section Code" name="section_code" required>
<br>



 <br>
 <button type="submit" name="add_section" value="Create" class="btn btn-success">Create </button>

</form>
      </div>
    </div>
  </div>

</div>

<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-plus"></i> Tag Professor to Section
        </button>
      </h5>
    </div>

    <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">

<form action="save_data.php" method="POST">
Section Code : 
<br>

<select name="get_select_section" required>
	<?php 
		$table_select_section = "SELECT * FROM section_table";
        $run_query_select_section = mysqli_query($connect,$table_select_section);

            while($row_select_section = mysqli_fetch_array($run_query_select_section))

        {
        	?>

		<option value="<?php echo $row_select_section['section_id']; ?>"> <?php echo $row_select_section['section_name']; ?> </option>


		<?php 
	}

?>
</select>


Professor : 


<select  name="get_select_professor" required>
	<?php 

		$table_select_section = "SELECT user_accounts.user_id, user_accounts.user_fname, user_accounts.user_lname, user_accounts.username, user_accounts.password
			FROM user_accounts
			RIGHT JOIN teacher_table ON teacher_table.user_id=user_accounts.user_id";
        $run_query_select_section = mysqli_query($connect,$table_select_section);

            while($row_select_section = mysqli_fetch_array($run_query_select_section))

        {
        	?>

		<option value="<?php echo $row_select_section['user_id']; ?>"> <?php echo $row_select_section['username']; ?> </option>


		<?php 
	}

?>

</select>

<br>


 <br>
 <button type="submit" name="tag_professor_to_section" value="Create" class="btn btn-success">Tag </button>

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
<th>Section ID</th>
<th>Section Code</th>


</tr>
</thead>
    <tbody>
<?php 
/*		$table2 = "SELECT user_accounts.user_id, user_accounts.user_fname, user_accounts.user_lname, user_accounts.username, user_accounts.password 
		FROM user_accounts RIGHT JOIN section_table ON section_table.user_id=user_accounts.user_id";*/
		$table2 = "SELECT * FROM section_table";
        $run_query2b = mysqli_query($connect,$table2);

            while($row = mysqli_fetch_array($run_query2b))

        {


        	$get_event = $row["user_id"];
        	$Mymodal="sectionmodal".$row['section_id'];
        	?>
        	
<tr>
            <td><?php echo $row['section_id'];?></td>
            <td><?php echo $row['section_name'];?></td>

       
 <!--     
            <td> 
     
                <div class="dropdown">
                <a class = "dropdown-toggle" type="button" data-toggle="dropdown" href = ""> Options
                <span class="caret"></span></a>
                <ul class="dropdown-menu">

 <li> <a href = "" data-toggle = "modal" data-target = "#test"> View Enrolled </a> </li>           
                </ul>
                </div>
            </td> -->
</tr>

<?php
  echo
"
    <form action='save_data.php' method='POST' role='form'>
    <div id='".$Mymodal."' class='modal fade'>";?>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                    <h4 class='modal-title' style='color:black;'>DELETE FORM </h4>
                </div>
                <div class='modal-body'>
                 


Select a Professor : 
					<br>
					
					<select class="form-control" name="get_section_id"> 
		<?php 

		$run_modal_query = "SELECT user_accounts.user_id, user_accounts.user_fname, user_accounts.user_lname, user_accounts.username, user_accounts.password
		FROM user_accounts
		RIGHT JOIN teacher_table ON teacher_table.user_id=user_accounts.user_id   WHERE teacher_table.isAssigned = '0'
		";
        $get_modal_query = mysqli_query($connect,$run_modal_query);
            while($row_modal = mysqli_fetch_array($get_modal_query))
        {
        	?>
				<option value="<?php $row_modal['username'] ?>"><?php echo $row_modal['username'] ?></option>
			<?php 
		}
	
?>
					</select>


					<?php echo"
					<input type='hidden' value='".$row['section_id']."' name='section_id'>";?>
                </div>
            <div class="modal-footer">
           <input type="submit" />      	

</form>
        </div>
      </div>
    </div>
  </div>

        


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