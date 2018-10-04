<?php

session_start();


session_destroy();

			echo '<script language="javascript">';
			echo 'alert("Logout Successful!")';
			echo '</script>';
			echo"<script>window.location.href='index.php';</script>";	


?>
