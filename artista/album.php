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
    <link type="text/css" rel="stylesheet" href="albumCSS.css"> 
  
    
</head>

    
<body>

    <?php

        error_reporting(0);

        /*
        session_start();

        if(!empty($_POST['albumID'])) 
        {
            $_SESSION['albumID'] = $_POST['albumID'];
            $_SESSION['albumTitle'] = $_POST['albumTitle'];               
        }


        $albumID = $_SESSION['albumID'];
        $albumTitle = $_SESSION['albumTitle']; */

        $albumID = $_GET['albumID'];


    ?>
    
    <div class="topBarContainer">
        <div class="topBarOver">

            <div class="backButton">
                <a href="index.php"><img src="Images/backArrow.png"></a>
                <a href="index.php"><p>Back to Home</p></a>
            </div>

            <img src="Images/atauriLogo.png">
        </div>
    </div>
    
    <div class="middleContainer">
        
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

            <div class="breakingflow"></div>
        </div>

        <div class="breakingflow"></div>
        
        
    </div>

    

    <script>

        var albumID = <?php echo json_encode($albumID); ?>;

    </script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="albumJQ.js"></script>
    
</body>
</html>