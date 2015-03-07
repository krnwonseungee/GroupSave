<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NAPKIFY&middot;IDEATOR - Where idea meet crowd.</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/css/font-awesome.min.css">
	<?
		if (is_array($cssFileList))
			while(list(,$cssfile) = each($cssFileList)) {
				echo "<link rel='stylesheet' href='$cssfile'>";
			}
	?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<!-- SITE NAVIGATION -->
	<? include "cms.sitemenu.php" ?>
	<!-- SITE NAVIGATION -->

	<!--<div id='debugpanel'>&nbsp;</div>-->

	<div class='container'><div class='row'>
	<?
		if (isset($contentModule)) {
			require $contentModule;
	}?>
	</div></div>

	<? require "cms.footer.php"; ?>

	<script src="/js/jquery-2.1.3.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
	<script src='/js/hack.js'></script>
	<?
		if (is_array($jsFileList))
			while(list(,$jsfile) = each($jsFileList)) {
				echo "<script src='$jsfile'></script>";
			}
	?>

  </body>
</html>
