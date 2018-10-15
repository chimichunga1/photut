<?php require_once('../connection.php'); ?>
<?php require_once('dataTables.php'); ?>

<div class="container">

    <br>


<table class="table table-striped table-bordered" id = "teacher_table">
<thead>
<tr>

<th>Section Name </th>

<th> Quiz Name </th>
<th> Score </th>

</tr>
</thead>
    <tbody>
<?php 
/*      $table2 = "SELECT user_accounts.user_id, user_accounts.user_fname, user_accounts.user_lname, user_accounts.username, user_accounts.password 
        FROM user_accounts RIGHT JOIN section_table ON section_table.user_id=user_accounts.user_id";*/

    $uid=$_SESSION['user_id'];



        $table2 = "select s.section_name,q.quiz_name,CONCAT(r.Score,' / ',r.Over) ";
 $table2 .="from result_table r ";
 $table2 .="inner join section_table s on s.section_id=r.Section_ID ";
 $table2 .="inner join quiz_table q on q.quiz_id = r.Quiz_ID ";
 $table2 .="where r.student_id='".$uid."' ";
        $run_query2b = mysqli_query($connect,$table2);

        
            while($row = mysqli_fetch_array($run_query2b))

        {


            
            
            ?>
<tr>

            <td><?php echo $row[0]?></td>
            <td><?php echo $row[1]?></td>
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
                null,
                null,
                { "searchable": false },
              
            ] 
    });
} );
</script>




</div>