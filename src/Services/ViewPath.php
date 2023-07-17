<?php

namespace App\Services;

enum ViewPath: string
{
    case Template = __DIR__ . "/../../views/template.php";
    case Form = __DIR__ . "/../../views/form.php";
    case Main = __DIR__ . "/../../views/main.php";
    case NotFound = __DIR__ . "/../../views/not_found.php";

}