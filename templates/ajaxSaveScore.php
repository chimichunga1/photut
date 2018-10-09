<?php
include('../connection.php');
$score=$_POST['score'];
$over=$_POST['over'];
$sid=$_POST['sid'];
$qid=$_POST['qid'];
$uid=$_POST['uid'];

$queryStatement = "INSERT INTO `result_table` (`Student_ID`,`Section_ID`,`Quiz_ID`,`Score`,`Over`)";
$queryStatement .= " VALUES ('".$uid."','".$sid."','".$qid."','".$score."','".$over."')";
mysqli_query($connect,$queryStatement);


$queryStatement = "SELECT COUNT(q.`quiz_id`) total FROM quiz_table q  where q.`section_id`='".$sid."' ";
$runQuery = mysqli_query($connect,$queryStatement);
$runQueryTotalQuiz=mysqli_fetch_array($runQuery);

$queryStatement = "SELECT COUNT(q.`Result_ID`) total FROM result_table q where q.section_id='".$sid."' and q.Student_ID='".$uid."'";
$runQuery = mysqli_query($connect,$queryStatement);
$runQueryTotalQuizTake=mysqli_fetch_array($runQuery);


if($runQueryTotalQuiz[0]===$runQueryTotalQuizTake[0])
{

$queryStatement = "UPDATE `student_section_enroll` SET isFinished='1'";
$queryStatement .= " WHERE student_id=".$uid." and section_id=".$sid." ";
mysqli_query($connect,$queryStatement);

}


?>