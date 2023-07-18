<?php declare(strict_types=1);

namespace App\Services;

use App\Models\ProductsModel;

class CalculateCost
{
    /**
     * @throws DataBaseHandlerDeadlockException
     * @throws DataBaseHandlerException
     */
    public function updatePriceForTariff(): void
    {
        $param = $this->getParamFromResponseFetch();
        $result = $this->getPriceAccordingTariffForDay($param['productId'], $param['countDay']);

        echo $result;
    }

    /**
     * @throws DataBaseHandlerDeadlockException
     * @throws DataBaseHandlerException
     */
    public function getPriceAccordingTariffForDay($productId, $countDay): int
    {
        $product = (new ProductsModel())->getById($productId);

        if (is_null($product['TARIFF'])) {
            $price = $product['PRICE'];
            return (int)$price;
        }

        $productTariff = unserialize($product['TARIFF']);
        $days = [];
        $dayForTariffPrise = 0;

        foreach ($productTariff as $key => $value) {
            $days[] = $key;
        }

        for ($i = 0; $i < count($days); $i++) {

            if ($days[$i] <= $countDay && $countDay <= $days[$i + 1]) {
                $dayForTariffPrise = $days[$i];
            }

        }

        return (int)$productTariff[$dayForTariffPrise];
    }

    /**
     * @throws DataBaseHandlerDeadlockException
     * @throws DataBaseHandlerException
     */
    public function calculate(int $productId, int $countDay, array $services): int
    {
        $sum = 0;
        $sum += array_sum($services);
        $sum += $this->getPriceAccordingTariffForDay($productId, $countDay) * $countDay;
        return $sum;
    }

    private function getParamFromResponseFetch()
    {
        return json_decode(file_get_contents('php://input'), true);
    }
}