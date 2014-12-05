<?php
/*
 * Aidecome open source plateforme developed for The nuit d'info
 * it helps you to create your own communication plateforme (web site)
 * 
 */
if (!function_exists("GetSQLValueString")) {
        function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
        {
            if (PHP_VERSION < 6) {
                $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
            }

            $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

            switch ($theType) {
                case "text":
                    $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                    break;    
                case "long":
                case "int":
                    $theValue = ($theValue != "") ? intval($theValue) : "NULL";
                    break;
                case "double":
                    $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
                    break;
                case "date":
                    $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                    break;
                case "defined":
                    $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
                    break;
            }
            return $theValue;
            }
    }
class module_found
{
    public function module_activated($module_f){
        include("config.aidecom.php");
            if($enable_module_found){
                if(isset($_GET['email'])){
                    $email_posted = $_GET['email'];
                    //$check = $module_f->account_email($module_f,$email_posted); /* searching if the email exist , return true  */
                }
            }
            else {
                echo "Email introuvable(module désactivé)";
            }
    }
    public function account_email($module_f,$email_posted){
        include("config.aidecom.php");
        $colname_alc_submenu = "-1";
        if (isset($_GET['email'])) {
            $colname_alc_submenu = $_GET['email'];
        }
        mysql_select_db($database_busapp, $busapp);
        $query_found = sprintf("SELECT * FROM accounts WHERE `mail` = %s", GetSQLValueString($colname_alc_submenu, "text"));
        $found = mysql_query($query_found, $busapp) or die(mysql_error());
        $row_found = mysql_fetch_assoc($found);
        if($row_found['mail'] != ""){
            return 1;
        }
        else {
            return 0;
        }
    }
    public function account_picture($module_f, $check){
        include("config.aidecom.php");
        $colname_alc_submenu = "-1";
        if (isset($_GET['email'])) {
            $colname_alc_submenu = $_GET['email'];
        }
        mysql_select_db($database_busapp, $busapp);
        $query_found = sprintf("SELECT * FROM accounts WHERE `mail` = %s", GetSQLValueString($colname_alc_submenu, "text"));
        $found = mysql_query($query_found, $busapp) or die(mysql_error());
        $row_found = mysql_fetch_assoc($found);
        if($check){
            /* get the picture */
            if($row_found['image'] == ""){
                echo "<p>Connection en tant que : </p>";
                echo '<a href="#"><img  height="60" width="60" src= "../home/images/avatar.jpg" /></a>';
            }
            else {
                echo "<p>Connection en tant que : </p>";
                echo '<a href="#"><img  height="60" width="60" src= "'. $row_found['image'] .'" /></a>';
            }
        }
        else {
            
        }
    }
    public function account_fullname($module_f, $check){
        include("config.aidecom.php");
        $colname_alc_submenu = "-1";
        if (isset($_GET['email'])) {
            $colname_alc_submenu = $_GET['email'];
        }
        mysql_select_db($database_busapp, $busapp);
        $query_found = sprintf("SELECT * FROM accounts WHERE `mail` = %s", GetSQLValueString($colname_alc_submenu, "text"));
        $found = mysql_query($query_found, $busapp) or die(mysql_error());
        $row_found = mysql_fetch_assoc($found);
        if($check){
            /* get the fullname */
            echo '<b>'. $row_found['full_name'] . '</b>';
        }
        else {
           
        }
    }
    
}
class module_reset_password
{
    public function do_reset(){
        
    }
    public function send_email(){
        
    }
}

?>