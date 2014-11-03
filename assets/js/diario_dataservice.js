
var professor = [];
$.ajax({
          type: "GET",
          url: 'service/diario-turmas',
          /*async: false, ---> só adiciona essa linha de novo se der atraso na hora de carregar a página */
          success: function(data) {
            professor = jQuery.parseJSON(data);
            alert('Acessei o serviço maroto');
            mat[0] = {};
  mat[1] = {};
  mat[2] = {};
  var i = 0;
            for (mat in $professor) {
    switch (mat[i].serie)
    {
      case 1: 
        switch (mat[i].cursos)
        {
            case 1:
                materia[0]['ae'] = mat[i].materia;
                break;
            case 2:
                materia[0]['ai'] = mat[i].materia;
                break;
            case 3:
                materia[0]['am'] = mat[i].materia;
                break;
            case 4:
                materia[0]['at'] = mat[i].materia;
                break;
        }
        break;
      case 2: 
        switch (mat[i].cursos)
        {
            case 1:
                materia[1]['ae'] = mat[i].materia;
                break;
            case 2:
                materia[1]['ai'] = mat[i].materia;
                break;
            case 3:
                materia[1]['am'] = mat[i].materia;
                break;
            case 4:
                materia[1]['at'] = mat[i].materia;
                break;
        }
        break;
      case 3: 
        switch (mat[i].cursos)
        {
            case 1:
                materia[2]['ae'] = mat[i].materia;
                break;
            case 2:
                materia[2]['ai'] = mat[i].materia;
                break;
            case 3:
                materia[2]['am'] = mat[i].materia;
                break;
            case 4:
                materia[2]['at'] = mat[i].materia;
                break;
        }
        break;
    }
    i++;
  }
          }
    });

function filtraTurma(){
  mat[0] = {};
  mat[1] = {};
  mat[2] = {};
  for (mat in professor) {
    switch (mat.serie)
    {
      case 1: 
        switch (mat.cursos)
        {
            case 1:
                materia[0]['ae'] = mat.materia;
                break;
            case 2:
                materia[0]['ai'] = mat.materia;
                break;
            case 3:
                materia[0]['am'] = mat.materia;
                break;
            case 4:
                materia[0]['at'] = mat.materia;
                break;
        }
        break;
      case 2: 
        switch (mat.cursos)
        {
            case 1:
                materia[1]['ae'] = mat.materia;
                break;
            case 2:
                materia[1]['ai'] = mat.materia;
                break;
            case 3:
                materia[1]['am'] = mat.materia;
                break;
            case 4:
                materia[1]['at'] = mat.materia;
                break;
        }
        break;
      case 3: 
        switch (mat.cursos)
        {
            case 1:
                materia[2]['ae'] = mat.materia;
                break;
            case 2:
                materia[2]['ai'] = mat.materia;
                break;
            case 3:
                materia[2]['am'] = mat.materia;
                break;
            case 4:
                materia[2]['at'] = mat.materia;
                break;
        }
        break;
    }
  }
  return mat;
}