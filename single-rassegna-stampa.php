<?php get_header(); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
			<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<p><?php the_tags('',' ',''); ?></p>
					<hr>


				</article>
			<?php endwhile; else : ?>

			  <h3><?php esc_html_e('Sorry, no posts matched your criteria.', 'icc'); ?> </h3>

			<?php endif; ?>
		</div>




		<div class="col-md-3">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
