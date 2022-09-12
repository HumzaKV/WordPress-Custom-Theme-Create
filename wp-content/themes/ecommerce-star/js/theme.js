/* main functions */

jQuery( document ).ready(function($) {
		  
var skills = document.getElementById('skills');
var stats = document.getElementById('stats');

	$.fn.isInViewport = function() {
		  var elementTop = $(this).offset().top;
		  var elementBottom = elementTop + $(this).outerHeight();
		
		  var viewportTop = $(window).scrollTop();
		  var viewportBottom = viewportTop + $(window).height();
		
		  return elementBottom > viewportTop && elementTop < viewportBottom;
		};	
	
		var countStat = false;
		var countSkill = false;
		
		$(window).on('scroll', function() {	
			
			if(skills!=null) {
			if ($('#skills').isInViewport() && countSkill==false) {			
				countSkill = true;				
				$('.skills').each(function() {
				  var $this = $(this),
					  countTo = $this.attr('data-width');
				  
				  $({ countNum: $this.text()}).animate({
					countNum: countTo				
				  },
				
				  {	
					duration: 1500,
					easing:'linear',
					step: function() {
					  $this.css('width',Math.floor(this.countNum)+'%');
					},
					complete: function() {
					  $this.css('width',countTo+'%');	
					  //alert('finished');
					}			
				  });			
				});
			 }
			}//end stat
			 

			if(stats!=null) {			
			 if ($('#stats').isInViewport() && countStat==false) {			 
				countStat = true;				
				//stats section counter up to the given number
				$('.stats-counter').each(function() {
				  var $this = $(this),
					  countTo = $this.attr('data-count');
				  
				  $({ countNum: $this.text()}).animate({
					countNum: countTo
				  },
				
				  {	
					duration: 4000,
					easing:'linear',
					step: function() {
					  $this.text(Math.floor(this.countNum));
					},
					complete: function() {
					  $this.text(this.countNum);
					}			
				  });			
				});				
			   }
			}//end skill	
			   
		   });
		
			
		/*-- Page Scroll To Top Section ---------------*/
		jQuery(window).scroll(function () {
			//stick nav code
			stickyNav();
			if (jQuery(this).scrollTop() > 120) {
				jQuery('.scroll-top').fadeIn();
				
			if(document.getElementById("scroll-cart")) { 
				document.getElementById("scroll-cart").style.display = "block";
			}	
				
			} else {
				jQuery('.scroll-top').fadeOut();
				if(document.getElementById("scroll-cart")) { 
					document.getElementById("scroll-cart").style.display = "none";
				}
			}
		});
		
		jQuery('.scroll-top').click(function () {
			jQuery("html, body").animate({
				scrollTop: 0
			}, 600);
			return false;
		});
		
			// grab the initial top offset of the navigation
			var stickyNavTop = 0 ;
			if($('#sticky-nav')){
				if($('#sticky-nav').offset()){
		   			var stickyNavTop = $('#sticky-nav').offset().top;
				}
			}
		   	// our function that decides weather the navigation bar should have "fixed" css position or not.
		   	var stickyNav = function(){
			    var scrollTop = $(window).scrollTop(); // our current vertical position from the top
			         
			    // if we've scrolled more than the navigation, change its position to fixed to stick to top,
			    // otherwise change it back to relative
			    if (scrollTop > stickyNavTop) {					
					
			        $('#sticky-nav').addClass('sticky-nav');
					var $wpAdminBar = $('#wpadminbar');
					if ($wpAdminBar.length) {
						$('#sticky-nav').css('margin-top',$wpAdminBar.height()+'px');
					}
					 
					
			    } else {
			        $('#sticky-nav').removeClass('sticky-nav');
					$('#sticky-nav').css('margin-top', 0+'px');
					
			    }
			};
			
			stickyNav();
		

});