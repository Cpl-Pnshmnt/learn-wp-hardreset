<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<div class="content">

		<?php // get loop.php ?>
		<?php get_template_part( 'inc/loop' , 'single'); ?>

		<?php
			wp_link_pages(array(
				'before' => '<p><strong>'.__('Pages:','theme_name').'</strong> ',
				'after' => '</p>',
				'next_or_number' => 'number'
				)
			);
			echo 'here';
		?>

		<?php // get post-nav.php (next/prev post link) ?>
		<?php get_template_part( 'includes/post-nav'); ?>

		<?php // get comment template (comments.php) ?>
		<?php comments_template(); ?>

	</div><!-- .content -->

<?php endwhile; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>