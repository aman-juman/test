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
//test
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'satirateatr');

/** MySQL database username */
define('DB_USER', 'satira');

/** MySQL database password */
define('DB_PASSWORD', 'foormoor456!');

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
define('AUTH_KEY',         '<##fBCBHp=C`Pt6!t|tzQxjve^D $eC E|^t(]b`{|b~TN$~xd2{tM];L vE>R(*');
define('SECURE_AUTH_KEY',  'n)!#=-~LMK2?Ny};wr{XPP82M!{y^t,6%Fl8P7`Pa/Dc97KI%(S#m 86fZHy:Qo,');
define('LOGGED_IN_KEY',    '`<a}.Y6rE6&kddxo03!F5 OyU~mO;(xC/~tl~V,)N{G@/0,%Va;.@,I]iMrC0NMe');
define('NONCE_KEY',        'Ybq2u>>9po|s38<CSPf0.!RB VT8iAcM^pgba0vt4X[U7>t-^w;i!Ys.i`8t4}j3');
define('AUTH_SALT',        'f_yR[muPr[IemRkt#d@Lff&TNJmHlC:cf:*AH]IW^O],*[!JA1^Xye4}BiR>.2vI');
define('SECURE_AUTH_SALT', 'r<D_gR!=tH!N[-QL8m^3ZB>$kP^)5k/k~YUI)pI!Cx.zO?>|A4j*,K2vh(,;_3lo');
define('LOGGED_IN_SALT',   ',L%v7}R4Hc[;5N@pRaXY3+K#sUD`gU`DoNTafI,`-u8l^oG5fPrBO6yZ55$Vg!iV');
define('NONCE_SALT',       '$cM#zIxZ@l_NdL6&KMo$nw!e 0~)B$o[MURXtam c<iTkl;=x 50#/*7nuWgs)(1');

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
