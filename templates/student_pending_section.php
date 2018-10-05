<?php require_once('../connection.php'); ?>
<?php require_once('dataTables.php'); ?>

<div class="container">

	<br>


<table class="table table-striped table-bordered" id = "teacher_table">
<thead>
<tr>
<th>Section ID</th>
<th>Section Name </th>


</tr>
</thead>
    <tbody>
<?php 


        $get_session_id = $_SESSION['user_id'];


/*		$table2 = "SELECT user_accounts.user_id, user_accounts.user_fname, user_accounts.user_lname, user_accounts.username, user_accounts.password 
		FROM user_accounts RIGHT JOIN section_table ON section_table.user_id=user_accounts.user_id";*/
		$table2 = "SELECT * FROM student_section_enroll WHERE student_id = '$get_session_id' AND student_status = '0'";
        $run_query2b = mysqli_query($connect,$table2);

            while($row = mysqli_fetch_array($run_query2b))

        {


        	
        	
        	?>
<tr>
            <td><?php echo $row['section_id'];?></td>
            <td><?php echo $row['section_id']?></td>

     

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