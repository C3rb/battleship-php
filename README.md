# Battleship PHP

A simple game of Battleship, written in PHP. Created by Sergey https://github.com/2heoh 

### Run locally

Download and install PHP 7+ from [php.net](https://www.php.net/)
and then run battleship with composer

```bash
composer run game
```

### or in Docker

If you don't want to install anything php-related on your system, you can
run the game inside Docker instead.

```bash
docker run -it -v ${PWD}:/battleship -w /battleship composer bash
```

### Contribution

Check [CONTRIBUTION.md](CONTRIBUTION.md) file
