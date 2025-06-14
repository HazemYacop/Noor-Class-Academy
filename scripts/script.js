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
} );
