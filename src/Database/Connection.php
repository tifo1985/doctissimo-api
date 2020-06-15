<?php

namespace App\Database;

use PDO;

class Connection
{
    /** @var PDO|null */
    private static $_instance = null;

    /** @var string */
    private $dbUser;

    /** @var string */
    private $dbPassword;

    /** @var string */
    private $dbName;

    /** @var string */
    private $dbHost;

    public function __construct(string $dbHost, string $dbUser, string $dbPassword, string $dbName)
    {
        $this->dbHost = $dbHost;
        $this->dbName = $dbName;
        $this->dbUser = $dbUser;
        $this->dbPassword = $dbPassword;
    }

    public function getInstance(): PDO
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new PDO(sprintf('mysql:host=%s;dbname=%s', $this->dbHost, $this->dbName), $this->dbUser, $this->dbPassword);
        }

        return self::$_instance;
    }
}