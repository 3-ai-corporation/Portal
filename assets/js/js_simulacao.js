var simulacaoModule = angular.module('simulacaoModule', ['ngRoute']);

simulacaoModule.controller('simulacaoCtrl', function($scope, $http)
    {
        var
            $ = jQuery,
            ng = $scope,
            aj = $http
            ;
        var indices = "";
        ng.comecar = function()
        {
            ng.chamardados();
        };

        ng.hey = function()
        {
            indices = $('#ids_diario').html();
            alert(String(indices));
        };
        ng.chamardados = function(){
            aj.get('Lists/DiasletivosList.html').success(function (data) {
                ng.dadosList = data;
            });
        };
        ng.comecar();
    }
);
