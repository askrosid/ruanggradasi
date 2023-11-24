<?php get_header(); ?>
<!-- Hero Latest Post Start -->
<?php
   $hero_latest_post_query = new WP_Query(
      array(
         'post_type'       => 'post',
         'post_status'     => 'publish',
         'order'           => 'DESC',
         'orderby'         => 'date',
         'posts_per_page'  => 1
      )
   );
?>
<?php if($hero_latest_post_query->have_posts()) : ?>
   <div class="max-w-7xl mx-auto px-3 pt-8 sm:pt-9 md:pt-11 xl:pt-14">
      <?php while($hero_latest_post_query->have_posts()) : ?>
         <?php $hero_latest_post_query->the_post(); ?>
         <div class="flex flex-wrap items-center">
            <div class="basis-full md:basis-3/5">
               <?php if(has_post_thumbnail()): ?>
                  <?php $hero_latest_post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' ); ?>
                  <a href="<?php the_permalink(); ?>" class="group hover:bg-black-200"><img src="<?php echo esc_url($hero_latest_post_thumbnail[0]); ?>" alt="<?php the_title(); ?>" class="w-full min-h-[300px] sm:min-h-[450px] lg:min-h-[570px] object-cover transition duration-300 ease-in-out brightness-90 group-hover:brightness-75"></a>
               <?php endif; ?>
            </div>
            <div class="basis-full md:basis-2/5 z-10 mt-7 md:mt-0">
               <div class="flex flex-col justify-center space-y-4 lg:space-y-5 z-50 min-h-[300px] sm:min-h-[350px] lg:min-h-[460px] bg-white-200 ml-0 md:-ml-24 lg:-ml-20 p-6 sm:p-8 lg:p-9">
                  <?php
                  $hero_latest_post_categories = get_the_category();
                  if (! empty($hero_latest_post_categories[1])){
                     echo '<a href="' . esc_url( get_category_link( $hero_latest_post_categories[1]->term_id ) ) . '" class="text-sm sm:text-base text-black-200 font-medium hover:text-green-100 uppercase max-w-max pb-1 sm:pb-2 border-b-2 sm:border-b-4 border-green-100">' . esc_html( $hero_latest_post_categories[1]->name ) . '</a>';
                  } else {
                     echo '<a href="' . esc_url( get_category_link( $hero_latest_post_categories[0]->term_id ) ) . '" class="text-sm sm:text-base text-black-200 font-medium hover:text-green-100 uppercase max-w-max pb-1 sm:pb-2 border-b-2 sm:border-b-4 border-green-100">' . esc_html( $hero_latest_post_categories[0]->name ) . '</a>';
                  }
                  ?>
                  <a href="<?php the_permalink(); ?>" class="text-xl sm:text-2xl lg:text-3xl text-black-200 hover:text-green-100 font-semibold"><h1><?php the_title(); ?></h1></a>
                  <p class="sm:text-lg text-black-200"><?php $hero_latest_post_excerpt = get_the_excerpt(); $hero_latest_post_excerpt = substr($hero_latest_post_excerpt, 0, 110); $hero_latest_post_excerpt_result = substr($hero_latest_post_excerpt, 0, strrpos($hero_latest_post_excerpt, '')); echo esc_html($hero_latest_post_excerpt); ?> ...</p>
                  <div class="flex flex-wrap flex-row items-center gap-3 sm:gap-4 text-base text-black-200">
                     <span class="flex flex-row items-center space-x-2">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-7 sm:w-7 sm:h-7 text-green-100">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                     </svg>
                     <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="hover:text-green-100"><?php the_author(); ?></a>
                     </span>
                     <span class="flex flex-row items-center space-x-2">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-100">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                     </svg>
                     <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo esc_html(get_the_date()); ?></time>
                     </span>
                  </div>
               </div>
            </div>
         </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
   </div>
<?php endif; ?>
<!-- Hero Latest Post End -->

