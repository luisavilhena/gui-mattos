<?php
define('WP_AUTO_UPDATE_CORE', 'minor');// This setting is required to make sure that WordPress updates can be properly managed in WordPress Toolkit. Remove this line if this WordPress website is not managed by WordPress Toolkit anymore.
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
define( 'DB_NAME', 'cocrianc_wp290' );

/** MySQL database username */
define( 'DB_USER', 'cocrianc_wp290' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Cnd.4Sp6-2' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

@ini_set( 'upload_max_filesize' , '128M' );
@ini_set( 'post_max_size', '128M');
@ini_set( 'memory_limit', '256M' );
@ini_set( 'max_execution_time', '300' );
@ini_set( 'max_input_time', '300' );





/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'tofirjyidhtscfpdp3ul6lz660ydrcdjteqbuj6vbaxqbhzhusm1yevah9wlzvrq' );
define( 'SECURE_AUTH_KEY',  'r97iao2cccqkyjyy8bwthss1btmm3pnnmzmyrfsajynhmgqrix8hk9hjesbm9gze' );
define( 'LOGGED_IN_KEY',    'n1ie5lx6gq3iuyuk2xpgqjkrj4qdrpt3yr3tdp4c8sd98nxiqc4hffwvr2hsslhz' );
define( 'NONCE_KEY',        'lzoqc3p2p3qkdr19leph543foomvq9exiuvxefn6wq5dpqvstitwda1fmwac8q3z' );
define( 'AUTH_SALT',        'm2ss7ps6gzotpp2mwljm4mqlxvrw94bm48wclf48w4tss5breehza0ktx6ip1of1' );
define( 'SECURE_AUTH_SALT', 'ocobaq27fzxuacxuseyhjogdakojzv4w8ivtysekt1zwmh24n5tklzcymob5abbl' );
define( 'LOGGED_IN_SALT',   'fetw0paht9yz5yceksnorbgkuxrztrwojvov1rmkxewpmnhttpf4yzvnkg3esl9s' );
define( 'NONCE_SALT',       'gvwqkbiji8kbnenabt0w9qn0gun1bzj0tqdsanhw22s4kk7ixrzhbhc9hbk6cddr' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpmw_';

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
