<?php 

  //valida si la sesion esta iniciada, de lo contrario redirecciona al indice principal
if (!isset($_SESSION['emailAdmin'])) {
  echo '<script> location.href="ingreso.php"; </script>';
}    


include './conexion/conexion.php';

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
     <link rel="stylesheet" href="css/_all-skins.min.css">     
     <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
     <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

     <script src="js/jquery.min.js"></script>     
     <script type="text/javascript" src="js/admin.js"></script> 
     <script src="js/datos.js"></script>   

   </head>
   <body class="hold-transition skin-yellow sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="admin.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>UMG</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Universidad Mariano</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Administrador
                 <?php
                  //si la sesion no es vacia, muestra el email del usuario

                 if (!$_SESSION['emailAdmin']=="") {                    
                  echo '<h4 class="hidden-xs">'.$_SESSION['emailAdmin'].'</h4>';                      
                }

                ?>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">

                  <?php
                  //mostramos datos del usuario                  

                  if (!$_SESSION['emailAdmin']=="") {                    

                    $verAdmin=mysqli_query($conn, "SELECT * FROM usuarios WHERE email='".$_SESSION['emailAdmin']."'");
                    $admin=mysqli_fetch_array($verAdmin);
                    $adminombre=$admin['nombre'];    
                    $adminapellido=$admin['apellido'];
                    $adminemail=$admin['email'];
                    $consultacarrera=$admin['idcarrera'];

                    $consultacarr=mysqli_query($conn, "SELECT * FROM carrera WHERE idcarrera='".$consultacarrera."'"); 

                    while($carr=mysqli_fetch_array($consultacarr)){
                      $admincarrera=$carr['nombre'];
                    }                                        
                    echo '<p>'.$adminombre.'</p>';                      
                    echo '<p>'.$adminapellido.'</p>';                      
                    echo '<p>'.$adminemail.'</p>';                      
                    echo '<p>'.$admincarrera.'</p>';    
                  }
                  
                  ?>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">

                    <div class="pull-right">
                      <a  href="process/logout.php" class="btn btn-default btn-flat">Cerrar sesión</a>
                      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>

            <li class="treeview">
              <a href="#">
                <i class="fas fa-building"></i>
                <span>Municipio</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">                                               
                <li><a href="#Municipio" role="tab" data-toggle="tab"><i class="fas fa-map-marked-alt"></i> Municipio </a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
               <i class="fas fa-clipboard"></i>
               <span>Asignación Cursos</span>
               <i class="fa fa-angle-left pull-right"></i>
             </a>
             <ul class="treeview-menu">                
              <li><a href="#Cursomaestro" role="tab" data-toggle="tab"><i class="fas fa-chalkboard-teacher"></i> Maestro - Curso</a></li>    
              <li><a href="#Cursoalumno" role="tab" data-toggle="tab"><i class="fas fa-book-reader"></i> Alumno - Curso</a></li> 
            </ul>
          </li>

         <li class="treeview">
          <a href="#">
           <i class="fas fa-clipboard-list"></i>
           <span>Asuntos Academicos</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
       </a>
       <ul class="treeview-menu">               
        <li><a href="#Carrera" role="tab" data-toggle="tab"><i class="fas fa-university"></i> Carrera </a></li>
        <li><a href="#Semestre" role="tab" data-toggle="tab"><i class="fas fa-book-open"></i></i> Semestre </a></li>
        <li><a href="#Cursos" role="tab" data-toggle="tab"><i class="fas fa-chalkboard"></i> Cursos </a></li>
      </ul>
    </li>
    
    <li class="treeview">
      <a href="#">
        <i class="fas fa-line-chart"></i>
        <span>Proyección</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">               
        <li><a href="#Proyeccion" role="tab" data-toggle="tab"><i class="fas fa-line-chart"></i></i> Proyección </a></li>        
      </ul>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="fas fa-users"></i>
        <span>Personal</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">               
        <li><a href="#Usuarios" role="tab" data-toggle="tab"><i class="fas fa-user"></i></i> Usuario </a></li>
        <li><a href="#Tipo_Usuarios" role="tab" data-toggle="tab"><i class="fas fa-users-cog"></i> Tipo Usuario </a></li>      
      </ul>
    </li>
    
 </ul>
</section>
<!-- /.sidebar -->
</aside>


