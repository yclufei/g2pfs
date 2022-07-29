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
	<title>文档列表</title>
</head>
<body>
<?php

include("inc.php");


?>
<div style="padding:15px;">

		<div>
			<a href="create.php">创建文档</a>
			<a href="loginout.php">退出</a>
		</div>
			<br>

		<div style=";">
<?php
function my_dir($dir) 
{
    $files = array();
    if(@$handle = opendir($dir)) 
	{
        while(($file = readdir($handle)) !== false) 
		{
            if($file != ".." && $file != ".") 
			{
                if(is_dir($dir . "/" . $file)) 
				{ //如果是子文件夹，进行递归
                    $files[$file] = my_dir($dir . "/" . $file);
                } 
				else 
				{
                    $files[] = iconv("GB2312","UTF-8",str_replace(".txt","",$file));
                }
            }
        }
        closedir($handle);
    }
    return $files;
}


foreach(my_dir("./doc") as $key => $value)
{
	
		$fname = 'doc/'.$value;
		$title = null;
		$content = "";
		foreach(file($fname) as $line) 
		{ 
			if($title==null)
			{
				$title=$line;
				break;
			}
		}
?>

<?php echo $key+1; ?> :    &#160; <?php echo $title; ?>
 <a href="modify.php?f=<?php echo $value; ?>" >修改</a>
<a href="detail.php?f=<?php echo $value; ?>" >查看</a>
<a href="remove.php?data=<?php echo $value; ?>" target="self">删除</a>
<a href="showqrcode.php?data=<?php echo $value; ?>" target="blank">二维码</a>
	<br><br>
<?php
}

?>
		</div>

</div>


</body>
</html>
