<?php
// php -q flags.php

function flags_get_empty($num_bytes)
{
	return str_pad('', $num_bytes, chr(0));
}

function flags_set(&$flags, $pos)
{
	$idx_bytes = $pos >> 3;
	$idx_bits = $pos % 8;
	$flags[$idx_bytes] = chr(ord($flags[$idx_bytes]) | (1 << $idx_bits));
}

function flags_reset(&$flags, $pos)
{
	$idx_bytes = $pos >> 3;
	$idx_bits = $pos % 8;
	$flags[$idx_bytes] = chr(ord($flags[$idx_bytes]) & (~(1 << $idx_bits)));
}

function flags_get(&$flags, $pos)
{
	$idx_bytes = $pos >> 3;
	$idx_bits = $pos % 8;
	$byte = 1 << $idx_bits;
	return (ord($flags[$idx_bytes]) & $byte) === $byte;
}

$flags = flags_get_empty(4);
echo bin2hex($flags) . PHP_EOL;

flags_set($flags, 1);
echo bin2hex($flags) . PHP_EOL;

flags_set($flags, 10);
echo bin2hex($flags) . PHP_EOL;

flags_set($flags, 3);
echo bin2hex($flags) . PHP_EOL;

flags_reset($flags, 1);
echo bin2hex($flags) . PHP_EOL;

var_dump(flags_get($flags, 2));	// falseはechoで表示すると空白

var_dump(flags_get($flags, 1));

var_dump(flags_get($flags, 10));	// trueはechoで表示すると1

?>