/**
 * Created by Luan on 24/10/2014.
 */
 function Aula(d, tempos) {
 	this.dia = d;
 	this.tempos = tempos;
}

function AtualizarPrevisto(){
	 $.ajax({
        type: 'PUT',
        contentType: 'application/json',
        url: 'service/' ,
        dataType: "json",
        data: Aula(),
        success: {
        },
        error: {
        }
    });
	
	//funcao do banco
}

function AtualizarAplicado(){
	 $.ajax({
        type: 'PUT',
        contentType: 'application/json',
        url: 'service/' ,
        dataType: "json",
        data: Aula(),
        success: {
        },
        error: {
        }
    });
}
