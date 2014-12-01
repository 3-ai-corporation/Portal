//angularJS
var notasModule = angular.module('notasModule', ['ngRoute']);

notasModule.controller('NotasCtrl', function($scope, $http)
	{
		var 
			$ = jQuery,
			ng = $scope,
			aj = $http
		;
		ng.calculoMedia = '(AV1)';
		ng.comecar = function()
		{
			ng.chamarNotas();
		};
		
		ng.chamarNotas = function()
			{
			aj.get('Lists/notasList.html').success(function(data){
				ng.alunosList = data; 
			});	
		};
		ng.comecar();
	}
);

notasModule.controller('ColumnCtrl', function($scope, $http)
	{
		var 
			$ = jQuery,
			ng = $scope,
			aj = $http
		;
		ng.lstColAvs = [{title:"AV1", value:10}];

        ng.setColumn = function(){
			// this.column = this.column +1;
			if ((ng.lstColAvs.length ) < 10) {
				ng.newAv = {};
				ng.newAv.title = AV + (this.lstColAvs.length + 1);
                ng.newAv.value = 10;
				ng.lstColAvs.push(newAv);
			}
		};
		
		ng.unsetColumn = function(){
			if ((this.lstColAvs.length ) > 1) {
				this.lstColAvs.pop();
			}
		};

        ng.selectedAv = '';

        ng.isSet = function(value){
            if (value.equals(ng.selectedAv)){
                return true;
            }else{
                return false;
            }
        };

        /* this.setTooltip = function (value) {
            this.selectedAv = value;
        }; */
	
	}
);
	
	//Responsável por fazer as trocas entre módulos:
angular.element(document).ready(function() {
  var tabpage_1 = document.getElementById("tabpage_1");
  angular.bootstrap(tabpage_1, ["frequenciaModule"]);

  var tabpage_2 = document.getElementById("tabpage_2");
  angular.bootstrap(tabpage_2, ["notasModule"]);
});