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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'smartc_wp87654321' );

/** MySQL database username */
define( 'DB_USER', 'smartc_wp87654321' );

/** MySQL database password */
define( 'DB_PASSWORD', 'smartc_wp87654321' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'SwdWB%h<7l1?smg=mI6WyW*HL;n/=])N2QEPc`d/m@u&A3qO,!q)j[|_(_gq +u5' );
define( 'SECURE_AUTH_KEY',  'Z7.n]:??v]E@,}0FE&l38sMm-g3f]}#PcML/)`MH4VqnFe/fcH]ex^_SbH/mJIOe' );
define( 'LOGGED_IN_KEY',    'S<N:Gv&UqzO=N@DxsE*P3v@?TA;;,0~l/wPM%hmud>0Wt+vE&>bjCJSkPMo;TR~J' );
define( 'NONCE_KEY',        'oc^F) }B]!<6}L+ S((S>I}sbJpc.QYEm{nR#[78bv3Sa~rwu$33t$2RTg:F|1pt' );
define( 'AUTH_SALT',        'Xu5?e1}6FkMSENIkEJ|M&&`<tidD%ZBS>6MGZi;k?|EkT_U_cMmkm[vw&x!5c-?%' );
define( 'SECURE_AUTH_SALT', '&DaK3{Pz.az;m3g*Jz.YB(.AX:RO S=wjZ`(*0K_%Ht&+xc)fX41 Me4Epi=hhZZ' );
define( 'LOGGED_IN_SALT',   '@4xo+s7aLg^mGDyQCSy_lE!3dHDfEJ+IqitOcK&r.Tz7GTZJ]JmOvCU@&X!`-USh' );
define( 'NONCE_SALT',       '%wd9ncsYD,!)T5*7,rhA6VMJ6ohVjs96zhlBj(;:9=2$@qYdG9(|E)!&.(s%)+/O' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wps_';

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
