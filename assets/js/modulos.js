// Início do módulo de plano de aula
var planoModule = angular.module('planoModule',[]);
planoModule.controller('GridController',function() {
	this.aulas = aulas;
	this.ativarData = function(data) {
		for(i = 0; i < this.aulas.length; i++) {
			if(data == this.aulas[i].dt) {
				this.aulas[i].visible = !this.aulas[i].visible;
			}
		}
	};
	
    this.getIndex = function(aula) {
	    var index = -1;
		for(i = 0; i < this.aulas.length; i++) {
			if(aula == this.aulas[i]) {
				index = i;
				break;
			}
		}
		return index;
	};
	
	this.updatePrevisto = function(aula) {
        if(aula.geminada == 1) {
			var index = this.getIndex(aula);
			var str = aula.conteudo_previsto;
			var i = index + 1;
			if(i < this.aulas.length){
				while(this.aulas[i].dt == aula.dt) {
					this.aulas[i++].conteudo_previsto = str;
				}
			}
		}
	};
	
	this.updateAplicado = function(aula) {
		if(aula.geminada == 1) {
			var index = this.getIndex(aula);
			var str = aula.conteudo_aplicado;
			var i = index + 1;
			if(i < this.aulas.length){
				while(this.aulas[i].dt == aula.dt) {
					this.aulas[i++].conteudo_aplicado = str;
				}
			}
		}
	};
	
	this.updateReposicao = function(aula) {
		if(aula.geminada == 1) {
			var index = this.getIndex(aula);
			var str = aula.reposicao;
			var i = index + 1;
			if(i < this.aulas.length){
				while(this.aulas[i].dt == aula.dt) {
					this.aulas[i++].reposicao = str;
				}
			}
		}
	};

	this.concatAulas = function(aulas) {
		if(aulas.length > 0)
		{
			var org = [];
			for(var i = 0; i < aulas.length; i++)
			{
				var actualDate = aulas[i].dt;
				if(aulas[i].dt == actualDate)
				{
					var innerArray = innerArray + aulas[i];
				}
				else
				{
					org = org+ innerArray;
				}
			}
		}
	};
});

planoModule.controller('ExportController',function() {
	this.turmas = turmas;
	this.materias = materias;
});

var aulas = [
    new Tempo('15/08/2014','Tempo para implementação do portal','Tempo para implementação do portal',1,false,false),
    new Tempo('15/08/2014','Tempo para implementação do portal','Tempo para implementação do portal',2,false,false),
    new Tempo('15/08/2014','Tempo para implementação do portal','Tempo para implementação do portal',2,false,false),
    new Tempo('15/08/2014','Tempo para implementação do portal','Tempo para implementação do portal',2,false,false),
    new Tempo('16/08/2014','Curso Windows Phone','Curso Windows Phone',0,false,false),
    new Tempo('17/08/2014','Curso Windows Phone','Curso Windows Phone',1,false,false),
    new Tempo('17/08/2014','Curso Windows Phone','Curso Windows Phone',2,false,false),
    new Tempo('17/08/2014','Curso Windows Phone','Curso Windows Phone',2,false,false),
    new Tempo('18/08/2014','Tempo para implementação do projeto','Tempo para implementação do projeto',0,false,false),
    new Tempo('19/08/2014','Tempo para implementação do projeto','Tempo para implementação do projeto',0,false,false),
    new Tempo('20/08/2014','Tempo para implementação do projeto','Tempo para implementação do projeto',0,false,true)];

var materias = ["Português","Matemática","Linguagem de Programação III","Geografia","Tópicos Especiais"];
var turmas = ["1AE","1AI","1AM","1AT","2AE","2AI","2AM","2AT","3AE","3AI","3AM","3AT"];

//Fim do módulo de plano de aula

//Início do módulo de notas
var notasModule = angular.module('notasModule', []);


notasModule.controller('AppController', function(){
	var calculoMedia = '(AV1)';
	this.alunos = alunos;
	generateNotas();
	setmediaparcial();
	generateParalelas();
	setmediafinal(1);
	arredondar();
	setStatus();
	carlos();
});

