Feature: Validate ships
  In order to avoid cheating
  As a player
  I want to be notified if my ship has an invalid placement

  Scenario: Valid ship placement
    Given I have a 5 ship with 5 positions
    When I check if the ship is valid
    Then the result should be true

  Scenario: Invalid ship placement
    Given I have a 5 ship with 4 positions
    When I check if the ship is valid
    Then the result should be false

  Scenario: Invalid single ship placement
    Given I have to place a 5 ships in a coordinates
    When I choose same coordinate that previously used
    Then the result should be false
