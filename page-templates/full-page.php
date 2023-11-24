<?php /* Template Name: Full Page */ ?>
<?php get_header('lp'); ?>
   <?php while(have_posts()): ?>
      <?php the_post(); ?>
      <main class="min-h-screen bg-cover bg-no-repeat bg-center overflow-hidden" style="background-image: url(<?php echo get_stylesheet_directory_uri() . '/assets/img/tmg.jpg'; ?>)">
      <div class="min-h-screen bg-[#000000] bg-opacity-50 flex items-center">
         <div class="max-w-7xl w-full mx-auto px-3">
            <?php the_content(); ?>
         </div>
      </div>
      </main>
   <?php endwhile; ?>
<?php get_footer('cst'); ?>