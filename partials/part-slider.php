<?php
$args = array(
'post_type' => 'slider',
'posts_per_page' => -1
);
?>

<?php $the_query = new WP_Query($args); ?>

<?php if ($the_query->have_posts()) : ?>
<section class="owl-carousel owl-slider owl-theme go-slider">
	<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

	<article class="go-slider item" style="
			background-image: url('<?php the_field('slider_image') ?>');
			">

		<?php if ((get_field('html_text'))):?>
		<div class="filter"></div>"
		<?php endif ?>

		<div class="go-slider-inner">
			<?php if (get_field('html_text')): ?>
			<h1 class="title">
				<?php the_field('slider_title') ?>
			</h1>

			<div class="text">
				<?php the_field('slider_text') ?>
			</div>
			<?php endif ?>
		</div>

	</article>
	<?php endwhile; ?>
</section>
<?php endif;
