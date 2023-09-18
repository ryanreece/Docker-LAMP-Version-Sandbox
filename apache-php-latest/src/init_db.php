<?php
// MySQL server settings
// `$host` stores the hostname of the MySQL server. In this case, it's a Docker Compose service named 'db'.
$host = 'db';

// `$rootPassword` stores the password for the MySQL root user. This should be the same as MYSQL_ROOT_PASSWORD set in docker-compose.yml.
$rootPassword = 'mysql-root-sdlc';

// Database and user settings
// `$newDatabase` holds the name of the new database to be created.
$newDatabase = 'test_database';

// `$newUser` holds the name of the new user to be created.
$newUser = 'test_database_user';

// `$newUserPassword` holds the password for the new user.
$newUserPassword = 'test_database_password';

try {
  // Connecting to the MySQL server using the root account.
  $rootPdo = new PDO("mysql:host=$host", 'root', $rootPassword);
  
  // Create a new database with the name stored in `$newDatabase`.
  $rootPdo->exec("CREATE DATABASE `$newDatabase`;");
  
  // Create a new user with the name and password stored in `$newUser` and `$newUserPassword`, respectively.
  $rootPdo->exec("CREATE USER '$newUser'@'%' IDENTIFIED BY '$newUserPassword';");
  
  // Grant all privileges on the newly created database to the newly created user.
  $rootPdo->exec("GRANT ALL ON `$newDatabase`.* TO '$newUser'@'%';");
  
  // Output the success message log in a pre-formatted text.
  echo "<pre>";
  echo "Message log\n";
  echo "Successfully created new database and user.\n";
  echo "Database: $newDatabase\n";
  echo "User Details:\n";
  echo "Username: $newUser\n";
  echo "Password: $newUserPassword\n";
  echo "</pre>";
} catch (PDOException $e) {
  // If any errors occur, catch them and display the error message.
  echo 'Error: ' . $e->getMessage();
}
