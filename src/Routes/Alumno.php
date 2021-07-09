<?php

use Slim\Routing\RouteCollectorProxy;
use Src\Controllers\Alumno;

$app->group('/alumnos', function (RouteCollectorProxy $group) {
    $group->post("/registrar", Alumno::class . ":create");
});