<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Panel Administrador</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
           <div class="row">
            <div class="col-md-12 tab-content">
              <!--Contenido-->        

              <!--==============================Panel Muncipio===============================-->
              <div role="tabpanel" class="tab-pane fade" id="Municipio">
                <div class="row">

                  <div class="col-xs-12">
                    <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalMunicipio"><i class="fas fa-plus"></i> Nuevo Municipio</button>
                    <h2 class="text-primary text-center"><small><i class="fas fa-map-marked-alt"></i></small>&nbsp;&nbsp;Panel de Municipios</h2>

                    <div class="table-responsive" >                            
                      <div class="form-group col-xs-12">
                        <input type="search" class="form-control all-elements-tooltip" placeholder="Buscar... por Municipio" name="busquedamunicipio" id="busquedamunicipio" title="Puedes buscar por: Nombre, Telefono o Email">
                      </div>                                                                                                             
                      <div id="tabla-resultado-municipio"></div>
                    </div>
                  </div>
                </div>
              </div>
        
          <!--==============================Panel Tipo Usuarios===============================-->
          <div role="tabpanel" class="tab-pane" id="Tipo_Usuarios">
            <div class="row">                                     
              <div class="col-xs-12">
                <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalTipUs"><i class="fas fa-plus"></i> Nuevo Rol</button>
                <h2 class="text-primary text-center"><small><i class="fas fa-users"></i></small>&nbsp;&nbsp;Panel de Roles</h2>

                <div class="table-responsive" >                         
                  <div class="form-group col-xs-12">
                    <input type="search" class="form-control all-elements-tooltip" placeholder="Buscar... por Nombre del Rol" name="busquedatipus" id="busquedatipus" title="Puedes buscar por: Nombre del Rol">
                  </div>                                                                                                                                                                       
                  <div id="tabla-resultado-tipo_usu"></div>
                </div>
              </div>
            </div>
          </div>

          <!--==============================Panel Carrera===============================-->
          <div role="tabpanel" class="tab-pane" id="Carrera">
            <div class="row">                                     
              <div class="col-xs-12">
                <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalCarrera"><i class="fas fa-plus"></i> Nueva Carrera</button>
                <h2 class="text-primary text-center"><small><i class="fas fa-university"></i></small>&nbsp;&nbsp;Panel de Carreras</h2>

                <div class="table-responsive" >                         
                  <div class="form-group col-xs-12">
                    <input type="search" class="form-control all-elements-tooltip" placeholder="Buscar... por Nombre" name="busquedacarr" id="busquedacarr" title="Puedes buscar por: Nombre">
                  </div>                                                                                                                                                                       
                  <div id="tabla-resultado-carrera"></div>
                </div>
              </div>
            </div>
          </div>


           <!--==============================Panel Semestre===============================-->
           <div role="tabpanel" class="tab-pane" id="Semestre">
            <div class="row">                                     
              <div class="col-xs-12">
                <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalSemestre"><i class="fas fa-plus"></i> Nuevo Semestre</button>
                <h2 class="text-primary text-center"><small><i class="fas fa-book-open"></i></small>&nbsp;&nbsp;Panel de Semestres</h2>

                <div class="table-responsive" >                         
                  <div class="form-group col-xs-12">
                    <input type="search" class="form-control all-elements-tooltip" placeholder="Buscar... por Nombre" name="busquedasem" id="busquedasem" title="Puedes buscar por: Nombre">
                  </div>                                                                                                                                                                       
                  <div id="tabla-resultado-semestre"></div>
                </div>
              </div>
            </div>
          </div>

           <!--==============================Panel Cursos===============================-->
           <div role="tabpanel" class="tab-pane" id="Cursos">
            <div class="row">                                     
              <div class="col-xs-12">
                <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalCursos"><i class="fas fa-plus"></i> Nuevo Curso</button>
                <h2 class="text-primary text-center"><small><i class="fas fa-chalkboard"></i></small>&nbsp;&nbsp;Panel de Cursos</h2>

                <div class="table-responsive" >                         
                  <div class="form-group col-xs-12">
                    <input type="search" class="form-control all-elements-tooltip" placeholder="Buscar... por Nombre" name="busquedacurso" id="busquedacurso" title="Puedes buscar por: Nombre">
                  </div>                                                                                                                                                                       
                  <div id="tabla-resultado-curso"></div>
                </div>
              </div>
            </div>
          </div>

          <!--==============================Panel Usuarios===============================-->
          <div role="tabpanel" class="tab-pane fade" id="Usuarios">
            <div class="row">                                     
              <div class="col-xs-12">
                <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalUsuario"><i class="fas fa-plus"></i> Nuevo Usuario</button>
                <h2 class="text-primary text-center"><small><i class="fas fa-users"></i></small>&nbsp;&nbsp;Panel de Usuarios</h2>

                <div class="table-responsive" >                         
                  <div class="form-group col-xs-12">
                    <input type="search" class="form-control all-elements-tooltip" placeholder="Buscar... por Nombre, Apellido, Email o Sexo" name="busquedaus" id="busquedaus" title="Puedes buscar por: Nombre, Apellido, Email o Sexo">
                  </div>                                                                                                                                                                       
                  <div id="tabla-resultado-us"></div>
                </div>
              </div>
            </div>
          </div>

          <!--==============================Panel Asignación Maestro Curso===============================-->
          <div role="tabpanel" class="tab-pane fade" id="Cursomaestro">
            <div class="row">                                     
              <div class="col-xs-12">
                <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalCursoMaestro"><i class="fas fa-plus"></i> Asignar Maestro</button>
                <h2 class="text-primary text-center"><small><i class="fas fa-chalkboard-teacher"></i></small>&nbsp;&nbsp;Panel de Asignación Maestro Curso</h2>

                <div class="table-responsive" >                         
                  <div class="form-group col-xs-12">
                    <input type="search" class="form-control all-elements-tooltip" placeholder="Buscar... por Codigo" name="busquedacursomaes" id="busquedacursomaes" title="Puedes buscar por: Codigo">
                  </div>                                                                                                                                                                       
                  <div id="tabla-resultado-cursomaestro"></div>
                </div>
              </div>
            </div>
          </div>

          <!--==============================Panel Asignación Alumno Curso===============================-->
          <div role="tabpanel" class="tab-pane fade" id="Cursoalumno">
            <div class="row">                                     
              <div class="col-xs-12">
                <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalCursoAlumno"><i class="fas fa-plus"></i> Asignar Alumno</button>
                <h2 class="text-primary text-center"><small><i class="fas fa-book-reader"></i></small>&nbsp;&nbsp;Panel de Asignación Alumno Curso</h2>

                <div class="table-responsive" >                         
                  <div class="form-group col-xs-12">
                    <input type="search" class="form-control all-elements-tooltip" placeholder="Buscar... por Codigo" name="busquedacursoal" id="busquedacursoal" title="Puedes buscar por: Codigo">
                  </div>                                                                                                                                                                       
                  <div id="tabla-resultado-cursoalumno"></div>
                </div>
              </div>
            </div>
          </div>

          <!--==============================Panel Proyeccion===============================-->
          <div role="tabpanel" class="tab-pane active" id="Proyeccion">
            <div class="row">                                     
              <div class="col-xs-12">                
                <h2 class="text-primary text-center"><small><i class="fas fa-line-chart"></i></small>&nbsp;&nbsp;Panel Proyección</h2>
                    
                <div class="table-responsive">                                        
                                    
                  <div id="tabla-resultado-proyeccion">
                  <?php 
                        
                        //Inicio Codigo que consulta el total de estudiantes de la Institucion
                        $total = 0;
                        $tabla ="";                        
                        
                        $total_al = mysqli_query($conn, "SELECT * FROM usuarios");
                        while($totalal=mysqli_fetch_array($total_al))
                        {                           
                          $total_tipo=mysqli_query($conn, "SELECT * FROM tipousuario WHERE nombre = 'Alumno'");
                          while($tipotot=mysqli_fetch_array($total_tipo))
                          {
                            if($totalal['idtipousuario']  == $tipotot['idtipousuario'])
                            {
                              $total = $total+1;
                            }  
                          }
                        }                    
                        
                        //Inicio Codigo que consulta el total de municipios y los muestra en una tabla
                        $tabla.='
                              <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead bgcolor="#f1cc00" align="center">
                              <tr>
                              <th class="text-center">Carrera</th>
                        ';                            

                        $total_mun = mysqli_query($conn, "SELECT * FROM municipio ORDER BY idmunicipio ASC");
                        while($totalmun=mysqli_fetch_array($total_mun))
                        {
                          $tabla.='<th class="text-center">'.$totalmun['nombre'].'</th>
                          ';                      
                        }
                        $tabla.='</tr>
                                </thead>
                                <tr>
                        ';
                        

                        //Inicio Codigo que consulta estudiantes por carrera y municipio                
                        $carrera_tot=mysqli_query($conn, "SELECT * FROM carrera ORDER BY idcarrera ASC");
                        while($filacarrera=mysqli_fetch_array($carrera_tot))
                        {
                          $tabla.='<td class="table-secondary text-center">'.$filacarrera['nombre'].'</td>';  

                          $municipio_tot=mysqli_query($conn, "SELECT * FROM municipio ORDER BY idmunicipio ASC");
                          while($filamunicipio=mysqli_fetch_array($municipio_tot))
                          {
                            $contador=0;
                            
                            $tipo_tot=mysqli_query($conn, "SELECT * FROM tipousuario WHERE nombre='Alumno'");
                            while($filatipo=mysqli_fetch_array($tipo_tot))
                            {
                              
                              $alumnos_tot=mysqli_query($conn, "SELECT * FROM usuarios WHERE idtipousuario='".$filatipo['idtipousuario']."'");
                              while($filaalumnos=mysqli_fetch_array($alumnos_tot))
                              {
                                if($filaalumnos['idcarrera']  == $filacarrera['idcarrera'] && $filaalumnos['idmunicipio'] == $filamunicipio['idmunicipio'])
                                {
                                  $contador = $contador+1;                                  
                                }                                  
                              }                                                            
                            }         
                            
                            $porcentaje = $contador/$total;
                            $porcentaje = round($porcentaje, 2); 
                            $tabla.='<td class="table-secondary text-center">'.$porcentaje.'</td>';                         
                          }

                          $tabla.='</tr><tr>';
                        }
                        
                        $tabla.='</table>';
                        
                        echo $tabla;
                        
                        
                        ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

            <!--Fin Contenido-->
          </div>
        </div>

      </div>
    </div><!-- /.row -->
  </div><!-- /.box-body -->
