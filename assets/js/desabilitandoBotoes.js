/**
 * Created by AnaKa on 24/10/2014.
 */

//Criando um array estático (Como se o webservice - php - tivesse retornado esses valores);
var materia = [];
materia[0]['ae'] = [];
materia[0]['ai'] = ['ED', 'aaa', 'bbb'];
materia[0]['am'] = [];
materia[0]['at'] = [];
materia[1]['ae'] = [];
materia[1]['ai'] = [];
materia[1]['am'] = [];
materia[1]['at'] = [];
materia[2]['ae'] = [];
materia[2]['ai'] = ['LPIII', 'ccc'];
materia[2]['am'] = [];
materia[2]['at'] = ['CD'];

//Criando uma função que tem como parâmetros 'série' e 'turma', retornando disciplina;
var getMateriasByTurma = function(t, s){
    return materia[t][s];
}

//pegar o ano selecionado, o curso selecionado. Pegar o vetor de matéria e verificar se o array é vazio ou não.
var desativandoChecks = function(){
    var vazio = true;
    alert("testando");
    for (i = 0; i < 3; i++){
        if (materia[i]['ae'] !== []){
            vazio = false;
        }
        if (materia[i]['ai'] !== []){
            vazio = false;
        }
        if (materia[i]['am'] !== []){
            vazio = false;
        }
        if (materia[i]['at'] !== []){
            vazio = false;
        }
        if (vazio){
            if (i === 0){
                document.getElementById('ckbPrimeiro').isDisabled = true;
            } else {
                if (i === 1){
                    document.getElementById('ckbSegundo').isDisabled = true;
                } else{
                    document.getElementById('ckbTerceiro').isDisabled = true;
                }
            }
        }
        vazio = true;
    }
}

var desativandoBotoes = function(){
    var vazio = true;
    for (i = 0; i < 3; i++){
        if (materia[i]['ae']){

        }
    }
}




