<div class="flex flex-col gap-6 xl:gap-8 pr-0 md:pr-4 xl:pr-0 sticky top-2">
   <div>
      <h5 class="text-lg uppercase text-black-200 font-medium mb-2 border-b-2 border-green-100"><?php echo esc_html('Kategori Populer'); ?></h5>
      <ul>
         <?php
            $sidebar_categories =get_categories( array(
               'orderby'      => 'count',
               'order'        => 'DESC',
               'number'       => 6,
               'exclude'      => array(5,6,7)
            ) );
            foreach ($sidebar_categories as $sidebar_category) {
               echo '<li class="py-2 border-b"><a href="' . esc_url(get_category_link($sidebar_category->term_id)) . '" class="text-base uppercase hover:text-green-100">' . esc_html($sidebar_category->name) . '</a></li>';
            }
         ?>
      </ul>
   </div>
   <div>
      <h5 class="text-lg uppercase text-black-200 font-medium border-b-2 mb-5 border-green-100"><?php echo esc_html('Tags Terpopuler'); ?></h5>
      <ul class="flex flex-row flex-wrap gap-2">
         <?php
            $tags = get_tags( array(
               'taxonomy'     => 'post_tag',
               'orderby'      => 'count',
               'order'        => 'DESC',
               'number'       => 10
            ) );
            foreach($tags as $tag) {
               echo '<li class="w-max basis-auto"><a class="py-1 px-2 text-sm uppercase hover:text-green-100 border hover:border-green-100" href="' . esc_url(get_category_link($tag->term_id)) . '">' . '#' . esc_html($tag->name) . '</a></li>';
            }
         ?>
      </ul>
   </div>
   <div>
      <a href="<?php echo get_permalink( get_page_by_path( 'pasang-iklan' ) ); ?>" class="group hover:bg-black-200"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/space.png'; ?>" alt="Pasang Iklan" class="transition duration-300 ease-in-out group-hover:brightness-75"></a>
   </div>
</div>