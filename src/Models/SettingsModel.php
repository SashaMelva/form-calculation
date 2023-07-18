<?php

namespace App\Models;

use App\Services\DataBaseHandler;
use App\Services\sdbh_deadlock_exception;
use App\Services\sdbh_exception;

class SettingsModel
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
    public function getSettingsBySetKey($setKey) {
        return $this->dataBaseHandler->mselect_rows('a25_settings', ['set_key' => $setKey], 0, 1, 'id')[0];
    }
}