<section ng-app="frequenciaModule">

<article ng-controller="TemposAulaCtrl">
<label class="dados_cabecalho"> Série: 3°</label>
<label id="freq_curso" class="dados_cabecalho"> Curso: Informática </label>
<label id="freq_aulas" class="dados_cabecalho"> Aulas no mês: </label>
	<select id="index" name="index" ng-model="selectedItem" ng-change="pegarData()"> 
		 <option ng-repeat="aula in aulaList" class="dados_cabecalho"  selected value="{{aula.id}}" >Aula {{aula.numero_dia}} - {{aula.datas}}</option>	
	</select>
<label class="dados_cabecalho" style="display: block"> Matéria: Tópicos Especiais </label>
<label class="dados_cabecalho" style="display:block"> Data: 17/10/2014 </label>		
</article>


<button id="AulaAnt"> 
	<img src="assets/img/arrow-left.png" width="30px" height="30px" color="white">
</button>
					

					
<button id="AulaProx" style="margin-left: 70.7em"> 
	<img src="assets/img/arrow-right.png" width="30px" height="30px" color="white">
</button>

<article id="tabela_frequencia" ng-controller="AlunosCtrl"> 
		<table id="tblFrequencia" class= "table table-bordered">
			<thead id = "tblFrequencia_head">
				<tr> 
					<td> Nº </td>
					<td> RA </td>
					<td> Nome do Aluno </td>
					<td> Tempos </td>
					<td> Faltas </td>
					<td> Faltas Bimestrais</td>
				</tr>
			</thead>
			
			<!--Tabela de Frequencia com os respectivos dados de cada aluno-->
			<tbody class = "freq_alunos" >
				<tr id="freqRow" class = "freq_row" ng-repeat="aluno in alunosList"> 
					
					<td> {{$index+1}} </td>
					
					<td> {{aluno.matricula}} </td>							
					
					<td> {{aluno.nome}} </td>
					
					<td id="tempos" ng-controller="TemposCtrl"> 
						<section id="div_tempos" style="display:inline-block" ng-repeat="tempos in temposList">
							<input style="color: #1E657F" type = "checkbox" 
								id = "chk_falta" name="chk" value = "falta" CHECKED ng-click="valida()" > 
							
							{{tempos.indice+"º"}}
							
						</section>
					</td>
					
					<!-- faltam pequenos ajustes -->
					<td name="faltas" id="num_faltas" ng-controller="TemposCtrl" >
						<input style="color: #1E657F" id = "faltas_aluno" name="faltas" value = "0"> 
									{{this.$value}}
						</input>
					</td>	
					
					<td id="faltas_bim">  1 </td>	
				</tr>
			</tbody>
		</table>
</article>

</section>
