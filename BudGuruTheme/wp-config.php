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
define( 'DB_NAME', "zn414415_budguru2" );

/** Database username */
define( 'DB_USER', "zn414415_budguru2" );

/** Database password */
define( 'DB_PASSWORD', "t82@U6i;zG" );

/** Database hostname */
define( 'DB_HOST', "zn414415.mysql.tools" );

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
define( 'AUTH_KEY',         'AJZN fF1J=wk1XsjD/A@`MrOtCY8;qI.!Q9qCEb.yClm,LB^8p `m$gsHvI3W0T^' );
define( 'SECURE_AUTH_KEY',  '`N}*mMSK`Pbf>C|DCOMZ2*<FhR4#FV,tRTb+yw&^U2Ls(83ZV^kf}k^lpVX>T{8Z' );
define( 'LOGGED_IN_KEY',    'wXGY^xJ^_#I(@VpDQ@d=V_;+qP]E}G6O*78Es42LrAUnX[;z~WT+gy +Pn<j3yWA' );
define( 'NONCE_KEY',        'aM7#cE(Cc&{p|2#fc.-nGxzyA9$MWj-ZlT(8Sq`G=A2I^!8$H@n*{Jnl8x+:?L6H' );
define( 'AUTH_SALT',        '>v<]k+sV8w:+M4Zp2;:/CcR.Vd;)S0uNtyKXvALzG`*,0EJ-@>*EFqzM:I>4G7we' );
define( 'SECURE_AUTH_SALT', '=9yxH{`AUqA^Zjr0[p+AMkB]8 yvj=CM-&S,Qc1$s2&Zj:y{wNhw_~Kc1Ll:c7@H' );
define( 'LOGGED_IN_SALT',   '`nW,WyklAS#=Q~hw{k<NTN*!lX5&x<(IV/m1TEsxukJKFr8f<Ye5_NF4 :#>-28*' );
define( 'NONCE_SALT',       '(2{X31LNmDIgOPsH~ET_`V`<)#C>ou2Z;P3|R6WezhyhLI3_d`K,jRJ+siC9A4>6' );

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
	define( 'ABSPATH', dirname(__FILE__) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
