 <?php
                                  include '../conexion/conexion.php';
                                  $tabla = "";

                                    $query = mysqli_query($conn, "SELECT * FROM usuarios");
                                    $verificar=mysqli_num_rows($query);


                                    if(isset($_POST['usuarios'])){   
                                        $q=mysqli_real_escape_string($conn, $_POST['usuarios']);
                                        $query=mysqli_query($conn, "SELECT * FROM usuarios WHERE     
                                          nombre LIKE '%" .$q. "%' OR                                           
                                          apellido LIKE '%" .$q. "%' OR
                                          email LIKE '%" .$q. "%' OR
                                          sexo LIKE '%" .$q. "%'");   
                                      } 
                                  

                    if($verificar>0)
                    {
                          $tabla.='
                          <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead bgcolor="#f1cc00" align="center">
                          <tr>                            
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Apellido</th>
                            <th class="text-center">Sexo</th>
                            <th class="text-center">Teléfono</th>
                            <th class="text-center">Dirección</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Rol</th>
                            <th class="text-center">Carrera</th>
                            <th class="text-center">Municipio</th>
                            <th class="text-center">Acciones</th>
                          </tr>
                        </thead>
                        <tfoot bgcolor="#eedc7b" align="center">
                          <tr>
                          <th class="text-center">Nombre</th>
                          <th class="text-center">Apellido</th>
                          <th class="text-center">Sexo</th>
                          <th class="text-center">Teléfono</th>
                          <th class="text-center">Dirección</th>
                          <th class="text-center">Email</th>
                          <th class="text-center">Rol</th>
                          <th class="text-center">Carrera</th>
                          <th class="text-center">Municipio</th>
                            <th class="text-center">Acciones</th>
                          </tr>
                        </tfoot>';

                          while($filausuario=mysqli_fetch_array($query))
                          {
                            $tipousuario=mysqli_query($conn, "SELECT * FROM tipousuario");
                            while($filatipo=mysqli_fetch_array($tipousuario))
                            {
                              if($filausuario['idtipousuario']  == $filatipo['idtipousuario'])
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
                                            <td class="table-secondary text-center">'.$filausuario['nombre'].'</td>
                                            <td class="table-secondary text-center">'.$filausuario['apellido'].'</td>
                                            <td class="table-secondary text-center">'.$filausuario['sexo'].'</td>
                                            <td class="table-secondary text-center">'.$filausuario['telefono'].'</td>
                                            <td class="table-secondary text-center">'.$filausuario['direccion'].'</td>
                                            <td class="table-secondary text-center">'.$filausuario['email'].'</td>
                                            <td class="table-secondary text-center">'.$filatipo['nombre'].'</td>
                                            <td class="table-secondary text-center">'.$filacarrera['nombre'].'</td>
                                            <td class="table-secondary text-center">'.$filamunicipio['nombre'].'</td>
                                                          
                                            <td align="center"><button class="btn btn-success btn-xs" style="width: 30% align="center"; data-toggle="modal"  data-toggle="modal" data-target="#myModalEditarUsuarios" onclick="btn_editar_usuario('.$filausuario['idusuarios'].');"><i class="fas fa-edit"></i></button>
                                              <button class="btn btn-danger btn-xs" style="width: 30% align="center"; data-toggle="modal" data-target="#myModalEliminarUsuario" onclick="btn_eliminar_usuario('.$filausuario['idusuarios'].');"><i class="fas fa-minus-circle"></i></button></td>
                                            </tr>
                                            <tr>';

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
