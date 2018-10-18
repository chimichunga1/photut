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
  $table2 = "SELECT section_table.section_id,section_table.section_name,tag_prof_section_table.prof_id
      FROM section_table
      RIGHT JOIN tag_prof_section_table ON tag_prof_section_table.section_id=section_table.section_id 

      WHERE tag_prof_section_table.prof_id = '$teacher_id'";
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

 <button type="submit" name="add_quiz" value="Create" class="btn btn-success">Create </button>

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

  Quiz Title : 
  <br>
<select name="get_quiz_title">

  <?php     
  $teacher_id = $_SESSION['user_id'];
  $table2 = "SELECT * FROM quiz_table";
              $run_query2b = mysqli_query($connect,$table2);

      while($row = mysqli_fetch_array($run_query2b))

        {


          ?>
        <option value="<?php echo $row['quiz_id'];?>"><?php echo $row['quiz_name'];?></option>
        <?php 


        }


      ?>
</select>
<br>
Question
<br>
  <input type="text" class="form-control col-md-12" placeholder="Section Code" name="main_question" required>
<br>
Choice 1 : 
<input type="radio" name="choice" value="a"><input type="text" class="form-control col-md-4" placeholder="Choice 1 " name="choice1" required>

<br>
Choice 2 : 
<input type="radio" name="choice" value="b"><input type="text" class="form-control col-md-4" placeholder="Choice 2 " name="choice2" required>

<br>
Choice 3 : 
<input type="radio" name="choice" value="c"><input type="text" class="form-control col-md-4" placeholder="Choice 3 " name="choice3" required>

<br>
Choice 4 : 
<input type="radio" name="choice" value="d"><input type="text" class="form-control col-md-4" placeholder="Choice 4 " name="choice4" required>

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
<th> Quiz Name </th>
<th> Actions</th>

</tr>
</thead>
    <tbody>
 
      <?php     
        $teacher_id = $_SESSION['user_id'];
        $table2 = "SELECT section_table.section_id,section_table.section_name,tag_prof_section_table.prof_id,quiz_table.quiz_name,quiz_table.quiz_id
                  FROM section_table
                  RIGHT JOIN tag_prof_section_table ON tag_prof_section_table.section_id=section_table.section_id 
                  RIGHT JOIN quiz_table ON quiz_table.section_id = section_table.section_id 
                  WHERE tag_prof_section_table.prof_id = '$teacher_id'";
                    $run_query2b = mysqli_query($connect,$table2);

            while($row = mysqli_fetch_array($run_query2b))

        {
            $Mymodal="Mymodal".$row['quiz_id'];
?>
   <tr>

<td><?php echo $row['section_id'];?></td>
<td><?php echo $row['section_name'];?></td>
<td><?php echo $row['quiz_name'];?></td>
<td><?php echo'<button class="btn btn-primary" data-toggle="modal" data-target="#'.$Mymodal.'" ><i class="fa fa-eye"></i> View Questions</button> ';?></td>
  

  </tr>
    </tbody>
</table>
    <?php 
echo
"
    
 
    <div id='".$Mymodal."' class='modal fade'>
        <div class='modal-dialog modal-lg'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                    <h4 class='modal-title'>QUESTIONS</h4>
                </div>
                <div class='modal-body'>
                 
";

?>


<br>

<table class="table table-striped table-bordered">
  <tr>
    <th>Question</th>
    <th>Choice 1</th>
    <th>Choice 2</th>
    <th>Choice 3</th>
    <th>Choice 4</th>
    <th>Answer</th>

  </tr>

<?php 
        $quiz_id = $row['quiz_id'];
        $table2 = "SELECT * FROM question_table WHERE quiz_id = '$quiz_id'";
                    $run_query2b = mysqli_query($connect,$table2);

            while($row = mysqli_fetch_array($run_query2b))

        {

?>
  <tr>
    <td><?php echo $row['main_question'];?></td>
    <td><?php echo $row['choicea'];?></td>
    <td><?php echo $row['choiceb'];?></td>
    <td><?php echo $row['choicec'];?></td>
    <td><?php echo $row['choiced'];?></td>
    <td><?php echo $row['question_answer'];?></td>
  
  </tr>

  <?php 

      }

  ?>
</table>


<?php


echo"
                </div>
            </div>
        </div>
    </div>
";
    }

  ?>











<script type="text/javascript">
	$(document).ready( function () {
    $('#teacher_table').DataTable();
} );
</script>




</div>