<?php

include 'src/BinarySearch.php';
include 'src/BubbleSort.php';

$binary = new BinarySearch();
$bubble = new BubbleSort();

$unsorted_data = [2,3,1];
$sorted_data = $bubble->sort($unsorted_data);
$result = $binary->search(2, $sorted_data);