notasModule.controller('ColumnController', function(){
	this.lstColAvs = [{title:"AV1", value:"10"}];
	this.setColumn = function(){
		//this.column = this.column +1;
		if ((this.lstColAvs.length ) < 10) {
			var newAv = {};
			newAv.title = "AV" + (this.lstColAvs.length + 1);
			newAv.value = 10;
			this.lstColAvs.push(newAv);
		}
	};
	
	this.unsetColumn = function(){
		if ((this.lstColAvs.length ) > 1) {
			this.lstColAvs.pop();
		}
	};
	
	this.selectedAv = '';
	
	this.isSet = function(value){
		return value === this.column;
	};
	
	this.setTooltip = function (value) {
            this.selectedAv = value;
    };

});


	var generateNotas = function(){
		for (var i = 0; i < alunos.length; i++){
			alunos[i].nota1 = Math.floor((Math.random() * 9)) + 1.75;
			alunos[i].nota2= Math.floor((Math.random() * 9)) + 1.75;
		}
	};
	
	var generateParalelas = function(){
		for (var i = 0; i < alunos.length; i++){
			if (alunos[i].mparcial < 6) {
				alunos[i].mparalela= Math.floor((Math.random() * 9)) + 1.75;
			}
		}
	};
	
	var arredondar = function(){
		for (var i = 0; i < alunos.length; i++){
			if ((alunos[i].mfinal - Math.floor(alunos[i].mfinal)) >= 0.25 && ((alunos[i].mfinal - Math.floor(alunos[i].mfinal)) <= 0.5)) {
				alunos[i].mfinal= Math.floor(alunos[i].mfinal) + 0.5; 
			} else if ((alunos[i].mfinal - Math.floor(alunos[i].mfinal)) >= 0.75) {
				alunos[i].mfinal= Math.floor(alunos[i].mfinal) + 1;
			} else {
				alunos[i].mfinal= Math.floor(alunos[i].mfinal);
			}
		}
	};

	var setmediaparcial = function(value){
			 for (i = 0; i < alunos.length; i++){
				
				alunos[i].mparcial = alunos[i].nota1;
				
				if (alunos[i].mparcial >= 6) {
					alunos[i].mfinal = alunos[i].mparcial;
					alunos[i].mparalela = null;
				}
				
			}	
		
	};

	
	var setmediafinal = function(value){
		if (value === 1){
			 for (i = 0; i < alunos.length; i++){
				if ((alunos[i].mparalela != null) && (alunos[i].mparalela > alunos[i].mparcial)){
					alunos[i].mfinal = (alunos[i].mparcial + alunos[i].mparalela) / 2;
				} else {
					alunos[i].mfinal = alunos[i].mparcial;
				}
			}	
		}else{
			 for (i = 0; i < alunos.length; i++){
				if ((alunos[i].mparalela != null) && (alunos[i].mparalela > alunos[i].mparcial)){
					alunos[i].mfinal = (alunos[i].mparcial + (alunos[i].mparalela * 2)) / 3;
					alunos[i].mfinal = (alunos[i].mparcial + (alunos[i].mparalela * 2)) / 3;
				} else {
					alunos[i].mfinal = alunos[i].mparcial;
				}
			 }
		}
	};
	
	
	this.isSet = function(value){
		return value === this.button;
		};
		
		
	var carlos = function(){
		alunos[4].status = 'active';
		alunos[4].statusNota1 = 'active';
		alunos[4].statusInputNota1 = 'input_active';
		alunos[4].statusNota2 = 'active';
		alunos[4].statusInputNota2 = 'input_active';
		alunos[4].statusMP = 'active';
		alunos[4].statusInputMP = 'input_active';
		alunos[4].statusMF = 'active';
		alunos[4].statusM = 'active';
		alunos[4].statusLinha = 'active';
		alunos[4].nota1 = 0.0;
		alunos[4].nota2 = 0.0;
		alunos[4].mparalela = 0.0;
		alunos[4].mparcial = 0.0;
		alunos[4].mfinal = 0.0;
	}

	var setStatus = function(){
		for (i = 0; i<28; i++){
			if (i % 2 === 0) {
				alunos[i].statusLinha = 'info';
				alunos[i].statusNota1 = 'info';
				alunos[i].statusInputNota1 = 'input_info'
				alunos[i].statusNota2 = 'info';
				alunos[i].statusInputNota2 = 'input_info';
				alunos[i].statusM = 'info';
				alunos[i].statusInputM = 'input_info';
				alunos[i].statusMP = 'info';
				alunos[i].statusInputMP = 'input_info';
				alunos[i].statusMF = 'info';
				alunos[i].statusInputMF = 'input_info';
			} else {
				alunos[i].statusLinha = 'success';
				alunos[i].statusLinha = 'success';
				alunos[i].statusNota1 = 'success';
				alunos[i].statusInputNota1='input_success';
				alunos[i].statusNota2 = 'success';
				alunos[i].statusInputNota2= 'input_success';
				alunos[i].statusM = 'success';
				alunos[i];statusInputM = 'input_success';
				alunos[i].statusMP = 'success';
				alunos[i].statusInputMP = 'input_success';
				alunos[i].statusMF = 'success';
				alunos[i].statusInputMF = 'input_success';
			}
		
			if (alunos[i].nota1 < 6){
				alunos[i].statusNota1 = 'danger';
				alunos[i].statusInputNota1 = 'input_danger';
			}

			if (alunos[i].nota2 < 6){
				alunos[i].statusNota2 = 'danger';
				alunos[i].statusInputNota2 = 'input_danger';
			}	
	
			if (alunos[i].mparcial < 6){
				alunos[i].statusM = 'danger';
				if (alunos[i].mparalela < 6){
					alunos[i].statusMP = 'danger';
					alunos[i].statusInputMP = 'input_danger';
				} else {
					alunos[i].statusMP = 'active';
					//alunos[i].statusInputMP= 'input_active';
				}
			}
			
			if (alunos[i].mfinal < 6){
				alunos[i].statusMF = 'danger';
			}	
								
		}
	};

