<?php
include("connection.php");
$params = $_REQUEST;
$action = isset($params['action']) && $params['action'] != '' ? $params['action'] : 'list';
$empCls = new Tarea();

switch ($action) {
    case 'list':
        $empCls->getTareas();
        break;
    case 'add':
        $empCls->addTareas();
        break;
    case 'get_tarea':
        $id = isset($params['id']) && $params['id'] != '' ? $params['id'] : 0;
        $empCls->getTarea($id);
        break;
    case 'edit':
        $empCls->editarTarea();
        break;
    case 'delete':
        $id = isset($params['id']) && $params['id'] != '' ? $params['id'] : 0;
        $empCls->deleteTarea($id);
        break;
    default:
        return;
}
class Tarea
{
    protected $conn;
    protected $data = array();
    function __construct()
    {
        $db = new dbObj();
        $connString =  $db->getConnstring();
        $this->conn = $connString;
    }

    public function getTareas()
    {
        $sql = "SELECT * FROM tareas";
        $queryRecords = pg_query($this->conn, $sql) or die("error to fetch tarea data");
        $data = pg_fetch_all($queryRecords);
        echo json_encode($data);
    }
    public function addTareas()
    {
        $data = $resp = array();
        $estado = "No completado";
        $resp['status'] = false;
        $data['nombre'] = $_POST["nombre"];
        $data['descripcion'] = $_POST["descripcion"];
        $data['estado'] = $estado;

        $result = pg_insert($this->conn, 'tareas', $data) or die("error to insert tarea data");
        $resp['status'] = true;
        $resp['Record'] = $data;
        echo json_encode($resp);  // send data as json format*/
    }
    function getTarea($id)
    {
        $sql = "SELECT * FROM tareas Where id=" . $id;
        $queryRecords = pg_query($this->conn, $sql) or die("error to fetch employees data");
        $data = pg_fetch_object($queryRecords);
        echo json_encode($data);
    }

    function editarTarea()
    {
        $data = $resp = array();
        $resp['status'] = false;
        $data['nombre'] = $_POST["nombre"];
        $data['descripcion'] = $_POST["descripcion"];
        $data['id'] = $_POST["tarea_id"];

        $result = pg_update($this->conn, 'tareas', $data, array('id' => $data['id'])) or die("error to insert employee data");

        $resp['status'] = true;
        $resp['Record'] = $data;
        echo json_encode($resp);  // send data as json format*/

    }

    public function deleteTarea($id)
    {
        $sql = "Delete FROM tareas Where id=" . $id;
        $queryRecords = pg_query($this->conn, $sql) or die("error to fetch employees data");
        if ($queryRecords) {
            echo true;
        } else {
            echo false;
        }
    }
}