<!-- Main Content Section Start -->
<div class="max-w-7xl mx-auto px-3 py-8 sm:py-9 md:py-11 xl:py-14">
   <div class="flex flex-wrap xl:flex-nowrap space-x-0 xl:space-x-3 2xl:space-x-4 justify-between gap-6 lg:gap-7 xl:gap-0">
      <!-- Main Content Start -->
      <div class="basis-full xl:basis-3/4 overflow-hidden">
         <!-- Latest Articles Slider Start -->
         <?php
            $latest_articles_slider_query = new WP_Query(
               array(
                  'post_type'       => 'post',
                  'post_status'     => 'publish',
                  'offset'          => 1,
                  'order'           => 'DESC',
                  'orderby'         => 'date',
                  'category__not_in'   => array(1),
                  'posts_per_page'  => 6
               )
            );
         ?>
         <?php if($latest_articles_slider_query->have_posts()) : ?>
         <h2 class="text-lg uppercase text-black-200 font-medium mb-5 border-b-2 border-green-100 mr-0 md:mr-4">Artikel Terbaru</h2>
         <div class="latest-articles-slider">
            <?php while($latest_articles_slider_query->have_posts()) : ?>
               <?php $latest_articles_slider_query->the_post(); ?>
               <div>
                  <?php $latest_articles_slider_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' ); ?>
                  <div class="overflow-hidden relative flex flex-col justify-end space-y-2 sm:space-y-3 lg:space-y-4 min-h-[350px] sm:min-h-[450px] p-6 sm:p-8 md:p-7 bg-cover bg-center bg-no-repeat" style="background-image: url(<?php echo esc_url($latest_articles_slider_thumbnail[0]); ?>);">
                  <a href="<?php the_permalink() ?>" class="space-x-0 md:space-x-4 absolute top-0 left-0 w-full h-full transition duration-300 ease-in-out bg-black-200 opacity-40 hover:opacity-50 text-black-200"><?php the_title(); ?></a>
                  <?php
                     $latest_articles_slider_categories = get_the_category();
                        if (! empty($latest_articles_slider_categories[1])){
                           echo '<a href="' . esc_url( get_category_link( $latest_articles_slider_categories[1]->term_id ) ) . '" class="z-10 text-sm uppercase max-w-max py-1 px-2 bg-green-100 hover:bg-green-200 text-white-100">' . esc_html( $latest_articles_slider_categories[1]->name ) . '</a>';
                        } else {
                           echo '<a href="' . esc_url( get_category_link( $latest_articles_slider_categories[0]->term_id ) ) . '" class="z-10 text-sm uppercase max-w-max py-1 px-2 bg-green-100 hover:bg-green-200 text-white-100">' . esc_html( $latest_articles_slider_categories[0]->name ) . '</a>';
                        }
                  ?>
                  <a href="<?php the_permalink() ?>" class="z-10 text-lg sm:text-xl font-semibold text-white-100 hover:text-green-100"><h3><?php the_title(); ?></h3></a>
                     <div class="z-10 flex flex-wrap flex-row items-center gap-1 sm:gap-4 md:gap-2 text-sm text-white-200">
                        <span class="flex flex-row items-center space-x-2">
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-7 sm:w-7 sm:h-7 text-green-100">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                           </svg>
                           <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="hover:text-green-100"><?php the_author(); ?></a>
                        </span>
                        <span class="flex flex-row items-center space-x-2">
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-100">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                           </svg>
                           <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo esc_html(get_the_date()); ?></time>
                        </span>
                     </div>
                  </div>
               </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
         </div>
         <?php endif; ?>
         <!-- Latest Articles Slider End -->

         <!-- Berita Terbaru Start -->
         <?php
         $latest_news_query = new WP_Query(
            array(
               'post_type'       => 'post',
               'post_status'     => 'publish',
               'offset'          => 1,
               'category_name'   => 'berita',
               'order'           => 'DESC',
               'orderby'         => 'date',
               'posts_per_page'  => 6
            )
            );
         ?>
         <?php if($latest_news_query->have_posts()) : ?>
         <div class="keislaman mt-9 p-6 sm:p-5 md:p-8 lg:p-9 mr-0 md:mr-4 bg-green-100">
            <h3 class="text-lg uppercase text-white-100 mb-4"><?php echo esc_html('Berita Terbaru'); ?></h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 sm:gap-4 md:gap-6 lg:gap-7">
               <?php while($latest_news_query->have_posts()) : ?>
                  <?php $latest_news_query->the_post(); ?>
                  <div class="flex flex-wrap">
                     <div class="basis-1/3 sm:basis-2/5">
                        <?php $latest_news_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' ); ?>
                        <a href="<?php the_permalink(); ?>" class="group hover:bg-black-200"><img src="<?php echo esc_html($latest_news_thumbnail[0]); ?>" alt="<?php the_title(); ?>" class="w-full h-24 lg:h-28 object-cover transition duration-300 ease-in-out brightness-90 group-hover:brightness-75"></a>
                     </div>
                     <div class="basis-2/3 sm:basis-3/5 pl-3 md:pl-4 lg:pl-5">
                        <a href="<?php the_permalink() ?>" class="z-10 text-base sm:text-sm md:text-base lg:text-lg font-medium text-white-200 hover:text-white-100"><h4><?php the_title(); ?></h4></a>
                        <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished" class="text-sm text-white-200"><?php echo esc_html(get_the_date()); ?></time>
                     </div>
                  </div>
                  <?php endwhile; ?>
               <?php wp_reset_postdata(); ?>
            </div>
         </div>
         <?php endif; ?>
         <!-- Berita Terbaru End -->

         <!-- Posting terbaru dengan Filter - Start -->
         <!-- Dapatkan Filter by Catefory - Start -->
         <?php
         $filter_categories =get_categories( array(
            'orderby'      => 'count',
            'order'        => 'DESC',
            'number'       => 5,
            'exclude'      => array(5,6,7)
         ) );
         ?>
         <div class="filter flex flex-row flex-wrap justify-between items-center mt-8 mb-6 mr-0 md:mr-4 gap-5 sm:gap-4">
            <h2 class="text-base sm:text-lg uppercase text-black-200 font-medium border-b-2 border-green-100"><?php echo esc_html('Artikel Lainnya'); ?></h2>
            <ul class="cat-list flex flex-row flex-wrap items-center gap-2">
               <li><a class="cat-list_item active py-1 px-2 text-sm uppercase font-medium text-black-100 hover:text-green-100 border hover:border-green-100" href="#!" data-slug="">All</a></li>
               <?php foreach($filter_categories as $filter_category) : ?>
                  <li>
                     <a class="cat-list_item py-1 px-2 text-sm uppercase font-medium text-black-100 hover:text-green-100 border hover:border-green-100" href="#!" data-slug="<?php echo $filter_category->slug; ?>">
                        <?php echo esc_html($filter_category->name); ?>
                     </a>
                  </li>
               <?php endforeach; ?>
            </ul>
         </div>
         <!-- Dapatkan Filter by Catefory - End -->
         <?php
         $latest_posts_with_filter_query = new WP_Query(
            array(
               'post_type'       => 'post',
               'post_status'     => 'publish',
               'posts_per_page'  => 9,
               'orderby'         => 'date',
               'order'           => 'DESC'
            )
         );
         ?>
         <!-- Looping Posting Terbaru - Start -->
         <?php if($latest_posts_with_filter_query->have_posts()): ?>
            <ul class="latest-post-with-filter flex flex-col gap-6 mr-0 md:mr-4">
               <?php
                  while($latest_posts_with_filter_query->have_posts()) : $latest_posts_with_filter_query->the_post();
                     get_template_part( 'parts/posts', 'filter' );
                  endwhile;
               ?>
            </ul>
            <?php wp_reset_postdata(); ?>
         <?php endif; ?>
         <!-- Looping Posting Terbaru - End -->
         <!-- Posting terbaru dengan Filter - End -->
      </div>
      <!-- Main Content End -->
      <!-- Sidebar Start -->
      <div class="basis-full xl:basis-3/12">
         <?php get_sidebar(); ?>
      </div>
      <!-- Sidebar End -->
   </div>
</div>
<!-- Main Content Section End -->
<?php get_footer(); ?>