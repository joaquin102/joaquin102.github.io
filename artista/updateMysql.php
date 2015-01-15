<?php

	require "connection.php";


	// Actualiza el nombre del album

	if($_POST['type'] == "album")
	{
		$albumID = $_POST['albumID'];
		$albumName = $_POST['albumName'];

		$query = "UPDATE album SET nombre = '".$albumName."' WHERE ID='".$albumID."'";
		$result = mysqli_query($connection,$query);


		if($result == true)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	// Actualiza la portada del album

	if($_POST['type'] == "albumCover")
	{
		$albumID = $_POST['albumID'];
		$image = $_POST['image'];


		// Actualizamos el status del album
		$query = "UPDATE album SET cover = '".$image."' WHERE ID='".$albumID."'";
		$result = mysqli_query($connection,$query);


		if($result == true)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	// Actualiza el texto de la imagen

	if($_POST['type'] == "imageText")
	{
		$imageID = $_POST['imageID'];
		$imageText = $_POST['imageText'];

		$query = "UPDATE image SET texto = '".$imageText."' WHERE ID='".$imageID."'";
		$result = mysqli_query($connection,$query);


		if($result == true)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	// Actualiza la descripcion de la imagen

	if($_POST['type'] == "descrText")
	{
		$imageID = $_POST['imageID'];
		$descrText = $_POST['descrText'];

		$query = "UPDATE image SET descripcion = '".$descrText."' WHERE ID='".$imageID."'";
		$result = mysqli_query($connection,$query);

		
		if($result == true)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	

?>