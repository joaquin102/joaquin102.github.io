function fileLoaded(event)
{
	//document.getElementById("uploadForm").submit();

	event.preventDefault();
	event.stopPropagation();


	var fileInput = document.getElementById("uploadFiles");


	var data = new FormData();

        data.append('ajax',true);


        console.log(fileInput.files.length);

        // then set the files inside

        for (var i = 0; i < fileInput.files.length; i++) 
        {
            data.append("file[]",fileInput.files[i]);
        }


        // Now the dynamic info

        var request = new XMLHttpRequest();


        request.upload.addEventListener('progress',function(event)
        {
            if(event.lengthComputable)
            {
                var percent = event.loaded / event.total;

                var progressBar = document.getElementById("pbi");
                var progressText = document.getElementById("tpbi");


                var test = Math.round((percent * 100));

                progressBar.style.width = test+'%';
                progressText.innerHTML = test+'%';

            }

        });

        // the file is uploaded
        request.upload.addEventListener('load',function(event)
        {
            //document.getElementById("upload_progress").style.display = "none";

        });


        request.upload.addEventListener('error',function(event)
        {
            alert("Upload failed");
        });


        // Now send the request
        request.open('POST','index.php');
        request.setRequestHeader('Cache-Control','no-cache');

        request.send(data);
}


window.addEventListener('load',function(event)
	{


		//para el boton adminButton, agregaremos un listener de click para que haga de boton de file
		// Todo esto con el proposito de poder disenar nuestro propio boton



	// Auto submit

	var loaded = document.getElementById("uploadFiles");


	loaded.addEventListener('change',fileLoaded);

});









