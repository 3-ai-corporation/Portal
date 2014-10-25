var hasClash = function(elemento, classe) {
	return (' ' + elemento.className + ' ').indexOf(' ' + classe + ' ') > -1;
}

var criandoOpcoes = function() {
	var buttonDisciplina = '';
	
	var isSelected = function(nome) {
		return hasClash(document.getElementById(nome), 'buttonCursoSelected');
	}

    var serieSelecionada = function() {
        if (document.getElementById('checkPrimeiro').checked) return 0 ;
        if (document.getElementById('checkSegundo').checked) return 1;
        if (document.getElementById('checkTerceiro').checked) return 2;
        return -1;
    }();


    var cursoSelecionado = function() {
        if (isSelected('btnAE')) return 'ae';
        if (isSelected('btnAI')) return 'ai';
        if (isSelected('btnAM')) return 'am';
        if (isSelected('btnAT')) return 'at';
        return 'x_x';
    }();
    var materiasVetor = getMateriasByTurma(serieSelecionada, cursoSelecionado);

    var id = 0;
    var botoesVetor = [];

    for (var materiaId in materiasVetor) {
        botoesVetor[id] = {};

        botoesVetor[id].id = 'btnDisciplina' + id;
        botoesVetor[id].nome = materiasVetor[materiaId];
        ++id;
    }

    var first = true;

    for (var botaoId in botoesVetor) {
        var botaoElem = botoesVetor[botaoId];

        var classValue = 'disciplinaBotao';

        if (first) {
            first = false;
            classValue += ' disciplinaBotaoSelected';
        }

        var otherIds = '';

        for (var botaoId2 in botoesVetor) {
            if (botaoId2 !== botaoId) {
                if (otherIds === '') {
                    otherIds = '"' + botoesVetor[botaoId2] + '"';
                }
                else {
                    otherIds = ',"' + botoesVetor[botaoId2] + '"';
                }
            }
        }

        buttonDisciplina += "<li id='" + botaoElem.id + "' class='" + classValue +
            "' onclick=" + "'" + 'highlightTwo("' + botaoElem.id + '", [' + otherIds + "]);'><h4>" + botaoElem.nome + "</h4></li>";
    }

    var disciplina = document.getElementById('lstDisciplinas');
    disciplina.innerHTML = buttonDisciplina;
}