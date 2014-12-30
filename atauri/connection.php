<?php

// Connect to database

$connection = new mysqli("127.0.0.1","root","","atauriWebsite");


// Verify the connection

	if($connection -> connect_errno)
	{
		die("Sorry, we are having connection problems..");
	}


?>