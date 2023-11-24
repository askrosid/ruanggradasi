// jQuery Start
$(document).ready(function(){
   // Front page Hero Slider - Start
   $('.hero-slider').slick({
      autoplay: true,
      autoplaySpeed: 4000,
      speed: 300,
      slidesToShow: 1,
      slidesToScroll: 1
   });
   // Front page Hero Slider - End
   // Blog Latest News Slider - Start
   $('.latest-articles-slider').slick({
      autoplay: true,
      autoplaySpeed: 4000,
      speed: 300,
      slidesToShow: 2,
      slidesToScroll: 1,
      responsive:[
         {
            breakpoint: 768,
            settings:{
               slidesToShow: 1,
            }
         }
      ]
   });
   $('.latest-articles-slider .slick-list .slick-track').addClass('flex flex-row space-x-0 md:space-x-4');
   // Blog Latest News Slider - End
   // Ajax filter posting terbaru - Start
   $('.cat-list_item').on('click', function() {
      $('.cat-list_item').removeClass('active');
      $(this).addClass('active');

      $.ajax({
         type: 'POST',
         url: '../../../../../wp-admin/admin-ajax.php',
         dataType: 'html',
         data: {
            action: 'filter_latest_posts',
            category: $(this).data('slug'),
         },
         success: function(res) {
            $('.latest-post-with-filter').html(res);
         }
      })
   });
   // Ajax filter posting terbaru - End
   // Ajax filter posting Lainnya - Start
   $('.cat-list_item').on('click', function() {
      $('.cat-list_item').removeClass('active');
      $(this).addClass('active');

      $.ajax({
         type: 'POST',
         url: '../../../../../wp-admin/admin-ajax.php',
         dataType: 'html',
         data: {
            action: 'filter_posts_lainnya',
            category: $(this).data('slug'),
         },
         success: function(res) {
            $('.post-lainnya-with-filter').html(res);
         }
      })
   });
   // Ajax filter posting Lainnya - End
   // Header Menu Start
   function menuScript() {

      $('.menu-toggle').on('click', function(){
            $('.mobile-menu').addClass('open')
            $('.overlay').addClass('open')
      });
      
      $('.menu-close').on('click', function(){
            $('.mobile-menu').removeClass('open')
            $('.overlay').removeClass('open')
      });
      
      $('.overlay').on('click', function(){
            $('.mobile-menu').removeClass('open')
            $('.overlay').removeClass('open')
      });
      
      /*Variables*/
      var $offCanvasNav = $('.mobile-menu-items'),
      $offCanvasNavSubMenu = $offCanvasNav.find('.sub-menu');

      /*Add Toggle Button With Off Canvas Sub Menu*/
      $offCanvasNavSubMenu.parent().prepend('<span class="mobile-menu-expand"></span>');

      /*Close Off Canvas Sub Menu*/
      $offCanvasNavSubMenu.slideUp();

      /*Category Sub Menu Toggle*/
      $offCanvasNav.on('click', 'li a, li .mobile-menu-expand, li .menu-title', function(e) {
            var $this = $(this);
            if (($this.parent().attr('class').match(/\b(menu-item-has-children|has-children|has-sub-menu)\b/)) && ($this.attr('href') === '#' || $this.hasClass('mobile-menu-expand'))) {
               e.preventDefault();
               if ($this.siblings('ul:visible').length) {
                  $this.parent('li').removeClass('active-expand');
                  $this.siblings('ul').slideUp();
               } else {
                  $this.parent('li').addClass('active-expand');
                  $this.closest('li').siblings('li').find('ul:visible').slideUp();
                  $this.closest('li').siblings('li').removeClass('active-expand');
                  $this.siblings('ul').slideDown();
               }
            }
      });

      $( ".sub-menu" ).parent( "li" ).addClass( "menu-item-has-children" );
   }
   menuScript();
   // Header Menu End
   // Full Page Start
   $('#fullpage').fullpage({
      licenseKey: 'gplv3-license',
      navigation: true,
      navigationPosition: 'right',
      showActiveTooltip: true,
   });
   // Full Page End
});
// jQuery End