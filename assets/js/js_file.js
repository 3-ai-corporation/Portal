angular.module('startScreen', ['ui.bootstrap']);

angular.module('startScreen').controller('notifController', function ($scope, $modal, $log) {

  //parte 1
  
  $scope.items = ['Andrew, Ricardo e outras 2 pessoas deixaram recados para você', 'Agora você pode mudar o tema do seu portal. Descubra como.', 'Você tem mais capacidade de armazenamento no Disco Virtual. Aproveite que este benefício acaba final do ano'];

  $scope.openPortalNotificacao = function (size) {

    var modalInstance = $modal.open({
      templateUrl: 'portalModalContent',
      controller: 'ModalInstanceCtrl',
      size: size,
      resolve: {
        items: function () {
          return $scope.items;
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

  
$scope.items2 = ['Alguns dos seus alunos precisam de atenção. Clique aqui para saber mais.', 'Foi feito um pedido de correção de notas. Confira o quanto antes!', 'Você tem mais capacidade de armazenamento no Disco Virtual. Aproveite que este benefício acaba final do ano.'];

  $scope.openNotasNotificacao = function (size) {

    var modalInstance = $modal.open({
      templateUrl: 'notasModalContent',
      controller: 'ModalInstanceCtrl',
      size: size,
      resolve: {
        items: function () {
          return $scope.items2;
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
  
  $scope.items3 = ['Festa surpresa da prof° Ana Rita no refeitório!', 'Os professores agora têm desconto nos cursos de idioma da Wizard. Saiba mais.'];

  $scope.openFundacaoNotificacao = function (size) {

    var modalInstance = $modal.open({
      templateUrl: 'fundacaoModalContent',
      controller: 'ModalInstanceCtrl',
      size: size,
      resolve: {
        items: function () {
          return $scope.items3;
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
