/**
 * Created by AnaKa on 24/10/2014.
 */

//Criando um array estático (Como se o webservice - php - tivesse retornado esses valores);
var serie = [];

serie[0]['ae'] = [];
serie[0]['ai'] = ['ED', 'aaa', 'bbb'];
serie[0]['am'] = [];
serie[0]['at'] = [];
serie[1]['ae'] = [];
serie[1]['ai'] = [];
serie[1]['am'] = [];
serie[1]['at'] = [];
serie[2]['ae'] = [];
serie[2]['ai'] = ['LPIII', 'ccc'];
serie[2]['am'] = [];
serie[2]['at'] = ['CD'];


//Criando uma função que tem como parâmetros 'série' e 'turma', retornando disciplina;
var getMateriasByTurma = function(t, s){
    return serie[s][t];
}

//Função que desabilita os botões;



