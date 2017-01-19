<% require themedCSS('blog', 'blog') %>

<div class="blog-entry content-container <% if $SideBarView %>unit size3of4<% end_if %>">
	<article class="post">
		<h1>$Title</h1>

		<% if $FeaturedImage %>
			<p class="post-image">$FeaturedImage.ScaleWidth(795)</p>
		<% end_if %>

		<div class="content">$Content</div>

		<% include EntryMeta %>

	$Form
	$CommentsForm
	</article>
</div>

<% include BlogSideBar %>