</div><!-- /.box -->
</div><!-- /.col -->
</div><!-- /.row -->

<!----------------------------------------- MODAL MUNICIPIOS ----------------------------------------------------->

<!-- Modal para registros municipio -->
<div class="modal fade" id="modalMunicipio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #3c8dbc; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="exampleModalLabel">NUEVO MUNICIPIO:</h4>
      </div>
      <div class="modal-body">


        <div class="form-group col-md-6">
          <label>Nombre Municipio</label>
          <input type="text"  id="nombremun" class="form-control input-sm" placeholder="Chiquimulilla">
        </div>        
        <div class="modal-footer">
          <script> 
          </script>
          <button class="btn btn-primary btn-md" style="padding-top: 0px;" id="btn_actualizar" onclick="pasarDatosMunicipio();">Registrar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Editar Municipio-->
<div class="modal fade" id="myModalEditarMunicipio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #00a65a; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="exampleModalLabel">EDITAR REGISTRO:</h4>
      </div>
      <div class="modal-body">
        <p>Editar datos Municipio</p>
        <div id="panel_editar_municipio"></div>
        <div id="respuesta_editar_municipio"></div>
        <div class="modal-footer">
          <button class="btn btn-success btn-md" id="btn_editar_municipio" onclick="pasarDatos_act_m();">Actualizar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Eliminar Municipio -->
