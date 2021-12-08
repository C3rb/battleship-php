Feature: Redable interface
  As a player
  I want a clean user interface

  Scenario: Hit the enemy ship
    Given I have a shot 
    When I made a shot in coordinates with enemy ship
    Then the result should be true

  Scenario: Hit the water ship  
    Given I have a shot 
    When I made a shot in coordinates without enemy ship
    Then the result should be false

  Scenario: Game steps separate  
    Given Game starts 
    When I made a shot 
    Then after the result separator appears


