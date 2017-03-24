<?php

set_time_limit(0);

include 'src/BinarySearch.php';
include 'src/BubbleSort.php';
include 'lib/Benchmark.php';


$benchmark = new Benchmark();


$array_100 = [];
$array_1000 = [];
$array_10000 = [];
$array_100000 = [];
$array_1000000 = [];



for ($i=0; $i<100; $i++) {
    $array_100[] = mt_rand(0, 100);
}
for ($i=0; $i<1000; $i++) {
    $array_1000[] = mt_rand(0, 1000);
}
for ($i=0; $i<10000; $i++) {
    $array_10000[] = mt_rand(0, 10000);
}
for ($i=0; $i<100000; $i++) {
    $array_100000[] = mt_rand(0, 100000);
}
for ($i=0; $i<1000000; $i++) {
    $array_100000[] = mt_rand(0, 1000000);
}

$array_100_copy = $array_100;
$array_1000_copy = $array_1000;
$array_10000_copy = $array_10000;



/**
 * Test bubble sort
 */
$bubble = new BubbleSort();

$benchmark->mark('begin_sort_100'); 
sort($array_100);
$sort_100 = $benchmark->elapsedTime('begin_sort_100', 'end_sort_100'); 
$benchmark->mark('begin_sort_100_copy');
$bubble->sort($array_100_copy);
$sort_100_copy = $benchmark->elapsedTime('begin_sort_100_copy', 'end_sort_100_copy'); 

$benchmark->mark('begin_sort_1000'); 
sort($array_1000);
$sort_1000 = $benchmark->elapsedTime('begin_sort_1000', 'end_sort_1000'); 
$benchmark->mark('begin_sort_1000_copy');
$bubble->sort($array_1000_copy);
$sort_1000_copy = $benchmark->elapsedTime('begin_sort_1000_copy', 'end_sort_1000_copy');

$benchmark->mark('begin_sort_10000'); 
sort($array_10000);
$sort_10000 = $benchmark->elapsedTime('begin_sort_10000', 'end_sort_10000'); 
$benchmark->mark('begin_sort_10000_copy');
$bubble->sort($array_10000_copy);
$sort_10000_copy = $benchmark->elapsedTime('begin_sort_10000_copy', 'end_sort_10000_copy');



/**
 * Test binary search
 */
$binary = new BinarySearch();

sort($array_100);
sort($array_1000);
sort($array_10000);
sort($array_100000);
sort($array_1000000);

reset($array_100);
reset($array_1000);
reset($array_10000);
reset($array_100000);
reset($array_1000000);

$benchmark->mark('begin_search_100'); 
$position = array_search(50, $array_100);
$search_100 = $benchmark->elapsedTime('begin_search_100', 'end_search_100', 6);
$benchmark->mark('begin_search_100_in_array'); 
$position = in_array(50, $array_100);
$search_100_in_array = $benchmark->elapsedTime('begin_search_100_in_array', 'end_search_100_in_array', 6);
$benchmark->mark('begin_search_100_second');
$position = $binary->search(50, $array_100);
$search_100_second = $benchmark->elapsedTime('begin_search_100_second', 'end_search_100_second', 6);

$benchmark->mark('begin_search_1000'); 
$position = array_search(50, $array_1000);
$search_1000 = $benchmark->elapsedTime('begin_search_1000', 'end_search_1000', 6);
$benchmark->mark('begin_search_1000_in_array'); 
$position = in_array(50, $array_1000);
$search_1000_in_array = $benchmark->elapsedTime('begin_search_1000_in_array', 'end_search_1000_in_array', 6);
$benchmark->mark('begin_search_1000_second');
$position = $binary->search(50, $array_1000);
$search_1000_second = $benchmark->elapsedTime('begin_search_1000_second', 'end_search_1000_second', 6);

