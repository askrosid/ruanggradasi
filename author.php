<?php
   get_header();
   $author_id = get_the_author_meta('ID');
   $author_cover = get_field('cover', 'user_'. $author_id );
   $author_ig = get_field('instagram', 'user_'. $author_id );
   $author_fb = get_field('facebook', 'user_'. $author_id );
?>
   <div class="bg-cover bg-center bg-no-repeat" style="background-image: url(<?php echo esc_url($author_cover['url']); ?>);">
      <div class="bg-[#000000] bg-opacity-60">
         <div class="max-w-7xl mx-auto px-3 pt-11 sm:pt-16 text-center text-white-100">
            <h1 class="text-2xl lg:text-3xl font-semibold mb-3"><?php the_author(); ?></h1>
            <p class="max-w-2xl mx-auto font-medium mb-6"><?php echo esc_html(get_the_author_meta( 'description' )); ?></p>
            <div class="flex justify-center gap-4 sm:gap-5 mb-10 sm:mb-14">
               <a href="<?php echo esc_url( $author_ig ); ?>" target="_blank" rel="noopener noreferrer" class="flex justify-center items-center w-[45px] h-[45px] bg-yellow-100 bg-opacity-80 hover:bg-yellow-200 text-white-100 rounded-full shadow-[2px_4px_8px_rgba(52,58,64,0.15)]"><i class="icofont-instagram"></i></a>
               <a href="<?php echo esc_url( $author_fb ); ?>" target="_blank" rel="noopener noreferrer" class="flex justify-center items-center w-[45px] h-[45px] bg-yellow-100 bg-opacity-80 hover:bg-yellow-200 text-white-100 rounded-full shadow-[2px_4px_8px_rgba(52,58,64,0.15)]"><i class="icofont-facebook"></i></a>
               <a href="mailto:<?php echo esc_html(get_the_author_meta( 'user_email' )); ?>" class="flex justify-center items-center w-[45px] h-[45px] bg-yellow-100 bg-opacity-80 hover:bg-yellow-200 text-white-100 rounded-full shadow-[2px_4px_8px_rgba(52,58,64,0.15)]"><i class="icofont-ui-email"></i></a>
            </div>
            <div class="flex justify-center">
               <?php echo get_avatar( get_the_author_meta( 'ID' ), $size = '100', $default = '', $alt = '', $args = array( 'class' => 'rounded-full border border-white-100 border-4 shadow -mb-[45px]' ) ); ?>
            </div>
         </div>
      </div>
   </div>
   <div class="max-w-7xl mx-auto px-3 pb-7 sm:pb-8 md:pb-10 xl:pb-12 pt-16">
      <?php if(have_posts()): ?>
         <h2 class="text-xl text-center text-black-200 font-medium max-w-2xl mx-auto border-b-2 border-b-green-100 pb-5"><?php echo esc_html( count_user_posts( $author_id, 'post', true ) . ' Artikel by ' . esc_html(get_the_author_meta( 'display_name' ) )); ?></h2>
         <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mt-7 xl:mt-8 gap-6 sm:gap-5 md:gap-4 xl:gap-6 mb-8">
            <?php while(have_posts()): ?>
               <?php the_post(); ?>
               <div>
                  <?php if(has_post_thumbnail()): ?>
                  <?php $archive_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' ); ?>
                  <div class="overflow-hidden relative min-h-[300px] sm:min-h-[250px] md:min-h-[230px] lg:min-h-[210px] xl:min-h-[220px] bg-cover bg-center bg-no-repeat mb-2 sm:mb-3 xl:mb-4" style="background-image: url(<?php echo esc_html($archive_thumbnail[0]); ?>);">
                     <a href="<?php the_permalink() ?>" class="space-x-0 md:space-x-4 absolute top-0 left-0 w-full h-full transition duration-300 ease-in-out bg-black-100 opacity-25 hover:opacity-40 text-black-100"><?php the_title(); ?></a>
                  </div>
                  <?php endif; ?>
                  <div class="flex flex-wrap flex-row items-center gap-3 sm:gap-2 xl:gap-4 text-sm mb-1 sm:mb-2">
                     <span class="flex flex-row items-center space-x-2 sm:space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-100">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                        <?php
                           $single_categories = get_the_category();
                           if(! empty($single_categories[1])){
                              echo '<a href="' . esc_url( get_category_link( $single_categories[1]->term_id ) ) . '" class="hover:text-green-100">' . esc_html( $single_categories[1]->name ) . '</a>';
                           } else {
                              echo '<a href="' . esc_url( get_category_link( $single_categories[0]->term_id ) ) . '" class="hover:text-green-100">' . esc_html( $single_categories[0]->name ) . '</a>';
                           }
                        ?>
                     </span>
                     <span class="flex flex-row items-center space-x-2 sm:space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 sm:w-5 sm:h-5 text-green-100">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                        </svg>
                        <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('j M Y'); ?></time>
                     </span>
                  </div>
                  <h3 class="text-lg md:text-base xl:text-lg text-black-200 hover:text-green-100 font-semibold mb-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <p class="text-base"><?php $archive_excerpt = get_the_excerpt(); $archive_excerpt = substr($archive_excerpt, 0, 65); $archive_excerpt_result = substr($archive_excerpt, 0, strrpos($archive_excerpt, '')); echo esc_html($archive_excerpt); ?> ...</p>
               </div>
            <?php endwhile; ?>
         </div>
         <?php the_posts_pagination(array(
            'prev_next'       => false,
            'mid_size'        => 2,
            'end_size'        => 1

         )); ?>
      <?php else: ?>
         <h2 class="text-xl text-center text-black-200 font-medium max-w-2xl mx-auto border-b-2 border-b-green-100 pb-5"><?php echo esc_html( 'Maaf, ' . get_the_author_meta( 'display_name' ) . ' Belum Menulis Artikel!' ); ?></h2>
      <?php endif; ?>
   </div>
<?php get_footer(); ?>