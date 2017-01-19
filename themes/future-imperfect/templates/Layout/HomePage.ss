<!-- Featured Post -->
<% with $FeaturePost %>
<article class="post">
	<header>
		<div class="title">
			<h2><a href="$Link">$Title</a></h2>
			<p>$Summary</p>
		</div>
		<div class="meta">
			<time class="published" datetime="$PublishDate">$PublishDate.Nice</time>
			<% loop $Authors %>
				<a href="#" class="author"><span class="name">$Name</span><img src="$ThemeDir/images/avatar.jpg" alt="$Name" /></a>
			<% end_loop %>
		</div>
	</header>
	<a href="$Link" alt="Continue Reading..." title="$Title">
		$FeaturedImage.ScaleWidth(1000)
	</a>
	<p>$Content.FirstSentence</p>
	<footer>
		<ul class="actions">
			<li><a href="$Link" class="button big">Continue Reading</a></li>
		</ul>
		<ul class="stats">
			<li><a href="$Link#comments-holder" class="icon fa-comment">$Comments.Count</a></li>
		</ul>
	</footer>
</article>
<% end_with %>
