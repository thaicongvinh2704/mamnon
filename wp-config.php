<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mamnon' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'DV)5xZEiufb4Lt}Oa]3/@ldsv$%*V=ZY$2.HbX`c-3)qc},D}dvxjz@3`~Ygz:,2' );
define( 'SECURE_AUTH_KEY',  '1&c-L[Ts,~-|5qg>dYS~,^?s<d[D|**1:hd}-#05t8wthk1]@}#iPDvQh6OG[]Q{' );
define( 'LOGGED_IN_KEY',    '?rMi@kJ{*oXl G=0n${8yhyC~WH; WIdNd&;4(rm6.<(y+$|?S(>%MokDz2A:1I+' );
define( 'NONCE_KEY',        '8Obk)H[mEQOsox?BTqIe.|PBVWQYSLM x?/uT&q=>+J fC2WrxK+!9O^%a^7e>SR' );
define( 'AUTH_SALT',        '%bHEZy`{hn&M?GsK*x_4z|?8q+L+v$Km-UOyxUP~j5RUCoa=p[3wzg=Js:RW5 Ca' );
define( 'SECURE_AUTH_SALT', '.l !4-94e.rrFtK/GGv]tgraSVUgUj@n-d&]vQ^V8/>tfzW*7[%QC?;VR>6 2ZtF' );
define( 'LOGGED_IN_SALT',   'm7j%P{=8?k`}:c  Ry@sKN/+ *k CWrZy]W_m}peA6_bD@}6V1)kY<O}6V N}$h ' );
define( 'NONCE_SALT',       '1=bRm:d}[QGD:I kdd@LgPrfVGoI^pW,Cih.mhl(*eSc%[X8L CQG9nX*n5q )fA' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
