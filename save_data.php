<?php 
include('connection.php');


if(isset($_POST['add_teacher']))
{
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];





	$row=mysqli_query($connect,'SELECT * From `user_accounts` WHERE `username`="'.$username.'"');

	$search= mysqli_fetch_assoc($row);
	if(!empty($search))
	{

echo '<script language="javascript">';
echo 'alert("This User is already saved!")';
echo '</script>';
echo"<script>window.location.href='admin_dashboard.php#!/Teacher_List';</script>";	


	}







$insert_user = "INSERT INTO user_accounts (`user_fname`,`user_lname`,`username`,`password`,`isDeleted`,`isActive`,`AccessRight`,`avatar_img`) VALUES ('".$fname."','".$lname."','".$username."','".$password."','0','0','2','assets/professor.png') ";
$run_insert_user = mysqli_query($connect,$insert_user);

	$get_prof_id = "SELECT * FROM user_accounts WHERE username = '$username'";
    $run_prof_id = mysqli_query($connect,$get_prof_id);

        while($row_prof_id = mysqli_fetch_array($run_prof_id))

    {

    	$user_id =  $row_prof_id['user_id'];

    }


$insert_user_prof = "INSERT INTO teacher_table (`user_id`,`isAssigned`) VALUES ('".$user_id."','0') ";
$run_insert_user_prof = mysqli_query($connect,$insert_user_prof);



echo '<script language="javascript">';
echo 'alert("User Saved!")';
echo '</script>';
echo"<script>window.location.href='admin_dashboard.php#!/Teacher_List';</script>";	



}



if(isset($_POST['add_section']))
{










$section_code = $_POST['section_code'];


	$row=mysqli_query($connect,'SELECT * From `section_table` WHERE `section_name`="'.$section_code.'"');

	$search= mysqli_fetch_assoc($row);
	if(!empty($search))
	{

echo '<script language="javascript">';
echo 'alert("This section is already saved!")';
echo '</script>';
echo"<script>window.location.href='admin_dashboard.php#!/teacher_section';</script>";	


	}













$insert_user = "INSERT INTO section_table (`section_name`,`user_professor_name`,`user_id`) VALUES ('".$section_code."','N/A','0') ";
$run_insert_user = mysqli_query($connect,$insert_user);
echo '<script language="javascript">';
echo 'alert("User Saved!")';
echo '</script>';
echo"<script>window.location.href='admin_dashboard.php#!/Section_List';</script>";	



}

if(isset($_POST['modal_tag_teacher']))

{

	echo $_POST['section_id'];
	echo $_POST['get_section_id'];




}


if(isset($_POST['tag_professor_to_section']))
{

	$get_section_id = $_POST['get_select_section'];
	$get_professor_id = $_POST['get_select_professor'];

/*	$get_prof_id = "SELECT * FROM user_accounts WHERE user_id = $get_professor_id";
    $run_prof_id = mysqli_query($connect,$get_prof_id);

        while($row_prof_id = mysqli_fetch_array($run_prof_id))

    {

    	$prof_username =  $row_prof_id['username'];

    }
*/
	$insert_section = "INSERT INTO tag_prof_section_table (`section_id`,`prof_id`) VALUES ('".$get_section_id."','".$get_professor_id."')";
	$run_insert_section = mysqli_query($connect,$insert_section);


/*
	$update_section = "UPDATE section_table SET user_professor_name='$prof_username',user_id='$get_professor_id' WHERE section_id = '$get_section_id'";
	$run_update_section = mysqli_query($connect,$update_section);

	$update_section = "UPDATE teacher_table SET isAssigned='1' WHERE user_id = '$get_section_id'";
	$run_update_section = mysqli_query($connect,$update_section);

*/

echo '<script language="javascript">';
echo 'alert("User Saved!")';
echo '</script>';
echo"<script>window.location.href='admin_dashboard.php#!/Section_List';</script>";	

}




if(isset($_POST['add_quiz']))
{


	$get_section_code = $_POST['get_section_code'];
	$quiz_title = $_POST['quiz_title'];

	$row=mysqli_query($connect,'SELECT * From `quiz_table` WHERE `quiz_name`="'.$quiz_title.'"');

	$search= mysqli_fetch_assoc($row);
	if(!empty($search))
	{

echo '<script language="javascript">';
echo 'alert("Quiz title is already saved!")';
echo '</script>';
echo"<script>window.location.href='admin_dashboard.php#!/teacher_section';</script>";	


	}




else
{
	$insert_quiz = "INSERT INTO quiz_table (`quiz_name`,`section_id`) VALUES ('".$quiz_title."','".$get_section_code."')";
	$run_insert_quiz = mysqli_query($connect,$insert_quiz);
echo '<script language="javascript">';
echo 'alert("User Saved!")';
echo '</script>';
echo"<script>window.location.href='admin_dashboard.php#!/teacher_section';</script>";	





}







}


