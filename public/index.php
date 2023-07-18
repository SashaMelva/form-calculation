<?php
require_once dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "config.php";

use App\Controllers\StartController;
use App\Services\Response;
use App\Services\View;
use App\Services\ViewPath;


if (isset($_SERVER['REQUEST_URI'])) {
   // try {
        match ($_SERVER['REQUEST_URI']) {
            '/' => (new StartController())->showStartView(),
            '/calculate' => (new StartController())->calculatePrice($_POST['product'], $_POST['countDay'],$_POST['services1-300'], $_POST['services2-600'],$_POST['services3-100'], $_POST['services4-0']),
            '/updatePrice' => (new StartController())->updatePriceForTariff($_POST['countDay']),
            default => throw new Exception('Unexpected match value'),
        };
//    } catch (Exception $e) {
//        $html = new View(ViewPath::NotFound);
//        $templateWithContent = new View(ViewPath::Template, ['content' => $html]);
//        (new Response((string)$templateWithContent))->echo();
//    }
}

//if (isset($_GET['function'])) {
//    try {
//        match ($_GET['function']) {
//            'viewMainPage' => (new StartController())->showStartView(),
//            'updatePrise' => (new StartController())->updatePriceForTariff($_GET['countDay']),
//        };
//    } catch (Exception $e) {
////        $html = new View(ViewPath::NotFound);
////        (new Response('failed', $html, null))->echo();
//    }
//}
//
//if (isset($_POST['formName']) && $_POST['formName'] == 'calculate')
//{
//    (new StartController())->calculatePrice($_POST['login'], $_POST['password'], $_POST['password']);
//}

exit;