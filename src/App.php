<?php

require_once 'Console.php';

use Battleship\Color;
use Battleship\GameController;
use Battleship\Letter;
use Battleship\Position;
use Battleship\Ship;

class App
{
    private static $myFleet = [];
    private static $enemyFleet = [];
    private static $console;

    /** @var \Battleship\Board */
    private static $computerShootBoard;

    static function run()
    {
        self::$console = new Console();
        self::$console->setForegroundColor(Color::MAGENTA);

        self::$console->println("                                     |__");
        self::$console->println("                                     |\\/");
        self::$console->println("                                     ---");
        self::$console->println("                                     / | [");
        self::$console->println("                              !      | |||");
        self::$console->println("                            _/|     _/|-++'");
        self::$console->println("                        +  +--|    |--|--|_ |-");
        self::$console->println("                     { /|__|  |/\\__|  |--- |||__/");
        self::$console->println("                    +---------------___[}-_===_.'____                 /\\");
        self::$console->println("                ____`-' ||___-{]_| _[}-  |     |_[___\\==--            \\/   _");
        self::$console->println(" __..._____--==/___]_|__|_____________________________[___\\==--____,------' .7");
        self::$console->println("|                        Welcome to Battleship                         BB-61/");
        self::$console->println(" \\_________________________________________________________________________|");
        self::$console->println();
        self::$console->resetForegroundColor();
        self::InitializeGame();
        self::StartGame();
    }

    public static function InitializeEnemyFleet()
    {
        $enemyFleets = [
            self::renderEnemyFleet1(),
            self::renderEnemyFleet2(),
            self::renderEnemyFleet3(),
            self::renderEnemyFleet4(),
            self::renderEnemyFleet5(),
            self::renderEnemyFleet6(),
            self::renderEnemyFleet7(),
            self::renderEnemyFleet8(),
        ];

        self::$enemyFleet = $enemyFleets[array_rand($enemyFleets, 1)];
        self::$computerShootBoard = new \Battleship\Board(8, 8);
    }

    public static function renderEnemyFleet1()
    {
        $fleet = GameController::initializeShips();

        array_push($fleet[0]->getPositions(), new Position('B', 4));
        array_push($fleet[0]->getPositions(), new Position('B', 5));
        array_push($fleet[0]->getPositions(), new Position('B', 6));
        array_push($fleet[0]->getPositions(), new Position('B', 7));
        array_push($fleet[0]->getPositions(), new Position('B', 8));

        array_push($fleet[1]->getPositions(), new Position('E', 5));
        array_push($fleet[1]->getPositions(), new Position('E', 6));
        array_push($fleet[1]->getPositions(), new Position('E', 7));
        array_push($fleet[1]->getPositions(), new Position('E', 8));

        array_push($fleet[2]->getPositions(), new Position('A', 3));
        array_push($fleet[2]->getPositions(), new Position('B', 3));
        array_push($fleet[2]->getPositions(), new Position('C', 3));

        array_push($fleet[3]->getPositions(), new Position('F', 8));
        array_push($fleet[3]->getPositions(), new Position('G', 8));
        array_push($fleet[3]->getPositions(), new Position('H', 8));

        array_push($fleet[4]->getPositions(), new Position('C', 5));
        array_push($fleet[4]->getPositions(), new Position('C', 6));

        return $fleet;
    }

