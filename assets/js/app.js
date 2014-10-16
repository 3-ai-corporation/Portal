(function() {
	var app = angular.module('planoAula',[]);
	app.controller('GridController',function() {
		this.aulas = aulas;
		this.ativarData = function(data) {
			for(i = 0; i < this.aulas.length; i++) {
				if(data == this.aulas[i].dt) {
					this.aulas[i].visible = !this.aulas[i].visible;
				}
			}
		};
		
        this.getIndex = function(aula) {
		    var index = -1;
			for(i = 0; i < this.aulas.length; i++) {
				if(aula == this.aulas[i]) {
					index = i;
					break;
				}
			}
			return index;
		};
		
		this.updatePrevisto = function(aula) {
	        if(aula.geminada == 1) {
				var index = this.getIndex(aula);
				var str = aula.conteudo_previsto;
				var i = index + 1;
				if(i < this.aulas.length){
					while(this.aulas[i].dt == aula.dt) {
						this.aulas[i++].conteudo_previsto = str;
					}
				}
			}
		};
		
		this.updateAplicado = function(aula) {
			if(aula.geminada == 1) {
				var index = this.getIndex(aula);
				var str = aula.conteudo_aplicado;
				var i = index + 1;
				if(i < this.aulas.length){
					while(this.aulas[i].dt == aula.dt) {
						this.aulas[i++].conteudo_aplicado = str;
					}
				}
			}
		};
		
		this.updateReposicao = function(aula) {
			if(aula.geminada == 1) {
				var index = this.getIndex(aula);
				var str = aula.reposicao;
				var i = index + 1;
				if(i < this.aulas.length){
					while(this.aulas[i].dt == aula.dt) {
						this.aulas[i++].reposicao = str;
					}
				}
			}
		};
	});
	
	app.controller('ExportController',function() {
		this.turmas = turmas;
		this.materias = materias;
	});

    var aulas = [
        new Tempo('15/08/2014','Tempo para implementação do portal','Tempo para implementação do portal',1,false,false),
        new Tempo('15/08/2014','Tempo para implementação do portal','Tempo para implementação do portal',2,false,false),
        new Tempo('15/08/2014','Tempo para implementação do portal','Tempo para implementação do portal',2,false,false),
        new Tempo('15/08/2014','Tempo para implementação do portal','Tempo para implementação do portal',2,false,false),
        new Tempo('16/08/2014','Curso Windows Phone','Curso Windows Phone',0,false,false),
        new Tempo('17/08/2014','Curso Windows Phone','Curso Windows Phone',1,false,false),
        new Tempo('17/08/2014','Curso Windows Phone','Curso Windows Phone',2,false,false),
        new Tempo('17/08/2014','Curso Windows Phone','Curso Windows Phone',2,false,false),
        new Tempo('18/08/2014','Tempo para implementação do projeto','Tempo para implementação do projeto',0,false,false),
        new Tempo('19/08/2014','Tempo para implementação do projeto','Tempo para implementação do projeto',0,false,false),
        new Tempo('20/08/2014','Tempo para implementação do projeto','Tempo para implementação do projeto',0,false,true)];

    var materias = ["Português","Matemática","Linguagem de Programação III","Geografia","Tópicos Especiais"];
    var turmas = ["1AE","1AI","1AM","1AT","2AE","2AI","2AM","2AT","3AE","3AI","3AM","3AT"];
})();
