<?php

require_once( '../../../../wp-load.php' );

$file = (int) $_GET[ 'file' ];

$file_path = get_attached_file( $file );

if( !empty( $file_path ) && $file_path ) {
	header( 'Pragma: public' );
	header( 'Expires: 0' );
	header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
	header( 'Cache-Control: private', false );
	header( 'Content-Description: File Transfer' );
	header( 'Content-Type: application/octet-stream' );
	header( 'Content-Disposition: attachment; filename="' . basename( $file_path ) . '"' );
	header( 'Content-Transfer-Encoding: binary' );
	readfile( $file_path );
}

die();