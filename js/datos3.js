
//.......................FUNCIONES DEL CRUD DE USUARIOS........................................

function btn_editar_usuario(Id_Usuario)
{
    var IdUsuario = {Id_Usuario:Id_Usuario};

    $.ajax({
        type: "POST",
        url: 'vista_editar_usuario_alumno.php',
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
    
    $.ajax({
    type: "POST",
    url: 'actualizar_usuario_alumno.php',
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

//.......................FUNCIONES DEL CRUD VER NOTAS........................................

function btn_ver_nota(Id_Usuario, Id_Curso)
{
    var datos = {Id_Usuario:Id_Usuario, Id_Curso:Id_Curso};
    
    $.ajax({
        type: "POST",
        url: 'vista_ver_nota.php',
        data: datos,
        beforeSend: function(objeto)
        {

        },
        success: function(tipo)
        {
            $("#panel_ver_nota").html(tipo);
        }
    });
}

//.......................FUNCIONES DEL CRUD VER NOTAS........................................

function btn_asignar_curso(Id_Curso)
{
    var datos = {Id_Curso:Id_Curso};
    
    $.ajax({
        type: "POST",
        url: 'vista_asignar_curso.php',
        data: datos,
        beforeSend: function(objeto)
        {

        },
        success: function(tipo)
        {
            $("#panel_asignar_curso").html(tipo);
        }
    });
}

function Asignar_curso_alumno()
{
    var alumno_asig = document.getElementById("alumno_asig").value;
    var curso_asig = document.getElementById("curso_asig").value;

    var datos = {alumno_asig:alumno_asig, curso_asig:curso_asig};
    
    $.ajax({
    type: "POST",
    url: 'guardar_asignacion_curso.php',
    data: datos,
    beforeSend: function(objeto)
    {

    },
    success: function(tipo)
    {
      $("#respuesta_asignar_curso").html(tipo);      
      
    }
  });
}