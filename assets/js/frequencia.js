(function() { //função de escopo global, todo o js é uma função
	var frequenciaModule = angular.module('frequencia', ['ngRoute']); //cria um módulo e associa a aplicacao
		// rotas: como numerospaces do C#
	
	frequenciaModule.controller('frequenciacontroller', function() {
		dias[2].lst_alunos = alunos;
		this.objetos = dias[2];	
		
	});
	
	
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
	
	frequenciaModule.controller('faltacontroller', function() {
		this.changeColor = function(obj, elem) { 
			if(obj.faltas != 0) {
				elem.bgcolor = "#FF7F50";
			}
			else{
				if(obj.numero%2 != 0){
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
	
var alunos = [
	{ numero: 1, RA: 120802, nome: 'AMANDA COSTA CUNHA', faltas:0, cor:''},
	{ numero: 2, RA: 120376, nome: 'ANA CLARA ALBUQUERQUE MARQUES', faltas:0, cor:''},
	{ numero: 3, RA: 110045, nome: 'ANA KAROLINY MACHADO MACEDO', faltas:0, cor:''},
	{ numero: 4, RA: 120398, nome: 'CAMILA VALENTE SMITH', faltas:0, cor:''},
	{ numero: 5, RA: 110206, nome: 'CARLOS ADRIANO LIMA DOS SANTOS', faltas:0, cor:''},
	{ numero: 6, RA: 120385, nome: 'CAROLINA DA ROCHA REIS', faltas:0, cor:''},
	{ numero: 7, RA: 120384, nome: 'EVERSON COSTA DANTAS', faltas:0, cor:''},
	{ numero: 8, RA: 120381, nome: 'GABRIEL PEREIRA DA COSTA', faltas:0, cor:''},
	{ numero: 9, RA: 120393, nome: 'GIOVANNA OLIVEIRA DA SILVEIRA', faltas:0, cor:''},
	{ numero: 10, RA: 120382, nome: 'HAYDE CRISTHINE DE ALMEIDA MACHADO', faltas:0, cor:''},
	{ numero: 11, RA: 120390, nome: 'HELOISA RIBEIRO ALVES', faltas:0, cor:''},
	{ numero: 12, RA: 120807, nome: 'IVO MACHADO DE SOUZA', faltas:0, cor:''},
	{ numero: 13, RA: 120394, nome: 'JONATAS RODRIGUES REIS', faltas:0, cor:''},
	{ numero: 14, RA: 110076, nome: 'JONATHAN MAIA FERREIRA', faltas:0, cor:''},
	{ numero: 15, RA: 120387, nome: 'JULIANA CASTRO DA SILVA', faltas:0, cor:''},
	{ numero: 16, RA: 120392, nome: 'JULIANY RODRIGUES RAIOL', faltas:0, cor:''},
	{ numero: 17, RA: 120373, nome: 'LUAN SILVA SEMINARIO', faltas:0, cor:''},
	{ numero: 18, RA: 120378, nome: 'MAX WILLIAMS NOGUEIRA BATISTA', faltas:0, cor:''},
	{ numero: 19, RA: 120379, nome: 'NATHALIA LARISSA SOUZA DE OLIVEIRA', faltas:0, cor:''},
	{ numero: 20, RA: 120834, nome: 'ODILOMAR REBELO ROCHA JUNIOR', faltas:0, cor:''},
	{ numero: 21, RA: 120827, nome: 'OLAVO PONTES SANTANA', faltas:0, cor:''},
	{ numero: 22, RA: 120388, nome: 'OLGA DE SA LEAO', faltas:0, cor:''},
	{ numero: 23, RA: 110051, nome: 'PATRICIA DE PAULA BARROS MORAES', faltas:0, cor:''},
	{ numero: 24, RA: 120389, nome: 'RUBEN JOZAFA SILVA BELEM', faltas:0, cor:''},
	{ numero: 25, RA: 120374, nome: 'SERGILLAM BARROSO OLIVEIRA', faltas:0, cor:''},
	{ numero: 26, RA: 120801, nome: 'THIAGO SANTOS FIGUEIRA', faltas:0, cor:''},
	{ numero: 27, RA: 120391, nome: 'TIMOTEO FONSECA SANTOS', faltas:0, cor:''},
	{ numero: 28, RA: 120380, nome: 'YASMIM GABRIELLA DOS SANTOS LIBORIO', faltas:0, cor:''}
];

var diasLetivos = [
	{idMateria: 1, idProfessor: 200872, lstDias: dias}
];
	
})();