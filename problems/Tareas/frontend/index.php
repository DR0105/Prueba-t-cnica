<!doctype html>

<head>
    <meta charset="utf-8">
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
            <tbody id="tarea_body">

            </tbody>
        </table>
    </div>
    <button type="button" id="botonagregar" class="btn btn-primary" data-toggle="modal" data-target="#add_model" action-btn-value="add">
        Agregar tarea <i class="fa fa-plus"> </i>
    </button>
    <div id="msg"></div>

    <div id="add_model" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar tarea</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" id="body_tarea">
                    <form method="post" id="frm_add">
                        <input type="hidden" value="add" name="action" id="action">
                        <input type="hidden" value="0" name="tarea_id" id="tarea_id">
                        <div class="form-group">
                            <label for="nombre" class="control-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" />
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="control-label">Descripción:</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="btn_add" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>