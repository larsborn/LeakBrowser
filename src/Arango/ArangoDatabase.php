<?php

declare(strict_types=1);

namespace App\Arango;

use ArangoDBClient\Connection;
use ArangoDBClient\ConnectionOptions;

class ArangoDatabase
{
    private Connection $connection;

    public function __construct(string $hostname, int $port, string $databaseName, string $username, string $password)
    {
        $connectionOptions = [
            ConnectionOptions::OPTION_DATABASE => $databaseName,
            ConnectionOptions::OPTION_ENDPOINT => sprintf('tcp://%s:%s', $hostname, $port),
            ConnectionOptions::OPTION_AUTH_TYPE => 'Basic',
            ConnectionOptions::OPTION_AUTH_USER => $username,
            ConnectionOptions::OPTION_AUTH_PASSWD => $password,
            ConnectionOptions::OPTION_CONNECTION => 'Close',
            ConnectionOptions::OPTION_TIMEOUT => 3,
            ConnectionOptions::OPTION_RECONNECT => true,
        ];
        $this->connection = new Connection($connectionOptions);
    }

    public function getConnection(): Connection
    {
        return $this->connection;
    }
}
