
<div class="container">
    <div class="owl-carousel owl-theme">

     <?php $postIndex = 0;
     if ( $slider_query->have_posts() ) :
      while ( $slider_query->have_posts() ) :
       $slider_query->the_post();
       ?>
       <div class="item" data-fancybox="gallery" data-src="<?php the_post_thumbnail_url( 'fancybox-size' ); ?>">
        <?php 	the_post_thumbnail( 'single-post-thumbnail' ); ?>
        <a class="btn btn-theme btn-sm btn-min-block" href="<?php echo esc_url( get_the_permalink() ); ?>"><div class="item-caption">
            <!-- Applying animation to Caption using animate.css  -->
            <!-- add class animated <animation-name> provided by animate.css  -->
                <h3 class="animated fadeInUp"><?php the_title(); ?></h3>
            </div></a>
        </div>
        <?php 
        $postIndex++;
    endwhile;
endif;
	//reset post to be used in another loop
wp_reset_postdata();?>
</div>
</div>

<script>
    jQuery(function($) {
       $(document).ready(function(){
        var heroSlider = $('.owl-carousel');
        heroSlider.owlCarousel({
            loop: true,
            items: 3,
            nav: true,
            dots: true,
            autoplay: true,
                    autoplayTimeOut: 5000, //5sec
                    navText:['<i class="fa fa-angle-left fa-2x fa-fw" aria-hidden="true"></i>','<i class="fa fa-angle-right fa-2x fa-fw" aria-hidden="true"></i>'], //we will be using font awesome icon here
                });

        heroSlider.on("changed.owl.carousel", function(event){
                    // selecting the current active item
                    var item = event.item.index-2;
                    // first removing animation for all captions
                    $('h3').removeClass('animated fadeInUp');
                    $('.owl-item').not('.cloned').eq(item).find('h3').addClass('animated fadeInUp');
                })

                // No animation in other captions so we need to add animation to owl-item while slide changed.


            })
       Fancybox.bind('[data-fancybox="gallery"]', {
        infinite: true
    });
   });
            // Initialize Owl Carousel Plugin
</script>