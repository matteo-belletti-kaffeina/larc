<?php
define('WP_CACHE', true); // WP-Optimize Cache
//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL
 // Added by WP Rocket
define('WP_AUTO_UPDATE_CORE', false);// Questa impostazione è stata definita dal WordPress Toolkit per impedire aggiornamenti automatici di WordPress. Non modificarla per evitare conflitti con la funzionalità di aggiornamento automatico di WordPress Toolkit.
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'larcProd3');
/** MySQL database username */
define('DB_USER', 'larcProd3');
/** MySQL database password */
define('DB_PASSWORD','K~9ue4a5');
/** MySQL hostname */
define('DB_HOST', 'localhost:3306');
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');
/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',       'pP*%9qxc6dzWL@f%kFIP6ZQ91Vs*XPM7tyhL!rvCk^WjkOdP6mZls*E!BZK4N#!J');
define('SECURE_AUTH_KEY',       'Ha*X15AzlMSqJkB44*yWmPYgyaH*SpcpLGd*4lO2qVxChLnhQHkh8LmLXyUn0VJ8');
define('LOGGED_IN_KEY',       '(igXy^@#f0KNaziKC#7u#mGjs@ydXZJmb5OhZfa*a!zzZVLEaFH1X#ToUHDkmFxi');
define('NONCE_KEY',       'Q(ErzR0RTZhvBebgb3%fTAq0M)^NjP42ApgXeB6Ns2&SY!KRPUx&OMUP)fR!lNkb');
define('AUTH_SALT',       'kOFXSiM7d2DdeT44Vg&tp4V^&tUPea2rCCS#AuhGmpcy8@h)9O4r9tdL@^8QolAT');
define('SECURE_AUTH_SALT',       'ckZLr(T2YB6XUunmD*ZYAA*j(gNAJtcfrXg&Vz7VmPHh62Au#iVXkzmPiTz(Qj(E');
define('LOGGED_IN_SALT',       '7#&1zyMSWJZIe4R2Ox7Y4wvYOwREoed)3wzkzd^1*syh^dCmeiEgBG3Jtg(lAMU@');
define('NONCE_SALT',       'GPK)2sF@UwcCF8Ka8!Oe#dHM2*zgHdl%MfEzs(UvkwouhdiMv0g@@yu4#89BgzDD');
/**#@-*/
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'A6vnDNw9U_';
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
define('WP_HOME','https://larc.it');
define('WP_SITEURL','https://larc.it');
/* That's all, stop editing! Happy blogging. */
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
define( 'WP_ALLOW_MULTISITE', true );
define ('FS_METHOD', 'direct');