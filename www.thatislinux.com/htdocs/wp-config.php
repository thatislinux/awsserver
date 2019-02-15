<?php

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
 //Added by WP-Cache Manager
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/var/www/www.thatislinux.com/htdocs/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'thatislinuxdotcom');
#define('FS_METHOD', 'ftpext');
/** MySQL database username */
define('DB_USER', 'that_is_linux');
#define( 'FTP_BASE', '/var/www/www.thatislinux.com/htdocs/' );
#define( 'FTP_USER', 'updraft' );
#define( 'FTP_PASS', 'wiley1234' );
#define( 'FTP_HOST', '52.4.226.244' );
#define( 'FTP_SSL', false );
/** MySQL database password */
define('DB_PASSWORD', 'San123tv#');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'WJfwon3x`ThFJV~$a;0|9s+s|.r_-UB75C?)hR|S;=H!Z#M*W:joi5osT-O 9nya');
define('SECURE_AUTH_KEY',  'EV/ TI5 wDO?>V4~.<n+V;Vcwt-=$#v@W_0F^+Yy,_{Ad_$Q#Zq>n}},u~-HXD=m');
define('LOGGED_IN_KEY',    '$,[#)y;>kw{iDn&kj XT,;.CJu,Q-N|XLNUXqikHF7eA9UO6|ccq}-}9!wecZ$p|');
define('NONCE_KEY',        'SqfE:IISp{lUdH)EEc+)cNd>[+u# Er<:MD(A,WM|<@m/v^,tS#&->G]Xp#+!WXk');
define('AUTH_SALT',        'z-8%! 1C<Op7?KT&qugz*uDK*|Q.[F[N(|!Vfd|#2{Q~,N[%n+^whOV4?L1U~>S~');
define('SECURE_AUTH_SALT', 'KQL;N0?9-SD6k}q#qNHIQKBUt:+<rSFY+<<;jkpfd_4^UKO*4R_~3+J8Dc?$WJM*');
define('LOGGED_IN_SALT',   'NV[F0ZmA:_@Zd++2e2[ms,pfg>M`$2}32I*j+.Dy>>5Z~d<Wk}@xz_/Yl>5RV.7(');
define('NONCE_SALT',       'HB@a6xMxp>yHb6_tRAr!IYk?P?W{5tb5_)KA(S09L8#gd0o<ORg3-t}YeJW +L4b');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
