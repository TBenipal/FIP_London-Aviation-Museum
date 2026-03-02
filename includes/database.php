
<?php

function getConfig()
{
    return [
        'username' => 'root',
        'password' => '', // 'root' on OSX
        'host'     => 'localhost',
        'database' => 'london_aviation_museum',
        'port'     => '3306' // OSX: 8889
    ];
}

function getConnection()
{
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
}