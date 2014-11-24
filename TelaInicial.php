<!DOCTYPE html>

<html ng-app="startScreen">

<?php
	session_start();

	if(! isset($_SESSION['ematricula']))
	{
		header('location:index.php');
	}
?>


<head>
	<link type="text/css" rel="stylesheet" href="assets/css/stylesheet_TelaInicial.css">
	<link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">	
	<link type="text/css" rel="stylesheet" href="assets/css/styles.css">
	<script src="assets/js/angular.js"></script>
    <script src="assets/js/ui_bootstrap.js"></script>
    <script src="assets/js/js_file.js"></script>
    <script src="assets/jquery-ui-1.8.24/jquery-1.8.2.js"></script>
	<meta charset="UTF-8"/>
	
	<title>Fundação Nokia - Tela Inicial</title>
</head>

<body>
	<div id="main">
		<?php
			include("menu.php")
		?>
		
		<div id= "container">
				<div id="diario_escolar">
					<h3> Diário Escolar</h3>
					<ul type ="none" class="list_item2" >
						<li>
							<a href = "Diario.php#tabContainer" > 
								<div id="document">
									<img class="imgDiario" src="Assets/img/document.png" />  
									<h4>Plano de Aula</h4>
								</div>								
							</a>
						</li>
						<li>
							<a href = "Diario.php#tabContainer" > 
								<div id="calculator">
									<img class="imgDiario" src="Assets/img/calculator.png" />  
									<h4>Notas</h4>
								</div>
							</a>
						</li>
						<li>
							<a href = "Diario.php#tabContainer" >
								<div id="frequencia">
									 <img class="imgDiario" src="Assets/img/frequencia.png" />  
									<h4>Frequência</h4>
								</div>
							 </a>
						</li>	
					</ul>
				</div>
				<div id="outros_recursos">
					<h3> Outros Recursos </h3>
					<ul type ="none" class="list_item2" >
						<li>
							<a href = "Diario.php" >
								<div id="class">
									 <img class="imgOutros" src="Assets/img/three-people.png" />   
									<h4>Turmas</h4>
								</div>
							</a>
						</li>
						<li>
							<a href = "#" > 
								<div id="calendar">
									<img class="imgOutros" src="Assets/img/calendar.png" />  
									<h4>Calendário</h4>
								</div>
							</a>
						</li>
						<li>
							<a href = "#" >
								<div id="upload">
									 <img class="imgOutros" src="Assets/img/upload.png" />  
									<h4>Upload</h4>
								</div>
							</a>
						</li>
						<li>
							<a href = "#" >
								<div id="clock">
									 <img class="imgOutros" src="Assets/img/clock.png" />   
									<h4>Quadro de Horários</h4>
								</div>
							</a>
						</li>
					</ul>
				</div>
		</div>
       
		<div id= "right">
			<div>
				<p class="notificacoes">Notificações</p>
				
				    <ul type ="none" class="list_item4" ng-controller="notifController">
					<script type="text/ng-template" id="portalModalContent">
						<div class="modal-header">
							<h3 class="modal-title">Notificações do Portal</h3>
						</div>
						<div class="modal-body">
							<ul>
								<li ng-repeat="item in items">
									<a style="color:black; text-decoration:none;" href="#" ng-click="selected.item = item">{{ item }}</a>
								</li>
							</ul>
						</div>
						<div class="modal-footer">
							<button class="btn btn-warning" ng-click="cancel()">Fechar</button>
						</div>
					</script>
				    <li>					
				      <div id="notif2" ng-click="openPortalNotificacao()">
				        <img class="imgNotif" src="Assets/img/n2.png"/>
						<h5>Novo Portal do Professor</h5>
				      </div>		
					</li>
					<!--notif2-->
					<script type="text/ng-template" id="notasModalContent">
						<div class="modal-header">
							<h3 class="modal-title">Notificações do Portal</h3>
						</div>
						<div class="modal-body">
							<ul>
								<li ng-repeat="item in items">
									<a style="color:black; text-decoration:none;" ng-click="selected.item = item">{{ item }}</a>
								</li>
							</ul>
						</div>
						<div class="modal-footer">
							<button class="btn btn-warning" ng-click="cancel()">Fechar</button>
						</div>
					</script>
					<li>					
				      <div id="notif1" ng-click="openNotasNotificacao()">
				        <img class="imgNotif" src="Assets/img/n3.png"/>
						<h5>Notas e alunos</h5>
				      </div>
					</li>
					<!--notif3-->
					<script type="text/ng-template" id="fundacaoModalContent">
						<div class="modal-header">
							<h3 class="modal-title">Notificações do Portal</h3>
						</div>
						<div class="modal-body">
							<ul>
								<li ng-repeat="item in items">
									<a style="color:black; text-decoration:none;" ng-click="selected.item = item">{{ item }}</a>
								</li>
							</ul>
						</div>
						<div class="modal-footer">
							<button class="btn btn-warning" ng-click="cancel()">Fechar</button>
						</div>
					</script>
					<li>					
				      <div id="notif3" ng-click="openFundacaoNotificacao()">
				        <img class="imgNotif" src="Assets/img/n1.png"/>
						<h5>Recados da Fundação</h5>
				      </div>
					</li>
				</ul>
		</div>
	</div>
</body>
</html>