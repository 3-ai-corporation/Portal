<!DOCTYPE html>

<html>
<head>
  <title>Confirmar Senha</title>
</head>

<body>
	<div id= "DadosSenha">
	  <form>
		<ul class= "listItem">
			<li>
				<div id = "iCodigo">
					<p class= "lblConfirmar_Senha">Código: </p>
					<input onkeydown="ConfirmarInput_OnKeyDown(event, codigo.value, senha.value, confirmarSenha.value);" class="txtConfirmar_Senha" type="text" name="codigo" onkeypress = " validar_codigo(codigo);" maxlength = "4"/>
				</div>	
			</li>
			<li>
				<div id = "iNovaSenha">
					<p class= "lblConfirmar_Senha">Nova Senha: </p>
					<input onkeydown="ConfirmarInput_OnKeyDown(event, codigo.value, senha.value, confirmarSenha.value);" class="txtConfirmar_Senha" type="text" name="novaSenha" onkeypress = " validar_novaSenha(novaSenha);" maxlength = "10"/>
				</div>	
			</li>
			<li>
				<div id = "iConfirmarNovaSenha">
					<p class= "lblConfirmar_Senha">Confirmar nova senha: </p>
					<input onkeydown="ConfirmarInput_OnKeyDown(event, codigo.value, senha.value, confirmarSenha.value);" class="txtConfirmar_Senha" type="text" name="confirmarSenha" onkeypress = " validar_confirmacaoSenha(confirmarSenha);" maxlength = "10"/>
				</div>	
			</li>
			<li>                        
							<div id="iSubmiter">
								<input onclick = "validarSenha(codigo.value, senha.value, novaSenha.value);" class="btnConfirmar" type = "button" value="Confirmar"  style="width: 150px; height: 25px" />
							</div>
						</li>
		</ul>
	  <div id="alert"></div>
	  </form>
	</div>


</body>



</html>