<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   <meta charset="<?php bloginfo( 'charset' ); ?>">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="profile" href="http://gmpg.org/xfn/11">
   <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
   <?php wp_head(); ?>
</head>
<body <?php body_class('font-montserrat font-normal text-base text-black-100'); ?>>
   <!-- Header - Start -->
   <header id="main-header" class="border-b border-b-border-100">
      <div class="flex max-w-7xl mx-auto items-center px-3 h-[70px] sm:h-[75px] md:h-20">
         <!-- Logo - Start -->
         <div class="flex justify-start w-4/5 md:w-1/3 lg:w-1/4">
            <?php
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
            ?>
            <?php if (has_custom_logo()): ?>
               <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($logo[0]); ?>" alt="<?php echo esc_html(get_bloginfo('name')); ?>" class="w-60 sm:w-[250px] md:w-64"></a>
            <?php else: ?>
               <div>
                  <a href="<?php echo esc_url(home_url('/')); ?>" class="font-playfair font-medium text-xl text-black-200"><?php echo esc_html(get_bloginfo('name')); ?></a>
                  <p class="text-sm italic"><?php echo esc_html(get_bloginfo('description')); ?></p>
               </div>
            <?php endif; ?>
         </div>
         <!-- Logo - End -->
         <!-- Desktop Nav - Start -->
         <div class="flex justify-end w-1/5 md:w-2/3 lg:w-3/4">
            <!-- Nav Menu - Start -->
            <nav class="header-menu hidden lg:flex">
               <?php if(has_nav_menu( 'header-menu' )){
                     wp_nav_menu( array(
                        'theme_location'  => 'header-menu',
                        'container'       => false,
                        'menu_class'      => 'nav-menu'
                     ) );
                  }
               ?>
            </nav>
            <!-- Nav Menu - End -->
            <!-- Menu Toggle - Start -->
            <div class="header-toggle lg:hidden">
               <a href="#" class="menu-toggle"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 hover:text-green-100"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg></a>
            </div>
            <!-- Menu Toggle - End -->
         </div>
         <!-- Desktop Nav - End -->
      </div>
   </header>
   <!-- Header - End -->
   <!-- Mobile Menu Start -->
   <div class="mobile-menu">
      <!-- Menu Close Start -->
      <a class="menu-close" href="javascript:void(0)">
         <i class="icofont-close-line"></i>
      </a>
      <!-- Menu Close End -->
      <!-- Mobile Menu Start -->
      <div class="mobile-menu-items">
         <?php if(has_nav_menu( 'header-menu' )){
            wp_nav_menu( array(
                  'theme_location'  => 'header-menu',
                  'container'       => false,
                  'menu_class'      => 'nav-menu'
            ) );
         }
         ?>
      </div>
      <!-- Mobile Menu End -->
   </div>
   <!-- Mobile Menu End -->
   <!-- Overlay Start -->
   <div class="overlay"></div>
   <!-- Overlay End -->