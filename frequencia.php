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

<script>
$(document).ready(function() {
	dateList = ["00/00/0000","06/09/2014","10/09/2014","12/09/2014","14/09/2014","16/09/2014","26/09/2014", "06/10/2014"];
	$( "#calendario" ).datepicker({ //ADICIONAMOS A FUNÇÃO PELO ID DO CONTAINER
	beforeShowDay: function(dateToShow){ return [($.inArray($.datepicker.formatDate('dd/mm/yy', dateToShow),dateList) >= 0), ""]; //FORMATA A DATA A E PEGA OS DIAS A SEREM MOSTRADOS
	},
	
	onSelect: function(dateText, inst) { if($.inArray(dateText,dateList))
	{ 
			alert('funfou');
	}
	}
	
});
});
</script>

<!-- Essa div 'calendario' faz parar de funcionar as outras duas abas
<!-- <div id="calendario" /> -->