<!DOCTYPE HTML>
<html>
<head>
	<title>$SiteConfig.Title</title>
	<% base_tag %>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lte IE 8]><script src="themes/new-brew/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="themes/new-brew/css/main.css" />
	<!--[if lte IE 9]><link rel="stylesheet" href="themes/new-brew/css/ie9.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" href="themes/new-brew/css/ie8.css" /><![endif]-->
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
		<%--<% if LatestTweets %>--%>
			<%--<ul class="Tweets">--%>
				<%--<% loop LatestTweets %>--%>
					<%--<li class="Tweet">--%>
						<%--<label>--%>
							<%--<a href="http://www.twitter.com/{$User}" target="_blank" class="User">@$User</a>--%>
							<%--$DateObject.format('d-F-Y')--%>
						<%--</label>--%>
						<%--<p>$Content.RAW</p>--%>
					<%--</li>--%>
				<%--<% end_loop %>--%>
			<%--</ul>--%>
		<%--<% end_if %>--%>
		$Layout
		<% if $ErrorCode %>
			$Content
		<% end_if %>
		$Form
	</div>

	<% include Sidebar %>

</div>

<!-- Scripts -->
<script src="themes/new-brew/js/jquery.min.js"></script>
<script src="themes/new-brew/js/skel.min.js"></script>
<script src="themes/new-brew/js/util.js"></script>
<!--[if lte IE 8]><script src="themes/new-brew/js/ie/respond.min.js"></script><![endif]-->
<script src="themes/new-brew/js/main.js"></script>

</body>
</html>
