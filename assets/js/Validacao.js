
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
	var mtrForm = user;
	var passForm = pass;
	var regra = /^[0-9]+$/;
	
	if(mtrForm === "" && passForm === ""){
	   showAlert('error','Preencha todos os campos!');
	}
	else{
	  if(mtrForm === ""){
		showAlert('error','Digite a matrícula!');
	  }
	  else{ 
		if(mtrForm.length > 6){
			showAlert('error','Formato da matrícula incorreta!');
		}
		else{
		  if(passForm === ""){
		     showAlert('error','Digite a senha!');
			 window.location.href = "TelaInicial.php";
		  }
		  else{
			if (!mtrForm.match(regra)) {
				showAlert('error', 'Somente números na matrícula!');
				validar_matricula(mtrForm.value);
			    teste = true;
			}else{
				var retorno;
				$.ajax({
					type: "GET",
					url: 'service/Login',
					async: false,
					success: function(data) {
						retorno = jQuery.parseJSON(data);
						usuario = false;
						for(i=0;i<retorno.length;i++){
							if((retorno[i].matricula == mtrForm) && (retorno[i].senha == passForm)){
								window.location.href = "TelaInicial.php";
								usuario = true;
								break;
							}
						}
						if(!usuario){
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
