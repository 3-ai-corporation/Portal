
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
	if(senha.value.length > 10){
		showAlert('error', 'A senha tem no máximo 10 dígitos');
		senha.value = senha.value.substr(0, 10);
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

function validar(user,pass){
	var matricula = ["123456", "123456"];
	var senha = ["masterkey", "professor"];
	var mtrForm = user;
	var passForm = pass;
	var teste = false;
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
			   if(!teste){	
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
						
							
							if((matricula[0] === mtrForm) && (senha[0] === passForm))
							{
								window.location.href = "TelaInicial.php";
							}
							else
							{
								if((matricula[1] === mtrForm) && (senha[1] === passForm))
								{
									window.location.href = "TelaInicial.php";
								}
								else
								{
									if (!mtrForm.match(regra)) {
										 showAlert('error', 'Somente números na matrícula!');
										 validar_matricula(mtrForm.value);
										 teste = true;
									 }
									 else{
										var tot = false;
										for(var uss = 0; uss < matricula.length; uss++)
										{
											if((matricula[uss] === mtrForm) && (senha[uss] === passForm))
											{
												tot = true;
											}
										}
										
										if(!tot)
										{								
											showAlert('error','Matricula ou Senha incorreta!');
										}
									}
								}
							}
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
