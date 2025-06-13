$( ".pri-btn" ).hover(
  function() {
    $( "img", this ).addClass( "icon-rotated" );
  }, function() {
    $( "img", this ).removeClass( "icon-rotated" );
  }
);

$( document ).ready( function() {
  $( '.hamburger' ).on( 'click', function() {
    $( '.nav-items' ).toggleClass( 'show' );
  } );
} );
