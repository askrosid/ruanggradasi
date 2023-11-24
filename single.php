<?php get_header(); ?>
   <!-- Main Content Section Start -->
   <div class="max-w-7xl mx-auto px-3 py-8 sm:py-9 md:py-11 xl:py-14">
      <div class="flex flex-wrap xl:flex-nowrap space-x-0 lg:space-x-7 2xl:space-x-10 justify-between gap-6 lg:gap-7 xl:gap-0">
         <!-- Main Content Start -->
         <div class="basis-full xl:basis-3/4 overflow-hidden">
            <!-- Isi Content Start -->
            <?php while(have_posts()): ?>
               <?php the_post(); ?>
               <?php if(has_post_thumbnail()):
                  $single_featured_img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full'); ?>
                  <img class="w-full h-64 sm:h-96 md:h-[500px] lg:h-[600px] object-cover mb-5 sm:6 md:mb-7" src="<?php echo esc_url($single_featured_img[0]); ?>" alt="<?php the_title(); ?>">
               <?php endif; ?>
                  <h1 class="text-xl sm:text-2xl lg:text-3xl text-black-200 font-semibold mb-3 sm:mb-4"><?php the_title(); ?></h1>
                  <div class="flex flex-wrap flex-row items-center gap-3 sm:gap-4 lg:gap-5 text-sm mb-4">
                     <span class="flex flex-row items-center space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-100">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="text-black-200 hover:text-green-100"><?php the_author(); ?></a>
                     </span>
                     <span class="hidden sm:flex flex-row items-center space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-100">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                        <?php
                           $single_categories = get_the_category();
                           if(! empty($single_categories[1])){
                              echo '<a href="' . esc_url( get_category_link( $single_categories[1]->term_id ) ) . '" class="text-black-200 hover:text-green-100">' . esc_html( $single_categories[1]->name ) . '</a>';
                           } else {
                              echo '<a href="' . esc_url( get_category_link( $single_categories[0]->term_id ) ) . '" class="text-black-200 hover:text-green-100">' . esc_html( $single_categories[0]->name ) . '</a>';
                           }
                        ?>
                     </span>
                     <span class="flex flex-row items-center space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-100">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                        </svg>
                        <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished" class="text-black-200"><?php echo esc_html(get_the_date()); ?></time>
                     </span>
                  </div>
                  <div class="content mb-6 text-black-100 text-lg">
                     <?php the_content(); ?>
                  </div>
                  <div class="flex gap-2">
                     <h3 class="text-base sm:text-lg text-black-200 font-medium"><?php esc_html('Tags:'); ?></h3>
                     <ul class="flex flex-row flex-wrap gap-2">
                        <?php $post_tags = get_the_tags(); ?>
                        <?php if(! empty($post_tags)): ?>
                           <?php foreach($post_tags as $post_tag){
                                 echo '<li class="w-max basis-auto"><a class="py-1 px-2 text-sm hover:text-green-100 border hover:border-green-100" href="' . esc_url(get_tag_link( $post_tag )) . '">' . '#' . esc_html($post_tag->name) . '</a></li>';
                              }
                           ?>
                        <?php endif; ?>
                     </ul>
                  </div>
                  <div class="author mt-6 pt-3 pb-4 border-y">
                     <div class="flex flex-wrap sm:flex-nowrap justify-start content-center items-center gap-y-2 sm:gap-y-0 sm:gap-x-3 md:gap-x-4">
                        <div class="author-img max-w-[75px] sm:min-w-[75px]">
                           <?php echo get_avatar( get_the_author_meta( 'ID' ), $size = '90', $default = '', $alt = '', $args = array( 'class' => 'rounded-full border border-white-100 border-2 shadow' ) ); ?>
                        </div>
                        <div>
                           <a class="font-medium text-black-200 hover:text-green-200 hover:underline" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                              <?php the_author(); ?>
                              <span class="inline-block rounded-full px-3 py-1 border border-green-100 hover:border-green-200 text-green-100 hover:text-green-200 ml-2"><?php echo esc_html('Follow'); ?></span>
                           </a>
                           <p class="text-base font-normal mt-2 md:mt-1">
                              <?php echo esc_html(get_the_author_meta( 'description' )); ?>
                           </p>
                        </div>
                     </div>
                  </div>
            <?php endwhile; ?>
            <!-- Isi Content End -->
            <!-- Content Lainnya Start -->
            <?php
            $filter_categories_lainnya =get_categories( array(
               'orderby'      => 'count',
               'order'        => 'DESC',
               'number'       => 5,
               'exclude'      => array(5,6,7)
            ) );
            ?>
            <div class="filter flex flex-row flex-wrap justify-between items-center mt-6 mb-6 gap-5 sm:gap-4">
               <h2 class="text-base sm:text-lg uppercase text-black-200 font-medium border-b-2 border-green-100"><?php esc_html('Baca Juga'); ?></h2>
               <ul class="cat-list flex flex-row flex-wrap items-center gap-2">
                  <li><a class="cat-list_item active py-1 px-2 text-sm uppercase font-medium text-black-100 hover:text-green-100 border hover:border-green-100" href="#!" data-slug=""><?php echo esc_html('All'); ?></a></li>
                  <?php foreach($filter_categories_lainnya as $filter_category_lainnya) : ?>
                     <li>
                        <a class="cat-list_item py-1 px-2 text-sm uppercase font-medium text-black-100 hover:text-green-100 border hover:border-green-100" href="#!" data-slug="<?php echo $filter_category_lainnya->slug; ?>">
                           <?php echo $filter_category_lainnya->name; ?>
                        </a>
                     </li>
                  <?php endforeach; ?>
               </ul>
            </div>
            <?php
               $lainnya_with_filter_query = new WP_Query(
                  array(
                     'post_type'       => 'post',
                     'post_status'     => 'publish',
                     'posts_per_page'  => 4,
                     'orderby'         => 'rand',
                     'order'           => 'DESC'
                  )
               );
            ?>
            <?php if($lainnya_with_filter_query->have_posts()): ?>
            <ul class="post-lainnya-with-filter flex flex-col gap-6">
               <?php
                  while($lainnya_with_filter_query->have_posts()) : $lainnya_with_filter_query->the_post();
                     get_template_part( 'parts/posts', 'filter' );
                  endwhile;
               ?>
            </ul>
            <?php wp_reset_postdata(); ?>
         <?php endif; ?>
            <!-- Content Lainnya End -->
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