<?php

//Floor decimal numbers with any provided precision.
function floor_number_with_precision(float $number, int $precision)
{
	$quotient = intval($number);
	$decimal = $number - $quotient;
	$decimal_to_add = get_decimal_to_add($decimal,$precision);
	return $quotient + $decimal_to_add;
}


function get_decimal_to_add(float $decimal,int $precision)
{
	$number = intval($decimal * (10 ** $precision));
	return $number/(10 ** $precision);	
}

// echo floor_number(2.99999,2);
// echo floor_number(199.99999,4);
echo floor_number_with_precision(2.9999999,0);
