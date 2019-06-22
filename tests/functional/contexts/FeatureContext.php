<?php

use Behat\MinkExtension\Context\MinkContext;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use PHPUnit\Framework\TestCase;

class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{
    private $role = '';
    private $client;
    private $response;
    private $contents;
    private $filters = [];

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    /**
     * @Given I am an api consumer
     */
    public function iAmAnApiConsumer()
    {
        $this->role = 'consumer';
    }

    /**
     * @When I filter by author :arg1
     */
    public function iFilterByAuthor($arg1)
    {
        $this->filters['author'] = $arg1;
        $this->response = $this->client->request('GET', 'http://localhost/book?' . http_build_query($this->filters));
        $this->contents = $this->response->getBody()->getContents();
    }

    /**
     * @Then I should receive a :arg1 response
     */
    public function iShouldReceiveAResponse($arg1)
    {
        TestCase::assertEquals($this->response->getStatusCode(), $arg1);
    }

    /**
     * @Then the body should contain three results
     */
    public function theBodyShouldContainThreeResults()
    {
        $results = json_decode($this->contents);
        TestCase::assertEquals(count($results), 3);
    }

    /**
     * @Then the body should contain two results
     */
    public function theBodyShouldContainTwoResults()
    {
        $results = json_decode($this->contents);
        TestCase::assertEquals(count($results), 2);
    }

    /**
     * @Then the body should contain one result
     */
    public function theBodyShouldContainOneResult()
    {
        $results = json_decode($this->contents);
        TestCase::assertEquals(count($results), 1);
    }

    /**
     * @Then the body should contain :arg1
     */
    public function theBodyShouldContain($arg1)
    {
        TestCase::assertEquals(
            str_contains($this->contents, $arg1)
            , true
        );
    }

    /**
     * @When I query the api for a list of categories
     */
    public function iQueryTheApiForAListOfCategories()
    {
        $this->response = $this->client->request('GET', 'http://localhost/category');
        $this->contents = $this->response->getBody()->getContents();
    }

    /**
     * @When I filter by category :arg1
     */
    public function iFilterByCategory($arg1)
    {
        $this->filters['category'] = $arg1;
        $this->response = $this->client->request('GET', 'http://localhost/book?' . http_build_query($this->filters));
        $this->contents = $this->response->getBody()->getContents();
    }

    /**
     * @When I create the following book:
     */
    public function iCreateTheFollowingBook(TableNode $table)
    {
        foreach ($table as $row) {
            $options = [
                'form_params' => $row,
                'http_errors' => false,
            ];
            $this->response = $this->client->request('POST', 'http://localhost/book', $options);
            $this->contents = $this->response->getBody()->getContents();
        }
    }
}