<div id="myModalEliminarMunicipio" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #d9534f; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Eliminar Registro</h4>
      </div>
      <div class="modal-body">
        <p class="text-red" >NOTA: <small>Esta acción no se puede deshacer.</small></p>
        <hr>
        <div id="panel_eliminar_municipio"></div>
        <div id="respuesta_eliminar_mun"></div>
        <div class="modal-footer"> 
          <button type="button" class="btn btn-primary" onclick="eliminar_municipio()">Eliminar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!----------------------------------------- MODAL TIPO USUARIOS ---------------------------------------------------->

<!-- Modal para registros nuevo tipo usuarios -->
<div class="modal fade" id="modalTipUs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #3c8dbc; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="exampleModalLabel">NUEVO ROL:</h4>
      </div>
      <div class="modal-body">
        <div class="form-group col-md-12">
         <label>Nombre del Rol</label>
         <input type="text" name="" id="nombreper" class="form-control input-sm" required="requiered" placeholder="Administrador">
       </div>
       <div class="form-group col-md-12">
         <label>Descripcion</label>
         <input type="text" name="" id="descripcionper" class="form-control input-sm" placeholder="Este usuario tiene pribiliegios de....." >
       </div>
     </div>
     <div class="modal-footer">
      <button class="btn btn-primary btn-md" style="padding-top: 0px;" id="btn_editar_tipousuario" onclick="pasarDatosTipUs();" >Registrar</button>
    </div>
  </div>
</div>
</div>

<!-- Modal Editar Tipo Usuario-->
<div class="modal fade" id="myModalEditarmodalTipoUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #00a65a; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="exampleModalLabel">EDITAR REGISTRO:</h4>
      </div>
      <div class="modal-body">
        <p>Editar Datos del Rol</p>
        <div id="panel_editar_tipousuario"></div>
        <div id="respuesta_editar_tipousuario"></div>
        <div class="modal-footer">
          <button class="btn btn-success btn-md" id="btn_editar_tipousuario" onclick="pasarDatos_act_tipousuario();">Actualizar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Eliminar Tipo Usuario -->
<div id="myModalEliminarmodalTipoUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #d9534f; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Eliminar Registro</h4>
      </div>
      <div class="modal-body">
        <p class="text-red" >NOTA: <small>Esta acción no se puede deshacer.</small></p>
        <hr>
        <div id="panel_eliminar_tipousuario"></div>
        <div id="respuesta_eliminar_tipousuario"></div>
        <div class="modal-footer"> 
          <button type="button" class="btn btn-primary" onclick="eliminar_tipousuario()">Eliminar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>


<!----------------------------------------- MODAL CARRERA ---------------------------------------------------->

<!-- Modal para registros nueva carrera -->
<div class="modal fade" id="modalCarrera" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #3c8dbc; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="exampleModalLabel">NUEVA CARRERA</h4>
      </div>
      <div class="modal-body">
        <div class="form-group col-md-12">
         <label>Nombre de la Carrera</label>
         <input type="text" name="" id="nombrecarr" class="form-control input-sm" required="requiered" placeholder="Ingeniería">
       </div>       
     </div>
     <div class="modal-footer">
      <button class="btn btn-primary btn-md" style="padding-top: 0px;" id="btn_editar_carrera" onclick="pasarDatosCarrera();" >Registrar</button>
    </div>
  </div>
</div>
</div>

<!-- Modal Editar Carrera-->
<div class="modal fade" id="myModalEditarmodalCarrera" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #00a65a; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="exampleModalLabel">EDITAR REGISTRO:</h4>
      </div>
      <div class="modal-body">
        <p>Editar Datos de la Carrera</p>
        <div id="panel_editar_carrera"></div>
        <div id="respuesta_editar_carrera"></div>
        <div class="modal-footer">
          <button class="btn btn-success btn-md" id="btn_editar_carrera" onclick="pasarDatos_act_carrera();">Actualizar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Eliminar Carrera -->
<div id="myModalEliminarmodalCarrera" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #d9534f; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Eliminar Registro</h4>
      </div>
      <div class="modal-body">
        <p class="text-red" >NOTA: <small>Esta acción no se puede deshacer.</small></p>
        <hr>
        <div id="panel_eliminar_carrera"></div>
        <div id="respuesta_eliminar_carrera"></div>
        <div class="modal-footer"> 
          <button type="button" class="btn btn-primary" onclick="eliminar_carrera()">Eliminar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!----------------------------------------- MODAL SEMESTRES ----------------------------------------------------->

<!-- Modal para registros semestre -->
<div class="modal fade" id="modalSemestre" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #3c8dbc; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="exampleModalLabel">NUEVO SEMESTRE:</h4>
      </div>
      <div class="modal-body">


        <div class="form-group col-md-6">
          <label>Nombre Semestre</label>
          <input type="text"  id="nombresem" class="form-control input-sm" placeholder="Primer Ciclo">
        </div>
        <div class="form-group col-md-6">
          <label>Carrera</label>
          <select class="form-control" name="carrera" id="carrera" >
            <?php
            
            $carrera = mysqli_query($conn, "SELECT * FROM carrera");
            while ($carrera_= mysqli_fetch_array($carrera)) 
            {
              echo'<option value = "'.$carrera_['idcarrera'].'">'.$carrera_['nombre'].'</option>';
            }
            ?>
          </select>
        </div>
        <div class="modal-footer">
          <script> 
          </script>
          <button class="btn btn-primary btn-md" style="padding-top: 0px;" id="btn_actualizar" onclick="pasarDatosSemestre();">Registrar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Editar Semestre-->
<div class="modal fade" id="myModalEditarmodalSemestre" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #00a65a; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="exampleModalLabel">EDITAR REGISTRO:</h4>
      </div>
      <div class="modal-body">
        <p>Editar datos Semestre</p>
        <div id="panel_editar_semestre"></div>
        <div id="respuesta_editar_semestre"></div>
        <div class="modal-footer">
          <button class="btn btn-success btn-md" id="btn_editar_semestre" onclick="pasarDatos_act_semestre();">Actualizar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Eliminar Semestre -->
<div id="myModalEliminarmodalSemestre" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #d9534f; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Eliminar Registro</h4>
      </div>
      <div class="modal-body">
        <p class="text-red" >NOTA: <small>Esta acción no se puede deshacer.</small></p>
        <hr>
        <div id="panel_eliminar_semestre"></div>
        <div id="respuesta_eliminar_semestre"></div>
        <div class="modal-footer"> 
          <button type="button" class="btn btn-primary" onclick="eliminar_semestre()">Eliminar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>


