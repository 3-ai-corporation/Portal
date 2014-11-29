var frequenciaModule = angular.module('frequenciaModule', ['ngRoute']);

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
		};
//alert(String(Ids_pegar[ "IdSerie" ]));
		ng.chamaraulas = function(){ 
					
			aj.get('service/temposAula').success(function (data) { 
				ng.aulaList = data;
				
			});
 
		};	
		
		ng.init();
			
	}
);
lol = function()
{
 ng.chamaraulas();
};
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
