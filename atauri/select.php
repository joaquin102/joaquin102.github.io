<?php

	require "connection.php";



    // Carga las portadas de los albums para la pagina principal
    if($_POST['type'] == "indexAlbums")
    {

        $query = "SELECT * FROM album";
        $result = mysqli_query($connection,$query);

        while ($albums = mysqli_fetch_array($result)) 
            {

                if($albums['cover'] == "empty")
                {
                    $cover = "Images/emptyAlbum.png";
                }
                else
                {
                    $cover = $albums["cover"];

                }

                if($albums['nombre'] == "empty")
                {
                    $albumName = "";
                }
                else
                {
                    $albumName = $albums['nombre'];
                }

                echo '<div id="'.$albums["ID"].'" class="image">

                    <img id="coverImage" src='.$cover.'>
                    
                    <div class="breakingflow"></div>

                    <div class="description">
                        <p>'.$albumName.'</p>
                        <p id="desc">'.$albums["creationdate"].'</p>
                    </div>
                </div>';
            }
    }


    // Carga los albums para la pagina de admin
	if($_POST['type'] == "albums")
	{

		$query = "SELECT * FROM album";
		$result = mysqli_query($connection,$query);

		while ($albums = mysqli_fetch_array($result)) 
        	{

                if($albums['cover'] == "empty")
                {
                    $cover = "Images/emptyAlbum.png";
                }
                else
                {
                    $cover = $albums["cover"];

                }

                if($albums['nombre'] == "empty")
                {
                    $albumName = "";
                }
                else
                {
                    $albumName = $albums['nombre'];
                }

                echo '<div id="'.$albums["ID"].'" class="image">

                  	<img id="test" src='.$cover.'>
                    <div class="tools">
                        <ul>
                            <li id="d_'.$albums["ID"].'"><a href=#><img src="Images/trash.png"></a></li>
                            <li id="e_'.$albums["ID"].'"><a href=#><img src="Images/edit.png"></a></li>
                            <li id="v_'.$albums["ID"].'"><img src="Images/view.png"></li>
                        </ul>
                        
                    </div>
                    
                    <div class="breakingflow"></div>

                    <div class="description">
                        <input id="album_'.$albums["ID"].'" class="albumName" type="text" name="albumName" value="'.$albumName.'" placeholder="Nombre del album">
                        <p id="albumDate">'.$albums["creationdate"].'</p>
                    </div>
                </div>';
            }
	}


	// Carga todas las imagenes de un album en especifico con herramientas
	if($_POST['type'] == "albumID")
	{

        $albumID = $_POST['albumID'];

		$query = "SELECT * FROM image WHERE albumID='".$albumID."'";
        $result = mysqli_query($connection,$query);

            while ($imagesArray = mysqli_fetch_array($result)) 
            {

                echo '<div id="'.$imagesArray["ID"].'" class="image">

                    <img src="uploadedPictures/'.$imagesArray["imagename"].'">
                    <div class="tools">
                        <ul>
                            <li id="d_'.$imagesArray["ID"].'"><img src="Images/trash.png"></li>
                            <li id="e_'.$imagesArray["ID"].'"><img src="Images/edit.png"></li>
                            <li id="v_'.$imagesArray["ID"].'"><img src="Images/view.png"></li>
                            <li id="lastList"><img src="Images/mainpicture.png"></li>
                        </ul>
                        
                    </div>
                    
                    <div class="breakingflow"></div>

                    <div class="description">
                        <form method="POST">
                            <input class="inputText" id="t_'.$imagesArray["ID"].'" type="text" name="artName" value="'.$imagesArray["texto"].'" placeholder="Nombre del arte">
                            </br>
                            <input class="descrText" id="d_'.$imagesArray["ID"].'" type="text" name="artDescrition" value="'.$imagesArray["descripcion"].'" placeholder="Descripcion del arte">
                        </form>
                    </div>
                </div>';
            }
	}

    // Carga todas las imagenes de un album en especifico sin herramientas
    if($_POST['type'] == "albumIDNoTools")
    {

        $albumID = $_POST['albumID'];

        $query = "SELECT * FROM image WHERE albumID='".$albumID."'";
        $result = mysqli_query($connection,$query);

            while ($imagesArray = mysqli_fetch_array($result)) 
            {

                echo '<div id="'.$imagesArray["ID"].'" class="image">

                    <img src="uploadedPictures/'.$imagesArray["imagename"].'">
                    
                    <div class="breakingflow"></div>

                    <div class="description">
                        <p>'.$imagesArray['texto'].'</p>
                        <p id="desc">'.$imagesArray['descripcion'].'</p>
                    </div>
                </div>';
            }
    }



	// Recibe un array de las imagenes que fueron insertadas previamente
	if($_POST['type'] == "loadInsertedImages")
	{

		$imagesinserted = $_POST['array'];


		foreach ($imagesinserted as $key => $id) 
		{

			$query = "SELECT * FROM image WHERE id='".$id."'";
			$result = mysqli_query($connection,$query);

			while ($imagesArray = mysqli_fetch_array($result)) 
        	{

                echo '<div id="'.$imagesArray["ID"].'" class="image">

                  	<img src="uploadedPictures/'.$imagesArray["imagename"].'">
                    <div class="tools">
                        <ul>
                            <li id="d_'.$imagesArray["ID"].'"><img src="Images/trash.png"></li>
                            <li id="e_'.$imagesArray["ID"].'"><img src="Images/edit.png"></li>
                            <li id="v_'.$imagesArray["ID"].'"><img src="Images/view.png"></li>
                            <li id="lastList"><img src="Images/mainpicture.png"></li>
                        </ul>
                        
                    </div>
                    
                    <div class="breakingflow"></div>

                    <div class="description">
                        <form method="POST">
                            <input class="inputText" id="t_'.$imagesArray["ID"].'" type="text" name="artName" placeholder="Nombre del arte">
                            </br>
                            <input class="descrText" id="d_'.$imagesArray["ID"].'" type="text" name="artDescrition" placeholder="Descripcion del arte">
                        </form>
                    </div>
                </div>';
            } 
		}

		
	}


    // Verifica cuantas fotos tiene un album

    if($_POST['type'] == "albumCount")
    {
        $albumID = $_POST['albumID'];

        $query = "SELECT * FROM image WHERE albumID = '".$albumID."'";
        $result = mysqli_query($connection,$query);

        $result = mysqli_fetch_array($result);

        $albumCount = count($result);

        echo $albumCount;
    }

    // Devuelve si un album tiene portada

    if($_POST['type'] == "albumCover")
    {
        $albumID = $_POST['albumID'];

        $query = "SELECT * FROM album WHERE ID = '".$albumID."'";
        $result = mysqli_query($connection,$query);

        $result = mysqli_fetch_array($result);

        echo $result['cover'];
    }

    // Devuelve la primera foto de un album

    if($_POST['type'] == "albumFirstPicture")
    {


        $albumID = $_POST['albumID'];

        $query = "SELECT image FROM image WHERE albumID = '".$albumID."' ORDER BY image ASC LIMIT 1";
        $result = mysqli_query($connection,$query);

        $result = mysqli_fetch_array($result);

        echo $result['image'];
    }

    // Devuelve el titulo del album

    if($_POST['type'] == "albumTitle")
    {

        $albumID = $_POST['albumID'];

        $query = "SELECT * FROM album WHERE ID = '".$albumID."'";
        $result = mysqli_query($connection,$query);

        $result = mysqli_fetch_array($result);

        echo $result['nombre'];
    }


    // Devuelve si el usuario y contraseña es correcto

    if($_POST['type'] == 'login')
    {
        $user = $_POST['user'];
        $password = $_POST['pass'];

        $query = "SELECT * FROM login WHERE user='".$user."' AND password='".$password."'";

        $result = mysqli_query($connection,$query);

        $result = mysqli_fetch_array($result);

        if(count($result['ID']) > 0)
        {
            echo "1"; // Exitoso
        }
        else
        {
            echo "0"; // error
        }

    }

    // devuelve todas las fotos de la base de datos

    if($_POST['type'] == "allPictures")
    {

        $query = "SELECT * FROM image";
        $result = mysqli_query($connection,$query);

        while ($imagesArray = mysqli_fetch_array($result)) 
            {

                echo '<div id="'.$imagesArray["ID"].'" class="image">

                    <img src="uploadedPictures/'.$imagesArray["imagename"].'">
                    <div class="tools">
                        <ul>
                            <li id="d_'.$imagesArray["ID"].'"><img src="Images/trash.png"></li>
                            <li id="e_'.$imagesArray["ID"].'"><img src="Images/edit.png"></li>
                            <li id="v_'.$imagesArray["ID"].'"><img src="Images/view.png"></li>
                            <li id="lastList"><img src="Images/mainpicture.png"></li>
                        </ul>
                        
                    </div>
                    
                    <div class="breakingflow"></div>

                    <div class="description">
                        <form method="POST">
                            <input class="inputText" id="t_'.$imagesArray["ID"].'" type="text" name="artName" value="'.$imagesArray["texto"].'" placeholder="Nombre del arte">
                            </br>
                            <input class="descrText" id="d_'.$imagesArray["ID"].'" type="text" name="artDescrition" value="'.$imagesArray["descripcion"].'" placeholder="Descripcion del arte">
                        </form>
                    </div>
                </div>';
            }
    }


?>