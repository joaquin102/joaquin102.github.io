$( document ).ready(function(e) 
{
    // cargamos todas las fotos
    
    $.ajax({

    	url: 'select.php',
    	type: 'POST',
    	data: ({type: 'allPictures'}),
    	success: function(data)
    	{
    		$('#imagesContainer').append(data);
    	}
    });   

});

// Click opciones de cada album
$(document).on('click','li',function(e)
{
    //e.preventDefault();

    var fullID = $(this).attr('id');

    var pictureID = fullID.split("_").pop();

    var operation = fullID.slice(0,1);


    if(operation == "d")
    {
        // eliminar la foto

        $.ajax({

            url:'deleteMysql.php',
            type: 'POST',
            data: ({type: 'id', id: pictureID}),
            success: function(data)
            {
                alert(data);
                $('#'+pictureID).remove();
            }
        });

    }
});

$(document).on('blur','input',function()
{
    var fullID = $(this).attr('id');

    var id = fullID.split("_").pop();
    var inputType = fullID.slice(0,1);


    if(inputType == "t")
    {
        var imageText = $(this).val();

        $.ajax({

            url: 'updateMysql.php',
            type: 'POST',
            data: ({type: 'imageText',imageID: id, imageText: imageText}),
            success: function(data)
            {
                if(data == 1)
                {
                    // Successfull
                }
                else
                {
                    
                }
            }
        });
    }
    else
    {
        var descrText = $(this).val();

        $.ajax({

            url: 'updateMysql.php',
            type: 'POST',
            data: ({type: 'descrText',imageID: id, descrText: descrText}),
            success: function(data)
            {
                if(data == 1)
                {
                    // Successfull
                }
                else
                {
                    
                }
            }
        });
    }

    


});