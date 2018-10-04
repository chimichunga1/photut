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





?>