var alunos = [
{ numero: 1, matricula: 120802, nome: 'AMANDA COSTA CUNHA',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: '', statusInputMP: '', mfinal: 0.0, statusMF: '', statusInputMF: '', statusLinha: ' '},
{ numero: 2, matricula: 120376, nome: 'ANA CLARA ALBUQUERQUE MARQUES',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: '', statusInputMP: '', mfinal: 0.0, statusMF: '', statusInputMF: '', statusLinha: ' '},
{ numero: 3, matricula: 110045, nome: 'ANA KAROLINY MACHADO MACEDO',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: ' ', mfinal: 0.0, statusMF: '', statusInputMF: '', statusLinha: ' '},
{ numero: 4, matricula: 120398, nome: 'CAMILA VALENTE SMITH',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: '', statusInputMP: '', mfinal: 0.0, statusMF: '', statusInputMF: '', statusLinha: ' '},
{ numero: 5, matricula: 120206, nome: 'CARLOS ADRIANO LIMA DOS SANTOS',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: '', statusInputMP: '', mfinal: 0.0, statusMF: '', statusInputMF: '', statusLinha: ' '},
{ numero: 6, matricula: 120385, nome: 'CAROLINA DA ROCHA REIS',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: '', statusInputMP: '', mfinal: 0.0, statusMF: '', statusInputMF: '', statusLinha: ' '},
{ numero: 7, matricula: 120384, nome: 'EVERSON COSTA DANTAS',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: '', statusInputMP: '', mfinal: 0.0, statusMF: '', statusInputMF: '', statusLinha: ' '},
{ numero: 8, matricula: 120381, nome: 'GABRIEL PEREIRA DA COSTA',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: '', statusInputMP: '', mfinal: 0.0, statusMF: '', statusInputMF: '', statusLinha: ' '},
{ numero: 9, matricula: 120393, nome: 'GIOVANNA OLIVEIRA DA SILVEIRA',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: '', statusInputMP: '', mfinal: 0.0, statusMF: '', statusInputMF: '', statusLinha: ' '},
{ numero: 10, matricula: 120382, nome: 'HAYDÊ CRISTHINE DE ALMEIDA MACHADO',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: '', statusInputMP: '', mfinal: 0.0, statusMF: '', statusInputMF: '', statusLinha: ' '},
{ numero: 11, matricula: 120390, nome: 'HELOISA RIBEIRO ALVES',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: '', statusInputMP: '', mfinal: 0.0, statusMF: '', statusInputMF: '', statusLinha: ' '},
{ numero: 12, matricula: 120807, nome: 'IVO MACHADO DE SOUZA',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: '', statusInputMP: '', mfinal: 0.0, statusMF: '', statusInputMF: '', statusLinha: ' '},
{ numero: 13, matricula: 120394, nome: 'JONATAS RODRIGUES REIS',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: '', statusInputMP: '', mfinal: 0.0, statusMF: '', statusInputMF: '', statusLinha: ' '},
{ numero: 14, matricula: 10076, nome: 'JONATHAN MAIA FERREIRA',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: '', statusInputMP: '', mfinal: 0.0, statusMF: '', statusInputMF: '', statusLinha: ' '},
{ numero: 15, matricula: 120387, nome: 'JULIANA CASTRO DA SILVA',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: '', statusInputMP: '', mfinal: 0.0, statusMF: '', statusInputMF: '', statusLinha: ' '},
{ numero: 16, matricula: 120392, nome: 'JULIANY RODRIGUES RAIOL',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: '', statusInputMP: '', mfinal: 0.0, statusMF: '', statusInputMF: '', statusLinha: ' '},
{ numero: 17, matricula: 120373, nome: 'LUAN SILVA SEMINARIO',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: '', statusInputMP: '', mfinal: 0.0, statusMF: '', statusInputMF: '', statusLinha: ' '},
{ numero: 18, matricula: 120378, nome: 'MAX WILLIAMS NOGUEIRA BATISTA',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: '', statusInputMP: '', mfinal: 0.0, statusMF: '', statusInputMF: '', statusLinha: ' '},
{ numero: 19, matricula: 120379, nome: 'NATHALIA LARISSA SOUZA DE OLIVEIRA',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: '', statusInputMP: '', mfinal: 0.0, statusMF: '', statusInputMF: '', statusLinha: ' '},
{ numero: 20, matricula: 120834, nome: 'ODILOMAR REBELO ROCHA JUNIOR',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: '', statusInputMP: '', mfinal: 0.0, statusMF: '', statusInputMF: '', statusLinha: ' '},
{ numero: 21, matricula: 120827, nome: 'OLAVO PONTES SANTANA',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: '', statusInputMP: '', mfinal: 0.0, statusMF: '', statusInputMF: '', statusLinha: ' '},
{ numero: 22, matricula: 120388, nome: 'OLGA DE SÁ LEÃO',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: '', statusInputMP: '', mfinal: 0.0, statusMF: '', statusInputMF: '', status: ' '},
{ numero: 23, matricula: 10.0051, nome: 'PATRICIA DE PAULA BARROS MORAES',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: '', statusInputMP: '', mfinal: 0.0, statusMF: '', statusInputMF: '', statusLinha: ' '},
{ numero: 24, matricula: 120389, nome: 'RÚBEN JOZAFÁ SILVA BELÉM',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: '', statusInputMP: '', mfinal: 0.0, statusMF: '', statusInputMF: '', statusLinha: ' '},
{ numero: 25, matricula: 120374, nome: 'SERGILLAM BARROSO OLIVEIRA',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: '', statusInputMP: '', mfinal: 0.0, statusMF: '', statusInputMF: '', statusLinha: ' '},
{ numero: 26, matricula: 120801, nome: 'THIAGO SANTOS FIGUEIRA',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: '', statusInputMP: '', mfinal: 0.0, statusMF: '', statusInputMF: '', statusLinha: ' '},
{ numero: 27, matricula: 120391, nome: 'TIMOTEO FONSECA SANTOS',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: '', statusInputMP: '', mfinal: 0.0, statusMF: '', statusInputMF: '', statusLinha: ' '},
{ numero: 28, matricula: 120380, nome: 'YASMIM GABRIELLA DOS SANTOS LIBORIO',nota1: 0.0 , statusNota1: '', statusInputNota1: '', nota2: 0.0, statusNota2: '', statusInputNota2: '', mparcial : 0.0, statusM: '', statusInputM: '', mparalela: 0.0 , statusMP: '', statusInputMP: '', mfinal: 0.0, statusMF: '', statusInputMF: '', statusLinha: ' '}
];