if(isset($_POST['add_question']))
{

	$get_quiz_title = $_POST['get_quiz_title'];
	$main_question = $_POST['main_question'];
	$answer = $_POST['choice']; //radio button choice
	$choice1 = $_POST['choice1'];
	$choice2 = $_POST['choice2'];
	$choice3 = $_POST['choice3'];
	$choice4 = $_POST['choice4'];


/*	echo $get_quiz_title;
	echo'<br>';
	echo $main_question;echo'<br>';
	echo $answer; //radio button choiceecho'<br>';
	echo $choice1;echo'<br>';
	echo $choice2;echo'<br>';
	echo $choice3;echo'<br>';
	echo $choice4;echo'<br>';
*/


	$insert_question = "INSERT INTO question_table (`quiz_id`,`main_question`,`question_answer`,`choicea`,`choiceb`,`choicec`,`choiced`) VALUES ('".$get_quiz_title."','".$main_question."','".$answer."','".$choice1."','".$choice2."','".$choice3."','".$choice4."')";
	$run_insert_question = mysqli_query($connect,$insert_question);


echo '<script language="javascript">';
echo 'alert("User Saved!")';
echo '</script>';
echo"<script>window.location.href='admin_dashboard.php#!/teacher_section';</script>";	

}



if(isset($_POST['enroll_student']))

{

         $section_id = $_POST['section_id'];
         $user_id = $_POST['user_id'];
         $status = '0'; // 0 = PENDING

	$row_count=mysqli_query($connect,'SELECT COUNT( *) From `student_section_enroll` WHERE `section_id`="'.$section_id.'"');

	$search_count= mysqli_fetch_assoc($row_count);

	if(array_sum($search_count) == '50')
{
echo '<script language="javascript">';
echo 'alert("This section already has 50 students!")';
echo '</script>';
echo"<script>window.location.href='admin_dashboard.php#!/student_all_section';</script>";	
}
else
{

	$row=mysqli_query($connect,'SELECT * From `student_section_enroll` WHERE `student_id`="'.$user_id.'" AND `section_id`="'.$section_id.'"');

	$search= mysqli_fetch_assoc($row);

		if(!empty($search))

			{

	echo '<script language="javascript">';
	echo 'alert("You are already enrolled to this section!")';
	echo '</script>';
	echo"<script>window.location.href='admin_dashboard.php#!/student_all_section';</script>";	
			}


	else
	{
		
		$insert_student_tosection = "INSERT INTO student_section_enroll (`student_id`,`section_id`,`student_status`) VALUES ('".$user_id."','".$section_id."','".$status."')";
		$run_insert_student_tosection = mysqli_query($connect,$insert_student_tosection);


	echo '<script language="javascript">';
	echo 'alert("Waiting for Approval")';
	echo '</script>';
	echo"<script>window.location.href='admin_dashboard.php#!/exams';</script>";	
	}

}
}

if(isset($_POST['exam_student']))

{



         $_SESSION['section_id'] = $_POST['section_id'];
     
      




echo"<script>window.location.href='admin_dashboard.php#!/exam_list';</script>";	

}
if(isset($_POST['teacher_quiz_score']))

{



         $_SESSION['section_id'] = $_POST['section_id'];
     
    

echo"<script>window.location.href='teacher_dashboard.php#!/scores_quizzes';</script>";	

}
if(isset($_POST['teacher_quiz_score_view']))

{



         $_SESSION['quiz_id'] = $_POST['quiz_id'];
     
    

echo"<script>window.location.href='teacher_dashboard.php#!/scores_quizzes_view';</script>";	

}
if(isset($_POST['admin_quiz_score']))

{



         $_SESSION['section_id'] = $_POST['section_id'];
     
    

echo"<script>window.location.href='admin_dashboard.php#!/scores_all_quizzes';</script>";	

}
if(isset($_POST['admin_quiz_score_view']))

{



         $_SESSION['quiz_id'] = $_POST['quiz_id'];
     
    

echo"<script>window.location.href='admin_dashboard.php#!/scores_all_quizzes_view';</script>";	

}


if(isset($_POST['take_quiz']))

{



		 $_SESSION['section_id'] = $_POST['section_id'];
		 $_SESSION['quiz_id'] = $_POST['quiz_id'];


echo"<script>window.location.href='admin_dashboard.php#!/exam_take_quiz';</script>";	

}

if(isset($_POST['approve_student']))
{



	$section_id = $_POST['section_id'];
	$user_id = $_POST['user_id'];
	$status = '1'; // 1 = approve


	$update_student_status = "UPDATE student_section_enroll SET student_status = '$status' WHERE student_id ='$user_id' AND section_id = '$section_id'";
	$run_update_student_status = mysqli_query($connect,$update_student_status);


echo '<script language="javascript">';
echo 'alert("User Saved!")';
echo '</script>';
echo"<script>window.location.href='admin_dashboard.php#!/teacher_section';</script>";	








}


if(isset($_POST['admin_activateuser']))

{



$get_userid = $_POST['get_userid'];


echo $get_userid;


	$update_student = "UPDATE user_accounts SET isDeleted = '0' WHERE user_id ='$get_userid'";
	$run_update_student = mysqli_query($connect,$update_student);

/*
echo '<script language="javascript">';
echo 'alert("User UPDATED!")';
echo '</script>';
echo"<script>window.location.href='admin_dashboard.php#!/Student_List';</script>";	


*/





}

if(isset($_POST['admin_deactivateuser']))

{



$get_userid = $_POST['get_userid'];





	$update_student = "UPDATE user_accounts SET isDeleted = '1' WHERE user_id ='$get_userid'";
	$run_update_student = mysqli_query($connect,$update_student);


echo '<script language="javascript">';
echo 'alert("User UPDATED!")';
echo '</script>';
echo"<script>window.location.href='admin_dashboard.php#!/Student_List';</script>";	








}


?>

