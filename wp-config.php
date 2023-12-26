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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'flyus' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         'n}EC:iK~)G<nDjyH9A)v<)qq:L#}A:}@S_$9tI|:Fm#~=c_3Owm=cg)yolF<~EVe' );
define( 'SECURE_AUTH_KEY',  'WIP+PCC)**]O9y|?Vr?5BNr1_`@6a^!WI@4n**u.rGq|r^[$/1]yC dx:30yj6al' );
define( 'LOGGED_IN_KEY',    'L6mA (7SYnUu3!CzCL4E8A|46XU7W4uYDNmj8&~ztPsgu#c;2j[U`>C&H.q5TkG7' );
define( 'NONCE_KEY',        '2wJSQGFAZ[~p!R-5b&/o(f(C2lavatlx!Uppb$#@3$R?o{$hdqA@*P0nT/c9N4S5' );
define( 'AUTH_SALT',        'agCXm4PC`!+aN*{3-FbbrMh4Rq]=k=|7NUcod.Nm?kwP%QA%epW;p1X-y8I;9(&W' );
define( 'SECURE_AUTH_SALT', '+y=$^zRbP^e9u~i%Cz.=!(34((~A6oHxFBN*3l]R~U}nM9dZDV(wh$90yvdch>8B' );
define( 'LOGGED_IN_SALT',   '_i3;n [{5:AGdUAp]+*u476E{wZ|Fe{]OC`Jlzr?V.far2!//IpCN. VzTWQqh.#' );
define( 'NONCE_SALT',       'q/?2IxoM9j&7n[2$7R}YkWa#:<:(tuR8QdoV#LG,=IDFT<dD-VKLVT+d7HP3UZcK' );

/**#@-*/


/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'flyus_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
