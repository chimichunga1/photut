<?php

require_once('connection.php');

if(isset($_POST['create_account']))

{
	$fname = $_POST['user_firstname'];
	$lname = $_POST['user_lastname'];
	$username = $_POST['user_username'];
	$password = $_POST['password'];
	$password_confirm = $_POST['password_confirm'];



/*echo '<script language="javascript">';
echo 'alert("message successfully sent")';
echo '</script>';
*/

	if($password != $password_confirm)

	{
			echo '<script language="javascript">';
			echo 'alert("password and confirm password do not match!")';
			echo '</script>';
			echo"<script>window.location.href='index.php';</script>";	
	}

	else
	{

			 $insert_user = "INSERT INTO user_accounts (`user_fname`,`user_lname`,`username`,`password`,`isDeleted`,`isActive`,`AccessRight`) VALUES ('".$fname."','".$lname."','".$username."','".$password."','0','0','3') ";
			$run_insert_user = mysqli_query($connect,$insert_user);



	$get_prof_id = "SELECT * FROM user_accounts WHERE username = '$username'";
    $run_prof_id = mysqli_query($connect,$get_prof_id);

        while($row_prof_id = mysqli_fetch_array($run_prof_id))

    {

    	$user_id =  $row_prof_id['user_id'];

    }


$insert_user_student = "INSERT INTO student_table (`user_id`,`section_id`) VALUES ('".$user_id."','0') ";
$run_insert_user_student = mysqli_query($connect,$insert_user_student);



			echo '<script language="javascript">';
			echo 'alert("User Saved!")';
			echo '</script>';
			echo"<script>window.location.href='index.php';</script>";	
	}
}



else

{

	echo"<script>window.location.href='index.php';</script>";	
	
}












?>