<!DOCTYPE html>

<html lang="en">
	<head>
		<meta http-equiv = "Content-Type" content = "text/html;charset=utf-8"/>
		
		<link type="text/css" rel="stylesheet" href="assets/css/stylesheet_Menu.css"/> <!-- CSS do Diário -->
		<link type="text/css" rel="stylesheet" href="assets/css/stylesheet.css"/> <!-- CSS do Diário -->
		<link type = "text/css" rel = "stylesheet"  href = "assets/css/stylesheetPlano.css"/> <!-- CSS da aba 'Plano de aula' -->
		<link type="text/css" rel="stylesheet" href="assets/css/tabstyle.css"/> <!-- CSS das abas -->
		<link rel = "stylesheet" type="text/css" href="assets/css/notas.css"/> <!-- CSS da aba 'Notas' -->
		<!-- Esse .css relativo à 'frequência' buga tudo qnd eu ativo -->  <!-- Eu quem?? By: Ana Karoliny -->
		<link rel = "stylesheet" type="text/css" href="assets/css/stylesheet_frequencia.css"/> <!--Css da Frequência-->
		<script type="text/javascript" src="assets/js/angular.js"></script>
		<script type="text/javascript" src="assets/angular/angular.min.js"></script>
		<script type="text/javascript" src="assets/js/jquery-1.10.2.js"></script>
		<script type="text/javascript" src="assets/js/desabilitandoBotoes.js"></script>
		<script type="text/javascript" src="assets/js/button-selection.js"></script>
		<script type="text/javascript" src="assets/js/criandoBotoes.js"></script>
		<script type="text/javascript" src="assets/js/tabs_old.js"></script>
		<script type="text/javascript" src="assets/js/Tempo.js"></script>
		<script type="text/javascript" src = "assets/angular/angular-route.min.js"></script>
		<script type="text/javascript" src="assets/js/modulos.js"></script> <!-- Os arquivos notas.js, app.js e frequencia.js estão unidos neste 'modulos.js' -->
		<link rel="stylesheet" type="text/css" href="assets/angular/docs/components/bootstrap-3.1.1/css/bootstrap.min.css" />

		<title>Diário Escolar</title>
    </head>
	
	<body onload="highlightAE(); desativandoChecks(); criandoOpcoes(); setFiltroVisible(true); beginTabs();
	                desativandoButtons(document.getElementById('checkPrimeiro'));">
		<div id = "main">
			<?php 
				include ("menu.php")
			?>
			
			<div id = "filtro">
				<?php
					include("turmaFiltro.php")
				?>
				
				<div id = "etapa">
					<?php
						include("bimestres.php")
					?>
					
					<?php
						include("disciplinas.php")
					?>
				</div>
				
				<div id="planoaula-exportar" class="modelDialog" ng-controller="ExportController as export">
				<?php
					include ("planoExportar.php")
				?>
				</div>
				
			</div>     

			<?php
                include ("toggler.php")
            ?>			
			
			<div id="tabContainer">
				<div id="tabs">
					<ul>
						<li id="tabHeader_1">Frequência</li>
				        <li id="tabHeader_2">Notas</li>
				        <li id="tabHeader_3">Plano</li>
					</ul>
					<a id="tabExportar" href="#planoaula-exportar">Exportar</a>
				</div>
				<div id="tabscontent">
			      <div class="tabpage" id="tabpage_1">
			        <?php
						include ("frequencia.php")
					?>
			      </div>
			      <div class="tabpage" id="tabpage_2" >
			        <?php
						include ("notas.php")
					?>
			      </div>
			      <div class="tabpage" id="tabpage_3" >
					<?php
						include ("planoTabela.php")
					?>
			      </div>
			    </div>
			</div>
			
		</div>
	</body>
</html>