//.......................FUNCIONES DEL CRUD DE MUNCIPIO........................................

function pasarDatosMunicipio()
{
    
    var nombremun = $("#nombremun").val();    


    var datos = {nombremun:nombremun};

    $.ajax({
    type: "POST",
    url: 'guardar_municipio.php',
    data: datos,
    beforeSend: function(objeto)
    {

    },
    success: function(tipo)
    {
      $("#tabla-resultado-municipio").html(tipo);
    }
  });
}

function limpiarModalNuevoMunicipio()
{
    
    document.getElementById('nombremun').value = '';
    
}

function btn_editar_municipio(Id_Municipio)
{
    var IdMunicipio = {Id_Municipio:Id_Municipio};

    $.ajax({
        type: "POST",
        url: 'vista_editar_municipio.php',
        data: IdMunicipio,
        beforeSend: function(objeto)
        {

        },
        success: function(tipo)
        {
            $("#panel_editar_municipio").html(tipo);
        }
    });
}

function pasarDatos_act_m()
{
    
    var codigo_act_m = document.getElementById("codigo_act_m").value;
    var nombremun_act_m = $("#nombremun_act_m").val();    
    

    var datos_act_m = {codigo_act_m:codigo_act_m, nombremun_act_m:nombremun_act_m};

    $.ajax({
    type: "POST",
    url: 'actualizar_municipio.php',
    data: datos_act_m,
    beforeSend: function(objeto)
    {

    },
    success: function(tipo)
    {
      $("#respuesta_editar_municipio").html(tipo);
    }
  });
}

function btn_eliminar_municipio(Id_Municipio)
{
    var IdMunicipio = {Id_Municipio:Id_Municipio};

    $.ajax({
        type: "POST",
        url: 'vista_eliminar_municipio.php',
        data: IdMunicipio,
        beforeSend: function(objeto)
        {

        },
        success: function(eliminar)
        {
            $("#panel_eliminar_municipio").html(eliminar);
        }
    });
}

function eliminar_municipio()
{
    var idmunicipio_eli = $("#idmunicipio_eli").val();

    var id_eliminar = {idmunicipio_eli:idmunicipio_eli};

    $.ajax({
        type: "POST",
        url: 'eliminar_municipio.php',
        data: id_eliminar,
        beforeSend: function(objeto)
        {

        },
        success: function(actualizar)
        {
            $("#respuesta_eliminar_mun").html(actualizar);

        }
    });
}

//.......................FUNCIONES DEL CRUD DE TIPO USUARIO........................................

function pasarDatosTipUs()
{
    
    var nombreper = $("#nombreper").val();
    var descripcionper = document.getElementById("descripcionper").value;


    var datos = {nombreper:nombreper, descripcionper:descripcionper};

    $.ajax({
    type: "POST",
    url: 'guardar_tipousuario.php',
    data: datos,
    beforeSend: function(objeto)
    {

    },
    success: function(tipo)
    {
      $("#tabla-resultado-tipo_usu").html(tipo);
    }
  });
}

function limpiarModalNuevoTipUs()
{
    
    document.getElementById('nombreper').value = '';
    document.getElementById('descripcionper').value = '';
    
}

function btn_editar_tipousuario(Id_TipoUsuario)
{
    var IdTipoUsuario = {Id_TipoUsuario:Id_TipoUsuario};

    $.ajax({
        type: "POST",
        url: 'vista_editar_tipousuario.php',
        data: IdTipoUsuario,
        beforeSend: function(objeto)
        {

        },
        success: function(tipo)
        {
            $("#panel_editar_tipousuario").html(tipo);
        }
    });
}

function pasarDatos_act_tipousuario()
{
    
    var codigo_act_tipus = document.getElementById("codigo_act_tipus").value;
    var nombreper_act_tipus = $("#nombreper_act_tipus").val();
    var descripcionper_act_tipus = document.getElementById("descripcionper_act_tipus").value;
    

    var datos_act_tipus = {codigo_act_tipus:codigo_act_tipus, nombreper_act_tipus:nombreper_act_tipus, descripcionper_act_tipus:descripcionper_act_tipus};

    $.ajax({
    type: "POST",
    url: 'actualizar_tipousuario.php',
    data: datos_act_tipus,
    beforeSend: function(objeto)
    {

    },
    success: function(tipo)
    {
      $("#respuesta_editar_tipousuario").html(tipo);
    }
  });
}

