$( document ).ready(function(e) 
{
    // cargamos los albums
    
    $.ajax({

    	url: 'select.php',
    	type: 'POST',
    	data: ({type: 'albums'}),
    	success: function(data)
    	{
    		$('#imagesContainer').append(data);
    	}
    });   

});

 

// Nuevo album

$('#newAlbum').on('click',function()
{

	$.ajax({

		url: 'insertMysql.php',
		type: 'POST',
		data: ({type:'album'}),
		dataType: 'json',
		success: function(data)
		{
			// 0 ID and 1 Date

			$('#imagesContainer').prepend($.trim('<div id="'+data[0]+'" class="image"><img id="test" src="Images/emptyAlbum.png"><div class="tools"><ul><li id="d_'+data[0]+'"><a href=#><img src="Images/trash.png"></a></li><li id="d_'+data[0]+'"><a href=#><img src="Images/edit.png"></a></li><li id="d_'+data[0]+'"><img src="Images/view.png"></li></ul></div><div class="breakingflow"></div><div class="description"><input id="album_'+data[0]+'" class="albumName" type="text" name="albumName" value="" placeholder="Nombre del album"><p id="albumDate">'+data[1]+'</p></div></div>'));

		}
	});

});

// Agregar fotos album


$(document).on('click','.image > #test',function()
{
	// Obtenemos el ID del div padre de esta imagen.
	var albumID = $(this).closest(".image").attr('id');

	$.ajax({

		url:'select.php',
		type:'POST',
		data: ({type:'albumCount',albumID: albumID}),
		success:function(data)
		{

			if(data == 0)
			{
				$.ajax({

        			url: 'select.php',
        			type: 'POST',
        			data: ({type: 'albumTitle',albumID: albumID}),
        			success: function(data)
        			{

        				if(data == "empty")
        				{
        					data = "Sin titulo"
        				}

        				window.location = 'newAlbum.php?albumID='+albumID;

        				/*
						$.ajax({

							url:'newAlbum.php',
							type: 'POST',
							data: ({type: 'edit',albumID: albumID, albumTitle: data}),
							success: function(data)
							{
								alert(data);	
								
							}
						}); */
					}
				});
        	}
			else
			{
				// Nothing happends

			}
		}
	});

	
});


// Nombre del album

$(document).on('blur','input',function()
{
	var fullID = $(this).attr('id');

	var id = fullID.split("_").pop();
	var albumName = $(this).val();

	$.ajax({

		url: 'updateMysql.php',
		type: 'POST',
		data: ({type: 'album',albumID: id, albumName: albumName}),
		success: function(data)
		{
			if(data == 1)
			{
				// Successfull
			}
			else
			{
				// Not Successfull
			}
		}
	});


});


// Click opciones de cada album
$(document).on('click','li',function(e)
{
	//e.preventDefault();

	var fullID = $(this).attr('id');

	var albumID = fullID.split("_").pop();

	var operation = fullID.slice(0,1);


	if(operation == "d")
	{
		// eliminar las fotos del album

		$.ajax({

			url:'deleteMysql.php',
			type: 'POST',
			data: ({type: 'albumID', albumID: albumID}),
			success: function(data)
			{
				$('#'+albumID).remove();
			}
		});

	}

	if(operation == "e")
	{

		window.location = 'newAlbum.php?albumID='+albumID;
		/*
		$.ajax({

			url:'newAlbum.php',
			type: 'POST',
			data: ({type: 'edit',albumID: albumID}),
			success: function(data)
			{
				window.location = 'newAlbum.php';
			}
		}); */
	}
});