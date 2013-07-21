<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'morya');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '[|FjWm{$|tZZnZQv-RBN^v0r+ND_~xLFd2Iu ~$Gq4$=lLE:3EliHnsn1i0.at5I');
define('SECURE_AUTH_KEY',  '$30mp(T6R9E{S`M!0njJVeo`TtmrY(pf7H9?[t:xt_%GK(1l )@b2tufuOt1A|z/');
define('LOGGED_IN_KEY',    'V0GE{L<TS[<sqLhE?n?b@mrK-Nt1f2<tZ`AAGA$6FUnGS`-kzo-2@5EKw]Q.N!:2');
define('NONCE_KEY',        'L-tAB]:%UlP-^@~]ImnEPBj0Iqq0Ep|Op!]Wq}P _OCb;:7 FUR88Yp|T+LXSZ=2');
define('AUTH_SALT',        'N+/$;45C#$kplm+74[?9&VW~w@k$ACD#fnFL6-a9(p(R}ahkkDaz}oDj(&h+591p');
define('SECURE_AUTH_SALT', '(LtuEpxK( ?0pk>zZ[f8.vWs|q[xpaOLMv&chIDPt77|@WJ:)Sh+FO&P=wNQw.5?');
define('LOGGED_IN_SALT',   's2+-JuG1r6e<&b2,Smk9+(}v>1U}D+Dm 06}|rIawgY2#0pA)RH(;t%z)W_oE.?!');
define('NONCE_SALT',       '@?_,3e-]UwhG+|$[N~X#F^^[oyv?!^eBUAtt28cr6z/aUlEhkFb!P:+(SkFa(m_w');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
