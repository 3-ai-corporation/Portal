<?php
	session_start();

	if(! isset($_SESSION['ematricula']))
	{
		header('location:index.php');
	}
?>

<!DOCTYPE html>


<html lang="en">
	<head>
		<meta http-equiv = "Content-Type" content = "text/html;charset=utf-8"/>
		<link type="text/css" rel="stylesheet" href="assets/css/stylesheet_Menu.css"/> <!-- CSS do Diário -->
		<link type="text/css" rel="stylesheet" href="assets/css/stylesheet.css"/> <!-- CSS do Diário -->
		<link type = "text/css" rel = "stylesheet"  href = "assets/css/stylesheetPlano.css"/> <!-- CSS da aba 'Plano de aula' -->
		<link type="text/css" rel="stylesheet" href="assets/css/tabstyle.css"/> <!-- CSS das abas -->
		<link rel = "stylesheet" type="text/css" href="assets/css/notas.css"/> <!-- CSS da aba 'Notas' -->
		<link rel = "stylesheet" type="text/css" href="assets/css/stylesheet_frequencia.css"/> <!--Css da Frequência-->
		<script type="text/javascript" src="assets/js/angular.js"></script>
		<script type="text/javascript" src="assets/angular/angular.min.js"></script>
		<script type="text/javascript" src="assets/js/jquery-1.10.2.js"></script>
		<script type="text/javascript" src="assets/js/desabilitandoComponentes.js"></script>
    	<script src="assets/js/angular.js"></script>
		<script type = "text/javascript" src = "assets/angular/angular-route.min.js"></script>
		<script type = "text/javascript" src = "assets/js/js_frequencia.js"></script>
		<script type = "text/javascript" src = "assets/js/ApoioFreq.js"></script>
		<script type = "text/javascript" src = "assets/js/js_simulacao.js"></script>
		<script type="text/javascript" src="assets/js/desabilitandoBotoes.js"></script>		
		<script type="text/javascript" src="assets/js/button-selection.js"></script>
		<script type="text/javascript" src="assets/js/criandoBotoes.js"></script>
		<script type="text/javascript" src="assets/js/tabs_old.js"></script>
		<script type="text/javascript" src="assets/js/Tempo.js"></script>
		<script type="text/javascript" src = "assets/angular/angular-route.min.js"></script>
		<script src="assets/jquery-ui-1.8.24/jquery-1.8.2.js"></script>
		<script type="text/javascript" src="assets/angular/docs/components/jquery-1.10.2/jquery.min.js"></script>
		<script type="text/javascript" src="assets/js/notas.js"></script>
		<script type="text/javascript" src="assets/js/modulos.js"></script>		
		<link rel="stylesheet" type="text/css" href="assets/angular/docs/components/bootstrap-3.1.1/css/bootstrap.min.css" />
		<title>Diário Escolar</title>
    </head>
    <body onload="highlightAE(); desativandoChecks(); criandoOpcoes(); setFiltroVisible(true); beginTabs();
	                desativandoButtonsCurso(document.getElementById('checkPrimeiro')); desativandoButtonsBimestres();">
        <div id = "main">
        <p id="ids_diario" hidden>1111</p>
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
                </div>

                <?php
                    include ("toggler.php")
                ?>
                <div id="tabContainer">
                    <div id="tabs">
                        <ul>
                            <li id="tabHeader_1">Frequência</li>
                            <li id="tabHeader_2">Notas</li>
                            <!-- <li id="tabHeader_3">Plano</li> -->
                        </ul>
                       <!-- <a id="tabExportar" href="#planoaula-exportar">Exportar</a> -->
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
                     <!-- <div class="tabpage" id="tabpage_3" >
                        <?php
                            include ("planoTabela.php")
                        ?>
                      </div> -->
                    </div>
                </div>
        </div>
	</body>
</html>
