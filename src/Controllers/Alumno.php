<?php

namespace Src\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Src\Models\Alumnos;

class Alumno {
    public function create(Request $request, Response $response) : Response {
        $requestParams = $request->getParsedBody();

        $control = $requestParams["num_control"];
        $nombre = $requestParams["nombre_alumno"];
        $carrera = $requestParams["clave_carrera"];
        $inscripcion = $requestParams["esta_inscrito"];

        $alumno = new Alumnos();

        $result = $alumno->create($control, $nombre, $carrera, $inscripcion);

        if($result->rowCount() <= 0) {
            $result = [
                "error" => "true",
                "code" => "500",
                "body" => "Ocurrio un erro el servidor y no se pudo registrar al alumno"
            ];
            $response->getBody()->write(json_encode($result));
            return $response;
        }

        $result = [
            "error" => "false",
            "code" => "200",
            "body" => "Se registro al alumno correctamente"
        ];

        $response->getBody()->write(json_encode($result));
        return $response;
    }
}
