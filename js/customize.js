( function( $ ) {

	/** The Author name */
	wp.customize( 'author_name', function( value ) {
		value.bind( function( to ) {
			$( 'p.blog-author' ).html( to );
		} );
	} );

	/** Show/hide the Author name */
	wp.customize( 'show_author_name', function( value ) {
		value.bind( function( to ) {
			if ( to == true ) {
				$( 'p.blog-author' ).show();
			} else {
				$( 'p.blog-author' ).hide();
			}
		} );
	} );

} )( jQuery );