<!----------------------------------------- MODAL CURSOS ----------------------------------------------------->

<!-- Modal para registros Cursos -->
<div class="modal fade" id="modalCursos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #3c8dbc; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="exampleModalLabel">NUEVO CURSO:</h4>
      </div>
      <div class="modal-body">


        <div class="form-group col-md-12">
          <label>Nombre Curso</label>
          <input type="text"  id="nombrecur" class="form-control input-sm" placeholder="Programación I">
        </div>
        <div class="form-group col-md-6">
          <label>Requisito</label>
          <input type="text"  id="requisitocur" class="form-control input-sm" placeholder="----">
        </div>
        <div class="form-group col-md-6">
          <label>Creditos</label>
          <input type="text"  id="creditoscur" class="form-control input-sm" placeholder="5">
        </div>
        <div class="form-group col-md-6">
          <label>Carrera</label>
          <select class="form-control" name="carreracur" id="carreracur" required onchange="CargarSemestre(this.value);">
            <option>---Seleccione una Carrera---</option>
            <?php            
            $carrera = mysqli_query($conn, "SELECT * FROM carrera");
            while ($carrera_= mysqli_fetch_array($carrera)) 
            {
              echo'<option value = "'.$carrera_['idcarrera'].'">'.$carrera_['nombre'].'</option>';
            }
            ?>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label>Semestre</label>
          <select class="form-control" name="semestrecur" id="semestrecur" required>
            <option>---Seleccione un Semestre---</option>
          </select>
        </div>
        <div class="modal-footer">
          <script> 
          </script>
          <button class="btn btn-primary btn-md" style="padding-top: 0px;" id="btn_actualizar" onclick="pasarDatosCursos();">Registrar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Editar Cursos-->
<div class="modal fade" id="myModalEditarmodalCursos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #00a65a; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="exampleModalLabel">EDITAR REGISTRO:</h4>
      </div>
      <div class="modal-body">
        <p>Editar datos Cursos</p>
        <div id="panel_editar_curso"></div>
        <div id="respuesta_editar_curso"></div>
        <div class="modal-footer">
          <button class="btn btn-success btn-md" id="btn_editar_semestre" onclick="pasarDatos_act_cursos();">Actualizar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Eliminar Cursos -->
<div id="myModalEliminarmodalCursos" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #d9534f; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Eliminar Registro</h4>
      </div>
      <div class="modal-body">
        <p class="text-red" >NOTA: <small>Esta acción no se puede deshacer.</small></p>
        <hr>
        <div id="panel_eliminar_curso"></div>
        <div id="respuesta_eliminar_curso"></div>
        <div class="modal-footer"> 
          <button type="button" class="btn btn-primary" onclick="eliminar_cursos()">Eliminar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!----------------------------------------- MODAL USUARIOS ------------------------------------------------->

