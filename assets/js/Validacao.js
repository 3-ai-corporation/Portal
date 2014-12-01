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
*Created by Yasmim Libório on 24/11/2014
 * Método que faz com que o login também possa ser efetuado ao ser pressionada a tecla Enter.
*/
function ConfirmarInput_OnKeyDown(event, codigo, pass, confirmPass) {
if (event.keyCode == 13) {
		validarSenha(codigo, pass, confirmPass);
	}
}

/**
*Created by Yasmim Libório on 24/11/2014
 * Método que faz a validação do codigo digitado pelo usuario 
*/
function validar_codigo(codigo){
		return true;
}
//djsaokd



/**
*Created by Yasmim Libório on 24/11/2014
 * Método que faz a validação do codigo, nova senha e confirmacao da nova senha digitado pelo usuario 
*/
function validarSenha(matricula, novaSenha, senha){
	var regra = /^[0-9]+$/;
	if(matricula === "" && novaSenha === "" && senha === ""){
		showAlert('error','Preencha todos os campos!');
	}
	else
	{
		if(matricula === ""){
			showAlert('error','Digite a matricula!');
		}
		
		else{	
			if(matricula.length < 6){
			 showAlert('error','Formato da matrícula incorreta!');
			}
			else
			{
				if(novaSenha === ""){
				  showAlert('error','Confirme a senha!');
				}
				else
				{
					if(novaSenha === ""){
					  showAlert('error','Digite a nova senha!');
					}
					else
					{
						if (!matricula.match(regra)) {
							showAlert('error', 'Somente números na matrícula!');
							validar_matricula(matricula.value);
						}
						else{					
							if(novaSenha == senha)
							{
								//chama a função para mudar a senha do banco com os parametros "matricula" e "senha"
								var usuario;
								$.ajax(
									{
										type:"GET",
										url: 'service/Mudarsenha/' + matricula + '/' + senha,
										success: function(data) {
											usuario = jQuery.parseJSON(data);
											if(usuario)
											{
												showAlert('erro', 'A senha foi alterada no banco com sucesso!');
											}
											else
											{		  
											showAlert('erro', 'Matrícula não cadastrado no banco!');
											}  
										}										
									}
								);	
							}
							else
							{
								showAlert('error', 'Senhas divergentes!');
							}
						}
					}
				}
			}
	}
}


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
				   /*var usuario;
				   $.ajax({
					type: "GET",
					url: 'service/Login/' + mtrForm + '/' + passForm,
					success: function(data) {
					usuario = jQuery.parseJSON(data);
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
				  });*/
				  $.post( "Login.php?acao=logar", { ematricula: mtrForm  })
									.done(function (data) {
										if ( data == 'ok' )
											window.location.href = 'TelaInicial.php';
									});
				}
			}                                    
		  }
		}	
	}
}

function ValidarEsqueceuSenha(user, mail)
{
    var matricula = user;
	var email = mail;
	
	if(matricula == "" && email == ""){
	   showAlert('error','Preencha todos os campos!');
	}
	else{	
		if(matricula == ""){
			showAlert('error','Digite a matrícula!');
		}else{
			if(email == ""){			
			   showAlert('error','Digite o email!');
			}
			else{
				$.post( "email.php", { email: mail })
									.done(function (data) {
										if ( data == 'ok' )
										{
											var usuario;
												$.ajax(
												{
													type:"GET",
													url: 'service/EsqueceuSenha/' + matricula + '/' + email,
													success: function(data) {
													usuario = jQuery.parseJSON(data);
													  if(usuario)
													  {
													  	if(sendMail(matricula,email)){
															showAlert('erro','Email enviado com sucesso!')
															window.location.href = 'Confirmacao_Senha.php';
														}else{
															showAlert('erro','Houve problema no envio do email. Tente novamente mais tarde')
														}														
													  }
													  else
													  {		  
														showAlert('erro', 'Matrícula ou e-mail não cadastrado no banco!');
													  }           
												}
												});	
										}
										else
										{		
											showAlert('erro', 'E-mail inválido!');
										}
				});
			}
		}
	}
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
function sendMail(matricula,email) {
	int code = Math.floor((Math.random()*9999999999)+1000000000;

	  $.ajax({
		type: "GET",
		url: 'service/sendMail/' + 'nome' + '/' +email + '/' + code,
		success: function(data) {
			var foi = jQuery.parseJSON(data);
			if(foi){
				var d = new Date();
			    d.setTime(d.getTime() + (1000*15*60));
			    var expires = "expires="+d.toUTCString();
			    
				document.cookie = "recoveryCode="+code+";"+expires;
			}
			return foi;
		}		    
	  });
}

function getCookie(cname) { //função do W3 Schools que retorna o cookie a partir do nome. Ver mais em: http://www.w3schools.com/js/js_cookies.asp
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) != -1) return c.substring(name.length, c.length);
    }
    return "";
}

function validar_codigo(codigo){
	var code = getCookie("recoveryCode");
    if (code !== "") { //quer dizer que o COOKIE do código está preenchido
        if(codigo == parseInt(code)){
			document.cookie = "recoveryCode=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
			return true;
		}else{
			return false;
		}
    } else {
       showalert('erro','O código não existe ou expirou. Por favor, solicite novo envio e insira o código dentro de 15 minutos.');
    }
}