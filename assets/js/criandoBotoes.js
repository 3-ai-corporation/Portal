var hasClash = function(elemento, classe) {
	return (' ' + elemento.className + ' ').indexOf(' ' + classe + ' ') > -1;
}

var criandoOpcoes = function() {
	var buttonDisciplina;
	
	var isSelected = function(nome) {
		return hasClash(document.getElementById(nome), 'buttonCursoSelected');
	}
	
	if(document.getElementById('checkPrimeiro').checked ) {
		if( isSelected('btnAE') ) {
			buttonDisciplina = "<li id = 'btnEletronica' class = 'disciplinaBotaoSelected disciplinaBotao' onclick=" + '"' + "highlightTwo('btnEletronica', ['btnEletricidade']);" + '"' + "> <h4>E I</h4> </li>" +
								"<li id = 'btnEletricidade' class = 'disciplinaBotao' onclick=" + '"' + "highlightTwo('btnEletricidade', ['btnEletronica']);" + '"' + "> <h4>ELETR.</h4> </li>";
		}
		
		if( isSelected('btnAI') ) {
			buttonDisciplina = "<li id = 'btnLp' class = 'disciplinaBotaoSelected disciplinaBotao' onclick=" + '"' + "highlightTwo('btnLp', ['btnLtp', 'btnEd']);" + '"' + "> <h4>LP I</h4> </li>" +
								"<li id = 'btnLtp' class = 'disciplinaBotao' onclick=" + '"' + "highlightTwo('btnLtp', ['btnLp', 'btnEd']);" + '"' + "> <h4>LTP</h4> </li>" +
								"<li id = 'btnEd' class = 'disciplinaBotao' onclick=" + '"' + "highlightTwo('btnEd', ['btnLp', 'btnLtp']);" + '"' + "> <h4>ED</h4> </li>";
		}
		
		if( isSelected('btnAM') ) {
			buttonDisciplina = "<li id = 'btnMecanica' class = 'disciplinaBotaoSelected disciplinaBotao' onclick=" + '"' + "highlightTwo('btnMecanica', ['btnHidraulica']);" + '"' + "> <h4>MEC. I</h4> </li>" +
								"<li id = 'btnHidraulica' class = 'disciplinaBotao' onclick=" + '"' + "highlightTwo('btnHidraulica', ['btnMecanica']);" + '"' + "> <h4>P&H</h4> </li>";
		}
		
		if( isSelected('btnAT') ) {
			buttonDisciplina = "<li id = 'btnTelecomunicao' class = 'disciplinaBotaoSelected disciplinaBotao' onclick=" + '"' + "highlightTwo('btnTelecomunicao', null);" + '"' + "> <h4>TELEC. I</h4> </li>";
		}
	}
	else if(document.getElementById('checkSegundo').checked ) {
		if( isSelected('btnAE') ) {
			buttonDisciplina = "<li id = 'btnEletronica' class = 'disciplinaBotaoSelected disciplinaBotao' onclick=" + '"' + "highlightTwo('btnEletronica', null);" + '"' + "> <h4>E II</h4> </li>";
		}
		
		if( isSelected('btnAI') ) {
			buttonDisciplina = "<li id = 'btnLp' class = 'disciplinaBotaoSelected disciplinaBotao' onclick=" + '"' + "highlightTwo('btnLp', null);" + '"' + "> <h4>LP II</h4> </li>";
		}
		
		if( isSelected('btnAM') ) {
			buttonDisciplina = "<li id = 'btnMecanica' class = 'disciplinaBotaoSelected disciplinaBotao' onclick=" + '"' + "highlightTwo('btnMecanica', null);" + '"' + "> <h4>MEC. II</h4> </li>";
		}
		
		if( isSelected('btnAT') ) {
			buttonDisciplina = "<li id = 'btnTelecomunicao' class = 'disciplinaBotaoSelected disciplinaBotao' onclick=" + '"' + "highlightTwo('btnTelecomunicao', null);" + '"' + "> <h4>TELEC. II</h4> </li>";
		}
	}
	else if(document.getElementById('checkTerceiro').checked ) {
		if( isSelected('btnAE') ) {
			buttonDisciplina = "<li id = 'btnEletronica' class = 'disciplinaBotaoSelected disciplinaBotao' onclick=" + '"' + "highlightTwo('btnEletronica', ['btnEletronicaDig']);" + '"' + "> <h4>E III</h4> </li>" +
								"<li id = 'btnEletronicaDig' class = 'disciplinaBotao' onclick=" + '"' + "highlightTwo('btnEletronicaDig', ['btnEletronica']);" + '"' + "> <h4>ED</h4> </li>";
		}
		
		if( isSelected('btnAI') ) {
			buttonDisciplina = "<li id = 'btnLp' class = 'disciplinaBotaoSelected disciplinaBotao' onclick=" + '"' + "highlightTwo('btnLp',null);" + '"' + "> <h4>LP III</h4> </li>";
		}
		
		if( isSelected('btnAM') ) {
			buttonDisciplina = "<li id = 'btnMecanica' class = 'disciplinaBotaoSelected disciplinaBotao' onclick=" + '"' + "highlightTwo('btnMecanica', null);" + '"' + "> <h4>MEC. III</h4> </li>";
		}
		
		if( isSelected('btnAT') ) {
			buttonDisciplina = "<li id = 'btnTelecomunicao' class = 'disciplinaBotaoSelected disciplinaBotao' onclick=" + '"' + "highlightTwo('btnTelecomunicao', ['btnLp']);" + '"' + "> <h4>CD</h4> </li>" +
								"<li id = 'btnLp' class = 'disciplinaBotao' onclick=" + '"' + "highlightTwo('btnLp', ['btnTelecomunicao']);" + '"' + "> <h4>LP</h4> </li>";
		}
	}
	
	var disciplina = document.getElementById('lstDisciplinas');

	disciplina.innerHTML = buttonDisciplina;
}