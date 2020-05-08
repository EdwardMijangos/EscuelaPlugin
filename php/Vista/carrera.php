<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="container">
    <h2>Carrera</h2>

    <ul class = "nav nav-tabs"> 
      <!-- Formulario de registro de carrera !-->
      <li class = "nav-item">
        <a class="nav-link " data-toggle = "tab" href = "#inicio">Formulario de Registro </a>
      </li>

      <!-- Tabla de carrera !-->

      <li class = "nav-item">
        <a class="nav-link active" data-toggle = "tab" href = "#registro"> Registro carrera </a>
      </li>
    </ul>

    <div class="tab-content">
    <!-- Formulario de registro de carrera !-->
      <div class = "tab-pane container fade" id="inicio">
        <form action="" method="post" class="form-group">
            <div class="form-group">
              <label for="">Nombre</label>
              <input  type="text"  class="form-control" name="newname">
            </div>

            <div class="form-group">
              <label for="">Clave carrera</label>
              <input type="text" class="form-control" name="newclave_carrera">
            </div>
            
            <button class="btn btn-success btn-block" name = 'btnAccion' value = 'Agregar' type="submit">Guardar</button>
          </form>
      </div>

      <!-- Tabla de carrera !-->
      <div class = "tab-pane container active" id="registro">
      <br>
        <div class="row">
          <div class="col-sm-8">
            <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-light">
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Clave</th>
                <th>Fecha registro</th>
                <th>Modificar</th>
                <th>Eliminar</th>
              </tr>
              </thead>
              <tbody>
                <?php
                  foreach($matrizCarrera as $reCarrera){
                    echo '
                      <tr>
                        <td scope="row">'.$reCarrera['id_carrera'].'</td>
                        <td>'.$reCarrera['nombre'].'</td>
                        <td>'.$reCarrera['clave_carrera'].'</td>
                        <td>'.$reCarrera['fecha_registro'].'</td>
                        <td>
                          <form action="" method="post">
                            <input type="hidden" class="form-control" value ="'.$reCarrera['id_carrera'].'" name="IdCarrera">
                            <input type="hidden" class="form-control" value ="'.$reCarrera['nombre'].'" name="NombreCarrera">
                            <input type="hidden" class="form-control" value ="'.$reCarrera['clave_carrera'].'" name="ClaveCarrera">
                            <input type="hidden" class="form-control" value ="'.$reCarrera['fecha_registro'].'" name="FechaCarrera">
                            <button class="btn btn-warning btn-block" name = "btnAccion" value = "MostrarFormulario" type="submit">Modificar</button>
                          </form>
                        </td>
                        <td>
                          <form action="" method="post">
                            <input type="hidden" class="form-control" value ="'.$reCarrera['id_carrera'].'" name="eliminarCarrera">
                            <button class="btn btn-danger btn-block" name = "btnAccion" value = "Eliminar" type="submit">Eliminar</button>
                          </form>
                        </td>
                      </tr>';
                  }
                ?>
              </tbody>
          </table>
          
          </div>

          <div class="col-sm-4">
                  <?php
                    echo $formularioMod;
                  ?>
          </div>
        </div>
        
      </div>

    </div>
  </div>
</body>
</html>