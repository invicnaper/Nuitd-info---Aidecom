<?php
/*
 * Aidecome open source plateforme developed for The nuit d'info
 * it helps you to create your own communication plateforme (web site)
 * 
 */

class login
{
    public function check1 ($get_password,$posted_mdp){
	 if (CRYPT_SHA512 != 1) {
            throw new Exception('[Aidecom]: can not encrypt the data.');
        }
        return hash('sha512', $posted_mdp);
    }
    public function check2 ($get_password,$posted_mdp){
	 if (CRYPT_SHA512 != 1) {
            throw new Exception('[Aidecom]: can not encrypt the data.');
        }
        return hash('sha512', $posted_mdp);
    }
    public function dologin($get_password){
        /* decrypting the password using sha512 */
        $login = $_POST['email_con'];
        $password = $_POST['password'];
        $posted_mdp = $password;
        $mdp = $get_password->check1($get_password,$posted_mdp); //fist check
	$mdp = $get_password->check2($get_password,$posted_mdp); //second check
        
        return $mdp;
    }
    public function redirect_ok(){
        $home_page = "../Home/home.php";
        return $home_page;
    }
    public function redirect_error(){
        $error_page = "../Home/?action=error&email=".$_POST['email'];
        return $error_page;
    }
}
if (isset($_POST['email_con'])) {
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
    // *** Validate request to login to this site.
    if (!isset($_SESSION)) {
        session_start();
    }

    $loginFormAction = $_SERVER['PHP_SELF'];
    if (isset($_GET['accesscheck'])) {
    $_SESSION['PrevUrl'] = $_GET['accesscheck'];
    }
    $get_password = new login;
    $loginUsername=$_POST['email_con'];
    $password=$get_password->dologin($get_password);
    $MM_fldUserAuthorization = "";
    $MM_redirectLoginSuccess = $get_password->redirect_ok();
    $MM_redirectLoginFailed = $get_password->redirect_error();
    $MM_redirecttoReferrer = false;
    mysql_select_db($database_busapp, $busapp);
  
    $LoginRS__query=sprintf("SELECT mail, passe FROM accounts WHERE mail=%s AND passe=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
    $LoginRS = mysql_query($LoginRS__query, $busapp) or die(mysql_error());
    $loginFoundUser = mysql_num_rows($LoginRS);
    if ($loginFoundUser) {
        $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
        //declare two session variables and assign them
        $_SESSION['AIDECOM_USERNAME'] = $loginUsername;
        $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

        if (isset($_SESSION['PrevUrl']) && false) {
            $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
        }
            header("Location: " . $MM_redirectLoginSuccess );
        }
        else {
            header("Location: ". $MM_redirectLoginFailed );
        }
}
else{
    //header("Location: ../home/login.php?action=email");
}

?>