    public static function renderEnemyFleet2()
    {
        $fleet = GameController::initializeShips();

        array_push($fleet[0]->getPositions(), new Position('E', 4));
        array_push($fleet[0]->getPositions(), new Position('E', 5));
        array_push($fleet[0]->getPositions(), new Position('E', 6));
        array_push($fleet[0]->getPositions(), new Position('E', 7));
        array_push($fleet[0]->getPositions(), new Position('E', 8));

        array_push($fleet[1]->getPositions(), new Position('A', 1));
        array_push($fleet[1]->getPositions(), new Position('A', 2));
        array_push($fleet[1]->getPositions(), new Position('A', 3));
        array_push($fleet[1]->getPositions(), new Position('A', 4));

        array_push($fleet[2]->getPositions(), new Position('C', 1));
        array_push($fleet[2]->getPositions(), new Position('D', 1));
        array_push($fleet[2]->getPositions(), new Position('E', 1));

        array_push($fleet[3]->getPositions(), new Position('F', 2));
        array_push($fleet[3]->getPositions(), new Position('G', 2));
        array_push($fleet[3]->getPositions(), new Position('H', 2));

        array_push($fleet[4]->getPositions(), new Position('H', 5));
        array_push($fleet[4]->getPositions(), new Position('H', 6));

        return $fleet;
    }

    public static function renderEnemyFleet3()
    {
        $fleet = GameController::initializeShips();

        array_push($fleet[0]->getPositions(), new Position('E', 2));
        array_push($fleet[0]->getPositions(), new Position('E', 3));
        array_push($fleet[0]->getPositions(), new Position('E', 4));
        array_push($fleet[0]->getPositions(), new Position('E', 5));
        array_push($fleet[0]->getPositions(), new Position('E', 6));

        array_push($fleet[1]->getPositions(), new Position('C', 4));
        array_push($fleet[1]->getPositions(), new Position('C', 5));
        array_push($fleet[1]->getPositions(), new Position('C', 6));
        array_push($fleet[1]->getPositions(), new Position('C', 7));

        array_push($fleet[2]->getPositions(), new Position('E', 9));
        array_push($fleet[2]->getPositions(), new Position('F', 9));
        array_push($fleet[2]->getPositions(), new Position('G', 9));

        array_push($fleet[3]->getPositions(), new Position('A', 2));
        array_push($fleet[3]->getPositions(), new Position('B', 2));
        array_push($fleet[3]->getPositions(), new Position('C', 2));

        array_push($fleet[4]->getPositions(), new Position('A', 5));
        array_push($fleet[4]->getPositions(), new Position('A', 6));

        return $fleet;
    }

    public static function renderEnemyFleet4()
    {
        $fleet = GameController::initializeShips();

        array_push($fleet[0]->getPositions(), new Position('B', 2));
        array_push($fleet[0]->getPositions(), new Position('B', 3));
        array_push($fleet[0]->getPositions(), new Position('B', 4));
        array_push($fleet[0]->getPositions(), new Position('B', 5));
        array_push($fleet[0]->getPositions(), new Position('B', 6));

        array_push($fleet[1]->getPositions(), new Position('H', 2));
        array_push($fleet[1]->getPositions(), new Position('H', 3));
        array_push($fleet[1]->getPositions(), new Position('H', 4));
        array_push($fleet[1]->getPositions(), new Position('H', 5));

        array_push($fleet[2]->getPositions(), new Position('D', 2));
        array_push($fleet[2]->getPositions(), new Position('E', 2));
        array_push($fleet[2]->getPositions(), new Position('F', 2));

        array_push($fleet[3]->getPositions(), new Position('D', 6));
        array_push($fleet[3]->getPositions(), new Position('E', 6));
        array_push($fleet[3]->getPositions(), new Position('F', 6));

        array_push($fleet[4]->getPositions(), new Position('A', 7));
        array_push($fleet[4]->getPositions(), new Position('A', 8));

        return $fleet;
    }

