<?php get_header(); ?>

<div class="content">

	<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<h1 class="content__title"><?php the_title(); ?></h1>

			<p> <?php the_time('j M , Y') ?> - <?php the_category(' | '); ?></p>

			<?php the_content();?>

			<?php $post_tags = wp_get_post_tags($post->ID);
			if(!empty($post_tags)) {?>
				<p class="tag"> <small> <strong><?php esc_html_e('Tag: ', 'miotema'); ?></strong>  </small> <br/> <?php the_tags('', ' ', ''); ?></p>
			<?php } ?>

		</article>

	<?php endwhile; else : ?>

	  <h3> <?php esc_html_e('Sorry, no posts matched your criteria.', 'miotema'); ?> </h3>

	<?php endif; ?>

</div>



<?php get_sidebar(); ?>
<?php get_footer(); ?>
