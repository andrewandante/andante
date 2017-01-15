<!-- Featured Post -->
<% with $FeaturePost %>
<article class="post">
	<header>
		<div class="title">
			<h2><a href="$Link">$Title</a></h2>
			<p>$Summary</p>
		</div>
		<div class="meta">
			<time class="published" datetime="$Published">$Published.Nice</time>
			<% loop $Authors %>
				<a href="#" class="author"><span class="name">$Name</span><img src="$Themedir/images/avatar.jpg" alt="$Name" /></a>
			<% end_loop %>
		</div>
	</header>
	$FeaturedImage.setWidth(1000)
	<p>$Content.FirstSentence</p>
	<footer>
		<ul class="actions">
			<li><a href="#" class="button big">Continue Reading</a></li>
		</ul>
		<ul class="stats">
			<li><a href="#" class="icon fa-comment">$Comments.Count</a></li>
		</ul>
	</footer>
</article>
<% end_with %>
