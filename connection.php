<?php
    session_start();











if(empty($_SESSION["user_id"]))

{

	echo '<script language="javascript">';
	echo 'alert("you must login first!")';
	echo '</script>';
	echo"<script>window.location.href='index.php';</script>";		





}
















    date_default_timezone_set("Asia/Manila");
    $connect = mysqli_connect("localhost", "root", "miguel", "pstut_dbase");
/*     $connect = mysqli_connect("localhost", "id7459861_pstut_dbase", "Superlove:3", "id7459861_pstut_dbase");*/


/* $connect = mysqli_connect("localhost", "root", "", "pstut_dbase");*/
?>