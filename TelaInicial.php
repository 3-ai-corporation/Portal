<!DOCTYPE html>
<html ng-app="plunker">

<head>
	<link type="text/css" rel="stylesheet" href="assets/css/stylesheet_TelaInicial.css">
	<link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">	
	<link type="text/css" rel="stylesheet" href="assets/css/styles.css">
	<script src="assets/js/angular.js"></script>
    <script src="assets/js/ui_bootstrap.js"></script>
    <script src="assets/js/js_file.js"></script>
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
									<img class="imgDiario" src="assets/img/document.png" />  
									<h4>Plano de Aula</h4>
								</div>								
							</a>
						</li>
						<li>
							<a href = "Diario.php#tabContainer" > 
								<div id="calculator">
									<img class="imgDiario" src="assets/img/calculator.png" />  
									<h4>Notas</h4>
								</div>
							</a>
						</li>
						<li>
							<a href = "Diario.php#tabContainer" >
								<div id="frequencia">
									 <img class="imgDiario" src="assets/img/frequencia.png" />  
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
									 <img class="imgOutros" src="assets/img/three-people.png" />   
									<h4>Turmas</h4>
								</div>
							</a>
						</li>
						<li>
							<a href = "index12.html" > 
								<div id="calendar">
									<img class="imgOutros" src="assets/img/calendar.png" />  
									<h4>Calendário</h4>
								</div>
							</a>
						</li>
						<li>
							<a href = "index12.html" >
								<div id="upload">
									 <img class="imgOutros" src="assets/img/upload.png" />  
									<h4>Upload</h4>
								</div>
							</a>
						</li>
						<li>
							<a href = "index12.html" >
								<div id="clock">
									 <img class="imgOutros" src="assets/img/clock.png" />   
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

				<!--<span class="dropdown" on-toggle="toggled(open)">
				      <a href class="dropdown-toggle">
				        Click me for a dropdown, yo!
				      </a>
				      <ul class="dropdown-menu">
				        <li ng-repeat="choice in items">
				          <a href>{{choice}}</a>
				        </li>
				      </ul>
				    </span> 

				<div class="dropdown-toogle" id="notif1" >								
								<img class="imgNotif" src="assets/img/1.jpg"/> 
							</div>	-->

				    <ul type ="none" class="list_item4">
				    	<li class="dropdown" on-toggle="toggled(open)">					
				      <div id="notif2" class="dropdown-toggle">
				        <img class="imgNotif" src="assets/img/n2.png"/>
						<h5>Novo Portal do Professor</h5>
				      </div>
				      <ul class="dropdown-menu">
				      	<div id="arrow"></div>
				      	<div id="menuTitle">Novo portal do professor</div>
				        <li>
				          <a href>Andrew, Ricardo e outras 2 pessoas deixaram recados para você</a>
				        </li>
				        <li>
				          <a href>Agora você pode mudar o tema do seu portal. Descubra como</a>
				        </li>
				        <li>
				          <a href>Você tem mais capacidade de armazenamento no Disco Virtual. Aproveite!</a>
				        </li>
					   </ul>		
					</li>
					<li class="dropdown" on-toggle="toggled(open)">					
				      <div id="notif1" class="dropdown-toggle">
				        <img class="imgNotif" src="assets/img/n3.png"/>
						<h5>Notas e alunos</h5>
				      </div>
				      <ul class="dropdown-menu">
				      	<div id="arrow"></div>
				      	<div id="menuTitle">Notas e alunos</div>
				        <li>
				          <a href>Alguns dos seus alunos precisam de atenção. Clique aqui para saber mais.</a>
				        </li>
				        <li>
				          <a href>O prazo para lançamento de notas acaba dia 05.09. Hurry Hurry!</a>
				        </li>
				        <li>
				          <a href>Foi feito um pedido de correção de notas. Confira o quanto antes!</a>
				        </li> 
					   </ul>		
					</li>
					
					<li class="dropdown" on-toggle="toggled(open)">					
				      <div id="notif3" class="dropdown-toggle">
				        <img class="imgNotif" src="assets/img/n1.png"/>
						<h5>Recados da Fundação</h5>
				      </div>
				      <ul class="dropdown-menu">
				      	<div id="arrow"></div>
				      	<div id="menuTitle">Recados da Fundação</div>
				        <li>
				          <a href>Festa surpresa da prof° Ana Rita no refeitório!</a>
				        </li>
				        <li>
				          <a href>Os professores agora têm desconto nos cursos de idioma da Wizard. Saiba mais</a>
				        </li>
					   </ul>		
					</li>
				</ul>
				<!--
				<ul type ="none" class="list_item4">
					<li>
						<a href = "1.html" class="notif" > 
							<div popover-title="ALERTA DE PRAZO" popover-placement="left" popover="O prazo para lançamento de notas acaba dia 05.09." popover-trigger="mouseenter"  id="notif1" >
								<img class="imgNotif" src="assets/img/1.jpg"/> 
							</div>						

						</a>						
					</li>
					
					<li>
						<a  href = "3.html" class="notif">
							<div popover-title="RECURSOS HUMANOS" popover-placement="left" popover="Sua solicitação foi negada" popover-trigger="mouseenter" id="notif2">
								<img class="imgNotif" src="assets/img/2.jpg" /> 
							</div>
						</a>
					</li>
					<li>
						<a href = "3.html" class="notif"> 
							<div popover-title="IMPORTANTE" popover-placement="left" popover="Os critérios foram alterados" popover-trigger="mouseenter"  id="notif3">
								<img class="imgNotif" src="assets/img/3.jpg" /> 
							</div>
						</a>	 
					</li>
				</ul> -->
		</div>
	</div>
</body>
</html>