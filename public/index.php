<?php
require_once dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "config.php";

use App\Controllers\StartController;
use App\Services\Response;
use App\Services\View;
use App\Services\ViewPath;


if (isset($_SERVER['REQUEST_URI'])) {
//    try {
        match ($_SERVER['REQUEST_URI']) {
            '/' => (new StartController())->showStartView(),
            '/form' => (new StartController())->showFormView(),
            '/update' => (new StartController())->updatePriceForTariff(),
           // '/calculate' => (new StartController())->showFormView(),
            default => throw new Exception('Unexpected match value'),
        };
//    } catch (Exception $e) {
//        $html = new View(ViewPath::NotFound);
//        $templateWithContent = new View(ViewPath::Template, ['content' => $html]);
//        (new Response((string)$templateWithContent))->echo();
//    }
}

exit(0);