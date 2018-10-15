<?php require_once('../connection.php'); ?>
<?php require_once('dataTables.php'); ?>

<div class="container">

    <br>


<table class="table table-striped table-bordered" id = "teacher_table">
<thead>
<tr>

<th>Section Name </th>

<th> Exams </th>

</tr>
</thead>
    <tbody>
<?php 
/*      $table2 = "SELECT user_accounts.user_id, user_accounts.user_fname, user_accounts.user_lname, user_accounts.username, user_accounts.password 
        FROM user_accounts RIGHT JOIN section_table ON section_table.user_id=user_accounts.user_id";*/



$uid=$_SESSION['user_id'];

        $table2 = "SELECT * FROM section_table s ";
 $table2 .="inner join student_section_enroll sse ";
 $table2 .="where sse.student_id='".$uid."' and sse.student_status='1' ";
 $table2 .="group by  sse.section_id; ";
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
            
         
         
        
          $queryStatement = 'SELECT * FROM student_section_enroll where student_id="'.$uid.'" and section_id="'.$sid.'" ';
          $loadQuery = mysqli_query($connect,$queryStatement);

             $resultQueryFinished = mysqli_fetch_array($loadQuery);
          

    //    echo isset($resultQuery)? print_r($resultQuery) : '';
       if($resultQueryFinished['isFinished']==0)
       {
           ?>

       
       


            <?php 
            // if($resultQueryFinished[3]==0)
            // {
            //          echo '<button type="submit" class="btn btn-primary" name="enroll_student"> <i class="fa fa-edit"></i>'; 
            //         echo 'ENROLL';
            //         echo '   </button>';
            // }
            // else if($resultQueryFinished[3]==1)
            // {
            //      echo '<button type="submit" class="btn btn-primary"  disabled> <i class="fa fa-edit"></i>'; 
                    
            //         echo 'PENDING';
            //         echo '   </button>';
            // }
            // else
            // {
                 echo '<button type="submit" class="btn btn-primary btn-block" name="exam_student"> <i class="fa fa-edit"></i>'; 
                    
                    echo 'EXAM';
                    echo '   </button>';
            // }
            
    
             ?>
     

        
           <?php
       }
       else
       {
           ?>
           <button  class="btn btn-success btn-block" disabled> <i class="fa fa-check"></i> Finished</button>
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