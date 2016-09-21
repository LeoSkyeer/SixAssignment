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
						<li class="first active"><a href="/">Главная</a></li>
						<li><a href="/registration">Регистрация</a></li>
						<li><a href="/list">Список</a></li>
						<li class="last"><a href="/contacts">Контакты</a></li>
					</ul>
					<br class="clearfix" />
				</div>
			</div>
			<div id="page" >
				<div id="sidebar"  >
					<div class="side-box">
						<h3>Основное меню</h3>
						<ul class="list">
							<li class="first "><a href="/">Главная</a></li>
							<li><a href="/registration">Регистрация</a></li>
							<li><a href="/list">Список</a></li>
							<li class="last"><a href="/contacts">Контакты</a></li>
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
			<div id="page-bottom">
				<div id="page-bottom-sidebar">
					<h3>Наши контакты</h3>
					<ul class="list">
						<li>skypeid: Leo_Skyer-6-strings</li>
						<li class="last">email: vasya_90@list.ru</li>
					</ul>
				</div>
				<div id="page-bottom-content">
					<h3>О Компании</h3>
					<p>
						«Гидра» — преступная организация, чьей главной целью является достижение мирового господства посредством террористических и подрывных методов, что приведёт к Новому мировому порядку. «Гидра» совершает теракты по всему миру: организацию финансирует лично Барон Штрукер, который пропагандирует нацистскую идеологию. Основным противником «Гидры» является ЩИТ, — международная антитеррористическая организация.
					</p>
				</div>
				<br class="clearfix" />
			</div>
		</div>
		<div id="footer">
			<a href="/">Гидра</a> &copy; 2016</a>
		</div>
	</body>
</html>