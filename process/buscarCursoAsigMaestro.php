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
                        <thead bgcolor="#ED6B6B" align="center">
                          <tr>                            
                            <th class="text-center">Maestro</th>                                                         
                            <th class="text-center">Curso</th>                                                        
                          </tr>
                        </thead>
                        <tfoot bgcolor="#ED6B6B" align="center">
                          <tr>
                            <tr>                            
                            <th class="text-center">Maestro</th>                                                        
                            <th class="text-center">Curso</th>                                                        
                          </tr>
                        </tfoot>';

                          while($filaasignacion=mysqli_fetch_array($query))
                          {
                            $nombre_cur=mysqli_query($conn, "SELECT * FROM curso");
                            while($filacurso=mysqli_fetch_array($nombre_cur))
                            {
                              if($filaasignacion['idcurso']  == $filacurso['idcurso'])
                              {
                                $nombre_usu=mysqli_query($conn, "SELECT * FROM usuarios WHERE email='".$_SESSION['emailMaestro']."'");
                                while($filausuarios=mysqli_fetch_array($nombre_usu))
                                {
                                  if($filaasignacion['idusuarios']  == $filausuarios['idusuarios'])
                                  {                                    
                                    $nombre_tipo=mysqli_query($conn, "SELECT * FROM tipousuario WHERE nombre='Maestro'");
                                    while($filatipo=mysqli_fetch_array($nombre_tipo))
                                    {
                                      if($filausuarios['idtipousuario']  == $filatipo['idtipousuario'])
                                      {
                                        $tabla.='
                                          <tr>                                        
                                            <td class="table-secondary text-center">'.$filausuarios['nombre'].' '.$filausuarios['apellido'].'</td>
                                            <td class="table-secondary text-center">'.$filacurso['nombre'].'</td>                                                                                                              
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
                    else
                      {
                        $tabla="No se encontro ninguna coincidencia con sus criterios de busqueda.";
                      }
                      $tabla.='</table>';
                      echo $tabla;
                  ?>