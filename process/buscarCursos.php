<?php
                                  include '../conexion/conexion.php';
                                  $tabla = "";

                                    $query = mysqli_query($conn, "SELECT * FROM curso");
                                    $verificar=mysqli_num_rows($query);


                                    if(isset($_POST['cursos'])){   
                                        $q=mysqli_real_escape_string($conn, $_POST['cursos']);
                                        $query=mysqli_query($conn, "SELECT * FROM curso WHERE                                               
                                         nombre LIKE '%" .$q. "%' OR 
                                         idsemestre LIKE '%" .$q. "%'");  

                                      } 
                                  

                    if($verificar>0)
                    {
                          $tabla.='
                          <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead bgcolor="#f1cc00" align="center">
                          <tr>
                            <th class="text-center">Código</th>
                            <th class="text-center">Nombre</th>                            
                            <th class="text-center">Requisito</th>                            
                            <th class="text-center">Creditos</th>
                            <th class="text-center">Semestre</th>
                            <th class="text-center">Acciones</th>
                          </tr>
                        </thead>
                        <tfoot bgcolor="#eedc7b" align="center">
                          <tr>
                            <tr>
                            <th class="text-center">Código</th>                            
                            <th class="text-center">Nombre</th>                            
                            <th class="text-center">Requisito</th>                            
                            <th class="text-center">Creditos</th>
                            <th class="text-center">Semestre</th>
                            <th class="text-center">Acciones</th>
                          </tr>
                        </tfoot>';

                          while($filacurso=mysqli_fetch_array($query))
                          {
                            $nombre_sem=mysqli_query($conn, "SELECT * FROM semestre");
                            while($filasemestre=mysqli_fetch_array($nombre_sem))
                            {
                              if($filacurso['idsemestre']  == $filasemestre['idsemestre'])
                              {
                                $nombre_carr=mysqli_query($conn, "SELECT * FROM carrera");
                                while($filacarrera=mysqli_fetch_array($nombre_carr))
                                {
                                  if($filasemestre['idcarrera']  == $filacarrera['idcarrera'])
                                  {

                                    $tabla.='
                                    <tr>
                                      <td class="table-secondary text-center">'.$filacurso['idcurso'].'</td>
                                      <td class="table-secondary text-center">'.$filacurso['nombre'].'</td>
                                      <td class="table-secondary text-center">'.$filacurso['requisito'].'</td>
                                      <td class="table-secondary text-center">'.$filacurso['creditos'].'</td>
                                      <td class="table-secondary text-center">'.$filasemestre['nombre'].'('.$filacarrera['nombre'].')</td>                                         
                                    
                                                    
                                      <td align="center"><button class="btn btn-success btn-xs" style="width: 30% align="center"; data-toggle="modal"  data-toggle="modal" data-target="#myModalEditarmodalCursos" onclick="btn_editar_cursos('.$filacurso['idcurso'].');"><i class="fas fa-edit"></i></button>

                                        <button class="btn btn-danger btn-xs" style="width: 30% align="center"; data-toggle="modal" data-target="#myModalEliminarmodalCursos" onclick="btn_eliminar_cursos('.$filacurso['idcurso'].');"><i class="fas fa-minus-circle"></i></button></td>
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
                        $tabla="No se encontro ninguna coincidencia con sus criterios de busqueda.";
                      }
                      $tabla.='</table>';
                      echo $tabla;
                  ?>