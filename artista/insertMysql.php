<?php

        require "connection.php";



        if($_POST['type'] == "album")
        {
            $date = date('d/m/Y');

            $dataArray = array();

            $query = "INSERT INTO album (nombre,creationdate,cover) VALUES ('empty','$date','empty')";
            $result = mysqli_query($connection,$query);

            if(!empty($result))
            {
                $lastID  = mysqli_insert_id($connection);

                $dataArray[] = $lastID;
                $dataArray[] = $date;

                echo json_encode($dataArray);
            }
        }



        if($_POST['type'] == "image")
        {

                // Verificamos si existen archivos cargados a la variable $_FILE
                $insertedImages = array();

                if(!empty($_FILES['images']))
                {

                    foreach ($_FILES['images']['name'] as $key => $name) 
                    {

                        // insertamos los archivos a la carpeta de UploadedImages..
                        if(($_FILES['images']['error'][$key] == 0) && move_uploaded_file($_FILES['images']['tmp_name'][$key], "uploadedPictures/{$name}"));
                        {

                            // Obtenemos las propiedades a insertar

                            $image = addslashes("uploadedPictures/{$name}");
                            $imageName = "{$name}";
                            $imageText = "";
                            $description = "";
                            $albumID = $_POST['albumID'];

                            echo $albumID;

                            $query = "INSERT INTO image (image, imagename, texto, albumID, descripcion) VALUES ('$image','$imageName','$imageText','$albumID','$description')";

                            $queryResult = mysqli_query($connection,$query);

                            $insertedImages[] = mysqli_insert_id($connection);

                        }
                    }


                    echo implode('~',$insertedImages);

                    // Aqui tambien, en vez de enviar un array de imagenes agregadas, se pudiera simplemente, en el .js, mandar a actualizar con un SELECT

                }

        }

        
    ?>