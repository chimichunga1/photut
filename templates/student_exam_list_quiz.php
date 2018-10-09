

        <?php require_once('../connection.php'); ?>
<?php require_once('dataTables.php'); ?>

<div class="container">

    <br>

<form id="Form" action="templates/ajaxSaveScore.php" method="post">
<table class="table table-striped table-bordered" id = "teacher_table">
<thead>
<tr>

<th>question</th>


</tr>
</thead>
    <tbody>


<script>
var rightInputs=[];
</script>
<?php 	 $sid= $_SESSION['section_id'];
        $qid= $_SESSION['quiz_id'];
        $uid= $_SESSION['user_id'];

        
    
         $queryStatement = 'SELECT * FROM quiz_table q inner join question_table qs where q.section_id="'.$sid.'" and qs.quiz_id="'.$qid.'" group by qs.question_id';
          $loadQuery = mysqli_query($connect,$queryStatement);
        //   $resultQuery = mysqli_fetch_array($loadQuery);
        // echo  count($resultQuery);
        // echo print_r($resultQuery);

        $counter=0;
         while($row = mysqli_fetch_array($loadQuery))
        {
            $counter+=1;
    
 ?>
        <script> 
        var value ="<?php echo  $row['question_answer'] ?>"
        rightInputs.push(value);
        </script>
            
        
<tr>

            <td class="row ">
            <div class="col-md-12" style="padding:5%;width:100%">
            <?php echo $row['main_question']?>
            </div>
            <div class="col-md-12">
            <input type="radio" required value="<?php echo $row['choicea']?>" name="<?php echo 'quiz'.$counter; ?>" class="getAnswer"> <?php echo $row['choicea']?></button>
            </div>
             <div class="col-md-12">
            <input type="radio" required value="<?php echo  $row['choiceb']?>"  name="<?php echo 'quiz'.$counter; ?>" class="getAnswer"><?php echo $row['choiceb']?></button>
            </div>
             <div class="col-md-12">
            <input type="radio" required value="<?php echo  $row['choicec']?>"  name="<?php echo 'quiz'.$counter; ?>" class="getAnswer"><?php echo $row['choicec']?></button>
            </div>
           <div class="col-md-12">
            <input type="radio" required value="<?php echo  $row['choiced']?>"  name="<?php echo 'quiz'.$counter; ?>" class="getAnswer"><?php echo $row['choiced']?></button>
            </div>


            
            
            </td>
            
     
          
</tr>




    <!--End Modal Signup-->
    <!--End Modal Signup-->
    <!--End Modal Signup-->
    <!--End Modal Signup-->

<?php
        }



?>      


<button type="submit">save</button>
</form>


<script>





var frm = $('#Form');

  frm.submit(function (e) {
    var inputTypes = [];
    var checkAnswers=0;

      
  $('.getAnswer:checked').each(function(){
            inputTypes.push($(this).attr('value'));
        });

        console.log(inputTypes);
        console.log(rightInputs);
        for(i=0;i<rightInputs.length;i++)
        {
            if(rightInputs[i]===inputTypes[i])
            {
                checkAnswers+=1;
            }

        }
        console.log(checkAnswers);
        var sid= "<?php echo $_SESSION['section_id']; ?>";
        var qid= "<?php echo $_SESSION['quiz_id']; ?>";
        var uid= "<?php echo $_SESSION['user_id']; ?>";
            var formData = {
            'sid'              : sid,
            'uid'              : uid,
            'qid'              : qid,
            'score'            : checkAnswers,
            'over'             : rightInputs.length,
        };


        e.preventDefault();

        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: formData,
            success: function (data) {
               alert('You Got '+ checkAnswers+ ' / '+ rightInputs.length);
              window.location.href='admin_dashboard.php#!/exam_list';
            },
            error: function (data) {
             
            },
        });

  });
</script>


    </tbody>
</table>














<script type="text/javascript">
    $(document).ready( function () {
    $('#teacher_table').DataTable({
        "ordering": false,
        "searching": false,
        "paging":false,
        "info":false,
    });
} );
</script>




</div>