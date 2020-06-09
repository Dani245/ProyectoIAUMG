  $(document).ready(function() {

    //FUNCIONES DEL CRUD ASIGNACIÓN MAESTRO CURSO

/*Envio del formulario con Ajax para buscar maestro curso*/
$(obtener_registroCursoMaestro());

function obtener_registroCursoMaestro(cursomaes)
{

    $.ajax({
        type: 'POST',
        url: 'process/buscarCursoAsigMaestro.php',                
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

//Buscar informacion de cursos y estudiantes imprimirlas en pantalla
(function(){  
    $('#cursos_alumnos').on('click',function(){
      var consultacurso = $('#consultacurso').val();
      var url = 'process/buscaralumnocurso.php';
      $.ajax({
      type:'POST',
      url:url,
      data:'consultacurso='+consultacurso,
      success: function(datos){
        $('#tabla-resultado-cursoalumno').html(datos);
        $('#tabla-resultado-cursoalumno').append(data);
      }
    });
    return false;
    });
  })();


}); //fin