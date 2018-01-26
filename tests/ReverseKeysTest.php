<?php
namespace Rioxygen\PayJoy;

use Rioxygen\PayJoy\ReverseKeys;

/**
 * Test
 * @version 1.0
 * @author Ricardo Ruiz <rrrcfesc@gmail.com>
 */
class ReverseKeysTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     * @var ReverseKeys
     */
    public $classTest;
    /**
     * Method setup
     */
    public function setup()
    {
        $this->classTest = new ReverseKeys();
    }
    public function testuno()
    {
        $input = "44 444";
        $output = $this->classTest->reverse_t9($input);
        $this->assertEquals($output, "hi");
    }
    public function testdos()
    {
        $input = "999337777";
        $output = $this->classTest->reverse_t9($input);
        $this->assertEquals($output, "yes");
    }
    public function testtres()
    {
        $input = "44204420442";
        $output = $this->classTest->reverse_t9($input);
        $this->assertEquals($output, "ha ha ha");
    }
    public function testcuatro()
    {
        $input = "2 22 223 33 3334 44 4445 55 5556 66 666";
        $output = $this->classTest->reverse_t9($input);
        $this->assertEquals($output, "abcdefghijklmno");
    }
}