    public static function renderEnemyFleet5()
    {
        $fleet = GameController::initializeShips();

        array_push($fleet[0]->getPositions(), new Position('H', 1));
        array_push($fleet[0]->getPositions(), new Position('H', 2));
        array_push($fleet[0]->getPositions(), new Position('H', 3));
        array_push($fleet[0]->getPositions(), new Position('H', 4));
        array_push($fleet[0]->getPositions(), new Position('H', 5));

        array_push($fleet[1]->getPositions(), new Position('E', 2));
        array_push($fleet[1]->getPositions(), new Position('E', 3));
        array_push($fleet[1]->getPositions(), new Position('E', 4));
        array_push($fleet[1]->getPositions(), new Position('E', 5));

        array_push($fleet[2]->getPositions(), new Position('A', 1));
        array_push($fleet[2]->getPositions(), new Position('B', 1));
        array_push($fleet[2]->getPositions(), new Position('C', 1));

        array_push($fleet[3]->getPositions(), new Position('A', 8));
        array_push($fleet[3]->getPositions(), new Position('B', 8));
        array_push($fleet[3]->getPositions(), new Position('C', 8));

        array_push($fleet[4]->getPositions(), new Position('H', 7));
        array_push($fleet[4]->getPositions(), new Position('H', 8));

        return $fleet;
    }

    public static function renderEnemyFleet6()
    {
        $fleet = GameController::initializeShips();

        array_push($fleet[0]->getPositions(), new Position('H', 1));
        array_push($fleet[0]->getPositions(), new Position('H', 2));
        array_push($fleet[0]->getPositions(), new Position('H', 3));
        array_push($fleet[0]->getPositions(), new Position('H', 4));
        array_push($fleet[0]->getPositions(), new Position('H', 5));

        array_push($fleet[1]->getPositions(), new Position('E', 2));
        array_push($fleet[1]->getPositions(), new Position('E', 3));
        array_push($fleet[1]->getPositions(), new Position('E', 4));
        array_push($fleet[1]->getPositions(), new Position('E', 5));

        array_push($fleet[2]->getPositions(), new Position('A', 1));
        array_push($fleet[2]->getPositions(), new Position('B', 1));
        array_push($fleet[2]->getPositions(), new Position('C', 1));

        array_push($fleet[3]->getPositions(), new Position('A', 8));
        array_push($fleet[3]->getPositions(), new Position('B', 8));
        array_push($fleet[3]->getPositions(), new Position('C', 8));

        array_push($fleet[4]->getPositions(), new Position('B', 4));
        array_push($fleet[4]->getPositions(), new Position('B', 5));

        return $fleet;
    }

    public static function renderEnemyFleet7()
    {
        $fleet = GameController::initializeShips();

        array_push($fleet[0]->getPositions(), new Position('H', 1));
        array_push($fleet[0]->getPositions(), new Position('H', 2));
        array_push($fleet[0]->getPositions(), new Position('H', 3));
        array_push($fleet[0]->getPositions(), new Position('H', 4));
        array_push($fleet[0]->getPositions(), new Position('H', 5));

        array_push($fleet[1]->getPositions(), new Position('E', 2));
        array_push($fleet[1]->getPositions(), new Position('E', 3));
        array_push($fleet[1]->getPositions(), new Position('E', 4));
        array_push($fleet[1]->getPositions(), new Position('E', 5));

        array_push($fleet[2]->getPositions(), new Position('E', 8));
        array_push($fleet[2]->getPositions(), new Position('F', 8));
        array_push($fleet[2]->getPositions(), new Position('G', 8));

        array_push($fleet[3]->getPositions(), new Position('A', 8));
        array_push($fleet[3]->getPositions(), new Position('B', 8));
        array_push($fleet[3]->getPositions(), new Position('C', 8));

        array_push($fleet[4]->getPositions(), new Position('B', 4));
        array_push($fleet[4]->getPositions(), new Position('B', 5));

        return $fleet;
    }

    public static function renderEnemyFleet8()
    {
        $fleet = GameController::initializeShips();

        array_push($fleet[0]->getPositions(), new Position('C', 1));
        array_push($fleet[0]->getPositions(), new Position('C', 2));
        array_push($fleet[0]->getPositions(), new Position('C', 3));
        array_push($fleet[0]->getPositions(), new Position('C', 4));
        array_push($fleet[0]->getPositions(), new Position('C', 5));

        array_push($fleet[1]->getPositions(), new Position('E', 2));
        array_push($fleet[1]->getPositions(), new Position('E', 3));
        array_push($fleet[1]->getPositions(), new Position('E', 4));
        array_push($fleet[1]->getPositions(), new Position('E', 5));

        array_push($fleet[2]->getPositions(), new Position('E', 8));
        array_push($fleet[2]->getPositions(), new Position('F', 8));
        array_push($fleet[2]->getPositions(), new Position('G', 8));

        array_push($fleet[3]->getPositions(), new Position('A', 8));
        array_push($fleet[3]->getPositions(), new Position('B', 8));
        array_push($fleet[3]->getPositions(), new Position('C', 8));

        array_push($fleet[4]->getPositions(), new Position('B', 4));
        array_push($fleet[4]->getPositions(), new Position('B', 5));

        return $fleet;
    }

