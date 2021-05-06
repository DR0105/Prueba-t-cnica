<?php
include("connection.php");
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
        return $data;
    }
    public function addTareas()
    {
        $data = $resp = array();
        $resp['status'] = false;
        $data['nombre'] = $_POST["p_nombre"];
        $data['descripcion'] = $_POST["p_descripcion"];
        $data['estado'] = $_POST["p_estado"];

        $result = pg_insert($this->conn, 'tareas', $data) or die("error to insert tarea data");


        $resp['status'] = true;
        $resp['Record'] = $data;
        echo json_encode($resp);  // send data as json format*/
    }
    public function deleteTareas($id)
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
