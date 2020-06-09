  $(document).ready(function() {

//FUNCIONES DEL CRUD DE MUNICIPIO

/*Envio del formulario con Ajax para buscar Municipio*/
    $(obtener_registromunicipio());

    function obtener_registromunicipio(municipio)
    {
    
        $.ajax({
            type: 'POST',
            url: 'process/buscarMunicipio.php',                
            data: {municipio:municipio},
        })

        .done(function(resultadomunicipio){
            $("#tabla-resultado-municipio").html(resultadomunicipio);
        })
    }

    $(document).on('keyup', '#busquedamunicipio', function()
    {   
        var valor=$(this).val();
        if(valor!=""){
            obtener_registromunicipio(valor);
        }else{
            obtener_registromunicipio();
        }

    });

//FUNCIONES DEL CRUD DE TIPO USUARIO

/*Envio del formulario con Ajax para buscar tipo usuario*/
$(obtener_registroTipUs());

function obtener_registroTipUs(tipus)
{

    $.ajax({
        type: 'POST',
        url: 'process/buscarTipUs.php',                
        data: {tipus:tipus},
    })

    .done(function(resultadotipus){
        $("#tabla-resultado-tipo_usu").html(resultadotipus);
    })
}

$(document).on('keyup', '#busquedatipus', function()
{   
    var valor=$(this).val();
    if(valor!=""){
        obtener_registroTipUs(valor);
    }else{
        obtener_registroTipUs();
    }

});


//FUNCIONES DEL CRUD DE CARRERA

/*Envio del formulario con Ajax para buscar carrera*/
$(obtener_registroCarrera());

function obtener_registroCarrera(carrera)
{

    $.ajax({
        type: 'POST',
        url: 'process/buscarCarrera.php',                
        data: {carrera:carrera},
    })

    .done(function(resultadocarr){
        $("#tabla-resultado-carrera").html(resultadocarr);
    })
}

$(document).on('keyup', '#busquedacarr', function()
{   
    var valor=$(this).val();
    if(valor!=""){
        obtener_registroCarrera(valor);
    }else{
        obtener_registroCarrera();
    }

});

//FUNCIONES DEL CRUD SEMESTRE

/*Envio del formulario con Ajax para buscar semestre*/
$(obtener_registroSemestre());

function obtener_registroSemestre(semestre)
{

    $.ajax({
        type: 'POST',
        url: 'process/buscarSemestre.php',                
        data: {semestre:semestre},
    })

    .done(function(resultadosem){
        $("#tabla-resultado-semestre").html(resultadosem);
    })
}

$(document).on('keyup', '#busquedasem', function()
{   
    var valor=$(this).val();
    if(valor!=""){
        obtener_registroSemestre(valor);
    }else{
        obtener_registroSemestre();
    }

});

//FUNCIONES DEL CRUD CURSOS

/*Envio del formulario con Ajax para buscar cursos*/
$(obtener_registroCursos());

function obtener_registroCursos(cursos)
{

    $.ajax({
        type: 'POST',
        url: 'process/buscarCursos.php',                
        data: {cursos:cursos},
    })

    .done(function(resultadocursos){
        $("#tabla-resultado-curso").html(resultadocursos);
    })
}

$(document).on('keyup', '#busquedacurso', function()
{   
    var valor=$(this).val();
    if(valor!=""){
        obtener_registroCursos(valor);
    }else{
        obtener_registroCursos();
    }

});

//FUNCIONES DEL CRUD USUARIOS

/*Envio del formulario con Ajax para buscar usuarios*/
$(obtener_registroUsuarios());

function obtener_registroUsuarios(usuarios)
{

    $.ajax({
        type: 'POST',
        url: 'process/buscarUsuarios.php',                
        data: {usuarios:usuarios},
    })

    .done(function(resultadocursos){
        $("#tabla-resultado-us").html(resultadocursos);
    })
}

$(document).on('keyup', '#busquedaus', function()
{   
    var valor=$(this).val();
    if(valor!=""){
        obtener_registroUsuarios(valor);
    }else{
        obtener_registroUsuarios();
    }

});

//FUNCIONES DEL CRUD ASIGNACIÓN MAESTRO CURSO

/*Envio del formulario con Ajax para buscar maestro curso*/
$(obtener_registroCursoMaestro());

function obtener_registroCursoMaestro(cursomaes)
{

    $.ajax({
        type: 'POST',
        url: 'process/buscarCursoMaestro.php',                
        data: {cursomaes:cursomaes},
    })

    .done(function(resultadocursomaes){
        $("#tabla-resultado-cursomaestro").html(resultadocursomaes);
    })
}

$(document).on('keyup', '#busquedacursomaes', function()
{   
    var valor=$(this).val();
    if(valor!=""){
        obtener_registroCursoMaestro(valor);
    }else{
        obtener_registroCursoMaestro();
    }

});

//FUNCIONES DEL CRUD ASIGNACIÓN ALUMNO CURSO

/*Envio del formulario con Ajax para buscar alumno curso*/
$(obtener_registroCursoAlumno());

function obtener_registroCursoAlumno(cursoal)
{

    $.ajax({
        type: 'POST',
        url: 'process/buscarCursoAlumno.php',                
        data: {cursoal:cursoal},
    })

    .done(function(resultadocursoal){
        $("#tabla-resultado-cursoalumno").html(resultadocursoal);
    })
}

$(document).on('keyup', '#busquedacursoal', function()
{   
    var valor=$(this).val();
    if(valor!=""){
        obtener_registroCursoAlumno(valor);
    }else{
        obtener_registroCursoAlumno();
    }

});


}); //fin