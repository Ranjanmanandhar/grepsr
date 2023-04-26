<?php

$products = array(
    'Home' => array(
        'Electronics & Accessories' => array(
            'items' => array(
                array(
                    'title' => 'SanDisk 256',
                    'price' => '24.45'
                ),
                array(
                    'title' => 'Jabra Wireless Headset',
                    'price' => '55.12'
                )
            ),
            'Accessories' => array(
                'items' => array(
                    array(
                        'title' => 'DJI OM 5 Smartphone Gimbal Stabilizer',
                        'price' => '129.99'
                    ),
                    array(
                        'title' => 'SAMSUNG Galaxy SmartTag',
                        'price' => '30.00'
                    )
                )
            )
        )
    )
);

$category = '';
$filtered_arr = [];
print_r(recursiveFunction($products));

function recursiveFunction($products)
{
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    global $category;
    global $filtered_arr;
    foreach ($products as $key => $value) {
        $arr = [];


        if (is_array($value)) {
            if ($key != 'items') {
                $category .= $key . ' > ';
                recursiveFunction($value);
            } else {
                foreach ($value as $val) {
                    $arr = $val;
                    $arr['category'] = $category;
                    $filtered_arr = array_merge($filtered_arr,$arr);
                    echo '<pre>'; 
                    print_r($filtered_arr);
                }
            }
        }

    }
    echo '<pre>'; 
    // return $filtered_arr;
}
