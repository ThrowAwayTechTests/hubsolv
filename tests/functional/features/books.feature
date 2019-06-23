Feature: Testing Books
    This is all the tests for the books and categories.

Scenario: View books
    Given I am an api consumer
    When I filter by author "Robin Nixon"
    Then I should receive a 200 response
    And the body should contain two results
    And the body should contain "978-1491918661"
    And the body should contain "978-0596804848"

Scenario: Filter author
    Given I am an api consumer
    When I filter by author "Christopher Negus"
    Then I should receive a 200 response
    And the body should contain one result
    And the body should contain "978-1118999875"

Scenario: View categories
    Given I am an api consumer
    When I query the api for a list of categories
    Then I should receive a 200 response
    And the body should contain three results
    And the body should contain "PHP"
    And the body should contain "Javascript"
    And the body should contain "Linux"

Scenario: Filter books by category
    Given I am an api consumer
    When I filter by category "Linux"
    Then I should receive a 200 response
    And the body should contain two results
    And the body should contain "978-0596804848"
    And the body should contain "978-1118999875"

Scenario: Filter other books by cartegory
    Given I am an api consumer
    When I filter by category "PHP"
    Then I should receive a 200 response
    And the body should contain one result
    And the body should contain "978-1491918661"

Scenario: Filter books by author
    Given I am an api consumer
    When I filter by author "Robin Nixon"
    And I filter by category "Linux"
    Then I should receive a 200 response
    And the body should contain one result
    And the body should contain "978-0596804848"

Scenario: Create book
    Given I am an api consumer
    When I create the following book:
        | isbn           | title                                       | author        | category | price |
        | 978-1491905012 | Modern PHP: New Features and Good Practices | Josh Lockhart | PHP      | 18.99 |
    Then I should receive a 201 response
    And the body should contain "978-1491905012"
    And the body should contain "Modern PHP: New Features and Good Practices"
    And the body should contain "Josh Lockhart"
    And the body should contain "PHP"
    And the body should contain "18.99"

Scenario: Create book and test validation
    Given I am an api consumer
    When I create the following book:
        | isbn                        | title                                       | author        | category | price |
        | 978-INVALID-ISBN-1491905012 | Modern PHP: New Features and Good Practices | Josh Lockhart | PHP      | 18.99 |
    Then I should receive a 400 response
    And the body should contain "Invalid ISBN"
