<table class = "table table-striped table-hover table-condensed" ng-controller = "GridController as grid">
	<thead>
		<tr>
			<th>Data</th>
			<th>Conteúdo Previsto</th>
			<th>Conteúdo Aplicado</th>
			<th>Reposição</th>
		</tr>
	</thead>
	<tbody>
		<script>
			function UnFocusOnKeyDown(e, input) {
				
				if (e.keyCode == 13) {
					input.blur();
				}
			}
		</script>
		<tr ng-repeat = "aula in grid.aulas" ng-show="(aula.geminada < 2) || aula.visible" ng-class="(aula.geminada > 1? 'row-collapsed':'row-showed')">
			<td ng-show="aula.geminada <= 1"><a ng-style="{'margin-left':aula.geminada > 1? '16px':'0px'}"><i class="glyphicon table-icon" ng-class="'glyphicon-plus'" ng-click="grid.ativarData(aula.dt)" ng-show="aula.geminada == 1" ></i></a>{{aula.dt}}</td>
            <td ng-show="aula.geminada > 1"/>
			
			<td><input class="table-text" onkeydown="UnFocusOnKeyDown(event, this)" type="text" ng-model="aula.conteudo_previsto" ng-change="grid.updatePrevisto(aula)"></td>
			<td><input class="table-text" onkeydown="UnFocusOnKeyDown(event, this)" type="text" ng-model="aula.conteudo_aplicado" ng-change="grid.updateAplicado(aula)"></td>
			<td><input type="checkbox" class="checkbox" ng-model="aula.reposicao" ng-change="grid.updateReposicao(aula)"/></td>
		</tr>
	</tbody>
</table>