<?php

	require "connection.php";


	if($_POST['type'] == "albumID")
	{
		$albumID = $_POST['albumID'];

		// Eliminamos las fotos del album

		$query = "DELETE FROM image WHERE albumID = '".$albumID."'";
		$result = mysqli_query($connection,$query);

		if(!empty($result))
		{
			// Eliminamos el album
			$query = "DELETE FROM album WHERE id = '".$albumID."'";
			$result = mysqli_query($connection,$query);

			if(!empty($result))
			{
				//Fue exitosa la borrada
			}
		}


	}

	if($_POST['type'] == "id")
	{

		$id = $_POST['id'];


		//Obtenemos el directorio de la imagen

		$query = "SELECT * FROM image WHERE id='".$id."'";
		$result = mysqli_query($connection,$query);
		$result = mysqli_fetch_array($result);

		$imageName = $result['image'];

		// eliminamos la imagen de la base de datos

		$query = "DELETE FROM image WHERE id='".$id."'";
		$result = mysqli_query($connection,$query);


		// eliminamos la imagen de la carpeta uploadedPictures

		if(!empty($result))
		{
			unlink("$imageName");
		}

	}

?>