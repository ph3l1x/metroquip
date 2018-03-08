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
define( 'DB_NAME', 'metroquip' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'giznad0' );

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
define('AUTH_KEY',         '2Cab93Ov4+YQ37jVEQSGDekmnHS1OM5gjBhQ7c0MnpVGkVg9RGJ5OnFfMJMV9BE3jUdLdzMqhmNaYEx8vCAPdw==');
define('SECURE_AUTH_KEY',  'YHJUpN6sN/YmLjWQXrFQv5BJba3bGANIEzEyg6LcCdXFgCKjU6N0rThXT2kkMPo4v44mujB1WYaEgesK7vtjTQ==');
define('LOGGED_IN_KEY',    'sgoxKgSDql0KsKr1jJGUegKGnGJCY/PPC7i9Cr3pcZX4lk3zq1iI/V8PDyHYThmsFQnJpAVfIwePGSKaInsrXw==');
define('NONCE_KEY',        'kaSLS4U/auU6ITCjscwKx12qIIrFN1FNLHa7UbcIN5dgT5su3fkR67pu5WV07GCwGb+CS8EvVVfzRLge725uLg==');
define('AUTH_SALT',        'Zvt2TaxW/ar4Vp5VQfqhX70NxovvmJMhm3P1fJ7rejaFR0a8iaGWHxRb6HfQngFg0caWUBwaRmXRR8JXY5eKIw==');
define('SECURE_AUTH_SALT', 'z6S2zAGuC1piToZnSgkop/JDVRtRFjJkmJy4H0dgrxPUplSSt3cXH3f1OhJ7n3yzS5xMwx1MCCI7FNvKUKLABw==');
define('LOGGED_IN_SALT',   'yfVyNctTKATC7gooh4I/PtKU4CGHurgjO7M0KmQ3tJYSBaKOFJ7+XpO3qvrQdq88kEwrfHwZ7RnTNeQDEUxarA==');
define('NONCE_SALT',       'BxsxGSbJZY4hztPX4q3t5CNOb5rku6W7NtbSfj+EvwGZSZ0ShEXs+Bl7Z1UMlSwPHDT7+gMchNmiwDawkL24XA==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';





/* Inserted by Local by Flywheel. See: http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy */
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
