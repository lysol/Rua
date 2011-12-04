<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Rua
 * @since Rua 3.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="description" content="<?php bloginfo('description') ?>" />
<title><?php bloginfo('name'); ?> | <?php bloginfo('description') ?></title>
<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/bootstrap.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href='http://fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css' />
<link href="<?php bloginfo('template_directory') ?>/jquery.fancybox.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.js"></script>
<script type="text/javascript" src="http://twitter.github.com/bootstrap/1.4.0/bootstrap-scrollspy.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/rua-slider.js"></script>
<script type="text/javascript">

$(document).ready(function() {
    $('body > .topbar').scrollSpy();
});

</script>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