function btn_eliminar_tipousuario(Id_TipoUsuario)
{
    var IdTipoUsuario = {Id_TipoUsuario:Id_TipoUsuario};

    $.ajax({
        type: "POST",
        url: 'vista_eliminar_tipousuario.php',
        data: IdTipoUsuario,
        beforeSend: function(objeto)
        {

        },
        success: function(eliminar)
        {
            $("#panel_eliminar_tipousuario").html(eliminar);
        }
    });
}

function eliminar_tipousuario()
{
    var idtipousuario_eli = $("#idtipousuario_eli").val();

    var id_eliminar = {idtipousuario_eli:idtipousuario_eli};

    $.ajax({
        type: "POST",
        url: 'eliminar_tipousuario.php',
        data: id_eliminar,
        beforeSend: function(objeto)
        {

        },
        success: function(actualizar)
        {
            $("#respuesta_eliminar_tipousuario").html(actualizar);

        }
    });
}

//.......................FUNCIONES DEL CRUD DE CARRERAS........................................

function pasarDatosCarrera()
{
    
    var nombrecarr = $("#nombrecarr").val();    


    var datos = {nombrecarr:nombrecarr};

    $.ajax({
    type: "POST",
    url: 'guardar_carrera.php',
    data: datos,
    beforeSend: function(objeto)
    {

    },
    success: function(tipo)
    {
      $("#tabla-resultado-carrera").html(tipo);
    }
  });
}

function limpiarModalNuevaCarrera()
{
    
    document.getElementById('nombrecarr').value = '';    
    
}

function btn_editar_carrera(Id_Carrera)
{
    var IdCarrera = {Id_Carrera:Id_Carrera};

    $.ajax({
        type: "POST",
        url: 'vista_editar_carrera.php',
        data: IdCarrera,
        beforeSend: function(objeto)
        {

        },
        success: function(tipo)
        {
            $("#panel_editar_carrera").html(tipo);
        }
    });
}

function pasarDatos_act_carrera()
{
    
    var codigo_act_carr = document.getElementById("codigo_act_carr").value;
    var nombrecarr_act_carr = $("#nombrecarr_act_carr").val();
    

    var datos_act_carr = {codigo_act_carr:codigo_act_carr, nombrecarr_act_carr:nombrecarr_act_carr};

    $.ajax({
    type: "POST",
    url: 'actualizar_carrera.php',
    data: datos_act_carr,
    beforeSend: function(objeto)
    {

    },
    success: function(tipo)
    {
      $("#respuesta_editar_carrera").html(tipo);
    }
  });
}

function btn_eliminar_carrera(Id_Carrera)
{
    var IdCarrera = {Id_Carrera:Id_Carrera};

    $.ajax({
        type: "POST",
        url: 'vista_eliminar_carrera.php',
        data: IdCarrera,
        beforeSend: function(objeto)
        {

        },
        success: function(eliminar)
        {
            $("#panel_eliminar_carrera").html(eliminar);
        }
    });
}

function eliminar_carrera()
{
    var idcarrera_eli = $("#idcarrera_eli").val();

    var id_eliminar = {idcarrera_eli:idcarrera_eli};

    $.ajax({
        type: "POST",
        url: 'eliminar_carrera.php',
        data: id_eliminar,
        beforeSend: function(objeto)
        {

        },
        success: function(actualizar)
        {
            $("#respuesta_eliminar_carrera").html(actualizar);

        }
    });
}

//.......................FUNCIONES DEL CRUD SEMESTRE........................................

function pasarDatosSemestre()
{
    
    var nombresem = $("#nombresem").val();
    var carrera = document.getElementById("carrera").value;


    var datos = {nombresem:nombresem, carrera:carrera};

    $.ajax({
    type: "POST",
    url: 'guardar_semestre.php',
    data: datos,
    beforeSend: function(objeto)
    {

    },
    success: function(tipo)
    {
      $("#tabla-resultado-semestre").html(tipo);
    }
  });
}

function limpiarModalNuevoSemestre()
{
    
    document.getElementById('nombresem').value = '';
    
}

function btn_editar_semestre(Id_Semestre)
{
    var IdSemestre = {Id_Semestre:Id_Semestre};

    $.ajax({
        type: "POST",
        url: 'vista_editar_semestre.php',
        data: IdSemestre,
        beforeSend: function(objeto)
        {

        },
        success: function(tipo)
        {
            $("#panel_editar_semestre").html(tipo);
        }
    });
}

