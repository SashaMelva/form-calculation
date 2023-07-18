<?php

namespace App\Controllers;

use App\Services\DataBaseHandler;
use App\Services\Response;
use App\Services\View;
use App\Services\ViewPath;

class StartController
{
    public function showStartView(): void
    {

        $services = unserialize((new DataBaseHandler)->mselect_rows('a25_settings', ['set_key' => 'services'], 0, 1, 'id')[0]['set_value']);

        $products =(new DataBaseHandler)->mselect_rows('a25_products', 'NAME', 0, 100, 'ID');

        $form = (string)new View(ViewPath::Form, ['products' => $products, 'services' => $services]);
        $html = (string)new View(ViewPath::Main, ['services' => $services, 'form' => $form]);
        $templateWithContent = new View(ViewPath::Template, ['content' => $html]);
        (new Response((string)$templateWithContent))->echo();
    }

    public function showFormView(): void
    {
        $html = (string)new View(ViewPath::Form);
        $templateWithContent = new View(ViewPath::Template, ['content' => $html]);
        (new Response((string)$templateWithContent))->echo();
    }

    public function updatePriceForTariff()
    {

    }
}