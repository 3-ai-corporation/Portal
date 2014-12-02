<!DOCTYPE html>

<html>
<head>
    <meta http-equiv = "Content-Type" content = "text/html;charset=utf-8"/>
	<script src = "assets/js/Validacao.js"></script>
	<script src = "assets/js/jquery-2.1.1.js"></script>	
    <link type="text/css" rel="stylesheet" href="assets/css/stylesheet_confirmacaoSenha.css">
	
    <title>Confirmar Senha</title>
</head>

<body>
  <div id= "main">
	<div id= "DadosSenha">
	    <div class="imgLogo">
		     <img class="P"src = "assets/img/Logo_Fundacao.jpg"></img>
		</div>
	  <form>
		<ul class= "listItem">
			<li>
				<div id = "iCodigo">
					<p class= "lblConfirmar_Senha">Matrícula: </p>
					<input onkeydown="ConfirmarInput_OnKeyDown(event, codigo.value, novaSenha.value, confirmarSenha.value);" class="txtConfirmar_Senha" type="text" name="codigo" onkeypress = "validar_codigo(codigo);" maxlength = "6"/>
				</div>	
			</li>
			<li>
				<div id = "iNovaSenha">
					<p class= "lblConfirmar_Senha">Nova Senha: </p>
					<input onkeydown="ConfirmarInput_OnKeyDown(event, codigo.value, novaSenha.value, confirmarSenha.value);" class="txtConfirmar_Senha" type="password" name="novaSenha" onkeypress = "validar_senha(novaSenha);" maxlength = "10"/>
				</div>	
			</li>
			<li>
				<div id = "iConfirmarNovaSenha">
					<p class= "lblConfirmar_Senha">Confirmar nova senha: </p>
					<input onkeydown="ConfirmarInput_OnKeyDown(event, codigo.value, novaSenha.value, confirmarSenha.value);" class="txtConfirmar_Senha" type="password" name="confirmarSenha" onkeypress = "validar_senha(confirmarSenha);" maxlength = "10"/>
				</div>	
			</li>
			            <li>                        
							<div id="iSubmiter">
								<input onclick = "validarSenha(codigo.value, novaSenha.value, confirmarSenha.value);" class="btnConfirmar" type = "button" value="Confirmar"  style="width: 150px; height: 25px" />
							</div>
						</li>
		</ul>
	  <div id="alert"></div>
	  </form>
	</div>
  </div>

</body>
</html>
