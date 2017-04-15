<!-- Menu -->
<section id="menu">

	<!-- Links -->
	<section>
		<ul class="links">
			<% loop $Menu(1) %>
				<li>
					<a href="$Link">
						<h3>$Title</h3>
					</a>
				</li>
			<% end_loop %>
		</ul>
	</section>

	<!-- Actions -->
	<section>
		<ul class="actions vertical">
			<li><a href="#" class="button big fit">Log In</a></li>
		</ul>
	</section>

</section>
