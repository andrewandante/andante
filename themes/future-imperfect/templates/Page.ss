<!DOCTYPE HTML>
<html>
<head>
	<title>$SiteConfig.Title</title>
	<% base_tag %>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lte IE 8]><script src="$ThemeDir/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="$ThemeDir/css/main.css" />
	<!--[if lte IE 9]><link rel="stylesheet" href="$ThemeDir/css/ie9.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" href="$ThemeDir/css/ie8.css" /><![endif]-->
</head>
<body>

<!-- Wrapper -->
<div id="wrapper">

	$BetterNavigator
	<% include Header %>
	<% include Menu %>

	<!-- Main -->
	<div id="main">
		$Layout
		<% if $ErrorCode %>
			$Content
		<% end_if %>
		$Form
	</div>

	<% include Sidebar %>

</div>

<!-- Scripts -->
<script src="$ThemeDir/js/jquery.min.js"></script>
<script src="$ThemeDir/js/skel.min.js"></script>
<script src="$ThemeDir/js/util.js"></script>
<!--[if lte IE 8]><script src="$ThemeDir/js/ie/respond.min.js"></script><![endif]-->
<script src="$ThemeDir/js/main.js"></script>

</body>
</html>
