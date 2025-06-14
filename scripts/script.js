$( ".pri-btn" ).hover(
  function() {
    $( "img", this ).addClass( "icon-rotated" );
  }, function() {
    $( "img", this ).removeClass( "icon-rotated" );
  }
);

$( document ).ready( function() {
  $( '.hamburger' ).on( 'click', function() {
    $( '.nav-items' ).slideToggle( 200, function() {
      $( this ).css( 'display', 'flex' );
    } );
    $( this ).toggleClass( 'active' );
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
        $( '.nav-items' ).slideUp( 200 );
        $( '.hamburger' ).removeClass( 'active' );
      }
    }
  } );
} );
