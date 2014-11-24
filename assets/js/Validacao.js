
function validar_matricula(matricula){
	 var regra = /^[0-9]+$/;
	 if (!matricula.value.match(regra) && matricula.value != "") {
		showAlert('error', 'Somente números na matrícula!');
		Value(matricula);
		return true;
	 }
	 return false;
}


/**
 *Created by Yasmim Libório on 24/10/2014
 * validação que verifica o tamanho de caracteres na matrícula
*/
function validar_matricula2(matricula){
	 var regra = /^[0-9]+$/;
	 if (!matricula.value.match(regra) && matricula.value != "") {
		showAlert('error', 'Somente números na matrícula!');
		Value(matricula);
	 }
	 if(matricula.value.length > 5){
		showAlert('error', 'Digite somente 6 números!');
		matricula.value = matricula.value.substr(0,6);
	 }
}
/**
 *Created by Yasmim Libório on 24/10/2014
 * validação que verifica o tamanho de caracteres na senha
*/
function validar_senha(senha){
	if(senha.value.length > 9){
		showAlert('error', 'A senha tem no máximo 10 dígitos');
		senha.value = senha.value.substr(0, 9);
	}

}

function validar_numero(valor){
    var regra = /^[0-9]+$/;
    if (!valor.match(regra)) {
        return true;
    }
    return false;
}

/**
  * Created by Ruben on 23/10/2014
  *		Método que faz com que o login também possa ser efetuado ao ser pressionada a tecla Enter.
  */
  
function LoginInput_OnKeyDown(event, user, pass) {
	if (event.keyCode == 13) {
		validar(user, pass);
	}
}

/**
 *Created by Yasmim Libório on 06/11/2014
 * Método que faz a validação do email
*/

function IsMail($email){
    $er = "/^(([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}){0,1}$/";
    if (preg_match($er, $email)){
    return true;
    } else {
    return false;
    }
	
	/*$email = "email@dominio.com.br";
    usar na validação de verificação do email do usuario
    if (isMail($email)){
    echo "É um e-mail válido.";
    } else {
    echo "E-mail inválido.";
    }*/
}



function Value(number)
{
    var aux = "";

    for(i = 0; i < number.value.length; i++)
    {
        if(!validar_numero(number.value.charAt(i)))
        {
            aux += number.value.charAt(i);
        }
    }
    number.value = aux;
}
//showAlert('error','Matricula ou Senha incorreta!');
function validar(user,pass){
	var mtrForm = user;
	var passForm = pass;
	var regra = /^[0-9]+$/;
	
	if(mtrForm === "" && passForm === ""){
	   showAlert('error','Preencha todos os campos!');
	}
	else
	{
		if(mtrForm === ""){
			showAlert('error','Digite a matrícula!');
		}
		else{	
		  if(mtrForm.length < 6){
			 showAlert('error','Formato da matrícula incorreta!');
		  }
		  else
		  {
			if(passForm === ""){
			  showAlert('error','Digite a senha!');
			}
			else
			{
			    if (!mtrForm.match(regra)) {
					showAlert('error', 'Somente números na matrícula!');
					validar_matricula(mtrForm.value);
				}
				else{
				   var usuario;
				   $.ajax({
					type: "GET",
					url: 'service/Login/' + mtrForm + '/' + passForm,
					success: function(data) {
					usuario = data;
						if(usuario){		

							$.post( "Login.php?acao=logar", { ematricula: mtrForm  })
									.done(function (data) {
										if ( data == 'ok' )
											window.location.href = 'TelaInicial.php';
									});	
						}else{
							showAlert('error', 'Matrícula ou senha incorreta!');
						}
					}	                   				    
				  });			
				}
			}                                    
		  }
		}	
	}
}

function ValidarEsqueceuSenha(user, email)
{
	var usuario
	$.ajax(
	{
		type:"GET",
		url: '/service/EsqueceuSenha/' + user + '/' + email,
		success: function(data) {
			usuario = JQuery.parseJSON(data);
			if(usuario != "")
			{
				var usual
				$.ajax(
				{
					type:"GET",
					url: '/sevice/TrocarSenha/' + user + '/' + Math.random(),
					success: function(data)
					{
						usual = JQuery.parseJSON(data);
						if(usual)
						{
							//mandar e-mail
						}
					}
				});
			}
			else
			{
				showAlert('erro', 'Matrícula ou e-mail incorreto');
			}
		}
	});
}

function showAlert2(type,message) {
		$('#alert2').addClass('alert-' + type).html( message ).fadeIn();
		setTimeout("closeAlert(2)", 4000);
}
function showAlert(type,message) {
		$('#alert').addClass('alert-' + type).html( message ).fadeIn();
		setTimeout("closeAlert('')", 4000);
	}
	(function() {
		$('#alert').click(function() {
		closeAlert();
		});
	});
 
	function closeAlert(tipo) {
	  $('#alert' + tipo).fadeOut();
	}
