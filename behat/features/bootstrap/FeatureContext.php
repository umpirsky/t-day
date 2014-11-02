<?php

use Behat\MinkExtension\Context\MinkContext;
use Behat\MinkExtension\Context\RawMinkContext;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;

class FeatureContext extends MinkContext implements SnippetAcceptingContext
{
    private $output;
    /**
     * @Given I have a file named :file
     */
    public function iHaveAFileNamed($file)
    {
        touch($file);
    }

    /**
     * @When I run :command
     */
    public function iRun($command)
    {
        $this->output = shell_exec($command);
    }

    /**
     * @Then I should see :text in the output
     */
    public function iShouldSeeInTheOutput($text)
    {
        if (false === strpos($this->output, $text)) {
            throw new \Exception(sprintf('%s not found in command output.', $text));
        }
    }
}
