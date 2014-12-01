// js_notas.js
var notasModule = angular.module('notasModule', ['ngRoute']);

//Para pegar notas do BD
notasModule.controller('notasCtrl', function($scope, $http)
	{
		var 
			$ = jQuery,
			ng = $scope,
			aj = $http
		;

		ng.init = function()
		{
			ng.Notas();
		};

		ng.Notas = function(){ 
			aj.get('service/notas').success(function (data) { 
				ng.notasList = data;
				
			}); 
		};	
		
		ng.init();
			
	}
);


//Para pegar alunos do BD
notasModule.controller('AlunosCtrl', function($scope, $http) {
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

//Controller da Coluna
notasModule.controller('ColumnController', function($scope, $http)
	{
	var 
		$ = jQuery, 
		ng = $scope,
		aj = $http;
		this.lstColAvs = [{title:"AV1", value:"10"}];
		this.alunos = alunos;

        this.setColumn = function(){
			this.column = this.column +1;
			if ((this.lstColAvs.length ) < 3) {
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
	});