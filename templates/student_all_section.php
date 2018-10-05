<?php require_once('../connection.php'); ?>
<?php require_once('dataTables.php'); ?>

<div class="container">

	<br>


<table class="table table-striped table-bordered" id = "teacher_table">
<thead>
<tr>
<th>Section ID</th>
<th>Section Name </th>
<th> Actions </th>

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


        	
        	
        	?>
<tr>
            <td><?php echo $row['section_id'];?></td>
            <td><?php echo $row['section_name']?></td>

     
            <td> 
     
                <div class="dropdown">
                <a class = "dropdown-toggle" type="button" data-toggle="dropdown" href = ""> Options
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li> <a href = "" data-toggle = "modal" data-target = "#view_sections"> Enroll </a> </li>
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