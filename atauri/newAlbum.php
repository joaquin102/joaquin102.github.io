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
    <link type="text/css" rel="stylesheet" href="newAlbumS.css"> 

    <!-- javascript links-->
    <script type="text/javascript" src="newAlbumJS.js"></script>   
    
</head>

    
<body>
    <?php
        error_reporting(0);
        session_start();


        $albumID = $_GET['albumID'];
    ?>
    <div class="topBarContainer">
        <div class="topBarOver">
            <img src="Images/atauriLogo.png">
            <p>PICTURE UPLOADER</p>
        </div>
    </div>
    
    <div class="middleContainer">
        
        
        <div class="progressBarContainer">
            
            <img id="test"src="Images/cloudup.png">
            
            <div class="progressBar">

                <div id="pbi" class="progressBarInside"></div>
                
                <div class="percentage">
                     <p id="tpbi"></p>
                </div>
                
            </div>


            
            <div class="inputForm">

                <form id="uploadForm" action="newAlbum.php" method="POST" enctype="multipart/form-data">
                    
                    <input id="uploadFiles" type="file" name="images[]" multiple="multiple" class="uploadbtn">
                    
                </form>
            
            </div>
            
            <div class="breakingflow"></div>
        </div>
        
        
        

        <div class="centerPanel">

            <div id="imageGallery" class="gallery">

                <div class="galleryTitle">
                    <p id="galleryTitle"><?php echo $albumTitle ?></p>
                </div>
                    <div id='imagesContainer'>



                    </div>
                    

                    <div class="breakingflow"></div>

                </div>

                <div class="breakingflow"></div>
            </div>
        </div>

        <div class="breakingflow"></div>
        
        
    </div>


    <script>

        var albumID = <?php echo json_encode($albumID); ?>;

    </script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="newAlbumJQ.js"></script>
    
</body>
</html>
