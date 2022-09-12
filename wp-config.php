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
define( 'DB_NAME', 'hamza_wp' );

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
define( 'AUTH_KEY',         'Af{GZqW>t&KuN$mXQ(9Prz1?e$s3Dy-[Z H%fsNke}6hBQ>;6GZ[qd6c3FJHRIm@' );
define( 'SECURE_AUTH_KEY',  'dXjS1c ^[rmi(?st0kEu88CSODk!Kq1PL|N%vS{U`C|Jol[u,F94b*Tg*RA27J`9' );
define( 'LOGGED_IN_KEY',    'f@,a-c~0et>Sg/:g&lb42Cc/h>E#|Z5zRLN%c/0.Lfr.hZvdbi:BOJ_[d-v#~Q+Z' );
define( 'NONCE_KEY',        '8]DMELhm8wOUmDDGw@@sk>uGi<Ro|3!wMC4 }GV8K~5Od~EI79OR@prE7B<lBdhw' );
define( 'AUTH_SALT',        'p`U_Ehjx~7wyxIW[YpJ:=b|>A/_R^|NG648kAWm7{]^^0CF`YUre63j<=jiR1j;F' );
define( 'SECURE_AUTH_SALT', 'Y3hFb{U|qiimj3iAKp?TVj;k&sAVL4mC1B(0y>1(o$CBFKR&<r$G3`Vt71,YE!ft' );
define( 'LOGGED_IN_SALT',   '7.9BlKrJ/ZU?_.k5^,:cRj$N1MvoF0wnK6V.Y& B]m_>=XzvBr75Rww~_nTdC`]^' );
define( 'NONCE_SALT',       'c$y~`aOsxT~y?U+*MXD2]:i4kyabXB| l#EDsYJ3mewVnT}%OV{,OFY.C_6,Q(Yk' );

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
