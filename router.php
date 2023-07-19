<?php
use App\Controllers\StartController;
use App\Services\CalculateCost;
use App\Services\Response;
use App\Services\View;
use App\Services\ViewPath;

if (isset($_SERVER['REQUEST_URI'])) {
    try {
        match ($_SERVER['REQUEST_URI']) {
            '/' => (new StartController())->showStartView(),
            '/calculate' => (new StartController())->showResultView((int)$_POST['product'], (int)$_POST['countDay'], [(int)$_POST['services1-300'], (int)$_POST['services2-600'], (int)$_POST['services3-100'], (int)$_POST['services4-0']]),
            '/updatePrice' => (new CalculateCost())->updatePriceForTariff(),
            default => throw new Exception('Unexpected match value'),
        };
    } catch (Exception $e) {
        $html = new View(ViewPath::NotFound);
        $templateWithContent = new View(ViewPath::Template, ['content' => $html]);
        (new Response((string)$templateWithContent))->echo();
    }
}

exit;