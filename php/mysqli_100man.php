<?php
// php -q mysqli_100man.php

// DBに接続する。
$mysqli = new mysqli('localhost', 'username', 'password', 'hoge');
if ($mysqli->connect_error)
{
	die('接続出来ませんでした。:' . $mysqli->connect_error);
}

$now = new DateTime();
srand($now->getTimestamp());

function rand_name()
{
	$result = '';
	$chars = 'abcdefghkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ012345679';
	for ($i = 0; $i < 20; ++$i)
	{
		$idx = rand(0, strlen($chars)-1);
		$result .= $chars[$idx];
	}
	return $result;
}

function date_now()
{
	$tmp = new DateTime();
	return $tmp->format('Y-m-d H:i:s');
}

//echo rand_name() . PHP_EOL;
//echo date_now() . PHP_EOL;

// クエリ実行。
for ($i = 0; $i < 10000 * 100; ++$i)
{
	$name = rand_name();
	$date = date_now();
	
	$query = "insert into hoge (name, create_date) values ('$name', '$date')";
	if (!$mysqli->query($query))
	{
		die('failure');
	}
	
	if (($i % 10000) == 0)
	{
		echo "$i records inserted ..." . PHP_EOL;
	}
}

$mysqli->close();


//mysql> select * from hoge order by rand() limit 5;                                                                   
//+--------+----------------------+---------------------+
//| num    | name                 | create_date         |
//+--------+----------------------+---------------------+
//| 369286 | G70DXhqBx55Gq7G6v7A4 | 2012-06-14 22:51:13 |
//| 768588 | LW7mCp2LNmGnDVnHkEaT | 2012-06-14 22:52:12 |
//| 256130 | tBFCnU3mSzLfbzUKq4RM | 2012-06-14 22:50:56 |
//| 149437 | CwW6pzqKwEF9dRbVDAuF | 2012-06-14 22:50:39 |
//|  50911 | KwtqEwKPvN5pZu4DP6HG | 2012-06-14 22:50:23 |
//+--------+----------------------+---------------------+
//5 rows in set (6.36 sec)
//
//mysql> select num from hoge order by rand() limit 5;
//+--------+
//| num    |
//+--------+
//| 854970 |
//| 929267 |
//|  24072 |
//|  64495 |
//| 825546 |
//+--------+
//5 rows in set (0.99 sec)
//
//mysql> select num from hoge order by rand() limit 5;
//+--------+
//| num    |
//+--------+
//| 845259 |
//| 520637 |
//| 293921 |
//| 460986 |
//| 362576 |
//+--------+
//5 rows in set (0.89 sec)
//
//mysql> select num from hoge where 0 <= num and num < 10000 order by rand() limit 5;
//+------+
//| num  |
//+------+
//| 9889 |
//| 3167 |
//| 9454 |
//|  751 |
//| 7548 |
//+------+
//5 rows in set (0.01 sec)

	
?>