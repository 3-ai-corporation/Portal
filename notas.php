<section ng-app="notasModule">

<section id="calculoMedia" ng-controller="RbuttonController as RController" >
	<section>
		<span style="color:black;font-size:1.2em;">Calculo da Média:</span>
		<form>
			<input name="fid_1" id="fid_1" disabled value="">
		</form>
	</section>
	
	<section style="color:black; margin-top: 10px; margin-left: 5px;" ng-controller="ColumnController as colCtrl">
		<button ng-repeat="av in colCtrl.lstColAvs" text="{{av.title}}" class="btnAvs"/>
	</section>
	
	<section style="color:black; margin-top: 10px; margin-left: 5px;" ng-controller="OperationButtonControlle as OpController">
		<button id="soma" ng-click="OpController.soma()">
			<img src="assets/img/soma.png"/>
		</button>
		<button id="subtracao" ng-click="OpController.subtracao()">
			<img src="assets/img/subtracao.png"/>
		</button>
		<button id="multiplicacao" ng-click="OpController.multiplicacao()">
			<img src="assets/img/multiplicacao.png"/>
		</button>
		<button id="divisao" ng-click="OpController.divisao()">
			<img src="assets/img/divisao.png"/>
		</button>
		<button id="radiciacao" ng-click="OpController.radiciacao()">
			<img src="assets/img/radiciacao.png"/>
		</button>
		<button id="parent_abre" ng-click="OpController.parent_abre()">
			<img src="assets/img/parent_abre.png"/>
		</button>
		<button id="parent_fecha" ng-click="OpController.parent_fecha()">
			<img src="assets/img/parent_fecha.png"/>
		</button>
		<button id="limpar">Limpar
		</button>
	</section>
</section>

<section class="quadroNotas" ng-controller="AppController as appCtrl" style="margin-top: 15px;">
	<table id="rowAluno" class="table table-bordered"  ng-controller="ColumnController as colCtrl">
		<tr class="warning">
			<th>#</th>
			<th>RA</th>
			<th>Nome</th>
			<th ng-repeat="av in colCtrl.lstColAvs" ng-click="colCtrl.setTooltip({{av.title}})"><a class="tooltips">{{av.title}}<span ng-show="colCtrl.isSet({{av.title}})"><input ng-model="av.value" onkeypress="return isNumberKey(event)" type="text" maxlength="4"></span></th>
			<th ng-click="colCtrl.setColumn()"><a class="btnNewCollumn"> <img class="imgMenu" src="assets/img/adicionar.png" style="height: 24px; width:24px"/> </a></th>
			<th ng-click="colCtrl.unsetColumn()"><a class="btnDelCollumn"> <img class="imgMenu" src="assets/img/minus.png" style="height: 24px; width:24px"/> </a></th>
			<th>MP</th>
			<th>Paralela</th>
			<th>MF</th>
		</tr>
										
		<tr ng-repeat="obj in appCtrl.alunos" class="{{obj.statusLinha}}" >
			<td>{{obj.numero}}</td>
			<td>{{obj.matricula}}</td>
			<td>{{obj.nome}}</td>
			<td ng-repeat="av in colCtrl.lstColAvs" class={{obj.statusNota1}}> <input maxlength="4" onkeypress="return isNumberKey(event)" type="text" ng-model="obj.nota1" class="{{obj.statusInputNota1}}"> </input></td>
			<td style="width: 24px"></td>
			<td style="width: 24px"></td>
			<td class={{obj.statusM}}>{{obj.mparcial}}</td>
			<td class={{obj.statusMP}}><input maxlength="4" onkeypress="return isNumberKey(event)" value="{{obj.mparalela}}" class = "{{obj.statusInputMP}}"/></td>
			<td class={{obj.statusMF}}> {{obj.mfinal}} </td>
		</tr>	
	</table>					
</section>
</section>