<?php require_once('../connection.php'); ?>
<?php require_once('dataTables.php'); ?>

<div class="container">

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
/*      $table2 = "SELECT user_accounts.user_id, user_accounts.user_fname, user_accounts.user_lname, user_accounts.username, user_accounts.password 
        FROM user_accounts RIGHT JOIN section_table ON section_table.user_id=user_accounts.user_id";*/





        $table2 = "SELECT * FROM section_table";
        $run_query2b = mysqli_query($connect,$table2);

            while($row = mysqli_fetch_array($run_query2b))

        {


            
            
            ?>
<tr>

            <td><?php echo $row['section_name']?></td>
     
            <td> 
      <form method="POST" action="save_data.php">
        <input type="hidden" name="section_id" value="<?php echo $row['section_id'];?>">
 
         <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">  
         
         <?php  $sid=$row['section_id'];
            $uid=$_SESSION['user_id'];
         
         
        
          $queryStatement = 'SELECT * FROM student_section_enroll where student_id="'.$uid.'" and section_id="'.$sid.'" ';
          $loadQuery = mysqli_query($connect,$queryStatement);
          $resultQuery = mysqli_num_rows($loadQuery);
             $resultQueryFinished = mysqli_fetch_array($loadQuery);
          

    //    echo isset($resultQuery)? print_r($resultQuery) : '';
       if($resultQueryFinished['isFinished']==0)
       {
           ?>

        <button type="submit" class="btn btn-primary" name="<?php echo ($resultQuery!=0)?'exam_student' : 'enroll_student'; ?>"> <i class="fa fa-edit"></i> 
        <?php echo ($resultQuery!=0)?'EXAM' : 'ENROLL'; ?>
        </button>

        
           <?php
       }
       else
       {
           ?>
           <button  class="btn btn-success" disabled> <i class="fa fa-check"></i> Finished</button>
           <?php
       }
         ?>
       

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
    $('#teacher_table').DataTable();
} );
</script>




</div>