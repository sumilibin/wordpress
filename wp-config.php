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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sumilibin' );

/** Database username */
define( 'DB_USER', 'libin' );

/** Database password */
define( 'DB_PASSWORD', 'abc' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3307' );

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
define( 'AUTH_KEY',         '}D:n`6V).<#|3(V%#<s+{&.CE/q)TaI=fRYTL$l8z4wXobtJHHoqCk^sFSBIQBKh' );
define( 'SECURE_AUTH_KEY',  '$? ;+HIJs_|mF}{hGVamgHQgO=K|MnE3`[+(.KXYG6Rfe*B*Xa/ouX=nz/[hI@0a' );
define( 'LOGGED_IN_KEY',    '-o~M1?=f-(mMJWsak_|c/;r5HK,;imRKGidbsawN[g_+Oab&lTQn_a=bW>6:`AN-' );
define( 'NONCE_KEY',        'QY6t7dLb&ISIt!YMHk~7Jl5_W~E5K+P`>iPeeQJ/Xf/8_gwS*E|R$P{~cVGk0A/`' );
define( 'AUTH_SALT',        'm UoQOywKF7?Zx6pus&^]IUm6Ds83q,((u[+n^F0xMI@Mk6F=c(z4A(P@l`GZ%dl' );
define( 'SECURE_AUTH_SALT', '?g,JzR=&X<Wd1`[$|eh-%#;s0T:]n0Bd*rN&LqwzU2hIcJe(yY_l15J]3&c8!LId' );
define( 'LOGGED_IN_SALT',   'IQoXZ>Jy*~pGZh;yEmbbwx(+Bp<9LB?!BZO<-n@kp/c{$v:LgCw*4VXRSic]J@ !' );
define( 'NONCE_SALT',       '%{`>8RvB29xnSM1ub.`rH;jw{[Ba;0@6%xre%M8*9ozH;bs(KlY1NG}Y&:,Pn#Y ' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