    public static function getRandomPosition(\Battleship\Board $board)
    {
        while (true) {
            $letter = Letter::value(random_int(0, $board->getRows() - 1));
            $number = random_int(1, $board->getColumns());

            $position = new Position($letter, $number);
            try {
                $board->setField($position, 'shoot');
                break;
            } catch (\InvalidArgumentException $exception) {
                continue;
            }
        }

        return $position;
    }

    public static function InitializeMyFleet()
    {
        self::$myFleet = GameController::initializeShips();

        self::$console->println("Please position your fleet (Game board has size from A to H and 1 to 8) :");

        $positionBoard = new \Battleship\Board(8, 8);
        /** @var Ship $ship */
        foreach (self::$myFleet as $ship) {
            self::$console->println();
            printf("Please enter the positions for the %s (size: %s)", $ship->getName(), $ship->getSize());

            for ($i = 1; $i <= $ship->getSize(); $i++) {
                $parsedPosition = null;
                while (true) {
                    printf("\nEnter position %s of %s (i.e A3):", $i, $ship->getSize());
                    $position = readline("");

                    try {
                        $parsedPosition = self::parsePosition($position);
                        $positionBoard->setField($parsedPosition, $ship->getName());

                    } catch (InvalidArgumentException $e) {
                        self::$console->println($e->getMessage());
                        continue;
                    }
                    break;
                }

                $ship->addPosition($parsedPosition);
            }
        }
    }

    public static function beep()
    {
        echo "\007";
    }

    public static function InitializeGame()
    {
        self::InitializeMyFleet();
        self::InitializeEnemyFleet();
    }