function pasarDatos_act_semestre()
{
    
    var codigo_act_sem = document.getElementById("codigo_act_sem").value;
    var nombresem_act_sem = $("#nombresem_act_sem").val();
    var carrera_act_sem = document.getElementById("carrera_act_sem").value;
    

    var datos_act_sem = {codigo_act_sem:codigo_act_sem, nombresem_act_sem:nombresem_act_sem, carrera_act_sem:carrera_act_sem};

    $.ajax({
    type: "POST",
    url: 'actualizar_semestre.php',
    data: datos_act_sem,
    beforeSend: function(objeto)
    {

    },
    success: function(tipo)
    {
      $("#respuesta_editar_semestre").html(tipo);
    }
  });
}

function btn_eliminar_semestre(Id_Semestre)
{
    var IdSemestre = {Id_Semestre:Id_Semestre};

    $.ajax({
        type: "POST",
        url: 'vista_eliminar_semestre.php',
        data: IdSemestre,
        beforeSend: function(objeto)
        {

        },
        success: function(eliminar)
        {
            $("#panel_eliminar_semestre").html(eliminar);
        }
    });
}

function eliminar_semestre()
{
    var idsemestre_eli = $("#idsemestre_eli").val();

    var id_eliminar = {idsemestre_eli:idsemestre_eli};

    $.ajax({
        type: "POST",
        url: 'eliminar_semestre.php',
        data: id_eliminar,
        beforeSend: function(objeto)
        {

        },
        success: function(actualizar)
        {
            $("#respuesta_eliminar_semestre").html(actualizar);

        }
    });
}

//.......................FUNCIONES DEL CRUD CURSOS........................................

function CargarSemestre(cargarsemestre)
{

    var cargarsemestre = {cargarsemestre:cargarsemestre};

    $.ajax({
        type: "POST",
        url: 'process/cargar_semestre.php',
        data: cargarsemestre,
        success: function(resp){
            $('#semestrecur').html(resp);
        }
    });
}

function pasarDatosCursos()
{
    
    var nombrecur = $("#nombrecur").val();
    var requisitocur = $("#requisitocur").val();
    var creditoscur = $("#creditoscur").val();
    var semestrecur = document.getElementById("semestrecur").value;


    var datos = {nombrecur:nombrecur, requisitocur:requisitocur, creditoscur:creditoscur, semestrecur:semestrecur};

    $.ajax({
    type: "POST",
    url: 'guardar_curso.php',
    data: datos,
    beforeSend: function(objeto)
    {

    },
    success: function(tipo)
    {
      $("#tabla-resultado-curso").html(tipo);
    }
  });
}

function limpiarModalNuevoCurso()
{
    
    document.getElementById('nombrecur').value = '';
    document.getElementById('requisitocur').value = '';
    document.getElementById('creditoscur').value = '';
    
}

function btn_editar_cursos(Id_Cursos)
{
    var IdCurso = {Id_Cursos:Id_Cursos};

    $.ajax({
        type: "POST",
        url: 'vista_editar_curso.php',
        data: IdCurso,
        beforeSend: function(objeto)
        {

        },
        success: function(tipo)
        {
            $("#panel_editar_curso").html(tipo);
        }
    });
}


function CargarSemestreAct(cargarsemestre)
{

    var cargarsemestre = {cargarsemestre:cargarsemestre};

    $.ajax({
        type: "POST",
        url: 'process/cargar_semestre_act.php',
        data: cargarsemestre,
        success: function(resp){
            $('#semestrecur_act_cur').html(resp);
        }
    });
}



function pasarDatos_act_cursos()
{
    
    var codigo_act_cur = document.getElementById("codigo_act_cur").value;
    var nombrecur_act_cur = $("#nombrecur_act_cur").val();
    var requisito_act_cur = $("#requisito_act_cur").val();
    var creditos_act_cur = $("#creditos_act_cur").val();
    var semestrecur_act_cur = document.getElementById("semestrecur_act_cur").value;
    

    var datos_act_cur = {codigo_act_cur:codigo_act_cur, nombrecur_act_cur:nombrecur_act_cur, requisito_act_cur:requisito_act_cur, creditos_act_cur:creditos_act_cur, semestrecur_act_cur:semestrecur_act_cur};
    
    $.ajax({
    type: "POST",
    url: 'actualizar_curso.php',
    data: datos_act_cur,
    beforeSend: function(objeto)
    {

    },
    success: function(tipo)
    {
      $("#respuesta_editar_curso").html(tipo);
    }
  });
}



function btn_eliminar_cursos(Id_Curso)
{
    var IdCurso = {Id_Curso:Id_Curso};

    $.ajax({
        type: "POST",
        url: 'vista_eliminar_curso.php',
        data: IdCurso,
        beforeSend: function(objeto)
        {

        },
        success: function(eliminar)
        {
            $("#panel_eliminar_curso").html(eliminar);
        }
    });
}

