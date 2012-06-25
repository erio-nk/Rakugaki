<?php

// DBに接続する。
$mysqli = new mysqli('localhost', 'username', 'password', 'hoge');
if ($mysqli->connect_error)
{
	die('接続出来ませんでした。:' . $mysqli->connect_error);
}

// クエリ実行。
$query = 'select * from hoge';
$result = $mysqli->query($query);
if (!$result)
{
	die('クエリ実行に失敗しました。:' . mysql_error());
}

// 結果表示。
while ($row = $result->fetch_assoc())
{
	echo 'num:' . $row['num'];
	echo 'name:' . $row['name'];
	echo '<br>';
}

$result->free();

$mysqli->close();
	
?>