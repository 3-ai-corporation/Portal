// Controller

<?php

require_once 'model/UsuariosModel.php';

class AlunosController{

	//Função que retorna lista de alunos de acordo com a turma
	public function retrieveAlunos($turmaId){
		/* $alunos = UsuariosModel::find('all', array('conditions' => array("SELECT usuario.matricula, usuario.nome FROM tb_usuarios usuario
																		WHERE usuario.matricula = tb_alunos.matricula
																		AND tb_alunos.turma_id = ?", $turmaId), "order"=>"usuario.nome")); */					
				
		$join = 'JOIN tb_alunos ON tb_usuarios.matricula = tb_alunos.matricula';
		$sel = 'tb_usuarios.matricula AS matricula, tb_usuarios.nome AS nome';
		$alunos = UsuariosModel::find('all', array('joins' => $join, 
						'select' => $sel, 
						'conditions' => array('tb_alunos.turma_id = ?', $turmaId),
						'order' => 'nome'));																															
		
		$retorno = array();
		foreach ($alunos as $key => $value) {
			$obj['matricula'] = $value->matricula;
			$obj['nome'] = $value->nome;			
			$retorno[] = $obj;
		}
		
		return $retorno;
	}
	
	public function retrieveAulas($turmaId, $materiaId, $bimestre) {
		$materia_turma = UsuariosModel::find('all', array('conditions' => array("turma_id = ?
																		   AND tmateria_id = ?", $turmaId, $materiaId)));
		
		$retorno = array();
		
		foreach($materia_turmas as $key => $value ) {
            // Busca de turmas a partir do id
            $materias_turmas = MateriaTurmasModel::find($value->materia_turmas_id);

            $turma = TurmasModel::find($materias_turmas->turma_id);

            $result['serie'] = $turma->serie;
            $result['ano'] = $turma->ano;
            
            $curso = CursosModel::find($turma->cursos_id);
            $result['cursos'] = $curso->curso;

            if($returnDisciplina)
            {
                $materias = MateriasModel::find($materias_turmas->materia_id);
                $result['materia'] = $materias->nome;
            }

            $retorno[] = $result;

        }
	
	}
	

	

	private function object_to_array(stdClass $Class){
		$Class = (array)$Class;
		foreach($Class as $key => $value){
			if(is_object($value)&&get_class($value)==='stdClass'){
				$Class[$key] = self::object_to_array($value);
			}
		}
		return $Class;
	}

}

// Diário DataService

// Retorna o c�digo-fonte da p�gina passada como url
var getPageResponse = function(url) {
	var getRequest = function(url, success, error) {
		var req = false;
		try{
			// most browsers
			req = new XMLHttpRequest();
		} catch (e){
			// IE
			try{
				req = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				// try an older version
				try{
					req = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e){
					return false;
				}
			}
		}
		if (!req) return false;
		if (typeof success != 'function') success = function () {};
		if (typeof error!= 'function') error = function () {};
		req.onreadystatechange = function(){
			if(req .readyState == 4){
				return req.status === 200 ? 
					success(req.responseText) : error(req.status)
				;
			}
		}
		req.open("GET", url, true);
		req.send(null);
		return req;
	}
	
	var content = '';
	
	getRequest(url,
		function(response) {
			content = response;
		},
		function(error) {
			throw error;
		});
	
	return content;
};

var getPageData = function(url) {
    return json_decode();
}

// Diario.php

<!DOCTYPE html>

<html lang="en">
	<head>
		<meta http-equiv = "Content-Type" content = "text/html;charset=utf-8"/>
		<link type="text/css" rel="stylesheet" href="assets/css/stylesheet_Menu.css"/> <!-- CSS do Diário -->
		<link type="text/css" rel="stylesheet" href="assets/css/stylesheet.css"/> <!-- CSS do Diário -->
		<link type = "text/css" rel = "stylesheet"  href = "assets/css/stylesheetPlano.css"/> <!-- CSS da aba 'Plano de aula' -->
		<link type="text/css" rel="stylesheet" href="assets/css/tabstyle.css"/> <!-- CSS das abas -->
		<link rel = "stylesheet" type="text/css" href="assets/css/notas.css"/> <!-- CSS da aba 'Notas' -->
		<!-- Esse .css relativo à 'frequência' buga tudo qnd eu ativo -->
		<link rel = "stylesheet" type="text/css" href="assets/css/stylesheet_frequencia.css"/> <!--Css da Frequência-->
		
		<!--<script type="text/javascript" src="assets/angular/angular.min.js"></script>-->
		<script src="assets/js/angular.js"></script>
		<script type = "text/javascript" src = "assets/angular/angular-route.min.js"></script>		
		
		<script type = "text/javascript" src = "assets/js/js_frequencia.js"></script>
		
		<script type="text/javascript" src="assets/js/desabilitandoBotoes.js"/>		
		<script type="text/javascript" src="assets/js/desabilitandoBotoes.js"></script>		
		<script type="text/javascript" src="assets/js/button-selection.js"></script>
		<script type="text/javascript" src="assets/js/criandoBotoes.js"></script>
		<script type="text/javascript" src="assets/js/tabs_old.js"></script>
		<script type="text/javascript" src="assets/js/Tempo.js"></script>
        <!--<script type="text/javascript" src="assets/js/notas.js"></script> Por que duas referências desta m#rda? -->		
		 <script src="assets/jquery-ui-1.8.24/jquery-1.8.2.js"></script>
		 <script type="text/javascript" src="assets/angular/docs/components/jquery-1.10.2/jquery.min.js"></script>
		
		<!-- <script type = "text/javascript" src = "assets/js/notas.js"></script> -->
		<!-- <script type="text/javascript" src="assets/js/app.js"></script> -->
		<!-- <script type = "text/javascript" src = "assets/js/frequencia.js"></script> -->
		<script src="assets/js/modulos.js"></script> <!-- Todos os três arquivos acima comentados estão unidos neste 'modulos.js' -->
		
		<script src="assets/js/jquery-1.10.2.js"></script> <!-- Relativo ao 'toggler' -->
		
		<!--Relacionado ao calendário-->
		<!-- <link rel="stylesheet" type="text/css" href="assets/jquery-ui-1.8.24/themes/base/jquery-ui.css"/> -->
		<!-- <script type="text/javascript" src="assets/jquery-ui-1.8.24/jquery-1.8.2.js"></script> -->
		<!-- <script type="text/javascript" src="assets/jquery-ui-1.8.24/ui/jquery-ui.js"></script> -->
		
		<link rel="stylesheet" type="text/css" href="assets/angular/docs/components/bootstrap-3.1.1/css/bootstrap.min.css" />
		
		<title>Diário Escolar</title>
	</head>
	
	<body onload="highlightAE();desativandoChecks(); criandoOpcoes();setFiltroVisible(true);beginTabs();">
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
				        <li id="tabHeader_4"><a href="#planoaula-exportar">Exportar</a></li>
					</ul>
				</div>
				<div id="tabscontent">
			      <div class="tabpage" id="tabpage_1" >
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