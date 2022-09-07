$("#btn-cadastro").on("click",function(){
	var nome = $("#username").val();
	var email = $("#email").val();
	var senha = $("#password").val();
	$.ajax({
		type : 'POST',
		url  : 'register_user.php',
		data :{
			email:email,
			senha:senha,
			nome:nome
		},
		beforeSend: function(){
			$("#resposta").html("Enviando...");
		}
	}).done(function (e){
		$("#resposta").html("Dados cadastrados com sucesso!")
	});
});




