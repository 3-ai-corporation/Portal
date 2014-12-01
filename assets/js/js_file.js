
angular.module('startScreen', ['ui.bootstrap']);

angular.module('startScreen').controller('notifController', function ($scope, $modal, $log) {

  //parte 1
  
  var dados = [];
  $.ajax({
          type: "GET",
          url: 'service/notify-portal',
          async: false,
          success: function(data) {
            $scope.items = jQuery.parseJSON(data);
          }
    });

  $scope.openPortalNotificacao = function (size) {

    var modalInstance = $modal.open({
      templateUrl: 'portalModalContent',
      controller: 'ModalInstanceCtrl',
      size: size,
      resolve: {
        items: function () {
          dados = [];
          var i = 0;
            for (msg in $scope.items) {
              dados[i] = $scope.items[i].mensagem;
              i++;
          };
          return dados;
        }
      }
    });

    modalInstance.result.then(function (selectedItem) {
      $scope.selected = selectedItem;
    }, function () {
      $log.info('Modal dismissed at: ' + new Date());
    });
  };
  
  //parte 2

  $scope.openNotasNotificacao = function (size) {
    $.ajax({
          type: "GET",
          url: 'service/notify-alunos',
          async: false,
          success: function(data) {
            $scope.items = jQuery.parseJSON(data);
          }
    });

    var modalInstance = $modal.open({
      templateUrl: 'notasModalContent',
      controller: 'ModalInstanceCtrl',
      size: size,
      resolve: {
        items: function () {
          dados = [];
          var i = 0;
            for (msg in $scope.items) {
              dados[i] = $scope.items[i].mensagem;
              i++;
          };
          return dados;
        }
      }
    });

    modalInstance.result.then(function (selectedItem) {
      $scope.selected = selectedItem;
    }, function () {
      $log.info('Modal dismissed at: ' + new Date());
    });
  };
  
  //parte 3

  $scope.openFundacaoNotificacao = function (size) {
    $.ajax({
          type: "GET",
          url: 'service/notify-recados',
          async: false,
          success: function(data) {
            $scope.items = jQuery.parseJSON(data);
          }
    });
    var modalInstance = $modal.open({
      templateUrl: 'fundacaoModalContent',
      controller: 'ModalInstanceCtrl',
      size: size,
      resolve: {
        items: function () {
          dados = [];
          var i = 0;
            for (msg in $scope.items) {
              dados[i] = $scope.items[i].mensagem;
              i++;
          };
          return dados;
        }
      }
    });

    modalInstance.result.then(function (selectedItem) {
      $scope.selected = selectedItem;
    }, function () {
      $log.info('Modal dismissed at: ' + new Date());
    });
  };
});

// Please note that $modalInstance represents a modal window (instance) dependency.
// It is not the same as the $modal service used above.

angular.module('startScreen').controller('ModalInstanceCtrl', function ($scope, $modalInstance, items) {

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