<!-- Modal para registros nuevos Usuarios-->
<div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #3c8dbc; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="exampleModalLabel">NUEVO USUARIO:</h4>
      </div>
      <div class="modal-body">        
        <div class="form-group col-md-6">
          <label>Nombre</label>
          <input type="text" name="" id="nombre" class="form-control input-sm" placeholder="Juan Miguel">
        </div>
        <div class="form-group col-md-6">
          <label>Apellido</label>
          <input type="text" name="" id="apellido" class="form-control input-sm" placeholder="Garcia Herrera">
        </div>
        <div class="form-group col-md-6">
          <label>Telefono</label>
          <input type="text" name="" id="telefono" class="validantelefono form-control input-sm" placeholder="88223412">
        </div>
        <div class="form-group col-md-6">
          <label>Sexo</label>
          <input type="text" name="" id="sexo" class="form-control input-sm" placeholder="M">
        </div>

        <div class="form-group col-md-12">
          <label>Direccion</label>
          <input type="text" name="" id="direccion" class="form-control input-sm" placeholder="Ave. Ingreso Zona 2">
        </div>

        <div class="form-group col-md-6">
          <label>Email</label>
          <input type="email" name="" id="email" class="form-control input-sm" placeholder="mycorreo@gmail.com">
        </div>
        <div class="form-group col-md-6">
          <label>Password</label>
          <input type="password" name="" id="pass" class="form-control input-sm">
        </div>
        
        <div class="form-group col-md-6">
          <label>Carnet</label>
          <input type="text" name="" id="carnet" class="form-control input-sm" placeholder="1790-10-23425">
        </div>
        <div class="form-group col-md-6">
          <label>Titulo</label>
          <input type="text" name="" id="titulo" class="form-control input-sm" placeholder="Ing. Electronico">
        </div>

        <div class="form-group col-md-6">
          <label>Tipo de Usuario</label>
          <select class="form-control" name="tipo_usuario" id="tipo_usuario">
            <?php
            
            $tipousuario = mysqli_query($conn, "SELECT * FROM tipousuario");
            while ($tipo_usuario= mysqli_fetch_array($tipousuario)) 
            {
              echo'<option value = "'.$tipo_usuario['idtipousuario'].'">'.$tipo_usuario['nombre'].'</option>';
            }
            ?>
          </select>
        </div>        
      
        <div class="form-group col-md-6">
          <label>Municipio</label>
          <select class="form-control" name="id_municipio" id="id_municipio">
            <?php
            
            $municipio = mysqli_query($conn, "SELECT * FROM municipio");
            while ($municipio_= mysqli_fetch_array($municipio)) 
            {
              echo'<option value = "'.$municipio_['idmunicipio'].'">'.$municipio_['nombre'].'</option>';
            }
            ?>
          </select>
        </div>
        <div class="form-group col-md-12">
          <label>Carrera</label>
          <select class="form-control" name="id_carrera" id="id_carrera">
            <?php
            
            $carrera = mysqli_query($conn, "SELECT * FROM carrera");
            while ($tipo_carrera= mysqli_fetch_array($carrera)) 
            {
              echo'<option value = "'.$tipo_carrera['idcarrera'].'">'.$tipo_carrera['nombre'].'</option>';
            }
            ?>
          </select>
        </div>
        <div class="modal-footer">
          <script> 
          </script>
          <button class="btn btn-primary btn-md" style="padding-top: 0px;" id="btn_actualizar" onclick="pasarDatosUsuarios();">Registrar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Editar Usuario -->
<div class="modal fade" id="myModalEditarUsuarios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #00a65a; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="exampleModalLabel">EDITAR REGISTRO:</h4>
      </div>
      <div class="modal-body">
        <p>Editar datos Usuario</p>
        <div id="panel_editar_usuario"></div>
        <div id="respuesta_editar_usuario"></div>
        <div class="modal-footer">
          <button class="btn btn-success btn-md" id="btn_actualizar" onclick="pasarDatos_act();">Actualizar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Eliminar Usuario -->
<div id="myModalEliminarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #d9534f; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Eliminar Registro</h4>
      </div>
      <div class="modal-body">
        <p class="text-red" >NOTA: <small>Esta acción no se puede deshacer.</small></p>
        <hr>
        <div id="panel_eliminar_usuario"></div>
        <div id="respuesta_eliminar"></div>
        <div class="modal-footer"> 
          <button type="button" class="btn btn-primary" onclick="eliminar_usuario()">Eliminar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!----------------------------------------- MODAL MAESTRO CURSO ----------------------------------------------------->

<!-- Modal para registros Curso Maestro -->
<div class="modal fade" id="modalCursoMaestro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #3c8dbc; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="exampleModalLabel">NUEVA ASIGNACIÓN:</h4>
      </div>
      <div class="modal-body">

        <div class="form-group col-md-12">
          <label>Carrera</label>
          <select class="form-control" name="carreracurmaes" id="carreracurmaes" required onchange="CargarSemestreMaestro(this.value);">
            <option>---Seleccione una Carrera---</option>
            <?php            
            $carrera = mysqli_query($conn, "SELECT * FROM carrera");
            while ($carrera_= mysqli_fetch_array($carrera)) 
            {
              echo'<option value = "'.$carrera_['idcarrera'].'">'.$carrera_['nombre'].'</option>';
            }
            ?>
          </select>
        </div>
        <div class="form-group col-md-12">
          <label>Semestre</label>
          <select class="form-control" name="semestremaes" id="semestremaes" required onchange="CargarCursoMaestro(this.value);">
            <option>---Seleccione un Semestre---</option>
          </select>
        </div>
        <div class="form-group col-md-12">
          <label>Curso</label>
          <select class="form-control" name="cursomaes" id="cursomaes" required>
            <option>---Seleccione un Curso---</option>
          </select>
        </div>
        <div class="form-group col-md-12">
          <label>Maestro</label>
          <select class="form-control" name="maestrocur" id="maestrocur" required>
            <option>---Seleccione un Maestro---</option>
            <?php            
            $maestro = mysqli_query($conn, "SELECT * FROM usuarios");
            while ($maestro_= mysqli_fetch_array($maestro)) 
            {
              $nombre_tipo=mysqli_query($conn, "SELECT * FROM tipousuario WHERE nombre='Maestro'");
              while($filatipo=mysqli_fetch_array($nombre_tipo))
              {
                if($maestro_['idtipousuario']  == $filatipo['idtipousuario'])
                {
                  echo'<option value = "'.$maestro_['idusuarios'].'">'.$maestro_['nombre'].' '.$maestro_['apellido'].'</option>';
                }
              }              
            }
            ?>
          </select>
        </div>
        <div class="modal-footer">
          <script> 
          </script>
          <button class="btn btn-primary btn-md" style="padding-top: 0px;" id="btn_actualizar" onclick="pasarDatosCursoMaestro();">Registrar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Eliminar Curso Maestro -->
