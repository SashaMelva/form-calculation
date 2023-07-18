<?php declare(strict_types=1);

namespace App\Controllers;

use App\Models\ProductsModel;
use App\Models\SettingsModel;
use App\Services\CalculateCost;
use App\Services\Response;
use App\Services\DataBaseHandlerDeadlockException;
use App\Services\DataBaseHandlerException;
use App\Services\View;
use App\Services\ViewPath;

class StartController
{
    /**
     * @throws DataBaseHandlerDeadlockException
     * @throws DataBaseHandlerException
     */
    public function showStartView(): void
    {
        $services = unserialize((new SettingsModel)->getSettingsBySetKey('services')['set_value']);
        $products = (new ProductsModel())->getAll(100);

        $html = (string)new View(ViewPath::Main, ['services' => $services, 'products' => $products]);
        $templateWithContent = new View(ViewPath::Template, ['content' => $html]);
        (new Response((string)$templateWithContent))->echo();
    }

    /**
     * @throws DataBaseHandlerDeadlockException
     * @throws DataBaseHandlerException
     */
    public function showResultView(int $productId, int $countDay, array $services): void
    {
        $sum = (new CalculateCost())->calculate($productId, $countDay, $services);

        $html = (string)new View(ViewPath::Result, ['resultSum' => $sum]);
        $templateWithContent = new View(ViewPath::Template, ['content' => $html]);
        (new Response((string)$templateWithContent))->echo();
    }
}