<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'noith' );

/** MySQL database password */
define( 'DB_PASSWORD', 'ceicotol' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '?M)(-aj]rDE4Ps|VM(&|@Q@*XG&LgJ^ywH&)^Ugc<KAuov2afd`mLa^]2Vs-A^_Q' );
define( 'SECURE_AUTH_KEY',  'j6~kcFfvgn/)Z&W_&eG;V)dLCi>*P*.<<+T~ihQ^CknO6az{n!&$QZ9,TRb0p}YS' );
define( 'LOGGED_IN_KEY',    'h[,BC)%b05k4!A6nH*<e9Q+EJW(R}.vr,W,$PS(H*t (_qi0Z),1{l8oB1`z]23X' );
define( 'NONCE_KEY',        'xr$6X;;u9PrgGw@Ij0k*pgH**v~YKfT$0_eX*`RhurU.aqV11<6r==NVE}vd+$zx' );
define( 'AUTH_SALT',        'F[:sR1TXTcI|/!(&db<S80G>@4S#imn0nG,s/6x!5?|]n&>9Y>+o21QKY?u#0hKz' );
define( 'SECURE_AUTH_SALT', 'vcyiV0K4*#[R:jrlz~V=uLwCju::4]m:p)Y]s~?2j/c#WbnNc1yc6uP_nLF3l|vP' );
define( 'LOGGED_IN_SALT',   'uN~pl{+Hs=/).1rGBmTH|~)!@mu}EsQs4<49Ce8x+K}|9#_o~ypu6r(jua.g)Tzf' );
define( 'NONCE_SALT',       '^[[J1Cv?6FMsi.}B_{JoM3Asc0WfK-yl]4.IpM+%a`,Xd,s83={YqEpJ1%nAUpk:' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