$benchmark->mark('begin_search_10000'); 
$position = array_search(50, $array_10000);
$search_10000 = $benchmark->elapsedTime('begin_search_10000', 'end_search_10000', 6);
$benchmark->mark('begin_search_10000_in_array'); 
$position = in_array(50, $array_10000);
$search_10000_in_array = $benchmark->elapsedTime('begin_search_10000_in_array', 'end_search_10000_in_array', 6);
$benchmark->mark('begin_search_10000_second');
$position = $binary->search(50, $array_10000);
$search_10000_second = $benchmark->elapsedTime('begin_search_10000_second', 'end_search_10000_second', 6);

$benchmark->mark('begin_search_100000'); 
$position = array_search(50, $array_100000);
$search_100000 = $benchmark->elapsedTime('begin_search_100000', 'end_search_100000', 6);
$benchmark->mark('begin_search_100000_in_array'); 
$position = in_array(50, $array_100000);
$search_100000_in_array = $benchmark->elapsedTime('begin_search_100000_in_array', 'end_search_100000_in_array', 6);
$benchmark->mark('begin_search_100000_second');
$position = $binary->search(50, $array_100000);
$search_100000_second = $benchmark->elapsedTime('begin_search_100000_second', 'end_search_100000_second', 6);

$benchmark->mark('begin_search_1000000'); 
$position = array_search(50, $array_1000000);
$search_1000000 = $benchmark->elapsedTime('begin_search_1000000', 'end_search_1000000', 6);
$benchmark->mark('begin_search_1000000_in_array'); 
$position = in_array(50, $array_1000000);
$search_1000000_in_array = $benchmark->elapsedTime('begin_search_1000000_in_array', 'end_search_1000000_in_array', 6);
$benchmark->mark('begin_search_1000000_second');
$position = $binary->search(50, $array_1000000);
$search_1000000_second = $benchmark->elapsedTime('begin_search_1000000_second', 'end_search_1000000_second', 6);


?>

<h3>Сортировка, нагрузочные тесты</h3>

<table>
    <thead>
        <tr>
            <th>
                
            </th>
            <th>
                PHP::sort()
                <br>сек.
            </th>
            <th>
                BubbleSort()->sort()
                <br>сек.
            </th>            
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                Массив из 100 элементов
            </td>
            <td><?=$sort_100?></td>
            <td><?=$sort_100_copy?></td>            
        </tr>  
        <tr>
            <td>
                Массив из 1000 элементов
            </td>
            <td><?=$sort_1000?></td>
            <td><?=$sort_1000_copy?></td>             
        </tr>  
        <tr>
            <td>
                Массив из 10000 элементов
            </td>
            <td><?=$sort_10000?></td>
            <td><?=$sort_10000_copy?></td>               
        </tr>  
    </tbody>    
</table>


<h3>Поиск позиции элемента, нагрузочные тесты</h3>

<table>
    <thead>
        <tr>
            <th>
                
            </th>
            <th>
                PHP::array_search()
                <br>сек.
            </th>
            <th>
                PHP::in_array()
                <br>сек.
            </th>            
            <th>
                BinarySearch()->search()
                <br>сек.
            </th>            
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                Массив из 100 элементов
            </td>
            <td><?=$search_100?></td>
            <td><?=$search_100_in_array?></td>
            <td><?=$search_100_second?></td>               
        </tr>  
        <tr>
            <td>
                Массив из 1000 элементов
            </td>
            <td><?=$search_1000?></td>
            <td><?=$search_1000_in_array?></td>
            <td><?=$search_1000_second?></td>              
        </tr>  
        <tr>
            <td>
                Массив из 10000 элементов
            </td>
            <td><?=$search_10000?></td>
            <td><?=$search_10000_in_array?></td>
            <td><?=$search_10000_second?></td>             
        </tr>  
        <tr>
            <td>
                Массив из 100000 элементов
            </td>
            <td><?=$search_100000?></td>
            <td><?=$search_100000_in_array?></td>
            <td><?=$search_100000_second?></td>               
        </tr>  
        <tr>
            <td>
                Массив из 1000000 элементов
            </td>
            <td><?=$search_1000000?></td>
            <td><?=$search_1000000_in_array?></td>
            <td><?=$search_1000000_second?></td>               
        </tr>         
    </tbody>    
</table>
