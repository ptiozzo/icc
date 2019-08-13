<?php get_header(); ?>


<div class="content">

	<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

			<p> <?php the_time('j M , Y') ?> - <?php the_category(', '); ?></p>

			<?php the_excerpt();?>

		</article>

	<?php endwhile; ?>

	<?php else : ?>

	  <h3> <?php esc_html_e('Sorry, no posts matched your criteria.', 'icc'); ?> </h3>

	<?php endif; ?>

</div> <?php /* .content 	*/ ?>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
