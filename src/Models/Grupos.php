<?php

namespace Src\Models;

class Grupos {
    public string $control;
    public string $nombre;
    public string $carrera;
    public int $inscripcion;

    private $db;

    public function __construct() {
        $db = Src\App\Database::getConnection();
    }
}
