<?php

$memcache = new Memcache;
$memcache->connect("localhost", 11211) or die("接続できませんでした。");

$key = "hoge";
$result = $memcache->get($key);
if (!$result)
{
	echo($key . ":無");
	$memcache->set($key, 100);
}
else
{
	echo($key . ":" . $result);
}


$memcache->close();
	
?>