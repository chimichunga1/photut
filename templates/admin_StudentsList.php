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

<th> Actions </th>

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
                    <li> <a href = "" data-toggle = "modal" data-target = "#view_sections"> View Status </a> </li>
                     <li> <a href = "" data-toggle = "modal" data-target = "#view_sections"> View Quizzes </a> </li>                   
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