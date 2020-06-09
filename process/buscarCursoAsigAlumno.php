<?php
                                  include '../conexion/conexion.php';
                                  $tabla = "";

                                    $query = mysqli_query($conn, "SELECT * FROM asignacion_usuario");
                                    $verificar=mysqli_num_rows($query);


                                    if(isset($_POST['cursomaes'])){   
                                        $q=mysqli_real_escape_string($conn, $_POST['cursomaes']);
                                        $query=mysqli_query($conn, "SELECT * FROM asignacion_usuario WHERE                                               
                                         idasignacion_usuario LIKE '%" .$q. "%' OR 
                                         idusuarios LIKE '%" .$q. "%' OR 
                                         idcurso LIKE '%" .$q. "%'");  

                                      } 
                                  

                    if($verificar>0)
                    {
                          $tabla.='
                          <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead bgcolor="#6299DB" align="center">
                          <tr>                            
                            <th class="text-center">Alumno</th>                                                         
                            <th class="text-center">Curso</th>                                                        
                            <th class="text-center">Maestro</th>   
                            <th class="text-center">Ver Nota</th>   
                          </tr>
                        </thead>
                        <tfoot bgcolor="#6299DB" align="center">
                          <tr>
                            <tr>                            
                            <th class="text-center">Alumno</th>                                                        
                            <th class="text-center">Curso</th>   
                            <th class="text-center">Maestro</th>   
                            <th class="text-center">Ver Nota</th>                                                        
                          </tr>
                        </tfoot>';

                          while($filaasignacion=mysqli_fetch_array($query))
                          {
                            $nombre_cur=mysqli_query($conn, "SELECT * FROM curso");
                            while($filacurso=mysqli_fetch_array($nombre_cur))
                            {
                              if($filaasignacion['idcurso']  == $filacurso['idcurso'])
                              {
                                $nombre_usu=mysqli_query($conn, "SELECT * FROM usuarios WHERE email='".$_SESSION['emailAlumno']."'");
                                while($filausuarios=mysqli_fetch_array($nombre_usu))
                                {
                                  if($filaasignacion['idusuarios']  == $filausuarios['idusuarios'])
                                  {                                    
                                    $nombre_tipo=mysqli_query($conn, "SELECT * FROM tipousuario WHERE nombre='Alumno'");
                                    while($filatipo=mysqli_fetch_array($nombre_tipo))
                                    {
                                      if($filausuarios['idtipousuario']  == $filatipo['idtipousuario'])
                                      {

                                        $nombre_asig=mysqli_query($conn, "SELECT * FROM asignacion_usuario WHERE idcurso ='".$filacurso['idcurso']."'");
                                        while($filaasig=mysqli_fetch_array($nombre_asig))
                                        {
                                          $nombre_mae=mysqli_query($conn, "SELECT * FROM usuarios WHERE idusuarios ='".$filaasig['idusuarios']."'");
                                          while($filamaes=mysqli_fetch_array($nombre_mae))
                                          {
                                            $nombre_tipomae=mysqli_query($conn, "SELECT * FROM tipousuario WHERE idtipousuario ='".$filamaes['idtipousuario']."' AND nombre = 'Maestro'");
                                            while($filatipomae=mysqli_fetch_array($nombre_tipomae))
                                            {
                                              $tabla.='
                                                <tr>                                        
                                                  <td class="table-secondary text-center">'.$filausuarios['nombre'].' '.$filausuarios['apellido'].'</td>
                                                  <td class="table-secondary text-center">'.$filacurso['nombre'].'</td>
                                                  <td class="table-secondary text-center">'.$filamaes['nombre'].' '.$filamaes['apellido'].'</td>
                                                  <td align="center">
												                            <button class="btn btn-success btn-xs" style="width: 30% align="center"; data-toggle="modal"  data-toggle="modal" data-target="#myModalVerNota" onclick="btn_ver_nota('.$filausuarios['idusuarios'].', '.$filacurso['idcurso'].');">Ver Nota</button>
                    	                	          </td>                                    
                                                </tr>
                                              ';

                                            }
                                          }
                                        }                                        

                                      }
                                    }                                    
                                  }

                                }
                                                              
                              }    
                            }
                          }
                  }                  
                    else
                      {
                        $tabla="No se encontro ninguna coincidencia con sus criterios de busqueda.";
                      }
                      $tabla.='</table>';
                      echo $tabla;
                  ?>