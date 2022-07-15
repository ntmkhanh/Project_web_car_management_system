<?php
	if(isset($_SESSION['username_login']) && $_SESSION['username_login'])
			echo "Hello, " .$_SESSION['username_login']."";
?>