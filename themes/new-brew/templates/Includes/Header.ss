<!-- Header -->
<header id="header">
	<h1 href="$BaseURL"><a class="fa fa-home fa-4x" href="$BaseURL"></a></h1>
	<nav class="links">
		<ul>
			<% loop $Menu(1) %>
				<li><a href="$Link" title="$Title">$Title</a></li>
			<% end_loop %>
		</ul>
	</nav>
	<nav class="main">
		<ul>
			<% if $SearchForm %>
				<li class="search">
					$SearchForm
				</li>
			<% end_if %>
		</ul>
	</nav>
</header>
