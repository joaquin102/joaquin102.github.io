$('#loginUser').on('click',function()
{

	var user = $("#user").val();
	var pass = $("#pass").val();

	$.ajax({

		url:'select.php',
		type:'POST',
		data:({type: 'login', user: user, pass: pass}),
		success:function(data)
		{
			if(data == "1")
			{
				window.location = "admin.php";
			}
			else
			{
				//error
			}
		}
	})
})