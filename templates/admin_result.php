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






        $table2 = "select * from section_table s  ";

        $run_query2b = mysqli_query($connect,$table2);

        
            while($row = mysqli_fetch_array($run_query2b))

        {


            
            
            ?>
<tr>

            <td><?php echo $row['section_name']?></td>

            <td>
            <form method="POST" action="save_data.php">
               <input type="hidden" name="section_id" value="<?php echo $row['section_id'];?>">
            <button class="btn btn-success btn-block" name="admin_quiz_score"> <strong>VIEW</strong></button>
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