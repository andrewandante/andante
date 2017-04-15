<% require themedCSS('blog', 'blog') %>

<div class="blog-entry content-container <% if $SideBarView %>unit size3of4<% end_if %>">
	<article>

	<% include MemberDetails %>

	<% if $PaginatedList.Exists %>
		<h3>Posts by $CurrentProfile.FirstName $CurrentProfile.Surname</h3>
		<div class="mini-posts">
		<% loop $PaginatedList %>
		<article class="mini-post">
			<header>
			<h4>
				<a href="$Link" title="$Title">
					<% if $MenuTitle %>$MenuTitle<% else %>$Title<% end_if %>
				</a>
			</h4>
				<p>
					<% if $Summary %>$Summary<% else %>$Excerpt<% end_if %>
				</p>
			</header>

			<p class="post-image">
				<a href="$Link" title="$Title" class="image">
					$FeaturedImage.ScaleWidth(795)
				</a>
			</p>
		</article>
		<% end_loop %>
		</div>
	<% end_if %>

	$Form

	<% with $PaginatedList %>
		<% include Pagination %>
	<% end_with %>
	</article>
</div>

<% include BlogSideBar %>
