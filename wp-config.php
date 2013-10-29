<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */
define('FS_METHOD','direct');
// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'wordpress');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'root');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '1k%]lS?j<ir:,E QzV;nzip@<oZ[[<2 -!2Itd0qQ]aXP.P^gNE3608$%X<Z,[)I');
define('SECURE_AUTH_KEY',  '?&6cMrpeb>!f0h]</mhH&1e;<AJ^#CQO>9Yh1W{O( !Syi*&v@x<zn=BZP#Lw-[U');
define('LOGGED_IN_KEY',    'MI./B5aQ+,Z2UT?,N]RW1]wqM#--/E50xV<pOs.OdpB*;LQ;#-jGtWDnmX#a#|*Y');
define('NONCE_KEY',        '!^*&d_Hu*X>cDwEd=y09Zp!L3gOFt+/@m4:kpaZAM.a<@f4qU[&uW_XT$;G*=$PH');
define('AUTH_SALT',        'S?DJ;tjzD5% /,0(45t2^8A): `}t;kVW#n P_w-rW<N7F<LaqUWru#C,}&C*>X(');
define('SECURE_AUTH_SALT', 'Yll5|%Oy-,UaRX3=t=f)rj}`,Cgf9h,(s}8U]2x?uOy:3AYYWR=jmra9+x{Vt>X|');
define('LOGGED_IN_SALT',   'hX3@@~`j|3F;N@ %Ce=46Oyl_^#|uNAm~2u/~N9ch Y}vOdav{9&}n&H@`BZr(8!');
define('NONCE_SALT',       'K]oL/wMz%w1.ik7;_Tif-g[CuZNuX~Y3?_:5M{#Jw&O]?Y2PYVz[r[5Ukn]L;}LQ');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';

/**
 * Idioma de WordPress.
 *
 * Cambia lo siguiente para tener WordPress en tu idioma. El correspondiente archivo MO
 * del lenguaje elegido debe encontrarse en wp-content/languages.
 * Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como 'ca_ES'
 * para traducir WordPress al catalán.
 */
define('WPLANG', 'es_ES');

/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

