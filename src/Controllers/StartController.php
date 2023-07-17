<?php

namespace App\Controllers;

use App\Services\Response;
use App\Services\View;
use App\Services\ViewPath;

class StartController
{
    public function showStartView(): void
    {
        $html = (string)new View(ViewPath::Main);
        $templateWithContent = new View(ViewPath::Template, ['content' => $html]);
        (new Response((string)$templateWithContent))->echo();
    }

    public function showFormView(): void
    {
        $html = (string)new View(ViewPath::Form);
        $templateWithContent = new View(ViewPath::Template, ['content' => $html]);
        (new Response((string)$templateWithContent))->echo();
    }
}