//Fim do módulo de notas

//Início do módulo de frequência
var frequenciaModule = angular.module('frequenciaModule', ['ngRoute']); //cria um módulo e associa a aplicacao
		// rotas: como numerospaces do C#
	
	frequenciaModule.controller('frequenciacontroller', function() {
		dias[2].lst_alunos = alunosFreq;
		this.objetos = dias[2];	
		
	});
//--------------------------------
	frequenciaModule.controller("TemposAulaCtrl", function($scope, $http)
		{
			var 
				$ = jQuery,
				ng = $scope,
				aj = $http
				;
			ng.init = function()
				{
					ng.chamaraulas();
					ng.chamaralunos();
				};
			ng.chamaraulas() = function(){ aj.get('./service/temposaula').success (
					function ( data ) 
						{ 
							ng.temposaulaList = data;
							ng.atualizar();
						}
				); 
			};	
//			this.value.Id = 1;
			ng.atualizar() = function(){ng.temposaula = ng.tempoaulaList;};
/*			ng.chamaralunos() = function(value){ aj.get('./service/alunos'+value.Id).success ( 
					function ( data ) 
						{
							ng.alunosList = data;
						} 
				); 
			};
			*/
			ng.init();
			
		}
	);

//--------------------------------	
	
	frequenciaModule.controller('checkcontroller', function() {
		this.alterarCheckbox = function(obj, elem, elemParent) { 
			var celulaFaltas = document.getElementById('num_faltas'); 			
			
			if(obj.faltas > 0) { 
				if(!elem.checked) {  
					obj.faltas = obj.faltas+1;
					elem.checked = true;
					celulaFaltas = obj.faltas;
				} 
				else{  
					elem.checked = false;
				   obj.faltas = obj.faltas-1;
				   celulaFaltas = obj.faltas;
				} 
			} 
			else {
				if(!elem.checked) { 
					elem.checked = true;
					obj.faltas = obj.faltas+1;
					celulaFaltas = obj.faltas;
				} 
			}
		};
				
		});
		/* this.changeColor = function(obj) {
			var linhaAluno = document.getElementById('freqRow'); 	
			if(obj.faltas!= 0) {
				linhaAluno.bgcolor = "#FF7F50";
			}
			else{
				if(obj.numero%2 != 0){
					linhaAluno.bgcolor = "#AEC4CF";
				}
				else{
					linhaAluno.bgcolor = "#6D8E9D";
				}
			}
		}; 
	
	
	frequenciaModule.controller('faltacontroller', function() {
		this.changeColor = function(obj, elem) { 
			/* var linhaAluno = document.getElementById('freqRow'); 	 
			if(obj.faltas !== 0) {
				elem.bgcolor = "#FF7F50";
			}
			else{
				if(obj.numero%2 !== 0){
					elem.bgcolor = "#AEC4CF";
				}
				else{
					elem.bgcolor = "#6D8E9D";
				}
			}
		};
		
		
	});
	
	
var dias = [];
var temps = [ [1,2], [1], [1,2,3], [1,2], [1], [0], [0] ];
var i;
var count = 0;
for(i=1; i<31; i++){
	dias[i-1] = {id:i+"092014", data: "06/09/2014",lst_alunos: [], tempos_dia:temps[count]};
	count++;
	if(count>6){
		count = 0;
	};
};
	
var alunosFreq = [
	{ numero: 1, RA: 120802, nome: 'AMANDA COSTA CUNHA', faltas:0},
	{ numero: 2, RA: 120376, nome: 'ANA CLARA ALBUQUERQUE MARQUES', faltas:0},
	{ numero: 3, RA: 110045, nome: 'ANA KAROLINY MACHADO MACEDO', faltas:0},
	{ numero: 4, RA: 120398, nome: 'CAMILA VALENTE SMITH', faltas:0},
	{ numero: 5, RA: 110206, nome: 'CARLOS ADRIANO LIMA DOS SANTOS', faltas:0},
	{ numero: 6, RA: 120385, nome: 'CAROLINA DA ROCHA REIS', faltas:0},
	{ numero: 7, RA: 120384, nome: 'EVERSON COSTA DANTAS', faltas:0},
	{ numero: 8, RA: 120381, nome: 'GABRIEL PEREIRA DA COSTA', faltas:0},
	{ numero: 9, RA: 120393, nome: 'GIOVANNA OLIVEIRA DA SILVEIRA', faltas:0},
	{ numero: 10, RA: 120382, nome: 'HAYDE CRISTHINE DE ALMEIDA MACHADO', faltas:0},
	{ numero: 11, RA: 120390, nome: 'HELOISA RIBEIRO ALVES', faltas:0},
	{ numero: 12, RA: 120807, nome: 'IVO MACHADO DE SOUZA', faltas:0},
	{ numero: 13, RA: 120394, nome: 'JONATAS RODRIGUES REIS', faltas:0},
	{ numero: 14, RA: 110076, nome: 'JONATHAN MAIA FERREIRA', faltas:0},
	{ numero: 15, RA: 120387, nome: 'JULIANA CASTRO DA SILVA', faltas:0},
	{ numero: 16, RA: 120392, nome: 'JULIANY RODRIGUES RAIOL', faltas:0},
	{ numero: 17, RA: 120373, nome: 'LUAN SILVA SEMINARIO', faltas:0},
	{ numero: 18, RA: 120378, nome: 'MAX WILLIAMS NOGUEIRA BATISTA', faltas:0},
	{ numero: 19, RA: 120379, nome: 'NATHALIA LARISSA SOUZA DE OLIVEIRA', faltas:0},
	{ numero: 20, RA: 120834, nome: 'ODILOMAR REBELO ROCHA JUNIOR', faltas:0},
	{ numero: 21, RA: 120827, nome: 'OLAVO PONTES SANTANA', faltas:0},
	{ numero: 22, RA: 120388, nome: 'OLGA DE SA LEAO', faltas:0},
	{ numero: 23, RA: 110051, nome: 'PATRICIA DE PAULA BARROS MORAES', faltas:0},
	{ numero: 24, RA: 120389, nome: 'RUBEN JOZAFA SILVA BELEM', faltas:0},
	{ numero: 25, RA: 120374, nome: 'SERGILLAM BARROSO OLIVEIRA', faltas:0},
	{ numero: 26, RA: 120801, nome: 'THIAGO SANTOS FIGUEIRA', faltas:0},
	{ numero: 27, RA: 120391, nome: 'TIMOTEO FONSECA SANTOS', faltas:0},
	{ numero: 28, RA: 120380, nome: 'YASMIM GABRIELLA DOS SANTOS LIBORIO', faltas:0}
];

var diasLetivos = [
	{idMateria: 1, idProfessor: 200872, lstDias: dias}
];
*/
//Fim do módulo de frequência

//Responsável por fazer as trocas entre módulos:
angular.element(document).ready(function() {
  var tabpage_1 = document.getElementById("tabpage_1");
  angular.bootstrap(tabpage_1, ["frequenciaModule"]);

  var tabpage_2 = document.getElementById("tabpage_2");
  angular.bootstrap(tabpage_2, ["notasModule"]);
  
  var tabpage_3 = document.getElementById("tabpage_3");
  angular.bootstrap(tabpage_3, ["planoModule"]);
  
  var planoaula_exportar = document.getElementById("planoaula-exportar");
  angular.bootstrap(planoaula_exportar, ["planoModule"]);
});
