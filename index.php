<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <style>
            body {
                font-size: 0.8em;
                font-family: dotum;
                line-height: 1.6em;
            }
            body.black {
                background-color: black;
                color: white;
            }
            body.black a {
                color: white;
            }
            body.black a:hover {
                color: #f60;
            }
            body.black header {
                border-bottom: 1px solid #333;
		padding: 20px 0;
            }
            body.black nav {
                border-right: 1px solid #333;
            }
            header {
                border-bottom: 1px solid gray;
		padding: 20px 0;
            }
            #toolbar {
                padding: 10px;
                float: right;
            }
            nav {
                float: left;
                margin-right: 40px;
                min-height: 500px;
                border-right: 1px solid #ccc;
            }
            nav ul {
                list-style: none;
                padding-left: 0;
                padding-right: 20px;
            }
            article {
                float: left;
            }
            footer {
                clear: both;
            }
            a {
                text-decoration: none;
            }
            a:link, a:visited {
                color: #333;
            }
            a:hover {
                color: #f60;
            }
            h1 {
                font-size: 1.4em;
            }
            .description{
                width:500px;
            }
        </style>
</head>
<body id = "body">
<header>
	<h1>JavaScript</h1>
</header>
<?php
	$link = mysql_connect('localhost','root','111111');
	mysql_select_db('opentutorials');

	mysql_query("set session character_set_connection=utf8;");
	mysql_query("set session character_set_results=utf8;");
	mysql_query("set session character_set_client=utf8;");

	$sql = "SELECT id, title FROM topic";
	$result = mysql_query($sql);
?>
<nav>
<ul>
<?php
	while($row = mysql_fetch_assoc($result))
	{
		echo "<li><a href=\"./index.php?id=".$row['id']."\">".htmlspecialchars($row['title'])."</a></li>";
	}
?>
</ul>
</nav>
<article>
	<?php
		$sql = "SELECT * FROM topic WHERE id={$_GET['id']}";
		$result = mysql_query($sql);

		$row = mysql_fetch_assoc($result);
	?>
	<h2><?=htmlspecialchars($row['title'])?></h2>
	<div>
		<?=$row['description']?>
	</div>
</article>
</body>
</html>

