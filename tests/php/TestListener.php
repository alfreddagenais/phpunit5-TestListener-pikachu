<?php

class TestListener extends PHPUnit_Framework_BaseTestListener
{

    /** @var integer */
    private $testStartedTotal = 0;

    /** @var integer */
    private $testEndedTotal = 0;

    /** @var integer */
    private $testErrorTotal = 0;

    /**
     * Class Constructor
     */
    public function __construct()
    {
    } // does nothing but throws an error if not here

    /**
     * Add Error
     *
     * @param PHPUnit_Framework_Test $test Test
     * @param Exception              $e    Exception
     * @param float                  $time time
     *
     * @return void
     */
    public function addError(PHPUnit_Framework_Test $test, Exception $e, $time)
    {
        echo "\n";
        printf("Error while running test '%s'.\n", $test->getName());
        $this->testErrorTotal++;
    }

    /**
     * Add Warning
     *
     * @param PHPUnit_Framework_Test    $test Test
     * @param PHPUnit_Framework_Warning $e    Warning
     * @param float                     $time time
     *
     * @return void
     */
    public function addWarning(PHPUnit_Framework_Test $test, PHPUnit_Framework_Warning $e, $time)
    {
        echo "\n";
        printf("Warning while running test '%s'.\n", $test->getName());
    }

    /**
     * Add Failure
     *
     * @param PHPUnit_Framework_Test                 $test Test
     * @param PHPUnit_Framework_AssertionFailedError $e    AssertionFailedError
     * @param float                                  $time time
     *
     * @return void
     */
    public function addFailure(PHPUnit_Framework_Test $test, PHPUnit_Framework_AssertionFailedError $e, $time)
    {
        echo "\n";
        printf("Test '%s' failed.\n", $test->getName());
        $this->testErrorTotal++;
    }

    /**
     * Add Incomplete Test
     *
     * @param PHPUnit_Framework_Test $test Test
     * @param Exception              $e    Exception
     * @param float                  $time time
     *
     * @return void
     */
    public function addIncompleteTest(PHPUnit_Framework_Test $test, Exception $e, $time)
    {
        printf("Test '%s' is incomplete.\n", $test->getName());
    }

    /**
     * Add Risky Test
     *
     * @param PHPUnit_Framework_Test $test Test
     * @param Exception              $e    Exception
     * @param float                  $time time
     *
     * @return void
     */
    public function addRiskyTest(PHPUnit_Framework_Test $test, Exception $e, $time)
    {
        printf("Test '%s' is deemed risky.\n", $test->getName());
    }

    /**
     * Add Skipped Test
     *
     * @param PHPUnit_Framework_Test $test Test
     * @param Exception              $e    Exception
     * @param float                  $time time
     *
     * @return void
     */
    public function addSkippedTest(PHPUnit_Framework_Test $test, Exception $e, $time)
    {
        // Ex.: // printf("Test '%s' has been skipped.\n", $test->getName());
    }

    /**
     * Start Test
     *
     * @param PHPUnit_Framework_Test $test Test
     *
     * @return void
     */
    public function startTest(PHPUnit_Framework_Test $test)
    {
        // Ex.: // printf("Test '%s' started.\n", $test->getName());
        $this->testStartedTotal++;
    }

    /**
     * End Test
     *
     * @param PHPUnit_Framework_Test $test Test
     * @param float                  $time time
     *
     * @return void
     */
    public function endTest(PHPUnit_Framework_Test $test, $time)
    {
        // Ex.: // printf("Test '%s' ended.\n", $test->getName());
        $this->testEndedTotal++;
    }

    /**
     * Start TestSuite
     *
     * @param PHPUnit_Framework_TestSuite $suite Suite
     *
     * @return void
     */
    public function startTestSuite(PHPUnit_Framework_TestSuite $suite)
    {
        // Ex.: // printf("TestSuite '%s' started.\n", $suite->getName());
    }

    /**
     * EndTest Suite
     *
     * @param PHPUnit_Framework_TestSuite $suite Suite
     *
     * @return void
     */
    public function endTestSuite(PHPUnit_Framework_TestSuite $suite)
    {
        $sSuiteName = trim($suite->getName());
        if ($sSuiteName != 'tests') {
            return;
        }

        if ($suite->count() != $this->testStartedTotal) {
            return;
        }

        if ($this->testErrorTotal > 0) {
            return;
        }

        // See on this github repos https://github.com/chornsby/pytest-pikachu
        // Inspired from https://www.reddit.com/r/ProgrammerHumor/comments/a381ur/the_correct_reaction_to_unit_tests_passing/

        echo "\n\n" .
            "⢀⣠⣾⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⠀⠀⠀⠀⣠⣤⣶⣶\n" .
            "⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⠀⠀⠀⢰⣿⣿⣿⣿\n" .
            "⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣧⣀⣀⣾⣿⣿⣿⣿\n" .
            "⣿⣿⣿⣿⣿⡏⠉⠛⢿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡿⣿\n" .
            "⣿⣿⣿⣿⣿⣿⠀⠀⠀⠈⠛⢿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⠿⠛⠉⠁⠀⣿\n" .
            "⣿⣿⣿⣿⣿⣿⣧⡀⠀⠀⠀⠀⠙⠿⠿⠿⠻⠿⠿⠟⠿⠛⠉⠀⠀⠀⠀⠀⣸⣿\n" .
            "⣿⣿⣿⣿⣿⣿⣿⣷⣄⠀⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⣴⣿⣿\n" .
            "⣿⣿⣿⣿⣿⣿⣿⣿⣿⠏⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠠⣴⣿⣿⣿⣿\n" .
            "⣿⣿⣿⣿⣿⣿⣿⣿⡟⠀⠀⢰⣹⡆⠀⠀⠀⠀⠀⠀⣭⣷⠀⠀⠀⠸⣿⣿⣿⣿\n" .
            "⣿⣿⣿⣿⣿⣿⣿⣿⠃⠀⠀⠈⠉⠀⠀⠤⠄⠀⠀⠀⠉⠁⠀⠀⠀⠀⢿⣿⣿⣿\n" .
            "⣿⣿⣿⣿⣿⣿⣿⣿⢾⣿⣷⠀⠀⠀⠀⡠⠤⢄⠀⠀⠀⠠⣿⣿⣷⠀⢸⣿⣿⣿\n" .
            "⣿⣿⣿⣿⣿⣿⣿⣿⡀⠉⠀⠀⠀⠀⠀⢄⠀⢀⠀⠀⠀⠀⠉⠉⠁⠀⠀⣿⣿⣿\n" .
            "⣿⣿⣿⣿⣿⣿⣿⣿⣧⠀⠀⠀⠀⠀⠀⠀⠈⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢹⣿⣿\n" .
            "⣿⣿⣿⣿⣿⣿⣿⣿⣿⠃⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢸⣿⣿\n";
    }
}
