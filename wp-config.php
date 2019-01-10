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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'nkz71M6aArVtBn0ph9FfHPOxJVvUaG9HtiV0zEwsJIymd3NBdrXI2bMWXajOb9LweOCXPdyWWlQVPvAB8t7x8A==');
define('SECURE_AUTH_KEY',  'sbyiIvr8SjFxz7yyMMtNzS6/02q1xNRMYVJZM4R1ZGmYmDcYkKuMNw22aPNLFX+1q/RW14VUBc7DuD9xiLZigw==');
define('LOGGED_IN_KEY',    'f0nFhsVP/BDjMoKfq7YKaLX11ZWiw8LvTuoydkSMG78v5K+n+WVn9E+uCdSMGBrXiQGbu9THHJnvrGwN51HNZg==');
define('NONCE_KEY',        'oPqIwcUHS6vexyZnIsVag/d8IJYbLe3/i6F5eDEMR6lcjxEUVOM4BpmeX4VCIRmBVYZmPX0dsgHPEVkvshBpQA==');
define('AUTH_SALT',        'ohBFsH8hccXf2Tp8BEDkLlpKJLcJHpLLbxl/kYisnMKC8Q4OVNH64IhgWWaDKzO/O8U8oM0f1CGPGY+t0gkKkA==');
define('SECURE_AUTH_SALT', 'eatpmwX/QgBK7Rww2yvfgHe+0/wonGMZVqy3TuWPjAn7vNugAy5Q5Qfi72Se7sjcxSyRn40cs3jj5bWbEGqMqQ==');
define('LOGGED_IN_SALT',   'A3AAhP2dHvvtBtpy9FVByjP/PZVN+zx2REg5pKnaOdE2xsi2UECa/uUWstiYd6J69Rfw17nKBcIfxXUKptmlOQ==');
define('NONCE_SALT',       'FFUhxA9jZNem9ykzMk16HcV5jhMfdWqpX3YQVQzd/mSOCauaHyxnB5H7p6rH+m4a8Bks1yDOjPu3xIiodOmCtA==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

define( 'WP_MEMORY_LIMIT', '512M' );

define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
