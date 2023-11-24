<?php /* Template Name: Front Page */ ?>
<?php get_header(); ?>
<?php while( have_posts() ): ?>
   <?php the_post(); ?>
   <!-- Front Page Hero - Start -->
   <div class="hero overflow-x-hidden">
      <?php
      $kat_jasa_queries = get_categories(array(
         'taxonomy'     => 'jasa_categories',
         'orderby'      => 'count',
         'order'        => 'DESC',
         'hide_empty'   => 0,
         'number'       => 6
      ));
      ?>
      <div class="hero-slider">
         <?php foreach($kat_jasa_queries as $kat_jasa_query) : ?>
            <?php
               $img_jasa = get_field('gambar_jasa', $kat_jasa_query);
               $sub_title = get_field('subtitle', $kat_jasa_query);
               $short_desc = get_field('short_description', $kat_jasa_query);
            ?>
            <div class="bg-white-200 bg-center bg-cover bg-no-repeat" style="background-image: url(<?php echo esc_url($img_jasa); ?>);">
            <div class="bg-[#000000] bg-opacity-60">
               <div class="max-w-7xl mx-auto px-3 py-8 sm:py-9 md:py-11 xl:py-14 min-h-screen flex flex-col justify-center items-start space-y-2 sm:space-y-3 md:space-y-4">
                  <h1 class="text-lg lg:text-2xl uppercase text-yellow-100 font-semibold"><?php echo esc_html($kat_jasa_query->name); ?></h1>
                  <h2 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl text-white-100 font-semibold max-w-3xl"><?php echo esc_html($sub_title); ?></h2>
                  <p class="text-white-200 text-lg font-medium max-w-3xl"><?php echo esc_html($short_desc); ?></p>
                  <div class="hero-button pt-7">
                     <a href="<?php echo esc_url(get_term_link($kat_jasa_query->slug, $kat_jasa_query->taxonomy)); ?>" class="py-4 px-8 rounded-full bg-yellow-100 hover:bg-yellow-200 text-white-100 text-lg font-medium shadow-md"><?php echo esc_html('Selengkapnya'); ?></a>
                  </div>
               </div>
            </div>
            </div>
         <?php endforeach; ?>
      </div>
   </div>
   <!-- Front Page Hero - Start -->
<?php endwhile; ?>
<?php get_footer(); ?>