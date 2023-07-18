<?php

namespace App\Controllers;

use App\Services\DataBaseHandler;
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
        $services = unserialize((new DataBaseHandler)->mselect_rows('a25_settings', ['set_key' => 'services'], 0, 1, 'id')[0]['set_value']);
        $products = (new DataBaseHandler)->mselect_rows('a25_products', 'NAME', 0, 100, 'ID');

        $html = (string)new View(ViewPath::Main, ['services' => $services, 'products' => $products]);
        $templateWithContent = new View(ViewPath::Template, ['content' => $html]);
        (new Response((string)$templateWithContent))->echo();
    }


    public function updatePriceForTariff(): void
    {
        $result = $this->getParamFromResponseForFetch();
        $result = $this->getProductTariffForDay($result['productId'], $result['countDay']);

        echo $result;
    }

    private function getProductTariffForDay($productId, $countDay): int
    {
        $dataBaseHandler = new DataBaseHandler();
        $productTariff = unserialize($dataBaseHandler->mselect_rows('a25_products', ['ID' => $productId], 0, 1, 'id')[0]['TARIFF']);


        if (!$productTariff) {
            $price = $dataBaseHandler->mselect_rows('a25_products', ['ID' => $productId], 0, 1, 'id')[0]['PRICE'];
            return (int)$price;
        }

        foreach ($productTariff as $key => $value) {
            if ($key <= $countDay) {
                return (int)$value;
            }
        }

        return 0;
    }

    private function getParamFromResponseForFetch()
    {
        return json_decode(file_get_contents('php://input'), true);
    }

    public function calculatePrice($productId, $countDay, $services1, $services2, $services3, $services4): void
    {
        $sum = 0;

        if (!is_null($services1)) {
            $sum += (int)$services1;
        }
        if (!is_null($services2)) {
            $sum += (int)$services2;
        }
        if (!is_null($services3)) {
            $sum += (int)$services3;
        }
        if (!is_null($services4)) {
            $sum += (int)$services4;
        }
        $sum += $this->getProductTariffForDay($productId, $countDay) * $countDay;

        $html = (string)new View(ViewPath::Result, ['resultSum' => $sum]);
        $templateWithContent = new View(ViewPath::Template, ['content' => $html]);
        (new Response((string)$templateWithContent))->echo();
    }
}