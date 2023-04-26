<?php

//isset and empty examples
$_POST['name'] = 'ranjan test';

if(isset($_POST['name']))
{
    echo 'Name is set';
    echo "<br>";

    if(!empty($_POST['name']))
    {
        echo 'Name is not empty';
    }

}

echo "<br>";

//Array map to ceiling decimal numbers to 2 precision
$decimal_array = [
    2.232324,
    9.345334,
    4.2345322
];

function ceiling_numbers($number)
{
    return ceil($number);
}

print_r(array_map('ceiling_numbers',$decimal_array));
?>