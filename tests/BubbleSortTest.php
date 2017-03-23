<?php

require_once('../src/BubbleSort.php');

class BubbleSortTest extends PHPUnit_Framework_TestCase 
{
    /**
     *
     * @var BubbleSort 
     */
    public $bubble;
    /**
     *
     * @var array
     */
    public $unsorted_data = [2, 0, -1, 3, 1];
    /**
     *
     * @var array
     */    
    public $sorted_data = [-1, 0, 1, 2, 3];


    public function setUp() 
    {
        $this->bubble = new BubbleSort();
    }

    public function tearDown() 
    {
        
    }

    public function testSort() 
    {
        $sorted_data = $this->bubble->sort($this->unsorted_data);

        $this->assertInternalType('array', $sorted_data);
        $this->assertEquals($sorted_data, $this->sorted_data);
    }

}
