<?php
class dbObj
{

    var $servername, $username, $password, $dbname, $port, $conn;

    function __construct()
    {
        $this->servername = "localhost";
        $this->username = "postgres";
        $this->password = "1192804222+";
        $this->dbname = "Proyecto";
        $this->port = "5432";
    }
    function getConnstring()
    {
        $con = pg_connect("host=" . $this->servername . " port=" . $this->port . " dbname=" . $this->dbname . " user=" . $this->username . " password=" . $this->password . "") or die("Connection failed: " . pg_last_error());

        /* check connection */
        if (pg_last_error()) {
            printf("Connect failed: %s\n", pg_last_error());
            exit();
        } else {
            $this->conn = $con;
        }
        return $this->conn;
    }
}
