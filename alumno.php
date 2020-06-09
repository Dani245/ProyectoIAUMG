<?php 

  //valida si la sesion esta iniciada, de lo contrario redirecciona al indice principal
if (!isset($_SESSION['emailAlumno'])) {
  echo '<script> location.href="ingreso.php"; </script>';
}    


include './conexion/conexion.php';

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Alumno</title>
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
     <script type="text/javascript" src="js/alumno.js"></script> 
     <script src="js/datos3.js"></script>   

   </head>
   <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="alumno.php" class="logo">
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
                Alumno
                 <?php
                  //si la sesion no es vacia, muestra el email del usuario

                 if (!$_SESSION['emailAlumno']=="") {                    
                  echo '<h4 class="hidden-xs">'.$_SESSION['emailAlumno'].'</h4>';                      
                }

                ?>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">

                  <?php
                  //mostramos datos del usuario                  

                  if (!$_SESSION['emailAlumno']=="") {                    

                    $verAlumno=mysqli_query($conn, "SELECT * FROM usuarios WHERE email='".$_SESSION['emailAlumno']."'");
                    $alumno=mysqli_fetch_array($verAlumno);
                    $alumnonombre=$alumno['nombre'];    
                    $alumnoapellido=$alumno['apellido'];
                    $alumnoemail=$alumno['email'];
                    $consultacarrera=$alumno['idcarrera'];

                    $consultacarr=mysqli_query($conn, "SELECT * FROM carrera WHERE idcarrera='".$consultacarrera."'"); 

                    while($carr=mysqli_fetch_array($consultacarr)){
                      $alumnocarrera=$carr['nombre'];
                    }                                        
                    echo '<p>'.$alumnonombre.'</p>';                      
                    echo '<p>'.$alumnoapellido.'</p>';                      
                    echo '<p>'.$alumnoemail.'</p>';                      
                    echo '<p>'.$alumnocarrera.'</p>';    
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
               <i class="fas fa-clipboard"></i>
               <span>Cursos Asignados</span>
               <i class="fa fa-angle-left pull-right"></i>
             </a>
             <ul class="treeview-menu">                
              <li><a href="#Cursomaestro" role="tab" data-toggle="tab"><i class="fas fa-chalkboard-teacher"></i> Maestro - Curso</a></li>                  
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
        <li><a href="#Semestre" role="tab" data-toggle="tab"><i class="fas fa-book-open"></i></i> Semestre </a></li>                
      </ul>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="fas fa-users"></i>
        <span>Perfil</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">               
        <li><a href="#Usuarios" role="tab" data-toggle="tab"><i class="fas fa-user"></i></i> Usuario </a></li>        
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
            <h3 class="box-title">Panel Alumno</h3>
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

          <!--==============================Panel Usuario===============================-->
          <div role="tabpanel" class="tab-pane active" id="Usuarios">
            <div class="row">                                     
              <div class="col-xs-12">                
                <h2 class="text-primary text-center"><small><i class="fas fa-users"></i></small>&nbsp;&nbsp;Panel de Usuario</h2>

                <div class="table-responsive" >                         
                  <div class="form-group col-xs-12">                    
                  </div>                                                                                                                                                                       
                  <div id="tabla-resultado-us">
                  <?php                                  
                    $tabla = "";

                    $query = mysqli_query($conn, "SELECT * FROM usuarios WHERE email='".$_SESSION['emailAlumno']."'");
                    $verificar=mysqli_num_rows($query);                                                                      

                    if($verificar>0)
                    {
                          $tabla.='
                          <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead bgcolor="#6299DB" align="center">
                          <tr>                            
                            <th class="text-center">Carnet</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Apellido</th>                                                        
                            <th class="text-center">Creditos</th>
                            <th class="text-center">Dirección</th>                                                                                  
                            <th class="text-center">Municipio</th>
                            <th class="text-center">Acciones</th>
                          </tr>
                        </thead>
                        <tfoot bgcolor="#6299DB" align="center">
                          <tr>
                          <th class="text-center">Carnet</th>
                          <th class="text-center">Nombre</th>
                          <th class="text-center">Apellido</th>  
                          <th class="text-center">Creditos</th>                                                  
                          <th class="text-center">Dirección</th>                                                                        
                          <th class="text-center">Municipio</th>
                            <th class="text-center">Acciones</th>
                          </tr>
                        </tfoot>';

                          while($filausuario=mysqli_fetch_array($query))
                          {                           
                            $carrera=mysqli_query($conn, "SELECT * FROM carrera");
                            while($filacarrera=mysqli_fetch_array($carrera))
                            {
                              if($filausuario['idcarrera']  == $filacarrera['idcarrera'])
                              {
                                $municipio=mysqli_query($conn, "SELECT * FROM municipio");
                                while($filamunicipio=mysqli_fetch_array($municipio))
                                {
                                  if($filausuario['idmunicipio']  == $filamunicipio['idmunicipio'])
                                  {
                                    $tabla.='
                                    <tr>                                    
                                      <td class="table-secondary text-center">'.$filausuario['carnet'].'</td>
                                      <td class="table-secondary text-center">'.$filausuario['nombre'].'</td>
                                      <td class="table-secondary text-center">'.$filausuario['apellido'].'</td>                                      
                                      <td class="table-secondary text-center">'.$filausuario['creditos'].'</td>
                                      <td class="table-secondary text-center">'.$filausuario['direccion'].'</td>                                      
                                      <td class="table-secondary text-center">'.$filamunicipio['nombre'].'</td>
                                                          
                                      <td align="center">
                                      <button class="btn btn-success btn-xs" style="width: 30% align="center"; data-toggle="modal"  data-toggle="modal" data-target="#myModalEditarUsuarios" onclick="btn_editar_usuario('.$filausuario['idusuarios'].');"><i class="fas fa-edit"></i></button>
                                      </td>
                                    </tr>
                                    <tr>';

                                  }
                                }
                              }
                            }                                                           
                          }
                    }                  
                      else
                      {
                        $tabla="No se encontro ningun registro.";
                      }
                      $tabla.='</table>';
                      echo $tabla;
                  ?>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <!--==============================Panel Semestre===============================-->
          <div role="tabpanel" class="tab-pane fade" id="Semestre">
            <div class="row">                                     
              <div class="col-xs-12">                
                <h2 class="text-primary text-center"><small><i class="fas fa-book-reader"></i></small>&nbsp;&nbsp;Panel Semestre</h2>

                <div class="table-responsive" >                         
                <form class="form-inline text-center" class="form" id="buscarsemestre" name="buscarsemestre">

                  <div class="form-group mx-sm-8">                    
                    <select class="form-control" name="consultasemestre" id="consultasemestre" required>
                      <option>---Seleccione un Semestre---</option>
                      <?php           

                      
                      $query = mysqli_query($conn, "SELECT * FROM semestre WHERE idcarrera = '".$consultacarrera."'");
                      while($filasemestre=mysqli_fetch_array($query))
                      {
                        echo'<option value = "'.$filasemestre['idsemestre'].'">'.$filasemestre['nombre'].'</option>';  
                      }
                                          
                      ?>
                    </select>
                  </div>

                  <div class="form-group mx-sm-3">
                    <button type="submit" class="btn btn-md btn-primary" id="semestre_cursos"><i class="fa fa-search"></i>  Consultar</button>                    
                  </div>
                </form>
                  
                  <br>
                  <br>
                  <div id="tabla-resultado-semestre_curso"></div>
                </div>
              </div>
            </div>
          </div>

           <!--==============================Panel Asignación Maestro Curso===============================-->
           <div role="tabpanel" class="tab-pane fade" id="Cursomaestro">
              <div class="row">                                     
                <div class="col-xs-12">                  
                  <h2 class="text-primary text-center"><small><i class="fas fa-chalkboard-teacher"></i></small>&nbsp;&nbsp;Panel Maestro - Curso</h2>

                  <div class="table-responsive" >                         
                    <div class="form-group col-xs-12">
                      <input type="search" class="form-control all-elements-tooltip" placeholder="Buscar... por Codigo" name="busquedacursomaes" id="busquedacursomaes" title="Puedes buscar por: Codigo">
                    </div>                                                                                                                                                                       
                    <div id="tabla-resultado-cursomaestro"></div>
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

<!----------------------------------------- MODAL USUARIO ------------------------------------------------->

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

<!----------------------------------------- MODAL NOTAS ------------------------------------------------->

<!-- Modal Ver Notas -->
<div class="modal fade" id="myModalVerNota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #00a65a; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="exampleModalLabel">NOTAS: </h4>
      </div>
      <div class="modal-body">        
        <div id="panel_ver_nota"></div>
        <div id="respuesta_ver_nota"></div>
        <div class="modal-footer">          
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!----------------------------------------- MODAL ASIGNAR CURSO ------------------------------------------------->

<!-- Modal Asignar Curso -->
<div class="modal fade" id="myModalAsignarCurso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #00a65a; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="exampleModalLabel">NOTAS: </h4>
      </div>
      <div class="modal-body">        
        <div id="panel_asignar_curso"></div>
        <div id="respuesta_asignar_curso"></div>
        <div class="modal-footer">        
          <button class="btn btn-success btn-md" id="btn_actualizar" onclick="Asignar_curso_alumno();">Asignar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
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
