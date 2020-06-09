
//.......................FUNCIONES DEL CRUD DE USUARIOS........................................

function btn_editar_usuario(Id_Usuario)
{
    var IdUsuario = {Id_Usuario:Id_Usuario};

    $.ajax({
        type: "POST",
        url: 'vista_editar_usuario_maestro.php',
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
    url: 'actualizar_usuario_maestro.php',
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

//.......................FUNCIONES DEL CRUD DE ASIGNAR NOTA........................................

function btn_agregar_nota(Id_Usuario, Id_Curso)
{
    var datos = {Id_Usuario:Id_Usuario, Id_Curso:Id_Curso};    
    
    $.ajax({
        type: "POST",
        url: 'vista_agregar_nota.php',
        data: datos,
        beforeSend: function(objeto)
        {

        },
        success: function(tipo)
        {
            $("#panel_agregar_nota").html(tipo);
        }
    });    
}

function Registrar_nota()
{
    var alumnonota = document.getElementById("alumnonota").value;
    var cursonota = document.getElementById("cursonota").value;
    var parcial1 = $("#parcial1").val();
    var parcial2 = $("#parcial2").val();
    var parcial3 = $("#parcial3").val();
    var tareas = $("#tareas").val();    
    var proyecto = $("#proyecto").val();
    var examen = $("#examen").val();

    var datos = {alumnonota:alumnonota, cursonota:cursonota, parcial1:parcial1, parcial2:parcial2, parcial3:parcial3, tareas:tareas, proyecto:proyecto, examen:examen};
    
    $.ajax({
    type: "POST",
    url: 'registro_notas.php',
    data: datos,
    beforeSend: function(objeto)
    {

    },
    success: function(tipo)
    {
      $("#respuesta_agregar_nota").html(tipo);      
      
    }
  });
}