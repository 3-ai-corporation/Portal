<section ng-app="notasModule" >

 <section id="calculoMedia" ng-controller="RbuttonController" >
	<section>
		<span style="color:black;font-size:1.2em;">Calculo da Média:</span>
		<form style="margin-top: 15px;">
			<input type="Radio" Name="Operacao" Value="Soma" style="margin-left: 5px;"> Somatória</input>
			<input type="Radio" Name="Operacao" Value="MediaAritim" style="margin-left: 5px;"> Média aritmética</input>
		</form>
	</section>
</section>  

	<table id="rowAluno" class="table table-bordered"  ng-controller="ColumnController as colCtrl">
		<thead class="warning">
			<th>#</th>
			<th>RA</th>
			<th>Nome</th>
			<th ng-repeat="av in colCtrl.lstColAvs"></th>
			<th ng-click="colCtrl.setColumn()"><a class="btnNewCollumn"> <img class="imgMenu" src="assets/img/adicionar.png" style="height: 24px; width:24px"/> </a></th>
			<th ng-click="colCtrl.unsetColumn()"><a class="btnDelCollumn"> <img class="imgMenu" src="assets/img/minus.png" style="height: 24px; width:24px"/> </a></th>
			<th>MP</th>
			<th>Paralela</th>
			<th>MF</th>
		</thead>
	<article ng-controller = "notasCtrl">
		<tbody ng-repeat="aluno in alunos" class="{{obj.statusLinha}}">
				<td>{{aluno.numero}}</td>
				<td>{{aluno.matricula}}</td>
				<td>{{aluno.nome}}</td> 
				<td ng-repeat="av in notasList" class={{aluno.statusNota1}}> <input maxlength="4" onkeypress="return isNumberKey(event)" type="text" ng-model="aluno.nota1" class="{{aluno.statusInputNota1}}"> </input></td>
				<td style="width: 24px"></td>
				<td style="width: 24px"></td>
				<td class={{aluno.statusM}}>{{aluno.mparcial}}</td>
				<td class={{aluno.statusMP}}><input maxlength="4" onkeypress="return isNumberKey(event)" value="{{aluno.mparalela}}" class = "{{aluno.statusInputMP}}"/></td>
				<td class={{aluno.statusMF}}> {{aluno.mfinal}} </td> 
		</tbody> 
		</article>
	</table>
</section>