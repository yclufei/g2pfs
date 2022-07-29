<?php
header("Content-type:text/html;charset=utf-8");
mb_internal_encoding('utf-8');
?><!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<link type="text/css" href="css/sample.css" rel="stylesheet" media="screen" />
	<title>二维码</title>
</head>
<body>

<center style="padding:15px;">

<img src="../qrcode/qrcode.php?data=<?php echo $_GET['data']; ?>" width="356" height="356">


</center>


</body>
</html>
