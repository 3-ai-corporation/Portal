/**
 * Created by AnaKa on 24/10/2014.
*/


var materia = [];
materia[0] = {};
materia[0]['ae'] = [];
materia[0]['ai'] = ['ED', 'aaa', 'bbb'];
materia[0]['am'] = [];
materia[0]['at'] = [];

materia[1] = {};
materia[1]['ae'] = [];
materia[1]['ai'] = [];
materia[1]['am'] = [];
materia[1]['at'] = [];

materia[2] = {};
materia[2]['ae'] = [];
materia[2]['ai'] = ['LPIII', 'ccc'];
materia[2]['am'] = [];
materia[2]['at'] = ['CD'];

var bimestreAtualID;

var getMateriasByTurma = function(s, c){
    return materia[s][c];
};

var desativandoChecks = function(){
    var vazio = true;

    for (i = 0; i < 3; i++){
        if (materia[i]['ae'].length > 0){
            vazio = false;
        }
        if (materia[i]['ai'].length > 0){
            vazio = false;
        }
        if (materia[i]['am'].length > 0){
            vazio = false;
        }
        if (materia[i]['at'].length > 0){
            vazio = false;
        }
        if (vazio === true){
            if (i === 0){
                document.getElementById('checkPrimeiro').disabled = true;
            } else {
                if (i === 1){                    
                    document.getElementById('checkSegundo').disabled = true;
                } else{                    
                    document.getElementById('checkTerceiro').disabled = true;
                }
            }
        }
        vazio = true;
    }
};

var desativandoButtonsCurso = function(serie) {
    var serieSelecionada;

    if (serie.id === 'checkPrimeiro')
        serieSelecionada = 0;

    if (serie.id === 'checkSegundo')
        serieSelecionada = 1;

    if (serie.id === 'checkTerceiro')
        serieSelecionada = 2;

    if (materia[serieSelecionada]['ae'].length > 0) {
        var turma = document.getElementById('btnAE');
        turma.className = "buttonCursoBasic";
    }
    else {
        var turma = document.getElementById('btnAE');
        turma.className = "buttonDesativado";
    }

    if (materia[serieSelecionada]['ai'].length > 0) {
        var turma = document.getElementById('btnAI');
        turma.className = "buttonCursoBasic";
    }
    else {
        var turma = document.getElementById('btnAI');
        turma.className = "buttonDesativado";
    }

    if (materia[serieSelecionada]['am'].length > 0) {
        var turma = document.getElementById('btnAM');
        turma.className = "buttonCursoBasic";
    }
    else {
        var turma = document.getElementById('btnAM');
        turma.className = "buttonDesativado";
    }

    if (materia[serieSelecionada]['at'].length > 0) {
        var turma = document.getElementById('btnAT');
        turma.className = "buttonCursoBasic";
    }
    else {
        var turma = document.getElementById('btnAT');
        turma.className = "buttonDesativado";
    }
};

var getTodayDate = function() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

    if(dd<10) {
        dd='0'+dd
    } 

    if(mm<10) {
        mm='0'+mm
    } 
    //alert(yyyy+'-'+mm+'-'+dd);alert("oi");
    //alert(yyyy+'-'+mm+'-'+dd + ' 00:00:00');
    //var date = new DateTime(yyyy+'-'+mm+'-'+dd + ' 00:00:00');
    //alert(date);
    //alert(yyyy+'-'+mm+'-'+dd + ' 00:00:00');
    return yyyy+'-'+mm+'-'+dd + ' 00:00:00';// mm+'/'+dd+'/'+yyyy;
}

$.ajax( { 
    type:'Get',
    url:'service/Bimestres' + '/' +getTodayDate() /* + '/' + '2014-03-27 03:04:05'*/,
    data:{date: getTodayDate()},
    async: false,
    success:function(data) {
        alert(data);
        bimestreAtualID = data;        
    }    
});

var desativandoButtonsBimestres = function(){
    jQuery.ajax();
    alert(bimestreAtualID);
    //bimestreAtualID = 1;
    switch (bimestreAtualID){
        case 1:
            var btnBim01 = document.getElementById('btnUm');
            var btnBim02 = document.getElementById('btnDois');
            var btnBim03 = document.getElementById('btnTres');
            var btnBim04 = document.getElementById('btnQuatro');
            var btnBim05 = document.getElementById('btnRec');
            btnBim01.className = btnBim01.className.replace(/buttonCursoBasic(?!\S)/g , 'buttonCursoSelected');
            btnBim02.className = btnBim02.className.replace(/buttonCursoBasic(?!\S)/g , 'buttonDesativado');
            btnBim03.className = btnBim03.className.replace(/buttonCursoBasic(?!\S)/g , 'buttonDesativado');
            btnBim04.className = btnBim04.className.replace(/buttonCursoBasic(?!\S)/g , 'buttonDesativado');
            btnBim05.className = btnBim05.className.replace(/buttonCursoBasic(?!\S)/g , 'buttonDesativado');
        case 2:
            var btnBim02 = document.getElementById('btnDois');
            var btnBim03 = document.getElementById('btnTres');
            var btnBim04 = document.getElementById('btnQuatro');
            var btnBim05 = document.getElementById('btnRec');
            btnBim02.className = btnBim02.className.replace(/buttonCursoBasic(?!\S)/g , 'buttonCursoSelected');
            btnBim03.className = btnBim03.className.replace(/buttonCursoBasic(?!\S)/g , 'buttonDesativado');
            btnBim04.className = btnBim04.className.replace(/buttonCursoBasic(?!\S)/g , 'buttonDesativado');
            btnBim05.className = btnBim05.className.replace(/buttonCursoBasic(?!\S)/g , 'buttonDesativado');
        case 3:
            var btnBim03 = document.getElementById('btnTres');
            var btnBim04 = document.getElementById('btnQuatro');
            var btnBim05 = document.getElementById('btnRec');
            btnBim03.className = btnBim03.className.replace(/buttonCursoBasic(?!\S)/g , 'buttonCursoSelected');
            btnBim04.className = btnBim04.className.replace(/buttonCursoBasic(?!\S)/g , 'buttonDesativado');
            btnBim05.className = btnBim05.className.replace(/buttonCursoBasic(?!\S)/g , 'buttonDesativado');
        case 4:
            var btnBim04 = document.getElementById('btnQuatro');
            var btnRec = document.getElementById('btnRec');
            btnBim04.className = btnBim04.className.replace(/buttonCursoBasic(?!\S)/g , 'buttonCursoSelected');
            btnRec.className = btnRec.className.replace(/buttonCursoBasic(?!\S)/g , 'buttonDesativado');
        case 5:
        default:
    }
};
