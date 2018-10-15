<?php require_once('../connection.php'); ?>
<?php require_once('dataTables.php'); ?>

<div class="container">

    <br>


<table class="table table-striped table-bordered" id = "teacher_table">
<thead>
<tr>

<th> Name</th>

<th> Score</th>
<th> Over </th>

</tr>
</thead>
    <tbody>
<?php 
/*      $table2 = "SELECT user_accounts.user_id, user_accounts.user_fname, user_accounts.user_lname, user_accounts.username, user_accounts.password 
        FROM user_accounts RIGHT JOIN section_table ON section_table.user_id=user_accounts.user_id";*/

    $uid=$_SESSION['user_id'];
    $sid=$_SESSION['section_id'];
    $qid=$_SESSION['quiz_id'];



        $table2 = "select CONCAT(u.user_fname,' ',u.user_lname),r.Score,r.Over from result_table r ";
 $table2 .="inner join user_accounts u on u.user_id=r.Student_ID ";
 $table2 .="where r.Quiz_ID='".$qid."' and r.Section_ID='".$sid."' ";
        $run_query2b = mysqli_query($connect,$table2);

        
            while($row = mysqli_fetch_array($run_query2b))

        {


            
            
            ?>
<tr>

            <td><?php echo $row[0]?></td>
            <td><button class="btn btn-success btn-block" disabled style="cursor:default"> <strong><?php echo $row[1]?></strong></button></td>

            <td><button class="btn btn-success btn-block" disabled style="cursor:default"> <strong><?php echo $row[2]?></strong></button></td>
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
                { "orderable": false },
                { "searchable": false},
                { "searchable": false,"orderable": false  },
              
            ] ,
               "order":  [ 1, 'desc' ]
           
    });
} );
</script>




</div>