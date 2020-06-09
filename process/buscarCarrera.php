<?php
                                  include '../conexion/conexion.php';
                                  $tabla = "";

                                    $query = mysqli_query($conn, "SELECT * FROM carrera");
                                    $verificar=mysqli_num_rows($query);


                                    if(isset($_POST['carrera'])){   
                                        $q=mysqli_real_escape_string($conn, $_POST['carrera']);
                                        $query=mysqli_query($conn, "SELECT * FROM carrera WHERE                                               
                                         nombre LIKE '%" .$q. "%'");  

                                      } 
                                  

                    if($verificar>0)
                    {
                          $tabla.='
                          <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead bgcolor="#f1cc00" align="center">
                          <tr>
                            <th class="text-center">Código</th>
                            <th class="text-center">Nombre de la Carrera</th>                            
                            <th class="text-center">Acciones</th>
                          </tr>
                        </thead>
                        <tfoot bgcolor="#eedc7b" align="center">
                          <tr>
                            <tr>
                            <th class="text-center">Código</th>
                            <th class="text-center">Nombre de la Carrera</th>                            
                            <th class="text-center">Acciones</th>
                          </tr>
                        </tfoot>';

                          while($filacarrera=mysqli_fetch_array($query))
                          {
                            
                                    $tabla.='
                                    <tr>
                                      <td class="table-secondary text-center">'.$filacarrera['idcarrera'].'</td>
                                      <td class="table-secondary text-center">'.$filacarrera['nombre'].'</td>                                      
                                      
                                    
                                                    
                                      <td align="center"><button class="btn btn-success btn-xs" style="width: 30% align="center"; data-toggle="modal"  data-toggle="modal" data-target="#myModalEditarmodalCarrera" onclick="btn_editar_carrera('.$filacarrera['idcarrera'].');"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger btn-xs" style="width: 30% align="center"; data-toggle="modal" data-target="#myModalEliminarmodalCarrera" onclick="btn_eliminar_carrera('.$filacarrera['idcarrera'].');"><i class="fas fa-minus-circle"></i></button></td>
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