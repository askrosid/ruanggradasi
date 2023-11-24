<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   <meta charset="<?php bloginfo( 'charset' ); ?>">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="profile" href="http://gmpg.org/xfn/11">
   <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo wp_enqueue_style( 'fullpage', get_stylesheet_directory_uri() . '/assets/css/fullpage.min.css', array(), false, 'all' ); ?>">
   <?php wp_head(); ?>
</head>
<body <?php body_class('font-montserrat font-normal text-base text-black-100'); ?>>