    public static function StartGame()
    {
        self::$console->println("\033[2J\033[;H");
        self::$console->println("                  __");
        self::$console->println("                 /  \\");
        self::$console->println("           .-.  |    |");
        self::$console->println("   *    _.-'  \\  \\__/");
        self::$console->println("    \\.-'       \\");
        self::$console->println("   /          _/");
        self::$console->println("  |      _  /\" \"");
        self::$console->println("  |     /_\'");
        self::$console->println("   \\    \\_/");
        self::$console->println("    \" \"\" \"\" \"\" \"");

        while (true) {
            self::$console->println('======================================================');
            self::$console->println();
            self::$console->println(Color::MAGENTA . "Player, it's your turn" . Color::DEFAULT_GREY);
            self::$console->println();
            self::drawEnemyFleet();
            $parsedPosition = null;
            while (null === $parsedPosition) {
                self::$console->println("Enter coordinates for your shot :");
                $position = readline("");

                try {
                    $parsedPosition = self::parsePosition($position);
                } catch (InvalidArgumentException $e) {
                    self::$console->println(Color::CADET_BLUE . '~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~');
                    self::$console->println('You cannot shoot out of playing field.');
                    self::$console->println(Color::CADET_BLUE . '~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~');
                    self::$console->println(Color::DEFAULT_GREY);
                }
            }

            $ship = GameController::getShip(self::$enemyFleet, $parsedPosition);
            $isHit = null !== $ship;
            if ($isHit) {
                $ship->hit();
                self::beep();
                self::$console->println(Color::RED);
                self::$console->println("                \\         .  ./");
                self::$console->println("              \\      .:\" \";'.:..\" \"   /");
                self::$console->println("                  (M^^.^~~:.'\" \").");
                self::$console->println("            -   (/  .    . . \\ \\)  -");
                self::$console->println("               ((| :. ~ ^  :. .|))");
                self::$console->println("            -   (\\- |  \\ /  |  /)  -");
                self::$console->println("                 -\\  \\     /  /-");
                self::$console->println("                   \\  \\   /  /");
            }
            self::$console->println(Color::CADET_BLUE . '~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~');
            self::$console->println();
            if ($isHit) {
                $line = Color::CHARTREUSE . 'Yeah ! Nice hit !';
                if (true === self::isFleetDestroyed(self::$enemyFleet)) {
                    self::drawEnemyFleet();
                    self::$console->println(Color::MAGENTA . 'You are the winner!');
                    self::$console->println(Color::DEFAULT_GREY);
                    exit();
                }
            } else {
                $line = Color::CADET_BLUE . 'Miss';
            }
            self::$console->println($line . Color::DEFAULT_GREY);
            if ($isHit) {
                if ($ship->isDestroyed()) {
                    self::$console->println(Color::CHARTREUSE . 'Enemy\'s ' . $ship->getName() . ' was destroyed!' . Color::DEFAULT_GREY);
                }
            }
            self::$console->println();

            $position = self::getRandomPosition(self::$computerShootBoard);
            $ship = GameController::getShip(self::$myFleet, self::parsePosition($position));
            $isHit = null !== $ship;
            self::$console->println(Color::CADET_BLUE . '~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~');
            self::$console->println();
            $line = sprintf(Color::ORANGE . 'Computer shoot' . Color::DEFAULT_GREY . ' in %s%s and ', $position->getRow(), $position->getColumn());
            if ($isHit) {
                $line .= Color::RED . 'hit your ship !';
            } else {
                $line .= Color::CADET_BLUE . 'miss';
            }
            self::$console->println($line . Color::DEFAULT_GREY);
            if ($isHit) {
                $ship->hit();
                self::$console->println();
                self::beep();
                self::$console->println(Color::RED);
                self::$console->println("                \\         .  ./");
                self::$console->println("              \\      .:\" \";'.:..\" \"   /");
                self::$console->println("                  (M^^.^~~:.'\" \").");
                self::$console->println("            -   (/  .    . . \\ \\)  -");
                self::$console->println("               ((| :. ~ ^  :. .|))");
                self::$console->println("            -   (\\- |  \\ /  |  /)  -");
                self::$console->println("                 -\\  \\     /  /-");
                self::$console->println("                   \\  \\   /  /");
            }
            self::$console->println(Color::DEFAULT_GREY);
            if (true === self::isFleetDestroyed(self::$myFleet)) {
                self::$console->println(Color::ORANGE . 'You lost!');
                exit();
            }
        }
    }

    public static function drawEnemyFleet() : void
    {
        self::$console->println(Color::MAGENTA . "Enemy's ships:");
        self::$console->println(Color::DEFAULT_GREY);
        /** @var Ship $ship */
        foreach (self::$enemyFleet as $ship) {
            $line = '- ' . $ship->getName() . ', size: ' . $ship->getSize();
            if ($ship->isDestroyed()) {
                $line .= Color::CHARTREUSE . ' DESTROYED' . Color::DEFAULT_GREY;
            }
            self::$console->println($line);
        }
        self::$console->println();
    }

    public static function isFleetDestroyed($fleet) : bool
    {
        foreach ($fleet as $ship) {
            if (false === $ship->isDestroyed()) {
                return false;
            }
        }

        return true;
    }

    public static function parsePosition($input)
    {
        $letter = substr($input, 0, 1);
        $number = substr($input, (strlen($input) - 1) * -1);

        Letter::validate($letter);
        if (!is_numeric($number)) {
            throw new InvalidArgumentException("Not a number: $number");
        }

        if ($number > 8) {
            throw new InvalidArgumentException('Your position is out of playing field.');
        }

        return new Position($letter, $number);
    }
}
