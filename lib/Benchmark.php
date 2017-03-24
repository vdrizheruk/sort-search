<?php

class Benchmark 
{

    /**
     * List of all benchmark markers
     *
     * @var array
     */
    public $marker = [];
    
    public function __construct() 
    {
        $this->mark('begin');
    }

    /**
     * Set a benchmark marker
     * Multiple calls to this function can be made so that several
     * execution points can be timed.
     *
     * @param string
     * @return void
     */
    public function mark($name) 
    {
        $this->marker[$name] = microtime(true);
    }

    /**
     * Elapsed time
     * Calculates the time difference between two marked points
     * 
     * @param string
     * @param string
     * @param int
     * @return string
     */
    public function elapsedTime($point1 = '', $point2 = '', $decimals = 4) 
    {
        if (!isset($this->marker[$point1])) {
            return '';
        }
        if (!isset($this->marker[$point2])) {
            $this->marker[$point2] = microtime(true);
        }
        
        return number_format($this->marker[$point2] - $this->marker[$point1], $decimals);
    }

}
