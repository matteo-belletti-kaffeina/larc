<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* REGISTER PAGE */
add_action( 'rfbwp/panelSubmenu', 'rfbwp_register_system_page' );
function rfbwp_register_system_page() {
	$hook = add_submenu_page( MP_PAGE_BASENAME, __( 'Responsive Flipbook System Info', 'rfbwp' ),  __( 'System Info', 'rfbwp' ), 'rfbwp_plugin_cap', 'mp-settings-info', 'rfbwp_panel_system' );

	add_action( 'load-' . $hook, 'rfbwp_register_system_page_scripts' );
}

function rfbwp_register_system_page_scripts() {
	wp_enqueue_style( 'rfbwp-panel-css', MPC_PLUGIN_ROOT . '/massive-panel/css/mpc-panel.css' );

	wp_enqueue_script( 'rfbwp-panel-js', MPC_PLUGIN_ROOT . '/massive-panel/js/mpc-panel.js', array( 'jquery', 'underscore' ), '1.0', true );
}

function rfbwp_let_to_num( $size ) {
	$l   = substr( $size, -1 );
	$ret = substr( $size, 0, -1 );
	switch ( strtoupper( $l ) ) {
		case 'P':
			$ret *= 1024;
		case 'T':
			$ret *= 1024;
		case 'G':
			$ret *= 1024;
		case 'M':
			$ret *= 1024;
		case 'K':
			$ret *= 1024;
	}
	return $ret;
}

function rfbwp_clean( $var ) {
	return sanitize_text_field( $var );
}

add_action( 'wp_ajax_rfbwp_export_info', 'rfbwp_ajax_export_info' );
function rfbwp_ajax_export_info() {
	if ( ! isset( $_GET[ 'system_info' ] ) || ! isset( $_GET[ '_wpnonce' ] ) ) {
		die( '-1' );
	}

	check_ajax_referer( 'rfbwp-system-info' );

	header('Content-Disposition: attachment; filename="rfbwp_system_info.txt"');

	echo $_GET[ 'system_info' ];

	die();
}

