<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'SMGHealth');

/** MySQL database username */
define('DB_USER', 'SMGHealth');

/** MySQL database password */
define('DB_PASSWORD', 'SMG$#$5');

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
define('AUTH_KEY',         's{f*3uX1 3.4i& }Z:s#A$-gk.b4[NTe0*qA^KES{H.s_[33iexxAIiby?0sXN`G');
define('SECURE_AUTH_KEY',  '0+vVqDopA|TN^&vukM4[q@J(53S(|naTBNT&j-Xi3Qw]:uD?|F2vljEw`R&]bki_');
define('LOGGED_IN_KEY',    'q1%v4mnCX&eYTJ=np;bbaF27$k/seI-kY>i;IqUD^h*n_-V>:IO1X[c1&usqi)D0');
define('NONCE_KEY',        '4ghX3%Uwm/1G*yZE7)$aVr%rzkM/ous^waEkaC:q173_Ik`zkIvX]q]SBntn#YCU');
define('AUTH_SALT',        'uH=EECFA(+[cg0oxkH$_Ko/<M;-6lk*KPg@0d(|LaYp/E;|;*n+Jh/E<J7p&Qv/t');
define('SECURE_AUTH_SALT', 'v5dbRXqD2+`7&q9-XhH+n!`Q&U{.,Ew+tx ^*B5.KX,y/+ < |I f`O&tO545oeG');
define('LOGGED_IN_SALT',   'tA& ~f<!q5p2w>N3=t-OsKm{{` >Kjxs5dW6D:di02gRh@xQQZJqF_a*-0Z3;+eZ');
define('NONCE_SALT',       'C@pm6:f!9A|]]?+g7^]+ MYg~0_+}z2v+pyn.$*~Oi!}aXp)n]_1D<wYxA1IO-M$');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'smg_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */
 /* display datetime */
define('DATETIME_DISPLAY_FORMAT', 'M j, Y  h:i a');

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
