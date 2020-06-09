  $(document).ready(function() {

    //FUNCIONES DEL CRUD ASIGNACIÓN ALUMNO CURSO

/*Envio del formulario con Ajax para buscar Alumno curso*/
$(obtener_registroCursoMaestro());

function obtener_registroCursoMaestro(cursomaes)
{

    $.ajax({
        type: 'POST',
        url: 'process/buscarCursoAsigAlumno.php',                
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

//Buscar informacion de cursos por semestre imprimirlas en pantalla
(function(){  
    $('#semestre_cursos').on('click',function(){
      var consultasemestre = $('#consultasemestre').val();
      var url = 'process/buscarsemestrecurso.php';
      $.ajax({
      type:'POST',
      url:url,
      data:'consultasemestre='+consultasemestre,
      success: function(datos){
        $('#tabla-resultado-semestre_curso').html(datos);
        $('#tabla-resultado-semestre_curso').append(data);
      }
    });
    return false;
    });
  })();


}); //fin