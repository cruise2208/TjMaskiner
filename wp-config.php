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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Test' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '3|A>!3|L]b?IE@;Rke0hPpdOj!/!A%<A#U)DR[PhhTMpNA52vf^cGh$HIM,iO3M=' );
define( 'SECURE_AUTH_KEY',  'ZG3p>5-02=n;jpVP_OpYo;#nLo70$B.;G?[L3|[b>.A3)X|ehr{.,[7 d@0VvY!6' );
define( 'LOGGED_IN_KEY',    'hLD[UNxh&&/9mpCYZ(bDA;eUuwle=Fga(K*}H%wFT]Lq<v3Uzlmdj^B!!`Oi?_Sf' );
define( 'NONCE_KEY',        'NK*wS,3`Qe)5rw@j</@d][%,QZVI^0cEq28yl0$@TIMre7r&4d-p]NO8pn8b^xI]' );
define( 'AUTH_SALT',        ':&cp9!x+_j3YfA]]BK+M$CK^WJyWw^;ktg!C>uh Sn7 w7D8!jxHwzlwOr7h.Ky2' );
define( 'SECURE_AUTH_SALT', 'FA!P`qHHu VD &1 5[Gh+Qdr.P.%Q6(&H$0&<gOGSsItlek8ZV;*V$^nWvZgT0O8' );
define( 'LOGGED_IN_SALT',   '~X|KT91&ek.Y?xSX`z:)E*G7?hLT:]LVfTQdx~6.-)h8@O8-Y!.l`doy?u^a*LYH' );
define( 'NONCE_SALT',       '&137C{ViGWbyz/uOunC{ljp8([[7|H>Z-Ek:Qlk#if>{{gQ^1Oe_(~7(@v|-|U%(' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
