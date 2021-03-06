<?php

namespace Src\Models;

use PDO;
use PDOStatement;
use Src\App\Database;

class Areas {
    public string $clave;
    public string $descripcion;

    private PDO $db;
    private string $table;

    public function __construct() {
        $this->db = Database::getConnection();
        $this->table = "areas";
    }

    public function create($clave, $descripcion) : PDOStatement {
        $this->clave = filter_var($clave, FILTER_SANITIZE_STRING);
        $this->descripcion  = filter_var($descripcion, FILTER_SANITIZE_STRING);

        $sql = "INSERT INTO $this->table VALUES(:Clave, :Descripcion)";

        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(":Clave", $this->clave);
        $stmt->bindParam(":Descripcion", $this->descripcion);

        $stmt->execute();
        return $stmt;
    }

}
