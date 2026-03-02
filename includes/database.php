<?php

function getConfig()
{
    return [
        'username' => 'root',
<<<<<<< Updated upstream
        'password' => '',
        'host'     => 'localhost',
        'database' => 'london_aviation_museum',
        'port'     => '3306'
=======
        'password' => '', // 'root' on OSX
        'host'     => 'localhost',
        'database' => 'london_aviation_museum',
        'port'     => '3306' // OSX: 8889
>>>>>>> Stashed changes
    ];
}

function getConnection()
{
<<<<<<< Updated upstream
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
    
=======
    $config   = getConfig();
    $username = $config['username'];
    $password = $config['password'];
    $host     = $config['host'];
    $database = $config['database'];

    $dsn        = 'mysql:host=' . $host . ';dbname=' . $database . ';charset=utf8mb4';
    $connection = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    return $connection;
>>>>>>> Stashed changes
}