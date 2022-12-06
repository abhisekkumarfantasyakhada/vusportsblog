<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */


// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'fantasyblog' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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


define('AUTH_KEY',         'cAgi++@tA.?~bD[@,:=V($Ik3T}]5|3)JF5=TT+fG<m~Bkf9ZO+F`e+Z0#@whgd|');
define('SECURE_AUTH_KEY',  'M*%IZ*dGwEX*JQPW?daqk4tKGL;Wn1Mp[B-&<-|36%y`fv3c5qltcDcoNxH0V6d)');
define('LOGGED_IN_KEY',    'e:j1]u+[e?=QF>$6lDkyBWm-#JHdXNW-Yt;~QK[=340*EygVvErm`r1m-<Hvk-$%');
define('NONCE_KEY',        'Cqc|JUc!Fyq2a3ZB{U _ZrjP`}?^XL1xOpzX9]vNhHvWBxnH~gSg,+>l?BbIW#Zh');
define('AUTH_SALT',        ']Ju)0,om=N/u=yqY%x>7>r.Yj-R|}kSoaVR eBV]cvv({YEni3$3IOP:$?sDOwu,');
define('SECURE_AUTH_SALT', '|eJBzS~)2#9|Z.B}oTl{j :9(SjKcv0vOaO5NDd,_[`BUl{lF:a5|X8XV!jZgd+<');
define('LOGGED_IN_SALT',   'zAo-fDus/0is4aLZ3oD`@W31piU#AB1;:mGqt-ytqv:P17kX(h$2}rNbDWEqK+1_');
define('NONCE_SALT',       '5qeDmu9VUU&J|x~q%JXe5`]F|4(}xc-rg+{9McO6BdL+u/?yCCLZnQ(rv}GC?S|F');
/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
