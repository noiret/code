<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'wordpress');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'c>-b8nG+Kk0@+$[mZC1RB~]w+P7JWGIRK@{0 qs?YwPYB?>u8a+u--@Ur^:2jYxc');
define('SECURE_AUTH_KEY',  'Jg?-RcR8@&?lKoBtNvEAPIRz!Q+`AY&NUS:NgVJ`D7o0o[DoAJJ<P9W#%DW0Mwzw');
define('LOGGED_IN_KEY',    'k]kuQE^EXW|lz&|#(SYqYd:tawEwp.k)b+^M)(!AgWzcdiN(I-lG_ t3qjN0-kr[');
define('NONCE_KEY',        'c,(KHXm+EBmR|R/|.Js P=j?j]W-V{g<qe!W2^]L|)LI-+vA#{8!S+NkdfN@iM~7');
define('AUTH_SALT',        'g &W]d|*?-$b8YTi9u0O}V%wgWH6rEb?(vdK~|u+(%4H;3l9,r^4W^%P*:PdoG%g');
define('SECURE_AUTH_SALT', '4}1X]UWX|v5zU*.H=}X/^yG`+ZP4:4sSU;%tF0WUs`:ay$ZZVHI(iD)K!?PV9>4s');
define('LOGGED_IN_SALT',   'xoAfN~04 @GLQfaPPKj;JTV-B]V+<K/*zW/cf||kt$`{]q4C;#-C,eeqv9x`}bio');
define('NONCE_SALT',       'Z9( 7@I}%A](-:9b|2~[/::Yboxy3(<]*:B|,=~@-6,1]5~7=&Y~qO:k|kr~ZnS$');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';

/** 
 * Pour les développeurs : le mode deboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');