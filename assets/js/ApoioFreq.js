<<<<<<< HEAD
var IdSerie;
var IdBimestre;
var IdCurso;
var IdMateria;
function IniciarSelecao()
{};
=======

var Ids_pegar = {};
module.exports = Ids_pegar;
function IniciarSelecao()
{
	Ids_pegar.IdSerie = 1 ;
	Ids_pegar.IdBimestre = 1;
	Ids_pegar.IdCurso = 1;
	Ids_pegar.IdMateria = 1;		
};

function Selected_Serie()
{
	Ids_pegar.IdSerie = 1 ;
}

function Selected_Materia()
{
	Ids_pegar.IdMateria = 1;		
}

function Selected_Curso()
{
	Ids_pegar.IdCurso = 1;
}

function Selected_Bimestre()
{
	Ids_pegar.IdBimestre = 1;
}
>>>>>>> refs/remotes/origin/iss15
