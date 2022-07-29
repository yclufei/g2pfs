
<!DOCTYPE html>
<html lang="zh">
    <head>
        <meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="Cache-Control" content="no-siteapp"/>
		<meta name="renderer" content="webkit" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <meta name="keywords" content="Editor.md,editor,Markdown Editor,Markdown,编辑器,Markdown编辑器,Markdown在线编辑器,在线编辑器,开源编辑器,开源Markdown编辑器" />
        <meta name="description" content="Editor.md: a simple online markdown editor. 开源在线 Markdown 编辑器" />
        <title>创建文档</title>
        <link rel="stylesheet" href="editer/css/style.css" />
        <link rel="stylesheet" href="editer/css/editormd.css" />
        <link rel="shortcut icon" href="https://pandao.github.io/editor.md/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="editer/css/editormd.min.css" />
    </head>
    <body>

	<form action="post.php" method="post" style="padding:15px;">

		<a href="index.php">首页</a>
		<?php
		$value = $_GET['f'];
		$fname = 'doc/'.$value;
		$title = null;
		$content = "";
		foreach(file($fname) as $line) 
		{ 
			if($title==null)
			{
				$title=$line;
			}
			else
			{
				$content.=$line;
			}
		}
		?>
		<img src="../qrcode/qrcode.php?data=<?php echo $value; ?>" width="56" height="56">

		<input type="hidden" id="remove" name="remove" value="<?php echo $value; ?>">

		<br>
		<br>

		名称：<input type="text" id="title" name="title" value="<?php echo $title; ?>" style="height:35px;width:80%;">
		
		<br>
		<br>

		<div id="editor" style="display:block;width:100%;height:600px;">

			<textarea style="display:none;"><?php
					echo $content;
					?></textarea>

		</div>
		<input type="submit" id="submit" value="提  交" style="height:35px;width:100%;"/>
	</form>

	<script type="text/javascript"src="http://code.jquery.com/jquery-1.4.1.min.js"></script>
	<script src="editer/editormd.min.js"></script>
	<script type="text/javascript">
		$(function() {
			var editor = editormd("editor", {
				 width: "100%",
				 height: "700px",
				// markdown: "xxxx",     // dynamic set Markdown text
				path : "editer/lib/"  // Autoload modules mode, codemirror, marked... dependents libs path
			});
		});
	</script>
    </body>
</html>