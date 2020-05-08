<?php

include_once( URL.'/php/Modelo/CarreraModelo.php');


$obj = new carreraBD();


if( $_POST ){

    if(isset($_POST['btnAccion'])){

        //Psamos evaluamos el valor del boton
        switch($_POST['btnAccion']){

            case'Agregar':

                $nombre = $_POST['newname'];
                $carrera = $_POST['newclave_carrera'];

                $resultado = $obj->guardarCarrera($nombre,$carrera);
            
                if($resultado){

                echo('<div class="alert alert-success aler t-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Datos Guardados!</strong> Los datos se han guardado de forma exitosa.
                    </div>');
                
                }else{
            
                    echo('<div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Error!</strong> Los datos no pueden ser guardados.
                        </div>');
                }
            break;

            case 'Eliminar':

                $IdCarrera = $_POST['eliminarCarrera'];

                $resultado = $obj->eliminarCarrera( $IdCarrera );

                if($resultado){
                    echo('<div class="alert alert-success aler t-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Datos Eliminados!</strong> Los datos se han eliminado.
                            </div>');
                }else{
                    echo('<div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Error!</strong> Los datos no pueden ser eliminados.
                        </div>');
                }
            break;

            case 'Modificar':

                $IdCarrera = $_POST['IdCarrera'];
                $nombre = $_POST['modName'];
                $carrera = $_POST['modClaveCarrera'];

                $resultado = $obj->ActualizarCarrera($nombre,$carrera,$IdCarrera);

                if($resultado){
                    echo('<div class="alert alert-success aler t-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Datos Actualizadps!</strong> Los datos se han actualizados.
                            </div>');
                }else{
                    echo('<div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Error!</strong> Los datos no pueden ser actualizados.
                        </div>');
                }

            break;

            case 'MostrarFormulario':

                $formularioMod = '
                <div class="alert alert-light alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <form action="" method="post" class="form-group">
                        <h3>Modificar Carrera</h3>
                        <input  type="hidden"  class="form-control" value = "'.$_POST['IdCarrera'].'" name="IdCarrera">
                        <label for="">Fecha de registro: '.$_POST['FechaCarrera'].'</label>
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input  type="text"  class="form-control" name="modName" value = "'.$_POST['NombreCarrera'].'">
                        </div>
        
                        <div class="form-group">
                            <label for="">Clave carrera</label>
                            <input type="text" class="form-control" name="modClaveCarrera" value = "'.$_POST['ClaveCarrera'].'">
                        </div>
                    
                        <button class="btn btn-success btn-block" name = "btnAccion" value = "Modificar" type="submit">Guardar</button>
                    </form>
                </div>
                ';

            break;
        }
    }
}

$matrizCarrera = $obj->seleccionarCarrera();

include_once( URL.'/php/Vista/carrera.php');


?>