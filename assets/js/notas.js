//notas.js
(function() 
{
	var notasModule = angular.module('notas', ['ngRoute']);
	
	notasModule.controller('notasController', function() 
	{
		var calculoMedia = '(AV1)';
		this.alunos = alunos;
		setmediaparcial();
		setmediafinal(1);
		arredondar();
		setStatus();
		carlos();
		
		var arredondar = function(){
			for (var i = 0; i < alunos.length; i++){
				if ((alunos[i].mfinal - Math.floor(alunos[i].mfinal)) >= 0.25 && ((alunos[i].mfinal - Math.floor(alunos[i].mfinal)) <= 0.5)) {
					alunos[i].mfinal= Math.floor(alunos[i].mfinal) + 0.5; 
				} else if ((alunos[i].mfinal - Math.floor(alunos[i].mfinal)) >= 0.75) {
					alunos[i].mfinal= Math.floor(alunos[i].mfinal) + 1;
				} else {
					alunos[i].mfinal= Math.floor(alunos[i].mfinal);
				}
			}
		};
	
		var setmediaparcial = function(value){
			for (i = 0; i < alunos.length; i++){
					
				alunos[i].mparcial = alunos[i].nota1;
					
				if (alunos[i].mparcial >= 6) {
					alunos[i].mfinal = alunos[i].mparcial;
					alunos[i].mparalela = null;
				}
					
			}	
			
		};
	
		
		var setmediafinal = function(value){
			if (value === 1){
				 for (i = 0; i < alunos.length; i++){
					if ((alunos[i].mparalela != null) && (alunos[i].mparalela > alunos[i].mparcial)){
						alunos[i].mfinal = (alunos[i].mparcial + alunos[i].mparalela) / 2;
					} else {
						alunos[i].mfinal = alunos[i].mparcial;
					}
				}	
			}else{
				 for (i = 0; i < alunos.length; i++){
					if ((alunos[i].mparalela != null) && (alunos[i].mparalela > alunos[i].mparcial)){
						alunos[i].mfinal = (alunos[i].mparcial + (alunos[i].mparalela * 2)) / 3;
						alunos[i].mfinal = (alunos[i].mparcial + (alunos[i].mparalela * 2)) / 3;
					} else {
						alunos[i].mfinal = alunos[i].mparcial;
					}
				 }
			}
		};
		
		
		this.isSet = function(value){
			return value === this.button;
		};
			
		var carlos = function(){
			alunos[4].status = 'active';
			alunos[4].statusNota1 = 'active';
			alunos[4].statusInputNota1 = 'input_active';
			alunos[4].statusNota2 = 'active';
			alunos[4].statusInputNota2 = 'input_active';
			alunos[4].statusMP = 'active';
			alunos[4].statusInputMP = 'input_active';
			alunos[4].statusMF = 'active';
			alunos[4].statusM = 'active';
			alunos[4].statusLinha = 'active';
			alunos[4].nota1 = 0.0;
			alunos[4].nota2 = 0.0;
			alunos[4].mparalela = 0.0;
			alunos[4].mparcial = 0.0;
			alunos[4].mfinal = 0.0;
		};
	
		var setStatus = function(){
			for (i = 0; i<28; i++){
				if (i % 2 === 0) {
					alunos[i].statusLinha = 'info';
					alunos[i].statusNota1 = 'info';
					alunos[i].statusInputNota1 = 'input_info'
					alunos[i].statusNota2 = 'info';
					alunos[i].statusInputNota2 = 'input_info';
					alunos[i].statusM = 'info';
					alunos[i].statusInputM = 'input_info';
					alunos[i].statusMP = 'info';
					alunos[i].statusInputMP = 'input_info';
					alunos[i].statusMF = 'info';
					alunos[i].statusInputMF = 'input_info';
				} else {
					alunos[i].statusLinha = 'success';
					alunos[i].statusLinha = 'success';
					alunos[i].statusNota1 = 'success';
					alunos[i].statusInputNota1='input_success';
					alunos[i].statusNota2 = 'success';
					alunos[i].statusInputNota2= 'input_success';
					alunos[i].statusM = 'success';
					alunos[i];statusInputM = 'input_success';
					alunos[i].statusMP = 'success';
					alunos[i].statusInputMP = 'input_success';
					alunos[i].statusMF = 'success';
					alunos[i].statusInputMF = 'input_success';
				}
			
				if (alunos[i].nota1 < 6){
					alunos[i].statusNota1 = 'danger';
					alunos[i].statusInputNota1 = 'input_danger';
				}

				if (alunos[i].nota2 < 6){
					alunos[i].statusNota2 = 'danger';
					alunos[i].statusInputNota2 = 'input_danger';
				}	
		
				if (alunos[i].mparcial < 6){
					alunos[i].statusM = 'danger';
					if (alunos[i].mparalela < 6){
						alunos[i].statusMP = 'danger';
						alunos[i].statusInputMP = 'input_danger';
					} else {
						alunos[i].statusMP = 'active';
					}
				}
				
				if (alunos[i].mfinal < 6){
					alunos[i].statusMF = 'danger';
				}	
									
			}
		};
});

 function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
        return false;
    return true;
}; 

