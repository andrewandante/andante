<!-- Header -->
<header id="header">
	<h1><a class="fa fa-home" href="$BaseURL"></a></h1>
	<nav class="links">
		<ul>
			<% loop $Menu(1) %>
				<li><a href="$Link" title="$Title">$Title</a></li>
			<% end_loop %>
		</ul>
	</nav>
	<nav class="main">
		<ul>
			<li class="search">
				<a class="fa-search" href="#search">Search</a>
				<form id="search" method="get" action="#">
					<input type="text" name="query" placeholder="Search" />
				</form>
			</li>
			<li class="menu">
				<a class="fa-bars" href="#menu">Menu</a>
			</li>
		</ul>
	</nav>
</header>
