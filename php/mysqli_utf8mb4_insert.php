<?php

// DBに接続する。
$mysqli = new mysqli('localhost', 'username', 'password', 'hoge');
if ($mysqli->connect_error)
{
	die('接続出来ませんでした。:' . $mysqli->connect_error);
}

// 挿入。
$query = 'insert into hoge (name) values ("' . $_POST['name'] . '")';
$result = $mysqli->query($query);
if (!$result)
{
	die('クエリ実行に失敗しました。:' . $mysqli->error);
}

// 結果検索。
$query = 'select * from hoge';
$result = $mysqli->query($query);
if (!$result)
{
	die('クエリ実行に失敗しました。:' . $mysqli->error);
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