$('document').ready(function(){
 
	$("#btn_cadastro").click(function(){
		var data = $("#login-form").serialize();
			
		$.ajax({
			type : 'POST',
			url  : 'login.php',
			data : data,
			dataType: 'json',
			beforeSend: function()
			{	
				$("#btn_login").html('Validando ...');
			},
			success :  function(response){						
				if(response.codigo == "1"){	
					$("#btn_login").html('Entrar');
					$("#login-alert").css('display', 'none')
					window.location.href = "dashboard.html";
				}
				else{			
					$("#btn_login").html('Entrar');
					$("#login-alert").css('display', 'block')
					$("#mensagem").html('<strong>Erro! </strong>' + response.mensagem);
				}
		    }
		});
	});
 
});