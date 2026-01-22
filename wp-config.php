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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',          'R0Mj>OL1v`0m=a2h{(u]!m,)7p21^}6VD@Va`/7NE,feYl10tq.MGqfzV4F~+H*$' );
define( 'SECURE_AUTH_KEY',   'E2x;m!{{!01yZzQCT=V @rBBZ=@#So%bgSrl1,&6,[ :5zo~ja[{~NB[N&K{%-Hl' );
define( 'LOGGED_IN_KEY',     'YoaF+Q#pAR%Wr%h#AY%A],k&jA.8OK8F6be3i{M:*njj2&|3>XD xSEQc]tEqEz(' );
define( 'NONCE_KEY',         '] u@oMq},.|kV;wjG_/T^1wM(:6o_=Q|W1YpY*{=f4!P}|v/!iqA6cv:pNB{hh@f' );
define( 'AUTH_SALT',         'C2[9$?$Z49Kte5bHPF?JW0{t11 Q=$n9]Y4G%%;F21tUSpdeW7Ib3t9mxPJnB7^:' );
define( 'SECURE_AUTH_SALT',  'K`8RX<9SQ*SQ;[1o|D1|m*eDX+T98lXJ-[g%T^Z34LrJE7}`~8p+EK&m_ 3?^tVN' );
define( 'LOGGED_IN_SALT',    'T@D6Jmoidd2o}@x[S#0j2+^1;9DDi;{~Q~k>(=Sf|V^g@jR?[Rx^9m+/#(GHnUz?' );
define( 'NONCE_SALT',        'WqY4x09rXGpzFNQr1^ |#8!IU1.ZVs|;ZS>8t(,$!y`KG8YnTUZdK{GB5C_w }5%' );
define( 'WP_CACHE_KEY_SALT', 'fdpmlesrdCT93QT./4%{P_~?mAE ]=6YzMG+Tozo)JP5D;PKU&15ZF-EOs:C)DpL' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
