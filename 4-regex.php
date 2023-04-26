<?php

$string_to_convert =  "abc@grepsr.com";
$regexp = "/^([a-z]+)@([a-z]+).([a-z]+)$/";

preg_match($regexp,$string_to_convert,$matches);
$arr = [ $matches[1],$matches[2],$matches[3]];
print_r($arr);


