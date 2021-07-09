<?php

namespace Src\Models;

use Src\App\Database;

class Alumnos {
    public string $control;
    public string $nombre;
    public string $carrera;
    public int $inscripcion;

    private $db;
    private $table;

    public function __construct() {
        $this->db = Database::getConnection();
        $this->table = "alumnos";
    }

    public function create($control, $nombre, $carrera, $inscripcion) {
        $this->control = filter_var($control, FILTER_SANITIZE_STRING);
        $this->nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
        $this->carrera = filter_var($carrera, FILTER_SANITIZE_STRING);
        $this->inscripcion = filter_var($inscripcion, FILTER_SANITIZE_NUMBER_INT);

        $sql = "INSERT INTO $this->table VALUES(:Control, :Nombre, :Carrera, :Inscripcion)";

        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(":Control", $this->control, \PDO::PARAM_STR);
        $stmt->bindParam(":Nombre", $this->nombre, \PDO::PARAM_STR);
        $stmt->bindParam(":Carrera", $this->carrera, \PDO::PARAM_STR);
        $stmt->bindParam(":Inscripcion", $this->inscripcion, \PDO::PARAM_INT);

        $stmt->execute();
        return $stmt;
    }
}