function eliminar_cursos()
{
    var idcurso_eli = $("#idcurso_eli").val();

    var id_eliminar = {idcurso_eli:idcurso_eli};

    $.ajax({
        type: "POST",
        url: 'eliminar_curso.php',
        data: id_eliminar,
        beforeSend: function(objeto)
        {

        },
        success: function(actualizar)
        {
            $("#respuesta_eliminar_curso").html(actualizar);

        }
    });
}

//.......................FUNCIONES DEL CRUD DE USUARIOS........................................

function pasarDatosUsuarios()
{
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var telefono = $("#telefono").val();
    var pass = $("#pass").val();
    var email = document.getElementById("email").value;
    var direccion = $("#direccion").val();
    var carnet = $("#carnet").val();
    var titulo = $("#titulo").val();
    var sexo = $("#sexo").val();
    var municipio = document.getElementById("id_municipio").value;
    var tipo_usuario = document.getElementById("tipo_usuario").value;
    var id_carrera = document.getElementById("id_carrera").value;

    var datos = {nombre:nombre, apellido:apellido, telefono:telefono, pass:pass, email:email, direccion:direccion, carnet:carnet, titulo:titulo, sexo:sexo, municipio:municipio, tipo_usuario:tipo_usuario, id_carrera:id_carrera};
    
    $.ajax({
    type: "POST",
    url: 'guardar_usuario.php',
    data: datos,
    beforeSend: function(objeto)
    {

    },
    success: function(tipo)
    {
      $("#tabla-resultado-us").html(tipo);
    }
  });
}

function limpiarModalNuevoUsuario()
{    
    document.getElementById('nombre').value = '';
    document.getElementById('apellido').value = '';
    document.getElementById('telefono').value = '';
    document.getElementById('pass').value = '';
    document.getElementById('email').value = '';
    document.getElementById('direccion').value = '';    
    document.getElementById('sexo').value = '';
    document.getElementById('carnet').value = '';
    document.getElementById('titulo').value = '';
}

function btn_editar_usuario(Id_Usuario)
{
    var IdUsuario = {Id_Usuario:Id_Usuario};

    $.ajax({
        type: "POST",
        url: 'vista_editar_usuario.php',
        data: IdUsuario,
        beforeSend: function(objeto)
        {

        },
        success: function(tipo)
        {
            $("#panel_editar_usuario").html(tipo);
        }
    });
}

function pasarDatos_act()
{
    var idusuarios_act = document.getElementById("idusuarios_act").value;
    var creditos_act = document.getElementById("creditos_act").value;
    var nombre_act = $("#nombre_act").val();
    var apellido_act = $("#apellido_act").val();
    var telefono_act = $("#telefono_act").val();
    var pass_act = $("#pass_act").val();
    var email_act = document.getElementById("email_act").value;
    var direccion_act = $("#direccion_act").val();
    var carnet_act = $("#carnet_act").val();
    var titulo_act = $("#titulo_act").val();
    var sexo_act = $("#sexo_act").val();
    var municipio_act = document.getElementById("municipio_act").value;
    var tipo_usuario_act = document.getElementById("tipo_usuario_act").value;
    var id_carrera_act = document.getElementById("carrera_act").value;

    var datos_act = {idusuarios_act:idusuarios_act, creditos_act:creditos_act, nombre_act:nombre_act, apellido_act:apellido_act, telefono_act:telefono_act, pass_act:pass_act, email_act:email_act, direccion_act:direccion_act, carnet_act:carnet_act, titulo_act:titulo_act, sexo_act:sexo_act, municipio_act:municipio_act, tipo_usuario_act:tipo_usuario_act, id_carrera_act:id_carrera_act};

    console.log(datos_act);
    $.ajax({
    type: "POST",
    url: 'actualizar_usuario.php',
    data: datos_act,
    beforeSend: function(objeto)
    {

    },
    success: function(tipo)
    {
      $("#respuesta_editar_usuario").html(tipo);
    }
  });
}

function btn_eliminar_usuario(Id_Usuario)
{
    var IdUsuario = {Id_Usuario:Id_Usuario};

    $.ajax({
        type: "POST",
        url: 'vista_eliminar_usuario.php',
        data: IdUsuario,
        beforeSend: function(objeto)
        {

        },
        success: function(eliminar)
        {
            $("#panel_eliminar_usuario").html(eliminar);
        }
    });
}

function eliminar_usuario()
{
    var idusuario_eli = $("#idusuario_eli").val();

    var id_eliminar = {idusuario_eli:idusuario_eli};

    $.ajax({
        type: "POST",
        url: 'eliminar_usuario.php',
        data: id_eliminar,
        beforeSend: function(objeto)
        {

        },
        success: function(actualizar)
        {
            $("#respuesta_eliminar").html(actualizar);

        }
    });
}

