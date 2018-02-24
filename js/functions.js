( function( $ ) {

	/**
	 * Wait for the document to load.
	 *
	 * @since 1.0.0
	 */
	$( document ).ready( function() {

		/**
		 * Handle the menu toggle click.
		 *
		 * @since 1.0.0
		 */
		$( '.primary-menu-toggle' ).on( 'click', function( e ) {
			$( '.primary-menu' ).slideToggle();

			$( this ).find( '.dashicons' )
					 .toggleClass( 'dashicons-menu' )
					 .toggleClass( 'dashicons-no' );

			e.preventDefault();
		} );

		/**
		 * Handle the window resize.
		 *
		 * @since 1.0.0
		 */
		$( window ).on( 'resize', function() {
			if ( 992 <= $( window ).width() ) {
				$( '.primary-menu' ).show();
				$( '.primary-menu-toggle' ).hide();
			} else {
				$( '.primary-menu' ).hide();
				$( '.primary-menu-toggle' ).show();
			}
		} );

	} );

}( jQuery ) );
