<!doctype html>
<html <?php language_attributes(); ?> class="no-js" xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="author" content="<?php bloginfo('name'); ?>">
		<meta name="contact" content="<?php bloginfo('admin_email'); ?>">
		
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

	<?php get_template_part( 'partials/part', 'navbar' ); ?>
			
