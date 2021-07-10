<?php

use Slim\Routing\RouteCollectorProxy;
use Src\Controllers\Area;

$app->group("/areas", function (RouteCollectorProxy $group) {
    $group->post("/registrar", Area::class . ":create");
});