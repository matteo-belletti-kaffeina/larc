/*----------------------------------------------------------------------------*\
	SYSTEM INFO
\*----------------------------------------------------------------------------*/

( function( $ ) {
	"use strict";

	var $show      = $( '#rfbwp_panel__show_info' ),
		$info_wrap = $( '#rfbwp_panel__system_wrap' ),
		$info_file = $( '#rfbwp_panel__info_file' ),
		$info_text = $info_wrap.find( 'textarea' ),
		_wpnonce   = $( '#_wpnonce' ).val(),
		_info      = $info_text.val();

	$show.on( 'click', function() {
		$info_wrap.css( 'max-height', 250 );

		setTimeout( function() {
			$info_wrap.css( 'max-height', '' );
		}, 250 );
	} );

	$info_file.on( 'click', function() {
		location.href = ajaxurl + '?action=rfbwp_export_info&_wpnonce=' + _wpnonce + '&system_info=' + escape( _info );
	} );

	$info_text.on( 'click', function() {
		$info_text.select();
	} );
} )( jQuery );