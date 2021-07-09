<?php

namespace Src\Models;

class Materias {
    public string $control;
    public string $nombre;
    public string $carrera;
    public int $inscripcion;

    private $db;

    public function __construct() {
        $db = Src\App\Database::getConnection();
    }
}
