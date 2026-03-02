<?php

function getConfig()
{
    return [
        'username' => 'root',
        'password' => '',
        'host'     => 'localhost',
        'database' => 'london_aviation_museum',
        'port'     => '3306'
    ];
}

function getConnection()
{
    $config = getConfig();

    $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['database'] . ';charset=utf8mb4';

    try {
        $connection = new PDO($dsn, $config['username'], $config['password'], [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
        return $connection;
    } catch (PDOException $e) {
        die('Database connection failed: ' . $e->getMessage());
    }
    
}