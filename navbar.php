<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span> 
</button>
<a class="navbar-brand" href="#"> <span class = "fa fa-laptop"> </span> CS6 Tutorial </a>
</div>
<div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav">


<?php 

if($_SESSION["accessright"] == '1')//ADMIN
{
	?>
<li> <a href = "#!Teacher_List"> <span class = "fa fa-user"> </span> Teachers </a> </li>
<li> <a href = "#!Student_List"> <span class = "fa fa-user-graduate"> </span> Student </a> </li>
<li> <a href = "scores.php"> <span class = "fa fa-clipboard"> </span> Scores </a> </li>
<li> <a href = "#!Section_List"> <span class = "fa fa-home"> </span> Sections </a> </li>
	<?php 
}
   
?>


<?php 

if($_SESSION["accessright"] == '2')//TEACHER
{
	?>
<li> <a href = "index.php"> <span class = "fa fa-user"> </span> Students </a> </li>
<li> <a href = "#!teacher_section"> <span class = "fa fa-home"> </span> Quizzes </a> </li>
<li> <a href = "scores.php"> <span class = "fa fa-clipboard"> </span> Scores </a> </li>
	<?php 
}
   
?>



<?php 

if($_SESSION["accessright"] == '3')//STUDENT
{
	?>
    <li> <a href = "#!student_lesson"> <span class = "fa fa-book"> </span> Lessons </a> </li>
    <li> <a href = "exams.php"> <span class = "fa fa-pencil-alt"> </span> Exams </a> </li>
    <li> <a href = "results.php"> <span class = "fa fa-question"> </span> Results </a> </li>
<!--     <li> <a href = "sections.php"> <span class = "fa fa-home"> </span> Sections </a> </li> -->
    <li class="dropdown">
  <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class = "fa fa-home"> </span> Sections <span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="#!student_all_section">View All Sections</a></li>
    <li><a href="#!student_enrolled_section">View Enrolled Sections</a></li>
    <li><a href="#!student_pending_section">View Pending Sections</a></li>


  </ul>
</li>
	<?php 
}
   
?>




</ul>
<ul class="nav navbar-nav navbar-right">
    <li> <a href = "settings.php"> <span class = "fa fa-cog"></span> Settings </a> </li>
    <li> <a href = "signout.php"> <span class = "fa fa-sign-out-alt"></span> Sign out </a> </li>
</ul>
</div>
</div>
</nav>