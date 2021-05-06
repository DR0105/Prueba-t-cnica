<?php
include("../backend/response.php");
$newObj = new Tarea();
$emps = $newObj->getTareas();
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/styles.css ">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../js/procesos.js"></script>
    <title>Almacenamiento de tareas</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-primary style=" background-color: #000000;">
        <div class="navbar-header">
            Almacenamiento de tareas
        </div>
    </nav>
    <h4>
        <center>Lista de tareas</center>
    </h4>
    <div id="tareas">
        <table id="tarea_grid" class="table" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($emps as $key => $emp) : ?>
                    <tr>
                        <td><?php echo $emp['id'] ?></td>
                        <td><?php echo $emp['nombre'] ?></td>
                        <td><?php echo $emp['descripcion'] ?></td>
                        <td><?php echo $emp['estado'] ?></td>
                        <td>
                            <div class="btn-group" data-toggle="buttons"><a href="#" target="_blank" class="btn btn-warning btn-xs">Editar</a><a href="#" target="_blank" class="btn btn-danger btn-xs" onclick="borrar(<?php $emp['id'] ?>)">Borrar</a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <button type="button" id="botonagregar" class="btn btn-primary" data-toggle="modal" data-target="#modalagregar" action-btn-value="add">
        Agregar tarea <i class="fa fa-plus"> </i>
    </button>
    <div id="msg"></div>

    <div class="modal" id="modalagregar" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar tarea</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Ingresa el nombre de la tarea" />
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Descripción</label>
                            <input type="text" class="form-control" id="descripcion" placeholder="Ingresa la descripción" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="guardar">Continuar<i class="fa fa-save"></i></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>