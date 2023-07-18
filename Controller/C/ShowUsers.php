<?php  
    /** conexion a la base de datos*/
    include "../../Model/conexion.php";


    $consulta       = "SELECT * FROM persona order by fecha_eliminacion asc";
    $resultado      = mysqli_query($conectar, $consulta) or die(mysqli_connect_error());


    /** titulo de la tabla*/
        echo "
        <table class='table table-responsive table-stripted'>
            <thead class='center'>
                <tr>
                    <th>Identificacion</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>direccion</th>
                    <th>usuario</th>
                    <th>Contraseña</th>
                    <th>movil</th>
                    <th>correo</th>
                    <th>Tipo Documento</th>
                    <th>Tipo Persona</th>
                    <th>Rol</th>
                    <th>Creado</th>
                    <th>Modificado</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>";

            /** llenado de la tabla $reg tiene los datos de la consulta */
            while ($reg = mysqli_fetch_array($resultado)) {
            echo "<tbody>";
                $idp = $reg['persona_id'];
                $n = $reg['nombre'];
                $ap = $reg['apellidos'];
                $dir = $reg['direccion'];
                $usu = $reg['usuario'];
                $tel = $reg['telefono'];
                $mail = $reg['email'];
                $tdp = $reg['tipo_doc_id'];
                $tp = $reg['tipo_persona_id'];
                $rol = $reg['rol_id'];
                $fc = $reg['fecha_creacion'];
                $fm = $reg['ultima_modificacion'];
                       
                if($reg['fecha_eliminacion']==null){
                    $estado="Activo";
                }else{
                    $estado="Inactivo";
                }

                /** llenado de la fila con sus datos */
            echo "                                                                 
                <th scope='row'>".$idp."</th>
                <td>".$n."</td>
                <td>".$ap."</td>
                <td>".$dir."</td>
                <td>".$usu."</td>
                <td>"; echo "******";echo"</td>
                <td>".$tel."</td>
                <td>".$mail."</td>
                <td>".$tdp."</td>
                <td>".$tp."</td>
                <td>".$rol."</td>
                <td>".$fc."</td>
                <td>".$fm."</td>
                <td>".$estado."</td>
                <td> 
                <!--  Botones de acciones actualizar activo, eliminar-->
                    <button class='btn btn-success'>
                        <a class='text-light' href='UserUpdate.php?updateid=".$idp."'>Actualizar</a>
                    </button>

                    <button class='btn btn-warning'>
                            <a  class='text-light' href='../../Controller/UserActive.php?activeid=".$idp."'>Activar/<br>Desctivar</a>
                    </button>

                    <!--
                    BOTON FUNCIONAL ELIMINAR SIN CONFIRMACIÓN
                    <button type='button' class='btn btn-danger'><a  class='text-light' href='../../Controller/UserDelete.php?deleteid='.$idp.''>Confirmar Eliminar</a></button>
                    --->

                    <!-- BOTON FUNCIONAL ELIMINAR CON CONFIRMACION -->
                    <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#exampleModal' value='".$idp."'>
                        Eliminar
                    </button>
                    
                    <!-- Modal -->
                    <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabel'>Eliminar Registro</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                <p>Antes de eliminar piense si es necesario eliminar este registro. <br>
                                    Mejor use la opcion de Activar/Desactivar. <br>
                                    Si decide eliminar tenga en cuenta que no es posible recuperar despues este registro</p>
                            </div>
                            <div class='modal-footer'>
                                ".$idp."
                                <button type='button' class='btn btn-success' data-bs-dismiss='modal'>NO Eliminar</button>
                                <button type='button' class='btn btn-danger'><a  class='text-light' href='../../Controller/UserDelete.php?deleteid=".$idp."'>Confirmar Eliminar</a></button>
                            </div>
                        </div>
                        </div>
                    </div>

                </td>
                ";
            }echo"
            </tbody>
        </table>
        ";
?>

