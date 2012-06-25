<?php
session_name("MYSESSION");
session_start();

if (isset($_GET["session_destroy"]))
{
	$_SESSION = array();	// 初期化。
	session_destroy();	// セッション破棄。
	die("セッションを破棄しました。");
}

if (isset($_SESSION["count"]) == FALSE)
{
	$_SESSION["count"] = 0;
}

$count = &$_SESSION["count"];
++$count;

//echo "count:" . $_SESSION["count"];
echo "count:" . $count;

?>

<a href="session_test.php?session_destroy=1">session_destroy</a>
