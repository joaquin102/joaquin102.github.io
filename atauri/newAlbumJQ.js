 // MOSTRAMOS IMAGENES del album que recibimos

 $(document).ready(function()
 {

 	$.ajax({
 		url:'select.php',
 		type:'POST',
 		data:({type: 'albumID', albumID: albumID}),
 		success:function(data)
 		{
 			$('div#imagesContainer').append(data);
 		}
 	});


 });


// ELIMINAMOS UNA IMAGEN 


$(document).on('click', "li", function (e) {

	e.preventDefault();
    
    var fullID = $(this).attr('id');

    var id = fullID.split("_").pop();
    var operation = fullID.slice(0,1);


    if(operation == "d")
    {
    		$.post("deleteMysql.php", {type: 'id', id: id}, function(data)
			{
				$('#'+id).remove();
			});
    }

    if(operation == "e")
    {
    	
    }
});



 // INSERTAR IMAGEN EN LA BASE DE DATOS


 	// detectamos cuando la ventana de carga de archivos, es cerrada
 $('input#uploadFiles').on('change',function()
 {
 	//una vez que se cierra la ventana, cargamos hacemos el submit para enviar los archivos al servidor
 	$('#uploadForm').submit();

 })


// cuando se realiza el submit en el form, enviamos la peticion a la base de datos, utilizando AJAX.
 $('#uploadForm').on('submit',function(e)
 {
 		var formData = new FormData(this);
 		formData.append('type','image');
 		formData.append('albumID',albumID);

	    $.ajax( 
	    {
	      url: 'insertMysql.php',
	      type: 'POST',
	      data: formData,
	      processData: false,
	      contentType: false,
	      success:function(data)
	      {

	      	result=data.split('~');
	      	// Se recibe este array de fotos insertadas, y se manda a msotrar.

	      	
	      	// Mostrar la imagen insertada

	      	$.post('select.php', {array: result, type:'loadInsertedImages', albumID: albumID}, function(data)
	      	{
	      		$('div#imagesContainer').prepend(data);

	      	}); 

	      	// Verificamos si el album tiene portada, si no le asignamos la primera imagen

	      	$.ajax({

	      		url:'select.php',
	      		type:'POST',
	      		data:({type:'albumCover',albumID: albumID}),
	      		success:function(data)
	      		{
	      			if(data == "empty")
	      			{
	      				$.ajax({

	      					url:'select.php',
	      					type:'POST',
	      					data:({type: 'albumFirstPicture', albumID: albumID}),
	      					success: function(data)
	      					{
	      						// actualizamos la imagen de portada

	      						$.ajax({

	      							url:'updateMysql.php',
	      							type:'POST',
	      							data:({type:'albumCover',image: data, albumID: albumID}),
	      							success:function(data)
	      							{
	      								// Changed!

	      							}
	      						})
	      					}
	      				})
	      			}
	      		}
	      	})

	      }
	    });

	    e.preventDefault(); // evita que se realice la actualizacion de la pagina
 });


// Pierde el foco y coloca texto a la imagen

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




