<?php
/**
 * Default config settings
 *
 * Enter any WordPress config settings that are default to all environments
 * in this file.
 *
 * Please note if you add constants in this file (i.e. define statements)
 * these cannot be overridden in environment config files so make sure these are only set once.
 *
 * @package    Studio 24 WordPress Multi-Environment Config
 * @version    2.0.0
 * @author     Studio 24 Ltd  <hello@studio24.net>
 */

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** MySQL hostname */
define('DB_HOST', getenv("DB_HOST") . ":3306");

/** The name of the database for WordPress */
define('DB_NAME', getenv("DB_NAME"));

/** MySQL database username */
define('DB_USER', getenv("DB_USER"));

/** MySQL database password */
define('DB_PASSWORD', getenv("DB_PASS"));


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
// define('AUTH_KEY', $_ENV["AUTH_KEY"]);
// define('SECURE_AUTH_KEY', $_ENV["SECURE_AUTH_KEY"]);
// define('LOGGED_IN_KEY', $_ENV["LOGGED_IN_KEY"]);
// define('NONCE_KEY', $_ENV["NONCE_KEY"]);
// define('AUTH_SALT', $_ENV["AUTH_SALT"]);
// define('SECURE_AUTH_SALT', $_ENV["SECURE_AUTH_SALT"]);
// define('LOGGED_IN_SALT', $_ENV["LOGGED_IN_SALT"]);
// define('NONCE_SALT', $_ENV["NONCE_SALT"]);
define('AUTH_KEY',         'KE0i_),,7?Ja[,>D`]:M81Pra>.(|(|1y+-X_+(?N1~*-}G0U[WBk!xCgrM.aEWK');
define('SECURE_AUTH_KEY',  '6(wG>e=g()gF&5!7?Lvy|BT0is00wn,++>,LZ(S#X6|:Y@AW|b.BF5IZ-gj|4!i@');
define('LOGGED_IN_KEY',    '@Ngl=y aypb-Rkq?c)D;hLZ!Ra>[!B`4^*,4)Z=SVXj8]A8N4D94.%.ev- qA]uV');
define('NONCE_KEY',        '1M`K9(H~@gZ{Wko:4g3#c[++tVEdw8g~juO$Wv8{N;b^hhg(yl/*mMRsbl o*0>&');
define('AUTH_SALT',        'rU]M]-|k70`Wk:wc;2%8lZd>WE:wXz&RVrORi=tvM>o}Nf%~ j1r</~$+;?$uPIM');
define('SECURE_AUTH_SALT', 'N%50[jQpx)8wua||OhR%A-8{5_8&(:j@ows xOP*aYh0[}0$[A,Hz$m[5|F,9CV+');
define('LOGGED_IN_SALT',   '2-!3ZTvw`a17sAQn,q{gn+Y|U9<FjA|$&..V%6xyj{V-s$|ofTbBD&[u=AV}5k,J');
define('NONCE_SALT',       'Nh,*X9qe ^!m ;d>G~M)|%6OGXKWl0?NgPkY$`+={^btN-jLE*}c+P-grQZR]=_A');
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
 * Increase memory limit.
 */
define('WP_MEMORY_LIMIT', '64M');
