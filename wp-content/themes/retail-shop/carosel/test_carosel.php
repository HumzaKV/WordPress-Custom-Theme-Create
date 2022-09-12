<div class="carousel-inner">
	<div class="item active">
	  <!--Set post control start from zero-->
		<?php $postIndex = 0;
		 if ( $books_query->have_posts() ) :
		while ( $books_query->have_posts() ) :
			$books_query->the_post();

			?>
		  <div class="imagesSlide thumb-image fade1 item">
		 <?php the_post_thumbnail( 'single-post-thumbnail' ); ?>
			                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h2>
                            	<span><?php the_title(); ?></span>
                            </h2>
                            <br>
                            <div class="col-md-12 text-center">
                                <a class="btn btn-theme btn-sm btn-min-block" href="<?php echo esc_url( get_the_permalink() ); ?>"><h3 class="bg-dark">details</h3></a></div>
                        </div>
                    </div>
			
			</div>
			<?php $postIndex++;?>
			<?php endwhile;?>
			<?php endif;?>
			<!--reset post to be used in another loop-->
			<?php wp_reset_postdata();?>

			<a class="c-previous" onclick="plusImage(-1)">&#10094</a>
			 <a class="c-next" onclick="plusImage(1)">&#10095</a>

			 <!--start a new loop-->
			  <div style="text-align: center;">
			  	   <!--Display the circles five times-->
			  	    <?php for($i=0;$i<3;$i++):?>
			  	    	<span class="dot mb-5" onclick="currentImage(<?php echo $i+1;?>)"></span>
			  	    	<?php endfor;?>
			  	    	</div>
			  	    	</div>
			  	        </div>