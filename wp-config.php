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
define('DB_NAME', 'ebullitionWp');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'facesimplon');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N'y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');
define('FS_METHOD', 'direct');
//modifs


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
define('AUTH_KEY',         '<>&xN72;aNE-JQ/nta_@kFZ>D?`v[Cf1vq!2+K;XtN]*_nTrm~C:*jvvX}RhV/J}');
define('SECURE_AUTH_KEY',  'y5pL+dN{>(FZ~5uH@c_MrI/1^lkKnqcOvvD+dxRp9ICfnhl+xtjx V<uIVut1+z?');
define('LOGGED_IN_KEY',    'z%:d(Mnk;GOuI_C505[vNqihpcekz]vIx8 ,dbxd^y^E>SJ)?AkVC|tUJ3ifUFg,');
define('NONCE_KEY',        '9YbV}x)!4p?qG!h;smD|5uV9#+x<ASN.WkBf}cV`-#6A OE6A)CKq)LGR-E>s>5M');
define('AUTH_SALT',        '6{K8x`Af%X5 Lbz&goiQD9Tu7,YZt$hJUhRcx&2F2VopwEV45m6yopkBdN%V98.v');
define('SECURE_AUTH_SALT', '%34}9lrJ.3p|ypk$/w;6PJF^m. :h1lo&SfNR],Ohg_^mB_0@Br<<VGf1ms0[GTG');
define('LOGGED_IN_SALT',   '6ZjB~I=*U$BNlDau^5R.N@, mlDHVFL@*0O_NWD++f@{Z##?K)=(*1]KRMq~A[#n');
define('NONCE_SALT',       'P267+Dj-QB9K,&$G)FHIb]K<(!^CHmYR;=?v!B07z*s>=3UV,//A.oHuKi+s0uGa');
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
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d'information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 * 
 * @link https://codex.wordpress.org/Debugging_in_WordPress 
 */
define('WP_DEBUG', false);

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
