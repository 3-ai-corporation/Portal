/**
 * Created by Ivo on 05/10/2014.
 * Modified by Luan on 24/10/2014.
 */
function Tempo(cp, ca, v, r) {
    this.conteudo_previsto = cp;
    this.conteudo_aplicado = ca;
    this.visible = v;
    this.reposicao = r;
}

/*
Rúben Olha Aqui
Mas eu não sei essa parte do angular 
angular.module('startScreen', ['ui.bootstrap']);

angular.module('startScreen').controller('notifController', function ($scope, $modal, $log) {
 $.ajax({
          type: "POST",
          url: 'service/plano-aula',
          async: false,
          success: function(data) {
            $scope.items = jQuery.parseJSON(data);
          }
    });
	}
*/
