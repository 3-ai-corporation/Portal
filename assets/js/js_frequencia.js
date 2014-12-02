var frequenciaModule = angular.module('frequenciaModule', ['ngRoute']);


frequenciaModule.controller('TemposAulaCtrl', function($scope, $http) {
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
});

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
	
	
	ng.valida = function(){
	
		var celulaFaltas = document.getElementById('num_faltas').value; 	
		
		var aChk = document.getElementsByName("chk");
		
		var cont = 0;
		
		for (var i=0 ; i < aChk.length ; i++)
		{
			if (aChk[i].checked == false){ 
				cont = cont + 1;
			}
		}
		
		document.getElementById('num_faltas').innerHTML = "<input style = 'color: #1E657F' id = 'faltas_aluno' name = 'faltas' value = '" + (celulaFaltas = cont) + "'/>";

	}

});

frequenciaModule.controller('AlunosCtrl', function($scope, $http) {
	var 
		$ = jQuery,
		ng = $scope,
		aj = $http
	;

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


frequenciaModule.controller('CabecalhoCtrl', function($scope, $http) {
	var 
		$ = jQuery,
		ng = $scope,
		aj = $http
	;

	ng.init = function(){
		ng.read();
	};

	ng.read = function(){
		aj.get('service/cabecalhoFreq').success(function(data){
			alert(data.serie);
			ng.serie = data.serie;
			ng.curso = data.curso;
			ng.materia = data.materia;
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
			} 
			else{  
				elem.checked = false;
			   obj.faltas = obj.faltas-1;
			} 
		} 
		else {
			if(!elem.checked) { 
				elem.checked = true;
				obj.faltas = obj.faltas+1;
			} 
		}
	};			
});



