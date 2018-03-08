<?php
define('DB_NAME', 'metroquip');
define('DB_USER', 'root');
define('DB_PASSWORD', 'giznad0');

define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

define('AUTH_KEY',         'lcg0vxd2BkQIMFvlsdXwqqbD7PWfkQnYbQ6Z0mRf');
define('SECURE_AUTH_KEY',  'hFq3tmVMG0fCPfZeDpCOFhsOPoFf0zfQ8RilawE8');
define('LOGGED_IN_KEY',    '9rQJnK7cz1cpvvsUOGY1fwGSmIKIyO5xxgqVxiXc');
define('NONCE_KEY',        'EAwW9yFmTigcZKKoXNlHqdO4QsRYI3BayU84yZQA');
define('AUTH_SALT',        '2brX8KBmmJXNh3iSjlmNjH3h5JeKcpXXPYuVxKBV');
define('SECURE_AUTH_SALT', 'oR400r0YCyEZxLbGTyackeDQDsCOO4bgTvML4DMB');
define('LOGGED_IN_SALT',   'aa6q5CBp0YNvYJTKcitXgwOjsewS1sTYi5OOgfHz');
define('NONCE_SALT',       'FMIkuCz0EmUO80MrZDtqq20x01Vc6HrN0ekXccUB');

$table_prefix  = 'wp_';

define('SP_REQUEST_URL', ($_SERVER['HTTPS'] ? 'https://' : 'http://') . $_SERVER['HTTP_HOST']);

define('WP_SITEURL', SP_REQUEST_URL);
define('WP_HOME', SP_REQUEST_URL);

/* Change WP_MEMORY_LIMIT to increase the memory limit for public pages. */
define('WP_MEMORY_LIMIT', '256M');

/* Uncomment and change WP_MAX_MEMORY_LIMIT to increase the memory limit for admin pages. */
//define('WP_MAX_MEMORY_LIMIT', '256M');

/* That's all, stop editing! Happy blogging. */

if ( !defined('ABSPATH') )
        define('ABSPATH', dirname(__FILE__) . '/');

require_once(ABSPATH . 'wp-settings.php');
