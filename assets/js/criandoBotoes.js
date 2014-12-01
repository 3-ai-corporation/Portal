// Método responsável por verificar se um objeto tem a sclasse;
var hasClash = function(elemento, classe) {
	return (' ' + elemento.className + ' ').indexOf(' ' + classe + ' ') > -1;
}

// Métodos responsável por disciplinas
var criandoOpcoes = function() {
	var buttonDisciplina = '';

	var isSelected = function(nome) {
		return hasClash(document.getElementById(nome), 'buttonCursoSelected');
	}

    var cursoSelecionado = function() {
        if (isSelected('btnAE')) return 'ae';
        if (isSelected('btnAI')) return 'ai';
        if (isSelected('btnAM')) return 'am';
        if (isSelected('btnAT')) return 'at';
        return 'x_x';
    }();

    var serieSelecionada = function() {
        if (document.getElementById('checkPrimeiro').checked) return 0;
        if (document.getElementById('checkSegundo').checked) return 1;
        if (document.getElementById('checkTerceiro').checked) return 2;
        return -1;
    }();

    // Esta variável recebe a lista de matérias, de acordo com a série e o curso selecionados. Esses dois são retornados pelos dois métodos anteriores;
    var vetorMaterias = getMateriasByTurma(serieSelecionada, cursoSelecionado);

    var id = 0;
    var vetorBotoes = [];

    // Preenchendo o 'vetorBotoes' com as disciplinas que a variável 'vetorMaterias' recebe;
    for (var materiaId in vetorMaterias) {
        vetorBotoes[id] = {};
        vetorBotoes[id].id = 'btnDisciplina' + id;
        vetorBotoes[id].nome = vetorMaterias[materiaId];
        ++id;
    }

    // Variável responsável por indicar se o botão foi selecionado pela primeira vez ou não;
    var first = true;

    for (var botaoId1 in vetorBotoes) {
        var botaoElem = vetorBotoes[botaoId1];

        var classValue = 'disciplinaBotao';

        if (first) {
            first = false;
            classValue = 'disciplinaBotaoSelected';
        }

        var otherIds = '';

        for (var botaoId2 in vetorBotoes) {
            if (botaoId2 !== botaoId1) {
                if (otherIds === '') {
                    otherIds = '"' + vetorBotoes[botaoId2].id + '"';
                }
                else {
                    otherIds += ',"' + vetorBotoes[botaoId2].id + '"';
                }
            }
        }

        buttonDisciplina += "<li id = '" + botaoElem.id + "' class = '" + classValue +
            "'onclick = " + "'" + 'highlightTwo("' + botaoElem.id + '", [ ' + otherIds + "]);'><h4>" + botaoElem.nome + "</h4></li>";
    }

    var disciplina = document.getElementById('lstDisciplinas');
    disciplina.innerHTML = buttonDisciplina;
}