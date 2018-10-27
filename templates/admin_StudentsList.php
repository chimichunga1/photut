<?php require_once('../connection.php'); ?>
<?php require_once('dataTables.php'); ?>

<div class="container">
<br>

<br>

<table class="table table-striped table-bordered" id = "teacher_table">
<thead>
<tr>
<th>Student ID</th>
<th> Full Name </th>
<th> Username </th>
<th> Password </th>

<!-- <th> Actions </th> -->

</tr>
</thead>
    <tbody>
<?php 





$table2 = "SELECT user_accounts.user_id, user_accounts.user_fname, user_accounts.user_lname, user_accounts.username, user_accounts.password
			FROM user_accounts
			RIGHT JOIN student_table ON student_table.user_id=user_accounts.user_id   WHERE user_accounts.isDeleted = '0' AND user_accounts.AccessRight='3'";


/*		$table2 = "SELECT user_accounts.user_id, user_accounts.user_fname, user_accounts.user_lname, user_accounts.username, user_accounts.password, section_table.section_id, section_table.section_name, section_table.user_professor_name 
			FROM user_accounts
			RIGHT JOIN student_table ON student_table.user_id=user_accounts.user_id
			RIGHT JOIN section_table ON section_table.section_id = section_table.section_id
			";*/
        $run_query2b = mysqli_query($connect,$table2);

            while($row = mysqli_fetch_array($run_query2b))

        {


        	$get_event = $row["user_id"];
        	$user_activatemodal="user_activatemodal".$row['user_id'];
            $user_deactivatemodal="user_deactivatemodal".$row['user_id'];
        	?>
<tr>
            <td><?php echo $row['user_id'];?></td>
            <td><?php echo $row['user_fname'].' '.$row['user_lname'];?></td>
            <td><?php echo $row['username'];?></td>
            <td><?php echo $row['password'];?></td>
  

            <?php

echo
"
    
    <!-- Modal HTML -->
    <div id='".$user_activatemodal."' class='modal fade'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                    <h4 class='modal-title'>USER ACTIVATE </h4>
                </div>
                <div class='modal-body'>
                 


    <div class='form-group'>
    ";?>


Would you like to Activate this user?



    <?php
echo
"    </div>
                </div>
                <div class='modal-footer'>
<form method='POST' action='save_data.php'>
                <input type='hidden' name='get_userid' value='".$row['user_id']."'>


                    <button type='submit' name='admin_activateuser'  class='btn btn-success'>Yes</button>
                    <button type='button' class='btn btn-danger' data-dismiss='modal'>No</button>
  </form>
                </div>
            </div>
        </div>
    </div>
";


echo
"
    
    <!-- Modal HTML -->
    <div id='".$user_deactivatemodal."' class='modal fade'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                    <h4 class='modal-title'>USER DEACTIVATE </h4>
                </div>
                <div class='modal-body'>
                 


    <div class='form-group'>
    ";?>



Would you like to Deactivate this user?


    <?php
echo
"    </div>
                </div>
                <div class='modal-footer'>
<form method='POST' action='save_data.php'>

                                <input type='hidden' name='get_userid' value='".$row['user_id']."'>
                    <button type='submit' name='admin_deactivateuser'  class='btn btn-success'>Yes</button>
                    <button type='button' class='btn btn-danger' data-dismiss='modal'>No</button>
  </form>
                </div>
            </div>
        </div>
    </div>
";


             ?>




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