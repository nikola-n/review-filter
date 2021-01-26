<?php

namespace Database;

require __DIR__ . '../../../vendor/autoload.php';

use PDO;
use PDOException;

class DbConnection
{

    /**
     * @var \PDO
     */
    private $connection;

    public function __construct()
    {
        try {
            $host             = 'localhost';
            $dbName           = 'reviews';
            $username         = 'root';
            $password         = 'root';
            $options          = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            $this->connection = new PDO("mysql:host=$host;dbname=$dbName", $username, $password, $options);
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    /**
     * @return mixed
     */
    public function getConnection()
    {
        return $this->connection;
    }
}