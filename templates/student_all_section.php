<?php require_once('../connection.php'); ?>
<?php require_once('dataTables.php'); ?>

<div class="container">
<form method="POST" action="save_data.php">
	<br>


<table class="table table-striped table-bordered" id = "teacher_table">
<thead>
<tr>

<th>Section Name </th>
<th> Actions </th>

</tr>
</thead>
    <tbody>
<?php 
/*		$table2 = "SELECT user_accounts.user_id, user_accounts.user_fname, user_accounts.user_lname, user_accounts.username, user_accounts.password 
        FROM user_accounts RIGHT JOIN section_table ON section_table.user_id=user_accounts.user_id";*/
        
$table2 = "SELECT s.section_id FROM section_table s ";
$table2 .="inner join student_section_enroll sse ";
$table2 .="where sse.student_id='".$_SESSION['user_id']."' and sse.student_status IN ('1','0') ";
$table2 .="group by  sse.section_id";
     $run_query2b = mysqli_query($connect,$table2);
$firstarray=mysqli_fetch_array($run_query2b);

$table2 = "SELECT section_id FROM section_table";
$run_query2b = mysqli_query($connect,$table2);
$secondarray=mysqli_fetch_array($run_query2b);




if(!empty($firstarray))
{
  
$truevalue=array_unique(array_merge($firstarray,$secondarray), SORT_REGULAR);



for ($i=0; $i <count($truevalue);$i++)
{
 

		$table2 = "SELECT * FROM section_table where section_id ='".$truevalue[$i]."' ";
        $run_query2b = mysqli_query($connect,$table2);

            $row = mysqli_fetch_array($run_query2b);

           	
        	?>
<tr>

            <td><?php echo $row['section_name']?></td>

     
            <td> 
      
        <input type="hidden" name="section_id" value="<?php echo $row['section_id'];?>">
         <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">       
        <button type="submit" class="btn btn-primary btn-block" name="enroll_student"> <i class="fa fa-edit"></i> Enroll</button>
            </td>
</tr>
</form>
<?php
        }
}
else
{

$table2 = "SELECT * FROM section_table  ";
        $run_query2b = mysqli_query($connect,$table2);

            while($row = mysqli_fetch_array($run_query2b))

        {        	
        	?>
<tr>

            <td><?php echo $row['section_name']?></td>

     
            <td> 
      
        <input type="hidden" name="section_id" value="<?php echo $row['section_id'];?>">
         <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">       
        <button type="submit" class="btn btn-primary btn-block" name="enroll_student"> <i class="fa fa-edit"></i> Enroll</button>
            </td>
</tr>
</form>
<?php
        }
}


        

?>    	



    </tbody>
</table>














<script type="text/javascript">
	$(document).ready( function () {
    $('#teacher_table').DataTable({
         "columns": [
                null,
                { "searchable": false },
              
            ] 
    });
} );
</script>




</div>