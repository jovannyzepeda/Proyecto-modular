<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'bdlacalma');

/** MySQL database username */
define('DB_USER', 'mi_hospitalito');

/** MySQL database password */
define('DB_PASSWORD', '1*bda_laCalma');

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
define('AUTH_KEY',         '#1n31/+Ad^-W-MasYX|8_9w0aAqcRj{Syt{>-Wx[,-#`N4h|qpW83*A?aV]1-:JG');
define('SECURE_AUTH_KEY',  'ekW1j>vcVXL&Uzdnf+3ou|)$+wiv(VLKN!Oq3|]<bruaU5b^F8A,|kFI/~U&R:@!');
define('LOGGED_IN_KEY',    '~Q&VK+{JMN%Dzlfu(}Z?3W+/0_-VBcRe:8wkrLpu{Xsc0c+e} m*nM14*u?oRz:&');
define('NONCE_KEY',        '!I>4W7QJL-xbMQ8kWC$%1ToN+JLN*S}YqPtTU2=Ei(A)s.(e*~ 5$D~u|[aO?$4O');
define('AUTH_SALT',        '9S0$1=m%73Tf7>aKoW2@}w7>F&ni3B:t,kNx,3:!;.o)o]79379vX}+BmvUbe,z,');
define('SECURE_AUTH_SALT', 'p$+l8xrJN6F=Ofk=&M]}4CzDeX1X8(9Zy@Cqb8xW>P~#9wg/{GPGor+UnmF/[8|R');
define('LOGGED_IN_SALT',   '{,YsP:isAm^ ,6lM1/tjrB=?jh1zn:$iP.;||W]|o}P I&tZ~|(8ZvV+@Or(VBP:');
define('NONCE_SALT',       'H?+j+s4b&5:9>LoDGWC}pP?5x,*PCoM-l}Nq0^GrTzwP+cFR9$W]{jEyF+^-B lK');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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