function rfbwp_panel_system() {
	global $rfbwp_shortname;

	$status_info = array();

	$plugin_data = get_plugin_data( MPC_PLUGIN_FILE );

	?>
	<div id="rfbwp_panel" class="rfbwp-panel">
		<header class="rfbwp-panel__header">
			<h1 class="rfbwp-panel__name">
				<?php _e( 'System Info', 'rfbwp' ); ?>
			</h1>
		</header>

		<div class="rfbwp-section rfbwp-section--wp-env">
			<h2 class="rfbwp-section__title"><?php _e( 'WordPress Environment', 'rfbwp' ); ?></h2>
			<?php $status_info[ 'WordPress Environment' ] = '{separator}'; ?>
			<div class="rfbwp-section__content">
				<table class="rfbwp-table--status widefat" cellspacing="0">
					<tbody>
					<tr>
						<td><?php _e( 'Home URL', 'rfbwp' ); ?>:
							<span class="rfbwp-hint">?<span class="rfbwp-hint-content"><span class="rfbwp-hint-triangle"></span><?php _e( 'The URL of your site\'s homepage.', 'rfbwp' ); ?></span></span>
						</td>
						<td><?php echo $status_info[ 'Home URL' ] = esc_url( home_url() ); ?></td>
					</tr>
					<tr>
						<td><?php _e( 'Site URL', 'rfbwp' ); ?>:
							<span class="rfbwp-hint">?<span class="rfbwp-hint-content"><span class="rfbwp-hint-triangle"></span><?php _e( 'The root URL of your site.', 'rfbwp' ); ?></span></span>
						</td>
						<td><?php echo $status_info[ 'Site URL' ] = esc_url( get_site_url() ); ?></td>
					</tr>
					<tr>
						<td><?php _e( 'Flipbook Version', 'rfbwp' ); ?>:
							<span class="rfbwp-hint">?<span class="rfbwp-hint-content"><span class="rfbwp-hint-triangle"></span><?php _e( 'The version of Responsive Flipbook installed on your site.', 'rfbwp' ); ?></span></span>
						</td>
						<td><?php echo $status_info[ 'FB Version' ] = esc_html( (float)$plugin_data['Version'] ); ?></td>
					</tr>
					<tr>
						<td><?php _e( 'WP Version', 'rfbwp' ); ?>:
							<span class="rfbwp-hint">?<span class="rfbwp-hint-content"><span class="rfbwp-hint-triangle"></span><?php _e( 'The version of WordPress installed on your site.', 'rfbwp' ); ?></span></span>
						</td>
						<td><?php echo $status_info[ 'WP Version' ] = get_bloginfo( 'version' ); ?></td>
					</tr>
					<tr>
						<td><?php _e( 'WP Multisite', 'rfbwp' ); ?>:
							<span class="rfbwp-hint">?<span class="rfbwp-hint-content"><span class="rfbwp-hint-triangle"></span><?php _e( 'Whether or not you have WordPress Multisite enabled.', 'rfbwp' ); ?></span></span>
						</td>
						<td><?php $status_info[ 'WP Multisite' ] = is_multisite(); echo $status_info[ 'WP Multisite' ] ? '&#x2713;' : '&#x2717;'; ?></td>
					</tr>
					<tr>
						<td><?php _e( 'WP Memory Limit', 'rfbwp' ); ?>:
							<span class="rfbwp-hint">?<span class="rfbwp-hint-content"><span class="rfbwp-hint-triangle"></span><?php _e( 'The maximum amount of memory (RAM) that your site can use at one time.', 'rfbwp' ); ?></span></span>
						</td>
						<td><?php
							$memory = rfbwp_let_to_num( WP_MEMORY_LIMIT );
							$status_info[ 'WP Memory Limit' ] = size_format( $memory );

							if ( $memory < 100663296 ) {
								echo '<mark class="error">' . sprintf( __( '%s - We recommend setting memory to at least <strong>96 MB</strong>. See: <a href="%s" target="_blank">Increasing memory allocated to PHP</a>', 'rfbwp' ), size_format( $memory ), 'http://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP' ) . '</mark>';
							} else {
								echo '<mark class="yes">' . size_format( $memory ) . '</mark>';
							}
							?></td>
					</tr>
					<tr>
						<td><?php _e( 'WP Debug Mode', 'rfbwp' ); ?>:
							<span class="rfbwp-hint">?<span class="rfbwp-hint-content"><span class="rfbwp-hint-triangle"></span><?php _e( 'Displays whether or not WordPress is in Debug Mode.', 'rfbwp' ); ?></span></span>
						</td>
						<td><?php $status_info[ 'WP Debug Mode' ] = defined( 'WP_DEBUG' ) && WP_DEBUG;  echo $status_info[ 'WP Debug Mode' ] ? '<mark class="yes">&#x2713;</mark>' : '<mark class="no">&#x2717;</mark>'; ?></td>
					</tr>
					<tr>
						<td><?php _e( 'Language', 'rfbwp' ); ?>:
							<span class="rfbwp-hint">?<span class="rfbwp-hint-content"><span class="rfbwp-hint-triangle"></span><?php _e( 'The current language used by WordPress. Default = English', 'rfbwp' ); ?></span></span>
						</td>
						<td><?php echo $status_info[ 'Language' ] = get_locale(); ?></td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>

		<div class="rfbwp-section rfbwp-section--server-env">
			<h2 class="rfbwp-section__title"><?php _e( 'Server Environment', 'rfbwp' ); ?></h2>
			<?php $status_info[ 'Server Environment' ] = '{separator}'; ?>
			<div class="rfbwp-section__content">
				<table class="rfbwp-table--status widefat" cellspacing="0">
					<tbody>
					<tr>
						<td><?php _e( 'Server Info', 'rfbwp' ); ?>:
							<span class="rfbwp-hint">?<span class="rfbwp-hint-content"><span class="rfbwp-hint-triangle"></span><?php _e( 'Information about the web server that is currently hosting your site.', 'rfbwp' ); ?></span></span>
						</td>
						<td><?php echo $status_info[ 'Server Info' ] = esc_html( $_SERVER['SERVER_SOFTWARE'] ); ?></td>
					</tr>
					<tr>
						<td><?php _e( 'PHP Version', 'rfbwp' ); ?>:
							<span class="rfbwp-hint">?<span class="rfbwp-hint-content"><span class="rfbwp-hint-triangle"></span><?php _e( 'The version of PHP installed on your hosting server.', 'rfbwp' ); ?></span></span>
						</td>
						<td><?php
							// Check if phpversion function exists
							if ( function_exists( 'phpversion' ) ) {
								$php_version = phpversion();
								$status_info[ 'PHP Version' ] = $php_version;

								if ( version_compare( $php_version, '5.4', '<' ) ) {
									echo '<mark class="error">' . __( 'We recommend a minimum PHP version of 5.4' ) . '</mark>';
								} else {
									echo '<mark class="yes">' . esc_html( $php_version ) . '</mark>';
								}
							} else {
								_e( "Couldn't determine PHP version because phpversion() doesn't exist.", 'rfbwp' );
								$status_info[ 'Server Info' ] = 'undefined';
							}
							?></td>
					</tr>
					<?php if ( function_exists( 'ini_get' ) ) : ?>
						<tr>
							<td><?php _e( 'PHP Post Max Size', 'rfbwp' ); ?>:
								<span class="rfbwp-hint">?<span class="rfbwp-hint-content"><span class="rfbwp-hint-triangle"></span><?php _e( 'The largest filesize that can be contained in one post.', 'rfbwp' ); ?></span></span>
							</td>
							<td><?php echo $status_info[ 'PHP Post Max Size' ] = size_format( rfbwp_let_to_num( ini_get( 'post_max_size' ) ) ); ?></td>
						</tr>
						<tr>
							<td><?php _e( 'PHP Time Limit', 'rfbwp' ); ?>:
								<span class="rfbwp-hint">?<span class="rfbwp-hint-content"><span class="rfbwp-hint-triangle"></span><?php _e( 'The amount of time (in seconds) that your site will spend on a single operation before timing out (to avoid server lockups)', 'rfbwp' ); ?></span></span>
							</td>
							<td><?php echo $status_info[ 'PHP Time Limit' ] = ini_get( 'max_execution_time' ); ?></td>
						</tr>
						<tr>
							<td><?php _e( 'PHP Max Input Vars', 'rfbwp' ); ?>:
								<span class="rfbwp-hint">?<span class="rfbwp-hint-content"><span class="rfbwp-hint-triangle"></span><?php _e( 'The maximum number of variables your server can use for a single function to avoid overloads.', 'rfbwp' ); ?></span></span>
							</td>
							<td><?php echo $status_info[ 'PHP Max Input Vars' ] = ini_get( 'max_input_vars' ); ?></td>
						</tr>
					<?php else: ?>
						<?php $status_info[ 'PHP INI' ] = 'undefined'; ?>
					<?php endif; ?>
					<tr>
						<td><?php _e( 'MySQL Version', 'rfbwp' ); ?>:
							<span class="rfbwp-hint">?<span class="rfbwp-hint-content"><span class="rfbwp-hint-triangle"></span><?php _e( 'The version of MySQL installed on your hosting server.', 'rfbwp' ); ?></span></span>
						</td>
						<td>
							<?php
							/** @global wpdb $wpdb */
							global $wpdb;
							echo $status_info[ 'MySQL Version' ] = $wpdb->db_version();
							?>
						</td>
					</tr>
					<tr>
						<td><?php _e( 'Max Upload Size', 'rfbwp' ); ?>:
							<span class="rfbwp-hint">?<span class="rfbwp-hint-content"><span class="rfbwp-hint-triangle"></span><?php _e( 'The largest filesize that can be uploaded to your WordPress installation.', 'rfbwp' ); ?></span></span>
						</td>
						<td><?php echo $status_info[ 'Max Upload Size' ] = size_format( wp_max_upload_size() ); ?></td>
					</tr>
					<?php
					$posting = array();

					// GZIP
					$posting['gzip']['name'] = 'GZip';
					$posting['gzip']['help'] = __( 'GZip (gzopen) is used to open the GEOIP database from MaxMind.', 'rfbwp' );

					if ( is_callable( 'gzopen' ) ) {
						$posting['gzip']['success'] = true;
					} else {
						$posting['gzip']['success'] = false;
						$posting['gzip']['note']    = sprintf( __( 'Your server does not support the <a href="%s">gzopen</a> function - this is required to use the GeoIP database from MaxMind. The API fallback will be used instead for geolocation.', 'rfbwp' ), 'http://php.net/manual/en/zlib.installation.php' ) . '</mark>';
					}

					$posting = apply_filters( 'rfbwp_debug_posting', $posting );

					foreach ( $posting as $post ) {
						$mark = ! empty( $post['success'] ) ? 'yes' : 'error';
						$status_info[ $post['name'] ] = $post['success'];

						?>
						<tr>
							<td><?php echo esc_html( $post['name'] ); ?>:
								<span class="rfbwp-hint">?<span class="rfbwp-hint-content"><span class="rfbwp-hint-triangle"></span><?php echo isset( $post['help'] ) ? $post['help'] : ''; ?></span></span>
							</td>
							<td>
								<mark class="<?php echo $mark; ?>">
									<?php echo ! empty( $post['success'] ) ? '&#x2713;' : '&#x2717;'; ?> <?php echo ! empty( $post['note'] ) ? wp_kses_data( $post['note'] ) : ''; ?>
								</mark>
							</td>
						</tr>
						<?php
					}
					?>
					</tbody>
				</table>
			</div>
		</div>

		<div class="rfbwp-section rfbwp-section--theme">
			<h2 class="rfbwp-section__title"><?php _e( 'Theme', 'rfbwp' ); ?></h2>
			<?php $status_info[ 'Theme' ] = '{separator}'; ?>
			<div class="rfbwp-section__content">
				<table class="rfbwp-table--status widefat" cellspacing="0">
					<?php
					include_once( ABSPATH . 'wp-admin/includes/theme-install.php' );

					$active_theme         = wp_get_theme();
					$theme_version        = $active_theme->Version;
					$update_theme_version = $active_theme->Version;
					$api                  = themes_api( 'theme_information', array( 'slug' => get_template(), 'fields' => array( 'sections' => false, 'tags' => false ) ) );

					// Check .org
					if ( $api && ! is_wp_error( $api ) ) {
						$update_theme_version = $api->version;

					}
					?>
					<tbody>
					<tr>
						<td><?php _e( 'Name', 'rfbwp' ); ?>:
							<span class="rfbwp-hint">?<span class="rfbwp-hint-content"><span class="rfbwp-hint-triangle"></span><?php _e( 'The name of the current active theme.', 'rfbwp' ); ?></span></span>
						</td>
						<td><?php echo $status_info[ 'Name' ] = $active_theme->Name; ?></td>
					</tr>
					<tr>
						<td><?php _e( 'Version', 'rfbwp' ); ?>:
							<span class="rfbwp-hint">?<span class="rfbwp-hint-content"><span class="rfbwp-hint-triangle"></span><?php _e( 'The installed version of the current active theme.', 'rfbwp' ); ?></span></span>
						</td>
						<td><?php
							echo $status_info[ 'Version' ] = esc_html( $theme_version );

							if ( version_compare( $theme_version, $update_theme_version, '<' ) ) {
								echo ' - <strong style="color:red;">' . sprintf( __( '%s is available', 'rfbwp' ), esc_html( $update_theme_version ) ) . '</strong>';
							}
							?></td>
					</tr>
					<tr>
						<td><?php _e( 'Author URL', 'rfbwp' ); ?>:
							<span class="rfbwp-hint">?<span class="rfbwp-hint-content"><span class="rfbwp-hint-triangle"></span><?php _e( 'The theme developers URL.', 'rfbwp' ); ?></span></span>
						</td>
						<td><?php echo $status_info[ 'Author URL' ] = $active_theme->{'Author URI'}; ?></td>
					</tr>
					<tr>
						<td><?php _e( 'Child Theme', 'rfbwp' ); ?>:
							<span class="rfbwp-hint">?<span class="rfbwp-hint-content"><span class="rfbwp-hint-triangle"></span><?php _e( 'Displays whether or not the current theme is a child theme.', 'rfbwp' ); ?></span></span>
						</td>
						<td><?php
							$status_info[ 'Child Theme' ] = is_child_theme(); echo $status_info[ 'Child Theme' ] ? '<mark class="yes">&#x2713;</mark>' : '&#x2717; - ' . sprintf( __( 'See: <a href="%s" target="_blank">How to create a child theme</a>', 'rfbwp' ), 'http://codex.wordpress.org/Child_Themes' );
							?></td>
					</tr>
					<?php
					if( is_child_theme() ) :
						$parent_theme = wp_get_theme( $active_theme->Template );
						?>
						<tr>
							<td><?php _e( 'Parent Theme Name', 'rfbwp' ); ?>:
								<span class="rfbwp-hint">?<span class="rfbwp-hint-content"><span class="rfbwp-hint-triangle"></span><?php _e( 'The name of the parent theme.', 'rfbwp' ); ?></span></span>
							</td>
							<td><?php echo $status_info[ 'Parent Theme Name' ] = $parent_theme->Name; ?></td>
						</tr>
						<tr>
							<td><?php _e( 'Parent Theme Version', 'rfbwp' ); ?>:
								<span class="rfbwp-hint">?<span class="rfbwp-hint-content"><span class="rfbwp-hint-triangle"></span><?php _e( 'The installed version of the parent theme.', 'rfbwp' ); ?></span></span>
							</td>
							<td><?php echo $status_info[ 'Parent Theme Version' ] = $parent_theme->Version; ?></td>
						</tr>
						<tr>
							<td><?php _e( 'Parent Theme Author URL', 'rfbwp' ); ?>:
								<span class="rfbwp-hint">?<span class="rfbwp-hint-content"><span class="rfbwp-hint-triangle"></span><?php _e( 'The parent theme developers URL.', 'rfbwp' ); ?></span></span>
							</td>
							<td><?php echo $status_info[ 'Parent Theme Author URL' ] = $parent_theme->{'Author URI'}; ?></td>
						</tr>
					<?php endif ?>
					</tbody>
				</table>
			</div>
		</div>

		<div class="rfbwp-section rfbwp-section--plugins">
			<h2 class="rfbwp-section__title"><?php _e( 'Active Plugins', 'rfbwp' ); ?> (<?php echo count( (array) get_option( 'active_plugins' ) ); ?>)</h2>
			<?php $status_info[ 'Active Plugins' ] = '{separator}'; ?>
			<div class="rfbwp-section__content">
				<table class="rfbwp-table--status rfbwp-table--plugins widefat" cellspacing="0">
					<tbody>
					<?php
					$active_plugins = (array) get_option( 'active_plugins', array() );

					if ( is_multisite() ) {
						$network_activated_plugins = array_keys( get_site_option( 'active_sitewide_plugins', array() ) );
						$active_plugins            = array_merge( $active_plugins, $network_activated_plugins );
					}

					foreach ( $active_plugins as $plugin ) {
						$plugin_data    = @get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin );
						$dirname        = dirname( $plugin );
						$version_string = '';
						$network_string = '';

						if ( ! empty( $plugin_data['Name'] ) ) {

							// link the plugin name to the plugin url if available
							$plugin_name = esc_html( $plugin_data['Name'] );

							if ( ! empty( $plugin_data['PluginURI'] ) ) {
								$plugin_name = '<a href="' . esc_url( $plugin_data['PluginURI'] ) . '" title="' . esc_attr__( 'Visit plugin homepage' , 'rfbwp' ) . '" target="_blank">' . $plugin_name . '</a>';
							}

							if ( ! empty( $version_data['version'] ) && version_compare( $version_data['version'], $plugin_data['Version'], '>' ) ) {
								$version_string = ' - <strong style="color:red;">' . esc_html( sprintf( _x( '%s is available', 'Version info', 'rfbwp' ), $version_data['version'] ) ) . '</strong>';
							}

							if ( $plugin_data['Network'] != false ) {
								$network_string = ' - <strong style="color:black;">' . __( 'Network enabled', 'rfbwp' ) . '</strong>';
							}

							$status_info[ esc_html( $plugin_data[ 'Name' ] ) ] = sprintf( _x( 'by %s', 'by author', 'rfbwp' ), strip_tags( $plugin_data[ 'Author' ] ) ) . ' - ' . esc_html( $plugin_data[ 'Version' ] ) . $version_string . $network_string;

							?>
							<tr>
								<td><?php echo $plugin_name; ?></td>
								<td><?php echo sprintf( _x( 'by %s', 'by author', 'rfbwp' ), $plugin_data['Author'] ) . ' - ' . esc_html( $plugin_data['Version'] ) . $version_string . $network_string; ?></td>
							</tr>
							<?php
						}
					}
					?>
					</tbody>
				</table>
			</div>
		</div>

		<!-- FOOTER -->
		<footer class="rfbwp-panel__footer">
			<a href="#show_info" id="rfbwp_panel__show_info" class="rfbwp-panel__show_info rfbwp-panel__primary">
				<span><?php _e( 'Show Info', 'rfbwp' ); ?></span>
			</a>
			<a href="#show_file" id="rfbwp_panel__info_file" class="rfbwp-panel__info_file rfbwp-panel__primary">
				<span><?php _e( 'Get Info File', 'rfbwp' ); ?></span>
			</a>
		</footer>

		<!-- SYSTEM INFO -->
		<div id="rfbwp_panel__system_wrap" class="rfbwp-status-wrap" style="max-height: 0;">
			<div class="rfbwp-status-output">
				<label><?php _e( 'Please paste this in your support ticket :)', 'rfbwp' ) ?><textarea rows="10" readonly><?php
				foreach ( $status_info as $name => $value ) {
					if ( is_bool( $value ) ) {
						$value = $value ? 'true' : 'false';
					}

					if ( $value == '{separator}' ) {
						echo "\n### " . strtoupper( $name ) . " ###\n\n";
					} else {
						echo $name . ": " . $value . PHP_EOL;
					}
				}
				?></textarea></label></div>
		</div>
	</div>

	<?php wp_nonce_field( 'rfbwp-system-info' );
}