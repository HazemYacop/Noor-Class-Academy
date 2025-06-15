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

  // Ensure newsletter forms do not submit to a localhost URL after deployment
  function fixNewsletterForms( root ) {
    $( root ).find( 'form[action*="localhost"]' ).attr( 'action', function( _, action ) {
      return action.replace( /https?:\/\/localhost/gi, window.location.origin );
    } );
  }

  // Fix actions on initial load
  fixNewsletterForms( document );

  // Watch for dynamically inserted forms
  const observer = new MutationObserver( function( mutations ) {
    mutations.forEach( function( mutation ) {
      mutation.addedNodes.forEach( function( node ) {
        if ( node.nodeType === 1 ) {
          fixNewsletterForms( node );
        }
      } );
    } );
  } );
  observer.observe( document.body, { childList: true, subtree: true } );

  // As a safety net, adjust the action right before submission
  $( document ).on( 'submit', 'form[action*="localhost"]', function() {
    var action = $( this ).attr( 'action' );
    $( this ).attr( 'action', action.replace( /https?:\/\/localhost/gi, window.location.origin ) );
  } );
} );
