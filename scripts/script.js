$( ".pri-btn" ).hover(
  function() {
    $( "img", this ).addClass( "icon-rotated" );
  }, function() {
    $( "img", this ).removeClass( "icon-rotated" );
  }
);

$( document ).ready( function() {
  $( '.hamburger' ).on( 'click', function() {
    $( this ).toggleClass( 'active' );
    $( '.nav-items-list' ).toggleClass( 'open' );
    $( 'body' ).toggleClass( 'menu-open' );
  } );

  $( '.close-nav' ).on( 'click', function() {
    $( '.nav-items-list' ).removeClass( 'open' );
    $( '.hamburger' ).removeClass( 'active' );
    $( 'body' ).removeClass( 'menu-open' );
  } );

  $( '.nav-items-list a, #nav-free-trial' ).on( 'click', function() {
    if ( $( '.nav-items-list' ).hasClass( 'open' ) ) {
      $( '.nav-items-list' ).removeClass( 'open' );
      $( '.hamburger' ).removeClass( 'active' );
      $( 'body' ).removeClass( 'menu-open' );
    }
  } );

  // Smooth scroll for internal anchor links
  $( 'a[href*="#"]' ).on( 'click', function( e ) {
    const targetHash = this.hash;
    const target     = $( targetHash );
    if ( target.length ) {
      e.preventDefault();
      $( 'html, body' ).animate( {
        scrollTop: target.offset().top
      }, 500 );

      // Close mobile navigation after selecting a link
      if ( $( '.hamburger' ).is( ':visible' ) ) {
        $( '.nav-items-list' ).removeClass( 'open' );
        $( '.hamburger' ).removeClass( 'active' );
        $( 'body' ).removeClass( 'menu-open' );
      }
    }
  } );
} );
