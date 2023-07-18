<?php

namespace App\Models;

use App\Services\DataBaseHandler;
use App\Services\sdbh_deadlock_exception;
use App\Services\sdbh_exception;

class ProductsModel
{
    public DataBaseHandler $dataBaseHandler;
    public function __construct()
    {
        $this->dataBaseHandler = new DataBaseHandler();
    }

    /**
     * @throws sdbh_deadlock_exception
     * @throws sdbh_exception
     */
    public function getAll($limit): \App\Services\query|array
    {
        return $this->dataBaseHandler->mselect_rows('a25_products', '', 0, $limit, 'ID');
    }

    /**
     * @throws sdbh_deadlock_exception
     * @throws sdbh_exception
     */
    public function getById($id) {
        return $this->dataBaseHandler->mselect_rows('a25_products', ['ID' => $id], 0, 1, 'id')[0];
    }
}