<?php
/*
 * Aidecome open source plateforme developed for The nuit d'info
 * it helps you to create your own communication plateforme (web site)
 * 
 * This file allows to get informations about an element
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
if(isset($_GET['type'])){
	switch($_GET['type']){
		case "mailorga":
			/*  get the q element and drow result  */
			if(isset($_GET['q'])){

       		 	$colname_user_info = "-1";
        		if (isset($_SESSION['AIDECOM_USERNAME'])) {
            		$colname_user_info = $_SESSION['AIDECOM_USERNAME'];
	        	}
        		mysql_select_db($database_busapp, $busapp);
        		$query_user_info = sprintf("SELECT * FROM ". $db_prefix ."organismes WHERE id = %s", GetSQLValueString($_GET['q'], "text"));
        		$user_info = mysql_query($query_user_info, $busapp) or die(mysql_error());
        		$row_user_info = mysql_fetch_assoc($user_info);
       	 		$totalRows_user_info = mysql_num_rows($user_info);
       	 		echo $row_user_info['email'];
			}
			break;
		default:
			break;
	}

}

?>