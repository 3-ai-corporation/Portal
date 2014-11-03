<div id = "turma">
	<div id = "anoOpcoes">
		<form id = "campoCheckBoxes" onchange = "criandoOpcoes();">
			<label id = "lblSeries">Séries:</label>
			<div id = 'ckbPrimeiro' class = "anoOpcoesCheck" onchange = "criandoOpcoes();">
				<input type = "radio" name = "radioAno" id = "checkPrimeiro" ng-click="filtraTurma()" class = "checkBoxAno" checked/>
				<label for = "checkPrimeiro">1° Ano</label>
			</div>
			<div id = 'ckbSegundo' class = "anoOpcoesCheck" onchange = "criandoOpcoes();">
				<input type = "radio" name = "radioAno" id = "checkSegundo" ng-click="filtraTurma()" class = "checkBoxAno"/>
				<label for = "checkSegundo">2° Ano</label>
			</div>	
			<div id = 'ckbTerceiro' class = "anoOpcoesCheck" onchange = "criandoOpcoes();">
				<input type = "radio" name = "radioAno" id = "checkTerceiro" ng-click="filtraTurma()" class = "checkBoxAno"/>	
				<label for = "checkTerceiro">3° Ano</label>
			</div>
		</form>
	</div>			
	<div id="turma_figura">
		<div id = "turmaOpcoes">
			<ul>
				<li id = "btnAE" class="buttonCurso buttonCursoBasic buttonCursoClicked" ng-click="filtraTurma()" onclick="highlightAE();criandoOpcoes();">
					<h4>AE</h4>
				</li>
				<li id = "btnAI" class="buttonCurso buttonCursoBasic buttonCursoClicked" ng-click="filtraTurma()" onclick="highlight('btnAI', ['btnAE', 'btnAM', 'btnAT'], 'informatica-icon.png');criandoOpcoes();">
					<h4>AI</h4>
				</li>
				<li id = "btnAM" class="buttonCurso buttonCursoBasic buttonCursoClicked" ng-click="filtraTurma()" onclick="highlight('btnAM', ['btnAE', 'btnAI', 'btnAT'], 'mecatronica-icon.png');criandoOpcoes();">
					<h4>AM</h4>
				</li>
				<li id = "btnAT" class="buttonCurso buttonCursoBasic buttonCursoClicked" ng-click="filtraTurma()" onclick="highlight('btnAT', ['btnAE', 'btnAM', 'btnAI'], 'telecomunicacao-icon.png');criandoOpcoes();">
					<h4>AT</h4>
				</li>
			</ul>					
		</div>				
		
		<div id = "figuraTurma">
			<!--img src = "assets/img/eletronica-icon.png"/-->
			<h2 id="turmaLabel"></h2>
		</div>
	</div>
</div>