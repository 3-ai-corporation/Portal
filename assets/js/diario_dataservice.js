var diarioModulo = angular.module('diario', []);

diarioModulo.controller('FiltroController', function ($scope, $modal, $log) {

  //parte 1
  
  $.ajax({
          type: "GET",
          url: 'service/diario-turma',
          async: false,
          success: function(data) {
            $scope.items = jQuery.parseJSON(data);
          }
    });

  $scope.filtraTurma = function (size) {

    var modalInstance = $modal.open({
      templateUrl: 'portalModalContent',
      controller: 'ModalInstanceCtrl',
      size: size,
      resolve: {
        items: function () {
            mat[0] = {};
            mat[1] = {};
            mat[2] = {};
            for (mat in $scope.items) {
              switch (mat.serie)
              {
                case 1: 
                    switch (mat.cursos)
                    {
                        case 1:
                            materia[0]['ae'] = mat.materia;
                            break;
                        case 2:
                            materia[0]['ai'] = mat.materia;
                            break;
                        case 3:
                            materia[0]['am'] = mat.materia;
                            break;
                        case 4:
                            materia[0]['at'] = mat.materia;
                            break;
                    }
                    break;
                case 2: 
                    switch (mat.cursos)
                    {
                        case 1:
                            materia[1]['ae'] = mat.materia;
                            break;
                        case 2:
                            materia[1]['ai'] = mat.materia;
                            break;
                        case 3:
                            materia[1]['am'] = mat.materia;
                            break;
                        case 4:
                            materia[1]['at'] = mat.materia;
                            break;
                    }
                    break;
                case 3: 
                    switch (mat.cursos)
                    {
                        case 1:
                            materia[2]['ae'] = mat.materia;
                            break;
                        case 2:
                            materia[2]['ai'] = mat.materia;
                            break;
                        case 3:
                            materia[2]['am'] = mat.materia;
                            break;
                        case 4:
                            materia[2]['at'] = mat.materia;
                            break;
                    }
                    break;
              }
          };
          return materia;
        }
      }
    });

    modalInstance.result.then(function (selectedItem) {
      $scope.selected = selectedItem;
    }, function () {
      $log.info('Modal dismissed at: ' + new Date());
    });
  };

// Please note that $modalInstance represents a modal window (instance) dependency.
// It is not the same as the $modal service used above.

diarioModulo.controller('ModalInstanceCtrl', function ($scope, $modalInstance, items) {

  $scope.items = items;
  $scope.selected = {
    item: $scope.items[0]
  };

  $scope.ok = function () {
    $modalInstance.close($scope.selected.item);
  };

  $scope.cancel = function () {
    $modalInstance.dismiss('cancel');
  };
});