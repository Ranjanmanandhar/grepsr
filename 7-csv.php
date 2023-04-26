<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$url = 'https://dummyjson.com/products/search?q=Laptop';

$array = json_decode(file_get_contents($url), true);

$allowed_column = ['title', 'price', 'brand'];

$filtered_products = [];

foreach ($array['products'] as $products) {

    $filtered_array = array_filter(
        $products,
        function ($key) use ($allowed_column) {
            return in_array($key, $allowed_column);
        },
        ARRAY_FILTER_USE_KEY
    );
    array_push($filtered_products, $filtered_array);
}

$rows = [];

$column_header = json_encode(array_keys($filtered_products[0]));


array_push($rows,$column_header);

foreach($filtered_products as $products)
{
    array_push($rows,json_encode(array_values($products))); 
}

$path = 'new-file.csv';
$fp = fopen($path, 'a');
foreach ($rows as $row) {
    fputcsv($fp, $row);
}
fclose($fp);
print_r($rows);



print "<pre>";

print_r($filtered_products);
print "</pre>";

