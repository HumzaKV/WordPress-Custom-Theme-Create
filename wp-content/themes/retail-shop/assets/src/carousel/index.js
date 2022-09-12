( function( $ ) {
  class SlickCarousel {
    constructor() {
      this.initiateCarousel();
    }

    initiateCarousel() {
      $( '.posts-carousel' ).slick( {
        autoplay: true,
        autoplaySpeed: 1000,
        slidesToShow: 3,
        slidesToScroll: 1,
      } );
    }
  }

  new SlickCarousel();

} )( jQuery );