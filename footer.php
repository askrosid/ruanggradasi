   <footer class="bg-green-100 pt-9 sm:pt-10 lg:pt-12 xl:pt-14">
      <div class="max-w-7xl mx-auto px-3 flex flex-row flex-wrap gap-y-5 lg:gap-y-0">
         <div class="basis-full sm:basis-1/2 lg:basis-1/4 flex flex-col justify-start">
            <h6 class="font-playfair font-medium text-yellow-100 text-xl md:text-[22px] mb-3 md:mb-4 lg:mb-5"><?php echo esc_html(get_bloginfo('name')); ?></h6>
            <p class="text-white-100"><?php echo esc_html('Satu atap beragam solusi. Hasrat kami adalah membantu Anda dengan beragam layanan yang kami tawarkan. Biarkan kami mewujudkan visi Anda, dan hubungi kami hari ini!'); ?></p>
         </div>
         <div class="basis-full sm:basis-1/2 lg:basis-1/4 flex flex-col justify-start sm:pl-5 lg:pl-7">
            <h6 class="font-playfair font-medium text-yellow-100 text-xl md:text-[22px] mb-3 md:mb-4 lg:mb-5">Tentang Kami</h6>
            <?php
            if (has_nav_menu('tentang-kami')) {
               wp_nav_menu(array(
                  'theme_location'     => 'tentang-kami',
                  'container'          => false,
                  'menu_class'         => 'menu flex flex-col gap-y-2',
                  'link_class'         => 'text-white-100 hover:text-yellow-100'
               ));
            }
            ?>
         </div>
         <div class="basis-full sm:basis-1/2 lg:basis-1/4 flex flex-col justify-start lg:pl-5">
            <h6 class="font-playfair font-medium text-yellow-100 text-xl md:text-[22px] mb-3 md:mb-4 lg:mb-5"><?php echo esc_html('Layanan'); ?></h6>
            <ul class="menu flex flex-col gap-y-2">
               <li>
                  <a href="<?php echo esc_url(get_site_url(null, 'jasa-categories/tour-travel/' )); ?>" class="text-white-100 hover:text-yellow-100"><?php echo esc_html('Tour & Travel'); ?></a>
               </li>
               <li>
                  <a href="<?php echo esc_url(get_site_url(null, 'jasa-categories/jasa-percetakan/' )); ?>" class="text-white-100 hover:text-yellow-100"><?php echo esc_html('Jasa Percetakan'); ?></a>
               </li>
               <li>
                  <a href="<?php echo esc_url(get_site_url(null, 'jasa-categories/event-organizer/' )); ?>" class="text-white-100 hover:text-yellow-100"><?php echo esc_html('Event Organizer'); ?></a>
               </li>
               <li>
                  <a href="<?php echo esc_url(get_site_url(null, 'jasa-categories/les-privat-ke-rumah/' )); ?>" class="text-white-100 hover:text-yellow-100"><?php echo esc_html('Les Privat ke Rumah'); ?></a>
               </li>
               <li>
                  <a href="<?php echo esc_url(get_site_url(null, 'jasa-categories/outbound-gathering/' )); ?>" class="text-white-100 hover:text-yellow-100"><?php echo esc_html('Outbound & Gathering'); ?></a>
               </li>
               <li>
                  <a href="<?php echo esc_url(get_site_url(null, 'jasa-categories/wedding-planner-organizer/' )); ?>" class="text-white-100 hover:text-yellow-100"><?php echo esc_html('Wedding Planner & Organizer'); ?></a>
               </li>
            </ul>
         </div>
         <div class="basis-full sm:basis-1/2 lg:basis-1/4 flex flex-col justify-start sm:pl-5">
            <h6 class="font-playfair font-medium text-yellow-100 text-xl md:text-[22px] mb-3 md:mb-4 lg:mb-5"><?php echo esc_html('Hubungi Kami'); ?></h6>
            <ul class="menu flex flex-col gap-y-2">
               <li>
                  <a href="https://wa.me/6281325358863?text=Halo%20saya%20dapat%20nomnor%20ini%20dari%20web%20Ruang%20Gradasi.%20Saya%20ingin" target="_blank" class="group text-white-100 hover:text-yellow-100"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block fill-none stroke-white-100 stroke-2 group-hover:stroke-yellow-100"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" /></svg><?php echo esc_html(' 0813 2535 8863'); ?></a>
               </li>
               <li>
                  <a href="mailto:hi@ruanggradasi.com" target="_blank" class="group text-white-100 hover:text-yellow-100"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block fill-none stroke-white-100 stroke-2 group-hover:stroke-yellow-100"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg><?php echo esc_html(' hi@ruanggradasi.com'); ?></a>
               </li>
            </ul>
            <div class="flex flex-row gap-x-3 mt-6">
               <a href="https://www.youtube.com/@gradasiofficial747" target="_blank" class="flex justify-center items-center w-[45px] h-[45px] bg-yellow-100 hover:bg-yellow-200 text-white-100 rounded-full shadow-[2px_4px_8px_rgba(52,58,64,0.15)]"><i class="icofont-youtube-play"></i></a>
               <a href="https://www.instagram.com/ruanggradasi/" target="_blank" class="flex justify-center items-center w-[45px] h-[45px] bg-yellow-100 hover:bg-yellow-200 text-white-100 rounded-full shadow-[2px_4px_8px_rgba(52,58,64,0.15)]"><i class="icofont-instagram"></i></a>
               <a href="https://www.facebook.com/" target="_blank" class="flex justify-center items-center w-[45px] h-[45px] bg-yellow-100 hover:bg-yellow-200 text-white-100 rounded-full shadow-[2px_4px_8px_rgba(52,58,64,0.15)]"><i class="icofont-facebook"></i></a>
            </div>
         </div>
      </div>
      <div class="bg-green-200 mt-10 lg:mt-12">
         <div class="flex justify-center items-center max-w-7xl mx-auto px-3 py-5 lg:py-6">
            <p class="text-white-100 text-center">&copy; 2022 - <?php echo esc_html(date_i18n( 'Y' )); ?> <span class="text-yellow-100"> <?php echo esc_html(get_bloginfo('name')); ?> </span><?php echo esc_html(' Made with '); ?><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-yellow-100 inline-block"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/></svg><?php echo esc_html(' from '); ?><span class="text-yellow-100"><?php echo esc_html('Temanggung'); ?></span></p>
         </div>
      </div>
   </footer>
   <?php wp_footer(); ?>
</body>
</html>