

<?php


    session_start();
    date_default_timezone_set("Asia/Manila");
    $connect = mysqli_connect("localhost", "root", "miguel", "pstut_dbase");


    
if(isset($_POST['account_login']))
{

	$username = $_POST['username'];
	$password = $_POST['password'];


	$row=mysqli_query($connect,'SELECT * From `user_accounts` WHERE `username`="'.$_POST["username"].'" AND `password`="'.$_POST["password"].'" AND `isDeleted`="0"   ');

	$search= mysqli_fetch_assoc($row);

	if(!empty($search && $search['AccessRight'] == '3'))

		{
		    $_SESSION['username']=$search['username'];
		    $_SESSION["user_id"] = $search["user_id"];
		    $_SESSION["accessright"] = $search['AccessRight'];
			echo '<script language="javascript">';
			echo 'alert("Welcome User!")';
			echo '</script>';
			echo"<script>window.location.href='user_dashboard.php';</script>";
		}

	elseif(!empty($search && $search['AccessRight'] == '1'))
	{
		    $_SESSION['username']=$search['username'];
		    $_SESSION["user_id"] = $search["user_id"];
		    $_SESSION["accessright"] = $search['AccessRight'];
			echo '<script language="javascript">';
			echo 'alert("Welcome Admin!")';
			echo '</script>';
			echo"<script>window.location.href='admin_dashboard.php';</script>";	
	}
	elseif(!empty($search && $search['AccessRight'] == '2'))
	{
		    $_SESSION['username']=$search['username'];
		    $_SESSION["user_id"] = $search["user_id"];
		    $_SESSION["accessright"] = $search['AccessRight'];		    
			echo '<script language="javascript">';
			echo 'alert("Welcome Teacher!")';
			echo '</script>';
			echo"<script>window.location.href='teacher_dashboard.php';</script>";	
	}
	else

		{	
		    $_SESSION['username']='';
		    $_SESSION["user_id"] = '';
			echo '<script language="javascript">';
			echo 'alert("Invalid username or password!")';
			echo '</script>';
			echo"<script>window.location.href='index_admin.php';</script>";	
		}
}


if(isset($_POST['account_login_student']))
{

	$username = $_POST['username'];
	$password = $_POST['password'];


	$row=mysqli_query($connect,'SELECT * From `user_accounts` WHERE `username`="'.$_POST["username"].'" AND `password`="'.$_POST["password"].'" AND `isDeleted`="0"   ');

	$search= mysqli_fetch_assoc($row);

	if(!empty($search && $search['AccessRight'] == '3'))

		{
		    $_SESSION['username']=$search['username'];
		    $_SESSION["user_id"] = $search["user_id"];
		    $_SESSION["accessright"] = $search['AccessRight'];
			echo '<script language="javascript">';
			echo 'alert("Welcome User!")';
			echo '</script>';
			echo"<script>window.location.href='user_dashboard.php';</script>";
		}
	else

		{	
		    $_SESSION['username']='';
		    $_SESSION["user_id"] = '';
			echo '<script language="javascript">';
			echo 'alert("Invalid username or password!")';
			echo '</script>';
			echo"<script>window.location.href='index.php';</script>";	
		}
}






/*
$row=mysqli_query($c1,'SELECT * From `account_tbl` WHERE `username`="'.$_POST["username"].'" AND `password`="'.$_POST["password"].'" AND `isDeleted`="0"   ');

$search= mysqli_fetch_assoc($row);
  $_SESSION['fn']=$search['fullname'];
  $_SESSION["u_id"] = $search["u_id"];

  if (!empty($search) && ($search['access']==1))
  {

*/

?>