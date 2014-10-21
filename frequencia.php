<label> Série: 3</label>
<label style="margin-left: 15em"> Curso: Informática </label>
<label style="margin-left: 20em"> Aulas no mês: </label>

<select >
	<section>
		<option>1</option>
		<option>2</option>
		<option>3</option>
	</section>
</select>

<label style="display: block"> Matéria: Tópicos Especiais </label>
<label style="display:block"> Data: 17/10/2014 </label>		

<button id="AulaAnt"> 
	<img src="assets/img/arrow-left.png" width="30px" height="30px" color="white">
</button>
					
<button id="AulaProx" style="margin-left: 70.7em"> 
	<img src="assets/img/arrow-right.png" width="30px" height="30px" color="white">
</button>

<article id="tabela_frequencia"  ng-controller="frequenciacontroller as freqCtrl"> 
		<table id="tblFrequencia" class= "table table-bordered">
			<thead id = "tblFrequencia_head">
				<tr> 
					<td> Nº </td>
					<td> RA </td>
					<td> Nome do Aluno </td>
					<td> Tempos </td>
					<td> Faltas </td>
				</tr>
			</thead>
			<!--Tabela de Frequencia com os respectivos dados de cada aluno-->
			<tbody class = "freq_alunos" >
				<tr id="freqRow" class = "freq_row" ng-repeat="obj in freqCtrl.objetos.lst_alunos"> 
					
					<td> {{obj.numero}} </td>
					
					<td> {{obj.RA}} </td>							
					
					<td> {{obj.nome}} </td>
					
					<td id="tempos"> 
						<section id="div_tempos" style="display:inline-block" ng-repeat="tempos in freqCtrl.objetos.tempos_dia">
							<input type = "checkbox" id = "chk_falta" name="chk" value = "falta" CHECKED 
							ng-controller="checkcontroller as checkCtrl" ng-click="checkCtrl.alterarCheckbox(obj, this)"> {{tempos+"º"}}
						</section>
					</td>
					<td id="num_faltas">  {{obj.faltas}} </td>	
				</tr>
			</tbody>
		</table>
</article>
