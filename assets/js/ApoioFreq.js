var Ids_pegar = { IdSerie: 1, IdBimestre: 1, IdCurso: 1, IdMateria:1};
function IniciarSelecao()
{
	Ids_pegar.IdSerie = 1 ;
	Ids_pegar.IdBimestre = 1;
	Ids_pegar.IdCurso = 1;
	Ids_pegar.IdMateria = 1;
    atualizar_ids();
}
function Selected_Serie(serie)
{
	 if (serie.id === 'checkPrimeiro')
			Ids_pegar.IdSerie = 1;

    if (serie.id === 'checkSegundo')
			Ids_pegar.IdSerie = 2;

    if (serie.id === 'checkTerceiro')
        	Ids_pegar.IdSerie =  3;
    atualizar_ids();
}

function Selected_Materia(materia)
{
    Ids_pegar.IdMateria = materia.value;
    atualizar_ids();
}

function Selected_Curso(curso)
{
    if (curso.id === 'btnAE')
			Ids_pegar.IdCurso = 1;

    if (curso.id === 'btnAI')
			Ids_pegar.IdCurso = 2;

    if (curso.id === 'btnAM')
        	Ids_pegar.IdCurso =  3;
    if (curso.id === 'btnAT')
       	Ids_pegar.IdCurso =  4;
    atualizar_ids();
}

function Selected_Bimestre(bimestre)
{
    if (bimestre.id === 'btnUm')
	Ids_pegar.IdBimestre = 1;
    if (bimestre.id === 'btnDois')
        Ids_pegar.IdBimestre = 2;
    if (bimestre.id === 'btnTres')
        Ids_pegar.IdBimestre = 3;
    if (bimestre.id === 'btnQuatro')
        Ids_pegar.IdBimestre = 4;
    if (bimestre.id === 'btnRec')
        Ids_pegar.IdBimestre = 5;
    atualizar_ids();
}
function atualizar_ids()
{
    var stringid = String(Ids_pegar.IdSerie) +
	String(Ids_pegar.IdBimestre) +
	String(Ids_pegar.IdCurso) +
        String(Ids_pegar.IdMateria);
    //pega o elemento html invisíviel do diario.php
    //este elemento guarda os ids selecionados:
	//ordem serie>bimestre>curso>materia;
    $('#ids_diario').html(stringid);
	indices = $('#ids_diario').html();
    alert(indices);
}
