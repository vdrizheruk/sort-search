<?php

/**
 * Implementation of binary search
 *
 * @author vladimir.prokhnenko
 */
class BinarySearch
{
    /**
     *
     * @param int $element
     * @return mixed
     */
    public function search(int $element, array $data)
    {
        $count_elements = count($data);

        $begin = 0;
        $end = $count_elements - 1;

        $prev_begin = $begin;
        $prev_end = $end;

        while (true) {
            $position = round(($begin + $end) / 2);
            
            if (isset($data[$position])) {
                if ($data[$position] == $element) {
                    return $position;
                }

                if ($data[$position] > $element) {
                    $end = floor(($begin + $end) / 2);
                } elseif ($data[$position] < $element) {
                    $begin = ceil(($begin + $end) / 2);
                }
            }

            if ($prev_begin == $begin && $prev_end == $end) {
                return false;
            }
            $prev_begin = $begin;
            $prev_end = $end;
        }
    }
    
}
