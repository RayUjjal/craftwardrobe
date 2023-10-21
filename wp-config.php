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
define( 'DB_NAME', 'craftwardrobe' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'db' );

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
define( 'AUTH_KEY',         'E6o@)1Q6#;&hD/oUcZ/(Q0jKq}#ed~|Dt49=~Xn(;rN-8M6E]5p$IiQv;L0H5xUJ' );
define( 'SECURE_AUTH_KEY',  '*ZHn4%e546b~-@6GLHIv=M cK- gJ;/We?`0TqSAx4PxQditV0]8%)6.(U8O[ei ' );
define( 'LOGGED_IN_KEY',    '>wOZL?re2X+06H%YeJf(=&ir].cW^hl?9~FqQ7xM8dDR~Ga*ZGMX13V#{1HE5$T6' );
define( 'NONCE_KEY',        ':03ws*C5&|U]S^sP]|F(@@np;D.z<-%ob>t1Fr,;loVX1~NKqzRpuq;=V[%;wJr(' );
define( 'AUTH_SALT',        'I7HLWvQQPq6)cO9~~*`&S;lz^xdN5svsg2au+z`-}Lo[8;xJc{;Vf<dXX0p*A[ze' );
define( 'SECURE_AUTH_SALT', 'G|8QQ{X_arF=|X$SSx!l({L[&,XH?0gT<SP~ua[ZrWv30s;}t)L)7mwM+TX`w&H/' );
define( 'LOGGED_IN_SALT',   '=SY1WZ7FHVGrH;y|4smym&[iKP0d{U51?wB3)pE(N/yOs!H_rk1idkZgB45>sa!A' );
define( 'NONCE_SALT',       '=Jx=k*<>^3GBU?jCc?mWS(${fs].I(1CE_P}&FT3w:$w]j{/l?IP=c5g~w)?F!2V' );

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
// define( 'WP_DEBUG', false );

define('WP_DEBUG', false);
// define('WP_DEBUG_LOG', true);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
define('FS_METHOD', 'direct');
