<?php

include 'src/BinarySearch.php';
include 'src/BubbleSort.php';

$binary = new BinarySearch();
$bubble = new BubbleSort();

$data = [2,3,1];
$data = $bubble->sort($data);
$binary->search(2, $data);
