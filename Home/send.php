<?php
/*
 * Aidecome open source plateforme developed for The nuit d'info
 * it helps you to create your own communication plateforme (web site)
 * 
 * This file will insert elements for XHR
 */
require_once("../modules/config.aidecom.php");
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
if(isset($_POST['form_type'])){
	switch($_POST['form_type']){
	case "smail":
		$id = "sen-". rand(1,1337);
		$insertSQL = sprintf("INSERT INTO ". $db_prefix ."mails (id, subject, sender_id, orga_id, message, date, ip) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                GetSQLValueString($id, "text"),
                GetSQLValueString($_POST['subject'], "text"),
                GetSQLValueString($_POST['sender_id'], "text"),
                GetSQLValueString($_POST['orga_id'], "text"),
                GetSQLValueString($_POST['message'], "text"),
                GetSQLValueString(date("g"), "text"),
                GetSQLValueString('', "text"));
                mysql_select_db($database_busapp, $busapp);
                $Result1 = mysql_query($insertSQL, $busapp) or die(mysql_error());
		break;
	case "smsg":
		$id = "msg-". rand(1,1337);
		$insertSQL = sprintf("INSERT INTO ". $db_prefix ."chat (id, sender_id, message, date) VALUES (%s, %s, %s, %s)",
                GetSQLValueString($id, "text"),
                GetSQLValueString($_POST['sender_id'], "text"),
                GetSQLValueString($_POST['message'], "text"),
                GetSQLValueString(date("g"), "text"));
                mysql_select_db($database_busapp, $busapp);
                $Result1 = mysql_query($insertSQL, $busapp) or die(mysql_error());
		break;
	default:
		break;
	}

}

?>