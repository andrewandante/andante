<% require themedCSS('main', 'blog') %>

<div class="blog-entry content-container <% if $SideBarView %>unit size3of4<% end_if %>">
	<article class="post">
		<h1>$Title</h1>

		<% if $FeaturedImage %>
			<p class="post-image">$FeaturedImage.ScaleWidth(795)</p>
		<% end_if %>

		<div class="content">$Content</div>

		<% if $TrackEmbedLink %>
			<div class="feature-track">
				<table>
					<tr>
						<th colspan="2" class="listening-to">I'm listening to...</th>
					</tr>
					<tr>
						<td>$TrackEmbedLink</td>
						<td class="track-blurb">$TrackBlurb</td>
					</tr>
				</table>
			</div>
		<% end_if %>

		<% include SilverStripe\Blog\EntryMeta %>

		$CommentsForm
	</article>
</div>

<% include SilverStripe\Blog\BlogSideBar %>
