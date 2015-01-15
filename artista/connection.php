<?php

// Connect to database

$connection = new mysqli("storedb.cdodmsuu5esg.us-east-1.rds.amazonaws.com","joaquin102","17706625Jj","maindb");


// Verify the connection

	if($connection -> connect_errno)
	{
		die("Sorry, we are having connection problems..");
	}


?>