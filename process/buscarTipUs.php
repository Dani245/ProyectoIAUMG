<?php
                                  include '../conexion/conexion.php';
                                  $tabla = "";

                                    $query = mysqli_query($conn, "SELECT * FROM tipousuario");
                                    $verificar=mysqli_num_rows($query);


                                    if(isset($_POST['tipus'])){   
                                        $q=mysqli_real_escape_string($conn, $_POST['tipus']);
                                        $query=mysqli_query($conn, "SELECT * FROM tipousuario WHERE                                               
                                         nombre LIKE '%" .$q. "%'");  

                                      } 
                                  

                    if($verificar>0)
                    {
                          $tabla.='
                          <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead bgcolor="#f1cc00" align="center">
                          <tr>
                            <th class="text-center">Código</th>
                            <th class="text-center">Nombre del Rol</th>
                            <th class="text-center">Descripcion del Rol</th>
                            <th class="text-center">Acciones</th>
                          </tr>
                        </thead>
                        <tfoot bgcolor="#eedc7b" align="center">
                          <tr>
                            <tr>
                            <th class="text-center">Código</th>
                            <th class="text-center">Nombre del Rol</th>
                            <th class="text-center">Descripcion del Rol</th>
                            <th class="text-center">Acciones</th>
                          </tr>
                        </tfoot>';

                          while($filatipousuario=mysqli_fetch_array($query))
                          {
                            
                                    $tabla.='
                                    <tr>
                                      <td class="table-secondary text-center">'.$filatipousuario['idtipousuario'].'</td>
                                      <td class="table-secondary text-center">'.$filatipousuario['nombre'].'</td>
                                      <td class="table-secondary text-center">'.$filatipousuario['descripcion'].'</td>
                                      
                                    
                                                    
                                      <td align="center"><button class="btn btn-success btn-xs" style="width: 30% align="center"; data-toggle="modal"  data-toggle="modal" data-target="#myModalEditarmodalTipoUsuario" onclick="btn_editar_tipousuario('.$filatipousuario['idtipousuario'].');"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger btn-xs" style="width: 30% align="center"; data-toggle="modal" data-target="#myModalEliminarmodalTipoUsuario" onclick="btn_eliminar_tipousuario('.$filatipousuario['idtipousuario'].');"><i class="fas fa-minus-circle"></i></button></td>
                                      </tr>
                                      <tr>';
                                  
                          }
                    }                  
                      else
                      {
                        $tabla="No se encontro ninguna coincidencia con sus criterios de busqueda.";
                      }
                      $tabla.='</table>';
                      echo $tabla;
                  ?>