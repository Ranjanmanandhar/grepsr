<?php
$array_month_map = [
    'january' => '01',
    'february' => '02',
    'march' => '03',
    'april' => '04',
    'may' => '05',
    'june' => '06',
    'july' => '07',
    'august' => '08',
    'september' => '09',
    'october' => '10',
    'november' => '11',
    'december' => '12'
];
function get_day(string $string_day)
{
    preg_match('/^([0-9]{1,2})([a-z]+)$/', $string_day, $matches);
    return strlen($matches[1]) === 1 ? '0' . $matches[1] : $matches[1];
}

function get_numeric_month(string $month)
{
    global $array_month_map;
    return $array_month_map[strtolower($month)];
}

function format_string_date(string $datestring)
{
    global $array_month_map;
    $date_string_array = explode(' ', $datestring);
    if (in_array(strtolower($date_string_array[0]), array_keys($array_month_map))) {
        return get_numeric_month($date_string_array[0]) . $date_string_array[1] . $date_string_array[2];
    } else if (in_array(strtolower($date_string_array[1]), array_keys($array_month_map))) {
        return get_day($date_string_array[0]) . '/' . get_numeric_month($date_string_array[1]) . '/' . $date_string_array[2];
    } else {
        return 'invalid';
    }
    return get_numeric_month($datestring);
}

print_r(format_string_date('January 31 2021'));
echo "\n";
print_r(format_string_date('11th December 2022'));
echo "\n";
print_r(format_string_date('10 2021 June'));

// print_r(get_day('9th'));