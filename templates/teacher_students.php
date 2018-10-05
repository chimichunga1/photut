<?php require_once('../connection.php'); ?>
<?php require_once('dataTables.php'); ?>

<div class="container">
<form method="POST" action="save_data.php">
	<br>


<table class="table table-striped table-bordered" id = "teacher_table">
<thead>
<tr>

<th>Section Name </th>
<th>Username </th>
<th> Actions </th>

</tr>
</thead>
    <tbody>
<?php 
/*		$table2 = "SELECT user_accounts.user_id, user_accounts.user_fname, user_accounts.user_lname, user_accounts.username, user_accounts.password 
		FROM user_accounts RIGHT JOIN section_table ON section_table.user_id=user_accounts.user_id";*/
		$table2 = "SELECT section_table.section_id,section_table.section_name,student_section_enroll.student_id,user_accounts.username
            FROM section_table
            RIGHT JOIN student_section_enroll ON section_table.section_id=student_section_enroll.section_id 
            RIGHT JOIN user_accounts ON user_accounts.user_id = student_section_enroll.student_id
            WHERE student_section_enroll.student_status='0'";
        $run_query2b = mysqli_query($connect,$table2);

            while($row = mysqli_fetch_array($run_query2b))

        {


        	
        	
        	?>
<tr>
            <td><?php echo $row['section_name'];?></td>
            <td><?php echo $row['username']?></td>

     
            <td> 
      
        <input type="hidden" name="section_id" value="<?php echo $row['section_id'];?>">
         <input type="hidden" name="user_id" value="<?php echo $row['student_id'];?>">       
        <button type="submit" class="btn btn-primary" name="approve_student"> <i class="fa fa-check"></i> Approve</button>
<!--                 <div class="dropdown">
                <a class = "dropdown-toggle" type="button" data-toggle="dropdown" href = ""> Options
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li> <a href = "" > Enroll to Section </a> </li>
                </ul>
                </div> -->
            </td>
</tr>




    <!--End Modal Signup-->
    <!--End Modal Signup-->
    <!--End Modal Signup-->
    <!--End Modal Signup-->
</form>
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