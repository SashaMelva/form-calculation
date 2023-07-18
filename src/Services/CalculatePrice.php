<?php

namespace App\Services;

use App\Models\ProductsModel;

class CalculatePrice
{
    public function updatePriceForTariff(): void
    {
        $param = $this->getParamFromResponseForFetch();
        $result = $this->getProductTariffForDay($param['productId'], $param['countDay']);

        echo $result;
    }

    /**
     * @throws sdbh_deadlock_exception
     * @throws sdbh_exception
     */
    public function getProductTariffForDay($productId, $countDay): int
    {
        $product = (new ProductsModel())->getById($productId);
        $productTariff = unserialize($product['TARIFF']);


        if (!$productTariff) {
            $price = $product['PRICE'];
            return (int)$price;
        }

        $days = [];
        foreach ($productTariff as $key => $value) {
            $days[] = $key;
        }

        $dayForTariffPrise = 0;
        for ($i = 0; $i < count($days); $i++) {
            if ($days[$i] <= $countDay && $countDay <= $days[$i + 1]) {
                $dayForTariffPrise = $days[$i];
            }
        }

        return $productTariff[$dayForTariffPrise];
    }

    private function getParamFromResponseForFetch()
    {
        return json_decode(file_get_contents('php://input'), true);
    }

    /**
     * @throws sdbh_deadlock_exception
     * @throws sdbh_exception
     */
    public function calculatePrice($productId, $countDay, $services1, $services2, $services3, $services4): int
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
        return $sum;
    }

}