var notasModule = angular.module('Notas', []);

notasModule.controller('NotasCtrl', function($scope, $http) {
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
		aj.get('service/notas').success(function(data){
			ng.notasList = data;
		});		
	};

	ng.init();
});