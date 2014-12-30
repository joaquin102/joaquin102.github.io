$( document ).ready(function(e) 
{
    // cargamos los albums
    
    $.ajax({

    	url: 'select.php',
    	type: 'POST',
    	data: ({type: 'indexAlbums'}),
    	success: function(data)
    	{
    		$('#imagesContainer').append(data);
    	}
    });   

});

$(document).on('click','.image > #coverImage',function()
{
    // Obtenemos el ID del div padre de esta imagen.
    var albumID = $(this).closest(".image").attr('id');


    $.ajax({

        url: 'select.php',
        type: 'POST',
        data: ({type: 'albumTitle',albumID: albumID}),
        success: function(data)
        {
            window.location = 'album.php?albumID='+albumID;

            /*
            $.ajax(
            {
                url:'album.php',
                type: 'POST',
                data: ({type: 'showAlbum',albumID: albumID, albumTitle: data}),
                success: function(data)
                {
                    window.location = 'album.php';
                }
            }); */
        }
    });

    
});