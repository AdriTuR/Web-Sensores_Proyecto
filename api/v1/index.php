<?php

require_once './../includes/connection.php';

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$path = explode('v1/', parse_url($uri, PHP_URL_PATH))[1];

$pathParam = explode('/', $path);
$resource = array_shift($pathParam);

$data = [];

include 'modelos/' . strtolower($method) . '-' . $resource . '.php';

include 'vistas/json.php';

