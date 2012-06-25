<?php

// DBに接続する。
$link = mysql_connect('localhost', 'username', 'password');
if (!$link)
{
	die('接続出来ませんでした。:' . mysql_error());
}

// DBを選択する。
if (!mysql_select_db('hoge', $link))
{
	die('選択出来ませんでした。:' . mysql_error());
}

// クエリ実行。
$query = 'select * from hoge';
$result = mysql_query($query);
if (!$result)
{
	die('クエリ実行に失敗しました。:' . mysql_error());
}

// 結果表示。
while ($row = mysql_fetch_assoc($result))
{
	echo 'num:' . $row['num'];
	echo 'name:' . $row['name'];
	echo '<br>';
}

mysql_free_result($result);

mysql_close($link);
	
?>