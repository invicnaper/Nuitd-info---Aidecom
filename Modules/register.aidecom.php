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
class register
{
    public function module_activated(){
        /* check if the register module is enabled */
        include("config.aidecom.php");
        if($enable_module_register){
            
        }
        else {
            die("You don't have the right to view this page , module_register enabled = false ");
        }
        
    }
    public function do_register($nb_errors){
        /* do the register */
        include("config.aidecom.php");
        $client_id = "1001" . rand(1,1000);
        $garde = 0;
        if($nb_errors == 0 ){
            if (isset($_POST['email']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['pass'])){
                if($_POST['email'] && $_POST['fname'] && $_POST['lname'] && $_POST['pass']){
                    $editFormAction = $_SERVER['PHP_SELF'];
                    if (isset($_SERVER['QUERY_STRING'])) {
                        $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
                    }
                    if(isset($_POST['grade'])){
                        $grade = $_POST['grade'];
                    }else{
                        $grade = 0;
                    }
                    if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "page_form")) { // if we send the post data for page_form
                        $insertSQL = sprintf("INSERT INTO accounts (`id`, mail, passe, about, full_name, date, grade, first_name,last_name, username) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                        GetSQLValueString($client_id, "text"), 
                        GetSQLValueString($_POST['email'], "text"),
                        GetSQLValueString($this->encrypt_password($_POST['pass']), "text"),/* encrypt the password :D */
                        GetSQLValueString("", "text"),
                        GetSQLValueString($_POST['fname']. " " . $_POST['lname'], "text"),
                        GetSQLValueString(date("d/m/y"), "text"),
                        GetSQLValueString($grade,"text"),
                        GetSQLValueString($_POST['fname'], "text"),
                        GetSQLValueString($_POST['lname'], "text"),
                        GetSQLValueString("", "text"));

                        mysql_select_db($database_busapp, $busapp);
                        $Result1 = mysql_query($insertSQL, $busapp) or die(mysql_error());

                        $insertGoTo = "?act=addacc&action=done&h=".md5(rand(0,1337));
                        if (isset($_SERVER['QUERY_STRING'])) {
                            $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
                        }
                        header(sprintf("Location: %s", $insertGoTo));
                    }
                }
            }
        }
    }
    public function empty_email($module_r, $nb_errors){
         if(isset($_POST['email'])){ 
            if($_POST['email'] == ""){
                $nb_errors ++;
                return 2; /* means that email is empty */
            }
            else {
                return 3;
            }
        }
    }
    public function empty_fname($nb_errors){
        if(isset($_POST['fname'])){ 
            if($_POST['fname'] == ""){
                $nb_errors ++;
                return 2; /* means that fist name is empty */
            }
            else {
                return 3;
            }
        }
    }
    public function empty_lname($nb_errors){
        if(isset($_POST['lname'])){ 
            if($_POST['lname'] == ""){
                $nb_errors ++;
                return 2; /* means that last name is empty */
            }
            else {
                return 3;
            }
        }
    }
    public function empty_pass($nb_errors){
        if(isset($_POST['pass'])){ 
            if($_POST['pass'] == ""){
                $nb_errors ++;
                return 2; /* means that passeword is empty */
            }
            else {
                return 3;
            }
        }
    }
    public function check_email($nb_errors){
        /* checking if email existe */
        include("config.aidecom.php");
        $colname_alc_submenu = "-1";
        if (isset($_POST['email'])) {
            $colname_alc_submenu = $_POST['email'];
        }
        mysql_select_db($database_busapp, $busapp);
        $query_check_email = sprintf("SELECT * FROM accounts WHERE `mail` = %s", GetSQLValueString($colname_alc_submenu, "text"));
        $check_email = mysql_query($query_check_email, $busapp) or die(mysql_error());
        $row_check_email = mysql_fetch_assoc($check_email);
        if($row_check_email['mail'] != ""){
            $nb_errors ++;
            return 1;
        }
        else {
            $this->do_register($nb_errors);
            return 5;
        }
    }
    public function encrypt_password($pass){
      /*
        using SHA512
        we return the crypted password 
      */
      
     if (CRYPT_SHA512 != 1) {
        throw new Exception('[AIDECOM]: can not encrypt the data.');
     }
     return hash('sha512', $pass);
   }
   public function check_encrypted_pass($pass,$encryptedp){
    if (CRYPT_SHA512 != 1) {
      throw new Exception('[AIDECOM]: can not encrypt the data.');
    }
    return (hash('sha512', $pass) == $encryptedp) ? true : false;
    }
   public function send_email(){
       /* sending validation email */
       
   }
}
?>
