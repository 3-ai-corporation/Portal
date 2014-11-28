var Ids_pegar = { IdSerie: 1, IdBimestre: 1, IdCurso: 1, IdMateria:1};
function IniciarSelecao()
{
	Ids_pegar.IdSerie = 1 ;
	Ids_pegar.IdBimestre = 1;
	Ids_pegar.IdCurso = 1;
	Ids_pegar.IdMateria = 1;		
};
//: deves colocar em turmaFiltro.php na div div'anopcoes->form'campoCheckBoxes'->input->>Onclick'[aqui]';
var SelectedCurso = function(serie) {
    var IdSerie;
    if (serie.id === 'checkPrimeiro')
        IdSerie = 0;

    if (serie.id === 'checkSegundo')
        IdSerie = 1;

    if (serie.id === 'checkTerceiro')
        IdSerie = 2;

};
function Selected_Serie()
{
	Ids_pegar.IdSerie = 1 ;
};

function Selected_Materia()
{
	Ids_pegar.IdMateria = 1;

};

function Selected_Curso()
{
	Ids_pegar.IdCurso = 1;
};

function Selected_Bimestre()
{
	Ids_pegar.IdBimestre = 1;
};
