@javascript
Feature: Search
    In order to find articles
    As a website visitor
    I need to be able to search for articles

    Scenario: Searching for an article that exists
        Given I am on the homepage
         When I fill in "search" with "BDD"
          And I press "go"
          And I follow "Behavior-driven development"
         Then I should see "History"
         Then I should see "T Day"
          And I should see "Principles of BDD"
          And I should see "Story versus specification"

    Scenario: Searching for an article that does not exist
        Given I am on the homepage
         When I fill in "search" with "umpirsky"
          And I press "go"
         Then I should see "There were no results matching the query."
          And I should not see "Saša Stamenković"
