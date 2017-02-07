<!DOCTYPE HTML>
<html>
<head>
	<title>$SiteConfig.Title</title>
	<% base_tag %>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lte IE 8]><script src="themes/future-imperfect/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="themes/future-imperfect/css/main.css" />
	<!--[if lte IE 9]><link rel="stylesheet" href="themes/future-imperfect/css/ie9.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" href="themes/future-imperfect/css/ie8.css" /><![endif]-->
</head>
<body>

<!-- Wrapper -->
<div id="wrapper">

	<% if $Member.CurrentUser %>
	$BetterNavigator
	<% end_if %>
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
<script src="themes/future-imperfect/js/jquery.min.js"></script>
<script src="themes/future-imperfect/js/skel.min.js"></script>
<script src="themes/future-imperfect/js/util.js"></script>
<!--[if lte IE 8]><script src="themes/future-imperfect/js/ie/respond.min.js"></script><![endif]-->
<script src="themes/future-imperfect/js/main.js"></script>

</body>
</html>
