# SDLC-Sandbox

This repo is a sandbox to test to multiple versions of web server infrastructure.

## Containers
1. Nginx Load Balancer - Latest
2. Apache PHP - Latest
3. Apache PHP - 7.4.33
4. MySQL - Latest
5. PHPMyAdmin for MySQL - Latest
6. MySQL - 5.7
7. PHPMyAdmin for MySQL - 5.7

## Dependencies
1. Docker
- [Docker for Windows](https://docs.docker.com/desktop/install/windows-install/)
- [Docker for MacOS](https://docs.docker.com/desktop/install/mac-install/)
- [Docker for Ubuntu](https://docs.docker.com/engine/install/ubuntu/)

## Running

1. On the remote host
```
$ docker compose up -d
```

2. Accessing Containers
- [localhost:8080](http://localhost:8080) - Apache PHP v8.2.x
- [localhost:8081](http://localhost:8081) - Apache PHP v7.4.33
- [localhost:8090](http://localhost:8090) - PHPMyAdmin for MySQL v8.1
- [localhost:8091](http://localhost:8091) - PHPMyAdmin for MySQL v5.7
- `mysql --host=localhost --port=3380 --user=root -p --protocol=tcp`
- `mysql --host=localhost --port=3381 --user=root -p --protocol=tcp`