//.......................FUNCIONES DEL CRUD MAESTRO CURSO........................................

function CargarSemestreMaestro(cargarsemestre)
{

    var cargarsemestre = {cargarsemestre:cargarsemestre};

    $.ajax({
        type: "POST",
        url: 'process/cargar_semestre_maestro.php',
        data: cargarsemestre,
        success: function(resp){
            $('#semestremaes').html(resp);
        }
    });
}

function CargarCursoMaestro(cargarcurso)
{

    var cargarcurso = {cargarcurso:cargarcurso};

    $.ajax({
        type: "POST",
        url: 'process/cargar_curso_maestro.php',
        data: cargarcurso,
        success: function(resp){
            $('#cursomaes').html(resp);
        }
    });
}

function pasarDatosCursoMaestro()
{    
    var cursomaes = document.getElementById("cursomaes").value;
    var maestrocur = document.getElementById("maestrocur").value;


    var datos = {cursomaes:cursomaes, maestrocur:maestrocur};

    $.ajax({
    type: "POST",
    url: 'guardar_curso_maestro.php',
    data: datos,
    beforeSend: function(objeto)
    {

    },
    success: function(tipo)
    {
      $("#tabla-resultado-cursomaestro").html(tipo);
    }
  });
}


function btn_eliminar_CursoMaestro(Id_asignacion)
{
    var IdAsignacion = {Id_asignacion:Id_asignacion};
    console.log(IdAsignacion);
    $.ajax({
        type: "POST",
        url: 'vista_eliminar_curso_maestro.php',
        data: IdAsignacion,
        beforeSend: function(objeto)
        {

        },
        success: function(eliminar)
        {
            $("#panel_eliminar_curso_maestro").html(eliminar);
        }
    });
}

function eliminar_CursoMaestro()
{
    var idasignacion_eli = $("#idasignacionmaes_eli").val();

    var id_eliminar = {idasignacion_eli:idasignacion_eli};

    $.ajax({
        type: "POST",
        url: 'eliminar_curso_maestro.php',
        data: id_eliminar,
        beforeSend: function(objeto)
        {

        },
        success: function(actualizar)
        {
            $("#respuesta_eliminar_curso_maestro").html(actualizar);

        }
    });
}

//.......................FUNCIONES DEL CRUD ALUMNO CURSO........................................

function CargarSemestreAlumno(cargarsemestre)
{

    var cargarsemestre = {cargarsemestre:cargarsemestre};

    $.ajax({
        type: "POST",
        url: 'process/cargar_semestre_alumno.php',
        data: cargarsemestre,
        success: function(resp){
            $('#semestreal').html(resp);
        }
    });
}

function CargarCursoAlumno(cargarcurso)
{

    var cargarcurso = {cargarcurso:cargarcurso};

    $.ajax({
        type: "POST",
        url: 'process/cargar_curso_alumno.php',
        data: cargarcurso,
        success: function(resp){
            $('#cursoal').html(resp);
        }
    });
}

function pasarDatosCursoAlumno()
{    
    var cursoal = document.getElementById("cursoal").value;
    var alumnocur = document.getElementById("alumnocur").value;


    var datos = {cursoal:cursoal, alumnocur:alumnocur};

    $.ajax({
    type: "POST",
    url: 'guardar_curso_alumno.php',
    data: datos,
    beforeSend: function(objeto)
    {

    },
    success: function(tipo)
    {
      $("#tabla-resultado-cursoalumno").html(tipo);
    }
  });
}


function btn_eliminar_CursoAlumno(Id_asignacion)
{
    var IdAsignacion = {Id_asignacion:Id_asignacion};
    console.log(IdAsignacion);
    $.ajax({
        type: "POST",
        url: 'vista_eliminar_curso_alumno.php',
        data: IdAsignacion,
        beforeSend: function(objeto)
        {

        },
        success: function(eliminar)
        {
            $("#panel_eliminar_curso_alumno").html(eliminar);
        }
    });
}

function eliminar_CursoAlumno()
{
    var idasignacion_eli = $("#idasignacional_eli").val();

    var id_eliminar = {idasignacion_eli:idasignacion_eli};

    $.ajax({
        type: "POST",
        url: 'eliminar_curso_alumno.php',
        data: id_eliminar,
        beforeSend: function(objeto)
        {

        },
        success: function(actualizar)
        {
            $("#respuesta_eliminar_curso_alumno").html(actualizar);

        }
    });
}