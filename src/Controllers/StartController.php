<?php

namespace App\Controllers;

use App\Models\ProductsModel;
use App\Models\SettingsModel;
use App\Services\CalculatePrice;
use App\Services\Response;
use App\Services\sdbh_deadlock_exception;
use App\Services\sdbh_exception;
use App\Services\View;
use App\Services\ViewPath;

class StartController
{
    /**
     * @throws sdbh_deadlock_exception
     * @throws sdbh_exception
     */
    public function showStartView(): void
    {
        $services = unserialize((new SettingsModel)->getSettingsBySetKey('services'));
        $products = (new ProductsModel())->getAll(100);

        $html = (string)new View(ViewPath::Main, ['services' => $services, 'products' => $products]);
        $templateWithContent = new View(ViewPath::Template, ['content' => $html]);
        (new Response((string)$templateWithContent))->echo();
    }

    public function showResultView($productId, $countDay, $services1, $services2, $services3, $services4): void
    {
        $sum = (new CalculatePrice())->calculatePrice($productId, $countDay, $services1, $services2, $services3, $services4);

        $html = (string)new View(ViewPath::Result, ['resultSum' => $sum]);
        $templateWithContent = new View(ViewPath::Template, ['content' => $html]);
        (new Response((string)$templateWithContent))->echo();
    }
}