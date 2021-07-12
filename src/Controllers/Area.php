<?php

namespace Src\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Src\Models\Areas;

class Area {
    public function create(Request $request, Response $response) : Response {
        $requestParams = $request->getParsedBody();

        $clave = $requestParams["clave_area"];
        $descripcion = $requestParams["descripcion_area"];

        $area = new Areas();

        $result = $area->create($clave, $descripcion);

        if($result->rowCount() <= 0) {
            $result = [
                "error" => "true",
                "code" => "500",
                "body" => "Ocurrio un error el servidor no pudo registrar el area"
            ];
            $response->getBody()->write(json_encode($result));
            return $response;
        }
        $result = [
            "error" => "false",
            "code" => "200",
            "body" => "Se inserto el area correctamente"
        ];
        $response->getBody()->write(json_encode($result));
        return $response;
    }
}
