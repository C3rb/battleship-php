Feature: Redable interface
  As a player
  I want to see results after all my/enemy ships are sunked 

  Scenario: Sunk all enemy ship
    Given I have a shot 
    When I have shot last enemies ship
    Then the result should be shown with a modal restart or end a game

  Scenario: All my ships are sunked
    Given Computer have a shot 
    When Computer shot my last ship
    Then the result should be shown with a modal restart or end a game

