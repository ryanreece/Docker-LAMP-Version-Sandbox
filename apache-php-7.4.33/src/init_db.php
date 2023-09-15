<?php
// MySQL server settings
$host = 'db_legacy'; // Docker Compose service name for MySQL
$rootPassword = 'mysql-root-sdlc'; // Same as MYSQL_ROOT_PASSWORD in docker-compose.yml

// Database and user settings
$newDatabase = 'test_database';
$newUser = 'test_database_user';
$newUserPassword = 'test_database_password';

try {
    // Connect to MySQL server with root
    $rootPdo = new PDO("mysql:host=$host", 'root', $rootPassword);

    // Create a new database
    $rootPdo->exec("CREATE DATABASE `$newDatabase`;") or die(print_r($rootPdo->errorInfo(), true));

    // Create a new user and grant all privileges on the new database
    $rootPdo->exec("CREATE USER '$newUser'@'%' IDENTIFIED BY '$newUserPassword';") or die(print_r($rootPdo->errorInfo(), true));
    $rootPdo->exec("GRANT ALL ON `$newDatabase`.* TO '$newUser'@'%';") or die(print_r($rootPdo->errorInfo(), true));

    echo 'Successfully created new database and user.';
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
