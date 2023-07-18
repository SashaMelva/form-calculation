<?php declare(strict_types=1);

namespace App\Models;

use App\Services\DataBaseHandler;
use App\Services\DataBaseHandlerDeadlockException;
use App\Services\DataBaseHandlerException;

class SettingsModel
{
    public DataBaseHandler $dataBaseHandler;

    public function __construct()
    {
        $this->dataBaseHandler = new DataBaseHandler();
    }

    /**
     * @throws DataBaseHandlerDeadlockException
     * @throws DataBaseHandlerException
     */
    public function getSettingsBySetKey($setKey)
    {
        return $this->dataBaseHandler->mselect_rows('a25_settings', ['set_key' => $setKey], 0, 1, 'id')[0];
    }
}