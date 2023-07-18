<?php
declare(strict_types=1);

namespace App\Models;

use App\Services\DataBaseHandler;
use App\Services\Exception\DataBaseHandlerException;

class ProductsModel
{
    public DataBaseHandler $dataBaseHandler;

    public function __construct()
    {
        $this->dataBaseHandler = new DataBaseHandler();
    }


    /**
     * @throws DataBaseHandlerException
     */
    public function getAll($limit)
    {
        return $this->dataBaseHandler->mselect_rows('a25_products', '', 0, $limit, 'ID');
    }

    /**
     * @throws DataBaseHandlerException
     */
    public function getById($id)
    {
        return $this->dataBaseHandler->mselect_rows('a25_products', ['ID' => $id], 0, 1, 'id')[0];
    }
}