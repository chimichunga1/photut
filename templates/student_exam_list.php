<?php require_once('../connection.php'); ?>
<?php require_once('dataTables.php'); ?>

<div class="container">

    <br>


<table class="table table-striped table-bordered" id = "teacher_table">
<thead>
<tr>

<th>Quiz Title</th>
<th>Take Quiz </th>

</tr>
</thead>
    <tbody>
<?php 
/*      $table2 = "SELECT user_accounts.user_id, user_accounts.user_fname, user_accounts.user_lname, user_accounts.username, user_accounts.password 
        FROM user_accounts RIGHT JOIN section_table ON section_table.user_id=user_accounts.user_id";*/



        $sid=$_SESSION['section_id'];
        $uid=$_SESSION['user_id'];

        $table2 = "SELECT * FROM quiz_table  where section_id='".$sid."' ";
        $run_query2b = mysqli_query($connect,$table2);

            while($row = mysqli_fetch_array($run_query2b))

        {

            $qid=$row['quiz_id'];
            
            
            ?>
<tr>

            <td><?php echo $row['quiz_name']?></td>
     
            <td> 
   
         
         <?php  
         $queryStatement = "SELECT COUNT(q.`Result_ID`) total FROM result_table q  where q.section_id=".$sid." and q.Student_ID=".$uid." and quiz_id=".$qid." ";
        $runQuery = mysqli_query($connect,$queryStatement);

        $total=mysqli_fetch_array($runQuery);
         
 

    if($total[0]==0)
    {
          ?>
             <form method="POST" action="save_data.php">
        <input type="hidden" name="section_id" value="<?php echo $row['section_id'];?>">
         <input type="hidden" name="quiz_id" value="<?php echo $row['quiz_id'];?>">  
          <button type="submit" class="btn btn-primary" name="take_quiz"> <i class="fa fa-edit"></i> TAKE</button>
                 </form>
          <?php 
    }
    else
    {
        ?>
           <button  class="btn btn-success" disabled> <i class="fa fa-check"></i> Finished</button>
       
           <?php
    }
         ?>



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