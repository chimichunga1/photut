<?php require_once('../connection.php'); ?>
<?php require_once('dataTables.php'); ?>

<div class="container">
<br>
<div id="accordion_quiz">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#quiz" aria-expanded="true" aria-controls="quiz">
          <i class="fa fa-plus"></i> Add Quiz
        </button>
      </h5>
    </div>

    <div id="quiz" class="collapse" aria-labelledby="headingOne" data-parent="#accordion_quiz">
      <div class="card-body">

<form action="save_data.php" method="POST">



  Section Code : 
  <br>
<select name="get_section_code">

  <?php     
  $teacher_id = $_SESSION['user_id'];
  $table2 = "SELECT section_table.section_id,section_table.section_name
              FROM section_table
              RIGHT JOIN tag_prof_section_table ON tag_prof_section_table.section_id=section_table.section_id WHERE tag_prof_section_table.prof_id = '$teacher_id'";
              $run_query2b = mysqli_query($connect,$table2);

      while($row = mysqli_fetch_array($run_query2b))

        {


          ?>
        <option value="<?php echo $row['section_id'];?>"><?php echo $row['section_name'];?></option>
        <?php 


        }


      ?>
</select>
<br>
  Quiz name: 
  <br>

<input type="text" class="form-control col-md-4" placeholder="Quiz Title " name="quiz_title" required>
<br>
<br>

 <button type="submit" name="add_question" value="Create" class="btn btn-success">Create </button>

</form>
      </div>
    </div>
  </div>

</div>


<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fa fa-plus"></i> Add Questions
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">

<form action="save_data.php" method="POST">

  Section Code : 
  <br>
<select name="get_question">

  <?php     
  $teacher_id = $_SESSION['user_id'];
  $table2 = "SELECT section_table.section_id,section_table.section_name
              FROM section_table
              RIGHT JOIN tag_prof_section_table ON tag_prof_section_table.section_id=section_table.section_id WHERE tag_prof_section_table.prof_id = '$teacher_id'";
              $run_query2b = mysqli_query($connect,$table2);

      while($row = mysqli_fetch_array($run_query2b))

        {


          ?>
        <option value="<?php echo $row['section_id'];?>"><?php echo $row['section_name'];?></option>
        <?php 


        }


      ?>
</select>
<br>
Question
<br>
  <input type="text" class="form-control col-md-12" placeholder="Section Code" name="section_code" required>
<br>
Choice 1 : 
<input type="radio" name="choice" value="1"><input type="text" class="form-control col-md-4" placeholder="Choice 1 " name="choice1" required>

<br>
Choice 2 : 
<input type="radio" name="choice" value="2"><input type="text" class="form-control col-md-4" placeholder="Choice 2 " name="choice2" required>

<br>
Choice 3 : 
<input type="radio" name="choice" value="3"><input type="text" class="form-control col-md-4" placeholder="Choice 3 " name="choice3" required>

<br>
Choice 4 : 
<input type="radio" name="choice" value="4"><input type="text" class="form-control col-md-4" placeholder="Choice 4 " name="choice4" required>

<br>
<!-- <input type="radio" name="gender" value="female"> Female<br>
<input type="radio" name="gender" value="other"> Other -->


 <br>
 <br>
 <button type="submit" name="add_question" value="Create" class="btn btn-success">Create </button>

</form>
      </div>
    </div>
  </div>

</div>



<br>

<table class="table table-striped table-bordered" id = "teacher_table">
<thead>
<tr>
<th>Section ID</th>
<th>Section Code</th>

<th> Actions </th>

</tr>
</thead>
    <tbody>
 
      <?php     
        $teacher_id = $_SESSION['user_id'];
        $table2 = "SELECT section_table.section_id,section_table.section_name
                    FROM section_table
                    RIGHT JOIN tag_prof_section_table ON tag_prof_section_table.section_id=section_table.section_id WHERE tag_prof_section_table.prof_id = '$teacher_id'";
                    $run_query2b = mysqli_query($connect,$table2);

            while($row = mysqli_fetch_array($run_query2b))

        {
?>
   <tr>

<td><?php echo $row['section_id'];?></td>
<td><?php echo $row['section_name'];?></td>
<td>View Questions</td>
  

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