<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>Hail Hydra!</title>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
		<link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
<!--		<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />-->
		<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
		<script src="/js/jquery-1.6.2.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<div id="menu"">
					<ul>
						<li class="first active"><a href="/tellbook">Справочник</a></li>
						<li><a href="/registration">Добавление пользователей</a></li>
					</ul>
					<br class="clearfix" />
				</div>
			</div>
			<div id="page" >
				<div id="sidebar"  >
					<div class="side-box">
						<h3>Меню</h3>
						<ul class="list">
							<li class="first "><a href="/tellbook">Справочник</a></li>
							<li><a href="/registration">Добавление пользователей</a></li>
						</ul>
					</div>
				</div>
				<div id="content">
					<div class="box">
						<?php include 'application/views/'.$content_view; ?>

					</div>
					<br class="clearfix" />
				</div>
				<br class="clearfix" />
			</div>

		<div id="footer">
			<a href="/">Монастырев</a> &copy; 2017</a>
		</div>
	</body>
</html>