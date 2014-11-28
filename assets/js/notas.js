(function(){ 
	var app = angular.module('Notas', []);
	
	app.controller('AppController', function(){
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

	
	app.controller('ColumnController', function(){
		this.lstColAvs = [{title:"AV1", value:"10"}];

        this.setColumn = function(){
			// this.column = this.column +1;
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
            if (value.equals(this.selectedAv)){
                return true;
            }else{
                return false;
            }
        };

        /* this.setTooltip = function (value) {
            this.selectedAv = value;
        }; */
	
	});
		var mudarCorNotas = function(){
				if(aluno[i].nota1 < 6){
					alunos[i].statusNota1 = 'danger';
					alunos[i].statusInputNota1 = 'input_danger'; 
				}
				else if(aluno[i].nota2 < 6){
					alunos[i].statusNota2 = 'danger';
					alunos[i].statusInputNota2 = 'input_danger';  
				}
				else if(aluno[i].nota1 >= 6){
					if(i % 2 != 0){
						alunos[i].statusLinha = 'info';
						alunos[i].statusNota1 = 'info';
						alunos[i].statusInputNota1 = 'input_info';
					}
				}
				else if(aluno[i].nota2 >= 6){
					if(i % 2 == 0){
						alunos[i].statusLinha = 'info';
						alunos[i].statusNota2 = 'info';
						alunos[i].statusInputNota2 = 'input_info';
					}
				}
			
		}
	
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

})(); 

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
        return false;
    return true;
}