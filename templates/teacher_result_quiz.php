<?php require_once('../connection.php'); ?>
<?php require_once('dataTables.php'); ?>

<div class="container">

    <br>


<table class="table table-striped table-bordered" id = "teacher_table">
<thead>
<tr>

<th>Section Name </th>
<th> Action </th>

</tr>
</thead>
    <tbody>
<?php 
/*      $table2 = "SELECT user_accounts.user_id, user_accounts.user_fname, user_accounts.user_lname, user_accounts.username, user_accounts.password 
        FROM user_accounts RIGHT JOIN section_table ON section_table.user_id=user_accounts.user_id";*/

    $uid=$_SESSION['user_id'];


   $sid=$_SESSION['section_id'];





;
        $table2 = "select * from  tag_prof_section_table t  ";
 $table2 .="inner join quiz_table q on q.section_id=t.section_id ";
 $table2 .="where  t.prof_id='".$uid."' and q.section_id='".$sid."' ";
        $run_query2b = mysqli_query($connect,$table2);

        
            while($row = mysqli_fetch_array($run_query2b))

        {


            
            
            ?>
<tr>

            <td><?php echo $row['quiz_name']?></td>

            <td>
            <form method="POST" action="save_data.php">
               <input type="hidden" name="quiz_id" value="<?php echo $row['quiz_id'];?>">
            <button class="btn btn-success btn-block" name="teacher_quiz_score_view"> <strong>VIEW</strong></button>
                </form>
                </td>
</tr>





<?php
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