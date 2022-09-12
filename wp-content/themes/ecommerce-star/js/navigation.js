/* global ecommerce_star_screen_reader_text */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

(function( $ ) {
		  
/* main functions */
			$(window).resize(function() {
					if( $(window).width() < 1024 ) {
						$('#top-menu').find("li").last().bind( 'keydown', function(e) {															   
							if( e.which === 9 ) {
								e.preventDefault();
								$('#site-navigation').find('.menu-toggle').focus();
							}
						});
				
						$('#top-menu > li:last-child button:not(.active)').bind( 'keydown', function(e) {
							if( e.which === 9 ) {
								e.preventDefault();
								$('#site-navigation').find('.menu-toggle').focus();
							}
						});
					}
					else {
						$('#top-menu').find("li").unbind('keydown');
					}
			
			});
		  
			/*-- Page Scroll To Top Section ---------------*/
			
			jQuery('.scroll-top').click(function () {
				jQuery("html, body").animate({
					scrollTop: 0
				}, 600);
				return false;
			});
		  
			var modal = document.getElementById('myModal');
			$(document).ready(function() {
				$("#search-button").click(function(){
					modal.style.display = "block";
					var search_cat = document.getElementById('search-category');
					if(search_cat){
					   search_cat.focus();
					}
					var search_form	 = document.getElementById('main-search-form').focus();
					if(search_form){
						   search_form.focus();
					}
				});
				
				// When the user clicks on <span> (x), close the modal
				$("#search-close").click(function(){
					modal.style.display = "none";
					$('#search-button').focus();
				});				
			});
			
			$('.search-submit').on('keydown', function (e) { 
				if ($("this:focus") && (e.shiftKey)) {
					e.preventDefault();	
					$('#main-search-form').focus();					
				}
			});	
			
			$('.search-submit').on('keydown', function (e) { 
				if ($("this:focus") && (e.which == 9)) {
					if(modal.style.display == "block"){
						e.preventDefault();
						$('#search-close').focus();
					}
				}
			});

			
			$('#search-close').on('keydown', function (e) {											  
				if ($("this:focus") && (e.shiftKey)) {					
					e.preventDefault();
				}
				if (e.keyCode == 27 || e.keyCode == 13) {					
					$('#search-button').focus();
					e.preventDefault();
				}				
			});
	
			$(document).keydown(function(event) {										 
				  if (event.keyCode == 27 || event.keyCode == 13) {
					$('#myModal').hide();
				  }
			});
					
			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {			
			// Get the modal			
				if (event.target == modal) {
					modal.style.display = "none";
				}
			}		  
		  
	var masthead, menuToggle, siteNavContain, siteNavigation;

	function initMainNavigation( container ) {

		// Add dropdown toggle that displays child menu items.
		var dropdownToggle = $( '<button />', { 'class': 'dropdown-toggle', 'aria-expanded': false })
			.append( ecommerce_star_screen_reader_text.icon )
			.append( $( '<span />', { 'class': 'screen-reader-text', text: ecommerce_star_screen_reader_text.expand }) );

		container.find( '.menu-item-has-children > a, .page_item_has_children > a' ).after( dropdownToggle );

		// Set the active submenu dropdown toggle button initial state.
		container.find( '.current-menu-ancestor > button' )
			.addClass( 'toggled-on' )
			.attr( 'aria-expanded', 'true' )
			.find( '.screen-reader-text' )
			.text( ecommerce_star_screen_reader_text.collapse );
		// Set the active submenu initial state.
		container.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );

		container.find( '.dropdown-toggle' ).click( function( e ) {
			var _this = $( this ),
				screenReaderSpan = _this.find( '.screen-reader-text' );

			e.preventDefault();
			_this.toggleClass( 'toggled-on' );
			_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );

			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );	
			

			screenReaderSpan.text( screenReaderSpan.text() === ecommerce_star_screen_reader_text.expand ? ecommerce_star_screen_reader_text.collapse : ecommerce_star_screen_reader_text.expand );
		});
	}

	//init navigation if top menu exist
	if ($('.main-navigation')[0]){
		initMainNavigation( $( '.main-navigation' ) );
	}

	masthead       = $( '#masthead' );
	menuToggle     = masthead.find( '.menu-toggle' );
	siteNavContain = masthead.find( '.main-navigation' );
	siteNavigation = masthead.find( '.main-navigation > div > ul' );

	// Enable menuToggle.
	(function() {

		// Return early if menuToggle is missing.
		if ( ! menuToggle.length ) {
			return;
		}

		// Add an initial value for the attribute.
		menuToggle.attr( 'aria-expanded', 'false' );

		menuToggle.on( 'click.ecommerce-star', function() {
			siteNavContain.toggleClass( 'toggled-on' );
            //get cart id
            
			$( this ).attr( 'aria-expanded', siteNavContain.hasClass( 'toggled-on' ) );
			var element = document.getElementById("cart-top");
			if(element){
            	element.classList.toggle("show-cart");
			}	
			 
		});
	})();
	
	// Fix sub-menus for touch devices and better focus for hidden submenu items for accessibility.
	(function() {
		if ( ! siteNavigation.length || ! siteNavigation.children().length ) {
			return;
		}

		// Toggle `focus` class to allow submenu access on tablets.
		function toggleFocusClassTouchScreen() {
			if ( 'none' === $( '.menu-toggle' ).css( 'display' ) ) {

				$( document.body ).on( 'touchstart.ecommerce-star', function( e ) {
					if ( ! $( e.target ).closest( '.main-navigation li' ).length ) {
						$( '.main-navigation li' ).removeClass( 'focus' );
					}
				});

				siteNavigation.find( '.menu-item-has-children > a, .page_item_has_children > a' )
					.on( 'touchstart.ecommerce-star', function( e ) {
						var el = $( this ).parent( 'li' );

						if ( ! el.hasClass( 'focus' ) ) {
							e.preventDefault();
							el.toggleClass( 'focus' );
							el.siblings( '.focus' ).removeClass( 'focus' );
						}
					});

			} else {
				siteNavigation.find( '.menu-item-has-children > a, .page_item_has_children > a' ).unbind( 'touchstart.ecommerce-star' );
			}
		}

		if ( 'ontouchstart' in window ) {
			$( window ).on( 'resize.ecommerce-star', toggleFocusClassTouchScreen );
			toggleFocusClassTouchScreen();
		}

		siteNavigation.find( 'a' ).on( 'focus.ecommerce-star blur.ecommerce-star', function() {
			$( this ).parents( '.menu-item, .page_item' ).toggleClass( 'focus' );
		});
	})();
})( jQuery );
