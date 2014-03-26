<?php
session_start();
	/* a simple form check */
	if( isset( $_POST['answer'] ) )
	{
		if($_POST['answer'] != $_SESSION['security_number'])
		{
			echo 0;
		}
		else
		{
			echo 1;
		}
	}
?>