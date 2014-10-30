/**
 * Created by AnaKa on 24/10/2014.
 */

//Criando um array estático (Como se o webservice - php - tivesse retornado esses valores);
var materia = [];
materia[0] = {};
materia[0]['ae'] = ['VAZIO'];
materia[0]['ai'] = ['ED', 'aaa', 'bbb'];
materia[0]['am'] = ['VAZIO'];
materia[0]['at'] = ['VAZIO'];

materia[1] = {};
materia[1]['ae'] = ['VAZIO'];
materia[1]['ai'] = ['VAZIO'];
materia[1]['am'] = ['VAZIO'];
materia[1]['at'] = ['VAZIO'];

materia[2] = {};
materia[2]['ae'] = ['VAZIO'];
materia[2]['ai'] = ['LPIII', 'ccc'];
materia[2]['am'] = ['VAZIO'];
materia[2]['at'] = ['CD'];

//Criando uma função que tem como parâmetros 'série' e 'turma', retornando disciplina;
var getMateriasByTurma = function(s, t){
    return materia[s][t];
}

//pegar o ano selecionado, o curso selecionado. Pegar o vetor de matéria e verificar se o array é vazio ou não.
var desativandoChecks = function(){
    var vazio = true;

    for (i = 0; i < 3; i++){
        //alert(i);
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
                    alert("Oi");
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




