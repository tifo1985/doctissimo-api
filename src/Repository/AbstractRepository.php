<?php

namespace App\Repository;

use App\Database\Connection;

abstract class AbstractRepository
{
    /**
     * @var Connection
     */
    protected $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getConnection(): Connection
    {
        return $this->connection;
    }
}
