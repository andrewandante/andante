<!-- Sidebar -->
<section id="sidebar">

	<!-- Intro -->
	<section id="intro">
		$SiteConfig.SiteLogo.ScaleWidth(368)
		<header>
			<h2>$SiteConfig.Title</h2>
			<p>$SiteConfig.Tagline</p>
		</header>
	</section>

	<!-- Posts List -->
	<section>
		<ul class="posts">
			<% loop $BlogPosts %>
			<li>
				<article>
					<header>
						<h3><a href="$Link">$Title</a></h3>
						<time class="published" datetime="$PublishDate">$PublishDate.Nice</time>
					</header>
					<a href="$Link" class="image"><img src="$FeaturedImage.Link" alt="" /></a>
				</article>
			</li>
			<% end_loop %>
		</ul>
	</section>

	<!-- Footer -->
	<section id="footer">
		<ul class="icons">
			<% if $SiteConfig.TwitterURL %>
				<li><a href="$SiteConfig.TwitterURL" class="fa-twitter"><span class="label">Twitter</span></a></li>
			<% end_if %>
			<% if $SiteConfig.FacebookURL %>
				<li><a href="$SiteConfig.FacebookURL" class="fa-facebook"><span class="label">Facebook</span></a></li>
			<% end_if %>
			<% if $SiteConfig.Instagram %>
				<li><a href="$SiteConfig.InstagramURL" class="fa-instagram"><span class="label">Instagram</span></a></li>
			<% end_if %>
			<li><a href="mailto:andrewandate@gmail.com" class="fa-envelope"><span class="label">Email</span></a></li>
		</ul>
	</section>

</section>
