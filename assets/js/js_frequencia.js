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

		ng.chamaraulas = function(){ 
			aj.get('service/temposAula').success(function (data) { 
				ng.aulaList = data;				
			});  
		};	
		
		ng.pegarData = function(){
			var selectbox = document.getElementById("index").selectedIndex;
			var selectText = document.getElementById("index").options;			
			
			alert("INDEX: " + selectText[selectbox].index + "  ID: " + selectText[selectbox].value);
			
			aj.get('service/filtrarTempos/:selectText[selectbox].value').success(function (data) { 
			
			});
			
		};
			
		ng.init();
	}
);

frequenciaModule.controller('TemposCtrl', function($scope, $http) {
	var 
		$ = jQuery,
		ng = $scope,
		aj = $http
	;

	ng.init = function(){
		ng.read();
	};

	ng.read = function(){
		aj.get('service/filtrarTempos').success(function(data){
			ng.temposList = data;
		});	
	};

	ng.init();

});

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



