<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="">
    
    <!-- googlefont links-->
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600' rel='stylesheet' type='text/css'>
    
    <!-- css links-->
    <link type="text/css" rel="stylesheet" href="adminCSS.css"> 

    <!-- javascript links--> 
    
</head>

    
<body>
    
    <div class="topBarContainer">
        <div class="topBarOver">
            <a href="index.php"><img src="Images/atauriLogo.png"></a>
        </div>
    </div>

    <div class="breakingflow"></div>

    <div class="middleContainer">

        <div class="leftPanel">

            <div class="leftPanelTitle">
            
            <img src="https://cdn0.iconfinder.com/data/icons/seo-smart-pack/128/grey_new_seo2-16-512.png"><p>Admin</p>
            
            </div>
            <div class="insideTopPanel">
                <ul>
                    <li id="artist">Menu principal</li>
                    <li><a href="admin.php" ><img src="Images/music.png">Albums</span></a></li>
                    <li><a href="adminPictures.php" ><img src="Images/video.png">Imagenes</span></a></li>
                    <li><a href="index.php" ><img src="Images/news.png"><span id="tag">Cerrar sesion</span></a></li>
                </ul>
            </div>
            
            <div class="footer">

                <p>Creado por Cristina Rendon y Joaquin Pereira</p>
                <p>Programacion Web | 2014</p>

            </div>

        </div>


        <div class="centerPanel">

            <div id="imageGallery" class="gallery">

                <div class="galleryTitle">
                    <p id="galleryTitle">My Art Work</p>
                </div>

                <button id="newAlbum" class="adminButton" type="button">Nuevo album</button>

                <div id='imagesContainer'>



                </div>

                <!-- Jquery and Mysql will work here-->


            </div>

        </div>


<div class="breakingflow"></div>


    </div>




    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="adminJQ.js"></script>
    
</body>
</html>