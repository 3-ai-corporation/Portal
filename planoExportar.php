<div>
	<a href="#close" title="Close" class="close">X</a>
	<ul id="planoaula-exportar-list">
		<li>
			<label>Selecione a Turma</label>
		</li>
		<li>
			<select name ="turmas">
				<option ng-repeat="turma in export.turmas">
					{{turma}}
				</option>
			</select>
		</li>
		<li>
			<label>Selecione a Matéria</label>
		</li>
		<li>
			<select name ="materias">
				<option ng-repeat="materia in export.materias">
					{{materia}}
				</option>
			</select>
		</li>
		<li>
			<div id="btnConfirmar"><a href="">Confirmar</a></div>
			<div id="btnCancelar"><a href="#close">Cancelar</a></div>
		</li>
	</ul>
</div>