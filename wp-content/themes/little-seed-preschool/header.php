<?php
if (!defined('ABSPATH')) {
    exit;
}

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> data-route="<?php echo esc_attr(ls_get_route_name()); ?>">
<?php wp_body_open(); ?>
<a class="skip-link" href="#content"><?php esc_html_e('Skip to content', 'little-seed-preschool'); ?></a>
<?php ls_render_top_bar(); ?>
<?php ls_render_site_header(); ?>
<div class="site-shell">
    <main id="content" class="site-main">
