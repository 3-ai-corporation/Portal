var frequenciaModule = angular.module('frequencia', ['ngRoute']);

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
	frequenciaModule.controller('TemposAulaCtrl', function($scope, $http)
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
