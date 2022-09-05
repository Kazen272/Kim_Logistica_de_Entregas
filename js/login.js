$('document').ready(function(){
 
	$("#btn-entrar").click(function(){
		var email = $("#email").val();
		var senha = $("#senha").val();
			
		$.ajax({
			type : 'POST',
			url  : 'login.php',
			data : {
				email:email,
				senha:senha
			}
		});	
	});
 
});