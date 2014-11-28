<section ng-app="notasModule">

<section id="calculoMedia" ng-controller="RbuttonController as RController" >
	<section>
		<span style="color:black;font-size:1.2em;">Calculo da Média:</span>
		<form style="margin-top: 15px;">
			<input type="Radio" Name="Operacao" Value="Soma" style="margin-left: 5px;">Somatória</input>
			<input type="Radio" Name="Operacao" Value="MediaAritim" style="margin-left: 5px;">Média aritmética</input>
		</form>
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