# SDLC-Sandbox

Platform for testing multiple versions of web server infrastructure using Docker Compose.

## Default Containers
1. Nginx Load Balancer - Latest Version
2. Apache PHP - Latest Version
3. Apache PHP - v7.4.33
4. MySQL - Latest Version
5. PHPMyAdmin for MySQL - Latest Version
6. MySQL - v5.7.43
7. PHPMyAdmin for MySQL - v5.7.43

## Dependencies
1. Docker and Supported OS
- [Docker for Windows](https://docs.docker.com/desktop/install/windows-install/)
- [Docker for MacOS](https://docs.docker.com/desktop/install/mac-install/)
- [Docker for Ubuntu](https://docs.docker.com/engine/install/ubuntu/)

## Running

1. On the docker host

Starting containers:
```bash
$ docker compose up -d
```

Viewing containers:
```bash
$ docker ps
```

Stopping containers:
```bash
$ docker compose down
```

2. Accessing Resources

Web URLs:
- [localhost:8080](http://localhost:8080) - Apache PHP v8.2.x
- [localhost:8081](http://localhost:8081) - Apache PHP v7.4.33
- [localhost:8090](http://localhost:8090) - PHPMyAdmin for MySQL v8.1.x
- [localhost:8091](http://localhost:8091) - PHPMyAdmin for MySQL v5.7.43

MySQL:
```bash
$ mysql --host=localhost --port=3380 --user=root -p --protocol=tcp
$ mysql --host=localhost --port=3381 --user=root -p --protocol=tcp
```

MySQL Database Import Example:
```bash
$ mysql --host=localhost --port=3381 --user=root -p --protocol=tcp DATABASE_NAME < FILE.sql
```

MySQL Database Dump Example:
```bash
$ mysqldump --host=localhost --port=3381 --user=root -p --protocol=tcp DATABASE_NAME > FILE.sql
```

## Testing Your App
- Place PHP source code into the following versioned directories:

### Apache PHP Latest
```
$ apache-php-latest/src/
```

### Apache PHP 7.4.33
```
$ apache-php-7.4.33/src/
```

## MySQL Databases
- Update database connection strings to `db` and `db_legacy` to test between MySQL containers.

### Example MySQL Connection with PHP

Using the `db_legacy` container running MySQL 5.7:
```php
<?php
// MySQL server settings
$host = 'db_legacy'; // Docker Compose service name for MySQL
$rootPassword = 'mysql-root-sdlc'; // Same as MYSQL_ROOT_PASSWORD in docker-compose.yml

// Connect to MySQL server with root
$rootPdo = new PDO("mysql:host=$host", 'root', $rootPassword);
```

### MySQL Data Volumes

MySQL data is stored in docker volumes defined in the `compose.yml` file. 
```yaml
volumes:
  db_data:
  db_legacy_data:
```

Volumes can be listed using the docker cli and are preserved between container creations and destroys.
```bash
$ docker volume ls
local     sdlc-db_data
local     sdlc-db_legacy_data
```