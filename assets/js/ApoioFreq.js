var Ids_pegar = { IdSerie: 1, IdBimestre: 1, IdCurso: 1, IdMateria:1};
function IniciarSelecao()
{
	Ids_pegar.IdSerie = 1 ;
	Ids_pegar.IdBimestre = 1;
	Ids_pegar.IdCurso = 1;
	Ids_pegar.IdMateria = 1;		
};

function Selected_Serie(serie)
{
	 if (serie.id === 'checkPrimeiro')
			Ids_pegar.IdSerie = 1;

    if (serie.id === 'checkSegundo')
			Ids_pegar.IdSerie = 2;

    if (serie.id === 'checkTerceiro')
        	Ids_pegar.IdSerie =  3;
    		alert(String(Ids_pegar["IdSerie"]));
}

function Selected_Materia(materia)
{
	Ids_pegar.IdMateria = 1;
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
       	
    		alert(String(Ids_pegar["IdCurso"]));
}

function Selected_Bimestre(bimestre)
{


	Ids_pegar.IdBimestre = ?;
	alert(String(bimestre.id));
	Ids_pegar.IdBimestre = 1;
}
