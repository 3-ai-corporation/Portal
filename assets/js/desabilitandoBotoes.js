/**
 * Created by AnaKa on 24/10/2014.
*/

//Criando um array estático (Como se o webservice - php - tivesse retornado esses valores);
var materia = [];
materia[0] = {};
materia[0]['ae'] = [];
materia[0]['ai'] = ['ED', 'aaa', 'bbb'];
materia[0]['am'] = [];
materia[0]['at'] = [];

materia[1] = {};
materia[1]['ae'] = [];
materia[1]['ai'] = [];
materia[1]['am'] = [];
materia[1]['at'] = [];

materia[2] = {};
materia[2]['ae'] = [];
materia[2]['ai'] = ['LPIII', 'ccc'];
materia[2]['am'] = [];
materia[2]['at'] = ['CD'];

//Criando uma função que tem como parâmetros 'série' e 'turma', retornando disciplina;
var getMateriasByTurma = function(s, c){
    return materia[s][c];
}

//pegar o ano selecionado, o curso selecionado. Pegar o vetor de matéria e verificar se o array é vazio ou não.
var desativandoChecks = function(){
    var vazio = true;

    for (i = 0; i < 3; i++){
        if (materia[i]['ae'].length > 0){
            vazio = false;
        }
        if (materia[i]['ai'].length > 0){
            vazio = false;
        }
        if (materia[i]['am'].length > 0){
            vazio = false;
        }
        if (materia[i]['at'].length > 0){
            vazio = false;
        }
        if (vazio === true){
            if (i === 0){
                document.getElementById('checkPrimeiro').disabled = true;
            } else {
                if (i === 1){                    
                    document.getElementById('checkSegundo').disabled = true;
                } else{                    
                    document.getElementById('checkTerceiro').disabled = true;
                }
            }
        }
        vazio = true;
    }
}

var desativandoButtons = function(serie) {
    var vazio = true;
    var serieSelecionada;

    if (serie.id === 'checkPrimeiro')
        serieSelecionada = 0;

    if (serie.id === 'checkSegundo')
        serieSelecionada = 1;

    if (serie.id === 'checkTerceiro')
        serieSelecionada = 2;

    if (materia[serieSelecionada]['ae'].length > 0) {
        var turma = document.getElementById('btnAE');
        turma.className = "buttonCursoBasic";
    }
    else {
        var turma = document.getElementById('btnAE');
        turma.className = "buttonDesativado";
    }

    if (materia[serieSelecionada]['ai'].length > 0) {
        var turma = document.getElementById('btnAI');
        turma.className = "buttonCursoBasic";
    }
    else {
        var turma = document.getElementById('btnAI');
        turma.className = "buttonDesativado";
    }

    if (materia[serieSelecionada]['am'].length > 0) {
        var turma = document.getElementById('btnAM');
        turma.className = "buttonCursoBasic";
    }
    else {
        var turma = document.getElementById('btnAM');
        turma.className = "buttonDesativado";
    }

    if (materia[serieSelecionada]['at'].length > 0) {
        var turma = document.getElementById('btnAT');
        turma.className = "buttonCursoBasic";
    }
    else {
        var turma = document.getElementById('btnAT');
        turma.className = "buttonDesativado";
    }
}