<div id="myModalEliminarmodalCursoMaestro" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #d9534f; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Eliminar Registro</h4>
      </div>
      <div class="modal-body">
        <p class="text-red" >NOTA: <small>Esta acción no se puede deshacer.</small></p>
        <hr>
        <div id="panel_eliminar_curso_maestro"></div>
        <div id="respuesta_eliminar_curso_maestro"></div>
        <div class="modal-footer"> 
          <button type="button" class="btn btn-primary" onclick="eliminar_CursoMaestro()">Eliminar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!----------------------------------------- MODAL ALUMNO CURSO ----------------------------------------------------->

<!-- Modal para registros Curso Alumno -->
<div class="modal fade" id="modalCursoAlumno" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #3c8dbc; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="exampleModalLabel">NUEVA ASIGNACIÓN:</h4>
      </div>
      <div class="modal-body">

        <div class="form-group col-md-12">
          <label>Carrera</label>
          <select class="form-control" name="carreracural" id="carreracural" required onchange="CargarSemestreAlumno(this.value);">
            <option>---Seleccione una Carrera---</option>
            <?php            
            $carrera = mysqli_query($conn, "SELECT * FROM carrera");
            while ($carrera_= mysqli_fetch_array($carrera)) 
            {
              echo'<option value = "'.$carrera_['idcarrera'].'">'.$carrera_['nombre'].'</option>';
            }
            ?>
          </select>
        </div>
        <div class="form-group col-md-12">
          <label>Semestre</label>
          <select class="form-control" name="semestreal" id="semestreal" required onchange="CargarCursoAlumno(this.value);">
            <option>---Seleccione un Semestre---</option>
          </select>
        </div>
        <div class="form-group col-md-12">
          <label>Curso</label>
          <select class="form-control" name="cursoal" id="cursoal" required>
            <option>---Seleccione un Curso---</option>
          </select>
        </div>
        <div class="form-group col-md-12">
          <label>Alumno</label>
          <select class="form-control" name="alumnocur" id="alumnocur" required>
            <option>---Seleccione un Alumno---</option>
            <?php            
            $maestro = mysqli_query($conn, "SELECT * FROM usuarios");
            while ($maestro_= mysqli_fetch_array($maestro)) 
            {
              $nombre_tipo=mysqli_query($conn, "SELECT * FROM tipousuario WHERE nombre='Alumno'");
              while($filatipo=mysqli_fetch_array($nombre_tipo))
              {
                if($maestro_['idtipousuario']  == $filatipo['idtipousuario'])
                {
                  echo'<option value = "'.$maestro_['idusuarios'].'">'.$maestro_['nombre'].' '.$maestro_['apellido'].'</option>';
                }
              }              
            }
            ?>
          </select>
        </div>
        <div class="modal-footer">
          <script> 
          </script>
          <button class="btn btn-primary btn-md" style="padding-top: 0px;" id="btn_actualizar" onclick="pasarDatosCursoAlumno();">Registrar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Eliminar Curso Alumno -->
<div id="myModalEliminarmodalCursoAlumno" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #d9534f; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Eliminar Registro</h4>
      </div>
      <div class="modal-body">
        <p class="text-red" >NOTA: <small>Esta acción no se puede deshacer.</small></p>
        <hr>
        <div id="panel_eliminar_curso_alumno"></div>
        <div id="respuesta_eliminar_curso_alumno"></div>
        <div class="modal-footer"> 
          <button type="button" class="btn btn-primary" onclick="eliminar_CursoAlumno()">Eliminar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>

</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<!--Fin-Contenido-->
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>UMG</b>
  </div>
  <strong>Copyright &copy; 2020-2022 </strong> Todos los derechos reservados.
</footer>


<!-- jQuery 2.1.4 -->
<script src="js/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/app.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>
