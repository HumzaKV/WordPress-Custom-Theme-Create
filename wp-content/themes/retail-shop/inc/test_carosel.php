<div class="container">
	<div class="row">
		<!-- Carousel -->
    	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
			  	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>
			<!-- Wrapper for slides -->
			<br>
			<div class="carousel-inner">
			   <?php 
			   	if ( $books_query->have_posts() ) :
		while ( $books_query->have_posts() ) :
			$books_query->the_post();
			?>
			    <div class="item active">
			    
			    	<?php 
			    	echo '<img src="'. the_post_thumbnail( 'single-post-thumbnail' ) .'" alt="Card image cap">';
			    	 ?>
                    <!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h2>
                            	<!-- <span>Welcome to <strong>LOREM IPSUM</strong></span> -->
                            	<?php echo '<span>'.get_the_title().'</span>';
                            	 ?>
                            </h2>

                            <div class="">
                                <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="btn btn-primary">
                                <!--<a class="btn btn-theme btn-sm btn-min-block" href="#">Login</a><a class="btn btn-theme btn-sm btn-min-block" href="#">Register</a></div> -->
						<?php esc_html_e( 'View More', 'aquila' ); ?>
					</a>
                        </div>

                    </div><!-- /header-text -->
                    		
			    </div>
			    			<?php
		endwhile;
	endif;
	wp_reset_postdata();
	?>

			</div>
			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		    	<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		    	<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div><!-- /carousel -->
	</div>
</div>
<!-- hero slider -->

<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" />
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css" />
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.transitions.min.css" />


<figure id="currentImageWithCaption">
    <img src="https://malsup.github.io/images/p1.jpg" title="Title 1" alt="Title 1" width="200" height="150">
    <figcaption id="figcaption">Title 1</figcaption>
</figure>

<div class="owl-carousel">
    <div class="item">
        <img src="https://malsup.github.io/images/p1.jpg" title="Title 1" alt="Alt 1" />
    </div>
    <div class="item">
        <img src="https://malsup.github.io/images/p2.jpg" title="Title 2" alt="Alt 2" />
    </div>
    <div class="item">
        <img src="https://malsup.github.io/images/p3.jpg" title="Title 3" alt="Alt 3" />
    </div>
    <div class="item">
        <img src="https://malsup.github.io/images/p4.jpg" title="Title 4" alt="Alt 4" />
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>

<style>
figure img {
display: block;
width:100%;
height: auto;
}
.owl-wrapper-outer{
    display : none;
}
</style>

<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        items: 1,
        navigation: true,
        pagination: true,
        lazyLoad: true,
        afterMove: function(elem) {
            var current = this.currentItem;
            var currentImg = elem.find('.owl-item').eq(current).find('img');

            $('figure')
                .find('img')
                .attr('src', currentImg.attr('src'))
                .attr('alt', currentImg.attr('alt'))
                .attr('title', currentImg.attr('title'));
            $('#figcaption').text(currentImg.attr('title'));
        }
    });
</script>
<!-- FUNCTION -->
	wp_enqueue_style( 'owl-carosel-css-min', get_template_directory_uri().'/owlcarousel-2-and-animate-css-master/owlcarousel/dist/assets/owl.carousel.min.css' );
	wp_enqueue_style( 'owl-carosel-theme-css', get_template_directory_uri().'/owlcarousel-2-and-animate-css-master/owlcarousel/dist/assets/owl.theme.default.css' );
	wp_enqueue_style( 'owl-animate-css', get_template_directory_uri().'/owlcarousel-2-and-animate-css-master/animate.css' );
	wp_enqueue_style( 'font-awsome-min-css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'retail-shop-parent-styles', get_template_directory_uri().'/style.css' );
	wp_enqueue_script( 'jquery-3', 'https://code.jquery.com/jquery-3.2.1.min.js' );
    wp_enqueue_script( 'owl-animate-min-js', get_template_directory_uri().'/owlcarousel-2-and-animate-css-master/owlcarousel/dist/owl.carousel.min.js' );
    <!-- function -->
<!-- test_carosel -->
	wp_enqueue_style( 'carosel-styles', get_template_directory_uri().'/css/carosel.css' );
	wp_enqueue_script( 'carosel-script', get_template_directory_uri().'/js/carosal.js' );
	wp_enqueue_style( 'bootstrap-css', '//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css' );
	wp_enqueue_script( 'bootstrap-js', '//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js' );
	wp_enqueue_script( 'jquery-3', 'https://code.jquery.com/jquery-3.6.1.js' );
	wp_enqueue_script( 'jquery-1', '//code.jquery.com/jquery-1.11.1.min.js' );
	<!-- test_carosel -->