var filtroVisible = true;

var setFiltroVisible = function(visible) {
	var filtro = document.getElementById("filtro");
	var toggler = document.getElementById("toggler");
	
	var img = '<img width="45px" height="45px" src=';
	
	if (filtroVisible = visible) {
		//filtro.style.display = "";
		toggler.innerHTML = img + '"assets/img/arrow-up.png" />';
	}
	else {
		//filtro.style.display = "none";
		toggler.innerHTML = img + '"assets/img/arrow-down.png" />';
	}
}

var toggleFiltro = function() {
	setFiltroVisible(!filtroVisible);
}

var highlight = function(highlightId, otherIds, imageId) {
	var highlighted = document.getElementById(highlightId);
	highlighted.className = highlighted.className.replace(/(?:^|\s)buttonCurso(?!\S)/g , 'buttonCursoSelected');
	
	for(var otherId in otherIds) {
		var other = document.getElementById(otherIds[otherId]);
		other.className =  highlighted.className.replace(/(?:^|\s)buttonCursoSelected(?!\S)/g , 'buttonCurso');
	}
	
	if (imageId !== '') {
		var figuraTurma = document.getElementById('figuraTurma');
		figuraTurma.style.backgroundImage = "url('assets/img/" + imageId + "')";
		
		var turmaLabel = document.getElementById("turmaLabel");
		turmaLabel.innerHTML = (function() {
			switch (highlightId) {
				case 'btnAE': return "Eletrônica";
				case 'btnAI': return "Informática";
				case 'btnAM': return "Mecatrônica";
				case 'btnAT': return "Telecomunicações";
				default: return "button-selection.js???";
			}
		})();
	}
};

var highlightAE = function() {
	highlight('btnAE', ['btnAI', 'btnAM', 'btnAT'], 'eletronica-icon.png');
};

var highlightTwo = function(highlightId, otherIds) {
	var highlighted = document.getElementById(highlightId);
	highlighted.className = highlighted.className.replace(/(?:^|\s)disciplinaBotao(?!\S)/g , 'disciplinaBotaoSelected');
	
	for(var otherId in otherIds) {
		var other = document.getElementById(otherIds[otherId]);
		other.className =  highlighted.className.replace(/(?:^|\s)disciplinaBotaoSelected(?!\S)/g , 'disciplinaBotao');
	}
};