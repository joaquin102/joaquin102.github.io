 // MOSTRAMOS IMAGENES del album que recibimos

 $(document).ready(function()
 {

 	$.ajax({

 		url:'select.php',
 		type:'POST',
 		data:({type: 'albumIDNoTools', albumID: albumID}),
 		success:function(data)
 		{
 			$('div#imagesContainer').append(data);
 			
 		}

 		
 	});


 });

