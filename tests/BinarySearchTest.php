<?php

require_once('../src/BinarySearch.php');

class BinarySearchTest extends PHPUnit_Framework_TestCase 
{
    /**
     *
     * @var BinarySearch 
     */
    public $binary;
    /**
     *
     * @var array
     */
    public $empty_data = [];
    /**
     *
     * @var array
     */
    public $one_element = [1]; 
    /**
     *
     * @var array
     */
    public $two_elements = [1,2];   
    /**
     *
     * @var array
     */    
    public $many_elements = [-189, -55, -34, -9, 0, 1, 6, 9, 10, 12, 25, 45, 67, 287, 633, 673, 783, 942];     


    public function setUp() 
    {
        $this->binary = new BinarySearch();
    }

    public function tearDown() 
    {
        
    }

    public function testEmptyData() 
    {
        $result = $this->binary->search(1, $this->empty_data);
        $this->assertEquals($result, false);
    }
    
    public function testOneElement() 
    {
        $result = $this->binary->search(1, $this->one_element);
        $this->assertEquals($result, 0);
        
        $result = $this->binary->search(2, $this->one_element);
        $this->assertEquals($result, false);
    }    
    
    public function testTwoElements() 
    {
        $result = $this->binary->search(1, $this->two_elements);
        $this->assertEquals($result, 0);
        
        $result = $this->binary->search(2, $this->two_elements);
        $this->assertEquals($result, 1);        
    }    
    
    public function testManyElements() 
    {
        $result = $this->binary->search(-34, $this->many_elements);
        $this->assertEquals($result, 2);
        
        $result = $this->binary->search(-1, $this->many_elements);
        $this->assertEquals($result, false); 
        
        $result = $this->binary->search(0, $this->many_elements);
        $this->assertEquals($result, 4); 

        $result = $this->binary->search(11, $this->many_elements);
        $this->assertEquals($result, false); 

        $result = $this->binary->search(25, $this->many_elements);
        $this->assertEquals($result, 10); 

        $result = $this->binary->search(673, $this->many_elements);
        $this->assertEquals($result, 15);         
    }     

    public function testLastFirstElement() 
    {
        $result = $this->binary->search(-189, $this->many_elements);
        $this->assertEquals($result, 0);
        
        $result = $this->binary->search(942, $this->many_elements);
        $this->assertEquals($result, 17); 
    }     
    
    public function testOutsideData() 
    {
        $result = $this->binary->search(-479, $this->many_elements);
        $this->assertEquals($result, false);
        
        $result = $this->binary->search(1294, $this->many_elements);
        $this->assertEquals($result, false); 
    }     
    
}
