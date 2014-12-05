<?php
/*
 * Aidecome open source plateforme developed for The nuit d'info
 * it helps you to create your own communication plateforme (web site)
 * 
 */

$name  = "Aidecome" ;
$description = "";
$keyword = "";
$title = "Aidecome";

/* other informations  */

$admin_connected = "";
$enable_captcha = "";

/* Anti bruteforce */

$anti_bruteforce = true ;

$login_captcha_code = "3"; // Apres combien de tentative de connexion le captcha va êtré affiché .

/* Other parametre */

$mobile_adaptation = true ;

$anti_url_change = true ;

$forget_password = false ;

$report_bug = false ;

$erreur_page_on = true ;

$alcasar_dialogs_enabled = false;

/*  Connection parametre */

$max_connected = "5000";

$max_admin_connected ="2";

/* Modules infos */

$enable_module_found = true ;
$enable_module_register = true;


/* Version infos */

$version_majeur = "1";
$version_mineur = "1";
$release = "2";

/* sql informations  */

$hostname_busapp = "Localhost";
$database_busapp = "aidecom";
$username_busapp = "root";
$password_busapp = "";
$db_prefix = "aidecom_";
$busapp = mysql_pconnect($hostname_busapp, $username_busapp, $password_busapp) or trigger_error(mysql_error(),E_USER_ERROR);
?>