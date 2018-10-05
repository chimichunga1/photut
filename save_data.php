<?php 
include('connection.php');


if(isset($_POST['add_teacher']))
{
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$insert_user = "INSERT INTO user_accounts (`user_fname`,`user_lname`,`username`,`password`,`isDeleted`,`isActive`,`AccessRight`) VALUES ('".$fname."','".$lname."','".$username."','".$password."','0','0','2') ";
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
	$insert_quiz = "INSERT INTO quiz_table (`quiz_name`,`section_id`) VALUES ('".$quiz_title."','".$get_section_code."')";
	$run_insert_quiz = mysqli_query($connect,$insert_quiz);
echo '<script language="javascript">';
echo 'alert("User Saved!")';
echo '</script>';
echo"<script>window.location.href='admin_dashboard.php#!/teacher_section';</script>";	

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


/*echo '<script language="javascript">';
echo 'alert("User Saved!")';
echo '</script>';
echo"<script>window.location.href='admin_dashboard.php#!/teacher_section';</script>";	*/

}



?>

