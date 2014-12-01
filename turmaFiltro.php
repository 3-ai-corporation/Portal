<div id = "turma">
	<div id = "anoOpcoes">
		<form id = "campoCheckBoxes" onchange = "criandoOpcoes();"/>
			<label id = "lblSeries">Séries:</label>
			<div id = 'ckbPrimeiro' class = "anoOpcoesCheck" onchange = "criandoOpcoes();">
				<input type = "radio" name = "radioAno" id = "checkPrimeiro" class = "checkBoxAno" onclick="desativandoButtonsCurso(this);Selected_Serie(this);" checked/>
				<label for = "checkPrimeiro">1° Ano</label>
			</div>
			<div id = 'ckbSegundo' class = "anoOpcoesCheck" onchange = "criandoOpcoes();">
				<input type = "radio" name = "radioAno" id = "checkSegundo" class = "checkBoxAno" onclick="desativandoButtonsCurso(this);Selected_Serie(this);"/>
				<label for = "checkSegundo">2° Ano</label>
			</div>	
			<div id = 'ckbTerceiro' class = "anoOpcoesCheck" onchange = "criandoOpcoes();">
				<input type = "radio" name = "radioAno" id = "checkTerceiro" class = "checkBoxAno" onclick="desativandoButtonsCurso(this);Selected_Serie(this);"/>
				<label for = "checkTerceiro">3° Ano</label>
			</div>
		</form>
	</div>			
	<div id="turma_figura">
		<div id = "turmaOpcoes">
			<ul>
				<li id = "btnAE" class="buttonCurso buttonCursoBasic buttonCursoClicked buttonAtivado" onclick="highlightAE(); criandoOpcoes();Selected_Curso(this);">
					<h4>AE</h4>
				</li>
				<li id = "btnAI" class="buttonCurso buttonCursoBasic buttonCursoClicked buttonAtivado" onclick="highlight('btnAI', ['btnAE', 'btnAM', 'btnAT'], 'informatica-icon.png'); criandoOpcoes();Selected_Curso(this);">
					<h4>AI</h4>
				</li>
				<li id = "btnAM" class="buttonCurso buttonCursoBasic buttonCursoClicked buttonAtivado" onclick="highlight('btnAM', ['btnAE', 'btnAI', 'btnAT'], 'mecatronica-icon.png');criandoOpcoes();Selected_Curso(this);">
					<h4>AM</h4>
				</li>
				<li id = "btnAT" class="buttonCurso buttonCursoBasic buttonCursoClicked botaoAtivado" onclick="highlight('btnAT', ['btnAE', 'btnAM', 'btnAI'], 'telecomunicacao-icon.png');criandoOpcoes();Selected_Curso(this);">
					<h4>AT</h4>
				</li>
			</ul>					
		</div>
		<div id = "figuraTurma">
			<h2 id="turmaLabel"></h2>
		</div>
	</div>
</div>