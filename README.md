# Docker LAMP Version Sandbox

A Docker Compose framework designed to make it simple to test different versions of Apache, PHP, and MySQL. Whether you are looking to perform major version upgrades or simply need to test your app against various software stacks, this repo might be able to help. With easy-to-use configuration files, you can simultaneously switch between multiple software versions to ensure your application runs smoothly under any setup.

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
// MySQL Server Host
// 'db_legacy' is the Docker Compose service name for MySQL
$host = 'db_legacy';

// MySQL Root Password
// Same as MYSQL_ROOT_PASSWORD in docker-compose.yml
$rootPassword = 'mysql-root-sdlc';

// Connect to MySQL server with root credentials
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
local     docker-lamp-version-sandbox_db_data
local     docker-lamp-version-sandbox_db_legacy_data
```

### Docker Images

View images:
```bash
$ docker image ls
REPOSITORY          TAG       IMAGE ID       CREATED       SIZE
nginx-latest        latest    a2bc4287970f   3 hours ago   187MB
apache-php-7.4.33   latest    4c2c4df02190   2 days ago    479MB
apache-php-latest   latest    a93bcf0730b4   3 days ago    531MB
phpmyadmin          latest    b5821d22d3db   8 days ago    562MB
mysql               latest    99afc808f15b   5 weeks ago   577MB
mysql-latest        latest    e645c1e8d39e   5 weeks ago   577MB
mysql-5.7           latest    3e51c56d1e0b   6 weeks ago   581MB
```

Delete specific image:
```bash
$ docker image rm IMAGE_NAME
```