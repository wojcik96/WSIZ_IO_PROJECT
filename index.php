<?php

declare(strict_types=1);

require_once "./src/Request.php";
require_once "./src/Controller/SchedulesController.php";

$request = new Request($_GET, $_POST, $_SERVER);

(new SchedulesController($request))->run();