var frequenciaModule = angular.module('frequenciaModule', ['ngRoute']);

frequenciaModule.controller('TemposAulaCtrl', function($scope, $http)
	{
		var 
			$ = jQuery,
			ng = $scope,
			aj = $http
		;
<<<<<<< HEAD
		
=======
		var Ids_selected = require('./ApoioFreq.js');
		console.log(Ids_selected.IdCurso); 		
>>>>>>> refs/remotes/origin/iss15
		ng.init = function()
		{
			ng.chamaraulas();
		};

		ng.chamaraulas = function(){ 
			aj.get('service/temposAula').success(function (data) { 
				ng.aulaList = data;
				
			}); 
		};	
		
		ng.init();
			
	}
);

frequenciaModule.controller('AlunosCtrl', function($scope, $http) {
	var 
		$ = jQuery,
		ng = $scope,
		aj = $http
	;

	ng.alunos = {};

	ng.init = function(){
		ng.read();
	};

	ng.read = function(){
		aj.get('service/alunosTurma').success(function(data){
			ng.alunosList = data;
		});		
	};

	ng.init();

});
