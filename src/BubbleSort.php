<?php

/**
 * Implementation of bubble sort
 *
 * @author vladimir.prokhnenko
 */
class BubbleSort 
{
    /**
     * 
     * @param array $data
     * @return array
     */
    public function sort(array $data) 
    {
        $count_elements = count($data); 
        $iterations = $count_elements - 1;

        for ($i=0; $i < $count_elements; $i++) {
            for ($j=0; $j < $iterations; $j++) {
                if ($data[$j] > $data[($j + 1)]) {
                    list($data[$j], $data[($j + 1)]) = array($data[($j + 1)], $data[$j]);
                }
            }
            $iterations--;
        }
        
        return $data;
    }
}
