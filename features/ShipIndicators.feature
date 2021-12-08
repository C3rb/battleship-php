Feature: Redable interface
  As a player
  I want to see which enemies ship is sunked

  Scenario: Sunk the enemy ship
    Given I have a shot 
    When I have shot last enemies single ship squares
    Then the result should be true

  Scenario: Hit the enemies ship
    Given I have a shot 
    When I have shot a single enemies ship square
    Then the result should be false

