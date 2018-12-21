<?php 
$args = array(
'post_type' => 'NOME',
'posts_per_page' => -1
);
?>

<?php $the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>

	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	
	<?php the_title(); ?>

	<?php endwhile; ?>

<?php endif; ?>