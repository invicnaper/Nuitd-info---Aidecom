<?php
/*
 * Aidecome open source plateforme developed for The nuit d'info
 * it helps you to create your own communication plateforme (web site)
 * 
 */
if (!isset($_SESSION)) {
  session_start();
}
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
function partof_str($str){
    /*  this function allows us to show a part of a string   */
    $ext = substr($str,-4,4); /* return the last of the str ex: the extension  */
    $fir = substr($str,0,13); /*  first of str  */
    $all = $fir . '....'. $ext ;
    $all = str_replace('%20', ' ', $all);
    $str = str_replace('%20', ' ', $str);
    if (strlen($str) > 19){
        return $all;
    }else {
        return $str;
    }
}
class session
{
    public function is_connected(){
        include("config.aidecom.php");
        $colname_user_info = "-1";
        if (isset($_SESSION['AIDECOM_USERNAME'])) {
             $colname_user_info = $_SESSION['AIDECOM_USERNAME'];
        }
        mysql_select_db($database_busapp, $busapp);
        $query_user_info = sprintf("SELECT * FROM accounts WHERE mail = %s", GetSQLValueString($colname_user_info, "text"));
        $user_info = mysql_query($query_user_info, $busapp) or die(mysql_error());
        $row_user_info = mysql_fetch_assoc($user_info);
        $totalRows_user_info = mysql_num_rows($user_info);
        if(isset($_SESSION['AIDECOM_USERNAME'])){

        }
        else {
            header('Location: index.php');
        }

    }
    public function redirect_to_home(){
        if(isset($_SESSION['AIDECOM_USERNAME'])){
            header('Location: home.php');
        }else {
            
        }
    }
    public function redirect_session(){
         if(isset($_SESSION['AIDECOM_USERNAME'])){
            
        }else {
            header('Location: index.php');
        }
    }
    public function get_name(){
        /* return full name */
        include("config.aidecom.php");
        $colname_user_info = "-1";
        if (isset($_SESSION['AIDECOM_USERNAME'])) {
             $colname_user_info = $_SESSION['AIDECOM_USERNAME'];
        }
        mysql_select_db($database_busapp, $busapp);
        $query_user_info = sprintf("SELECT * FROM accounts WHERE mail = %s", GetSQLValueString($colname_user_info, "text"));
        $user_info = mysql_query($query_user_info, $busapp) or die(mysql_error());
        $row_user_info = mysql_fetch_assoc($user_info);
        $totalRows_user_info = mysql_num_rows($user_info);
        
        return $row_user_info['full_name'] ;
    }
    public function log_out(){
        //initialize the session
        if (!isset($_SESSION)) {
            session_start();
        }

        // ** Logout the current user. **
        $logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
        if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
            $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
        }

        if ((isset($_GET['doLogout'])) &&($_GET['doLogout']== "true")){
        //to fully log out a visitor we need to clear the session varialbles
        $_SESSION['AIDECOM_USERNAME'] = NULL;
        $_SESSION['MM_UserGroup'] = NULL;
        $_SESSION['PrevUrl'] = NULL;
        unset($_SESSION['AIDECOM_USERNAME']);
        unset($_SESSION['MM_UserGroup']);
        unset($_SESSION['PrevUrl']);
	
        $logoutGoTo = "index.php";
        if ($logoutGoTo) {
            header("Location: $logoutGoTo");
            exit;
        }
        }
    }
}
class informations
{
    public function email(){
        
    }
    public function full_name(){
        
    }
    public function last_name(){
        
    }
    public function get_element($element){
        include("config.aidecom.php");
        $colname_user_info = "-1";
        if (isset($_SESSION['AIDECOM_USERNAME'])) {
             $colname_user_info = $_SESSION['AIDECOM_USERNAME'];
        }
        mysql_select_db($database_busapp, $busapp);
        $query_user_info = sprintf("SELECT * FROM accounts WHERE mail = %s", GetSQLValueString($colname_user_info, "text"));
        $user_info = mysql_query($query_user_info, $busapp) or die(mysql_error());
        $row_user_info = mysql_fetch_assoc($user_info);
        $totalRows_user_info = mysql_num_rows($user_info);
        
        return $row_user_info[$element] ;
    }
    public function first_name(){
        include("config.aidecom.php");
        $colname_user_info = "-1";
        if (isset($_SESSION['AIDECOM_USERNAME'])) {
             $colname_user_info = $_SESSION['BUSAPP_USERNAME'];
        }
        mysql_select_db($database_busapp, $busapp);
        $query_user_info = sprintf("SELECT * FROM accounts WHERE mail = %s", GetSQLValueString($colname_user_info, "text"));
        $user_info = mysql_query($query_user_info, $busapp) or die(mysql_error());
        $row_user_info = mysql_fetch_assoc($user_info);
        $totalRows_user_info = mysql_num_rows($user_info);
        
        return $row_user_info['first_name'] ;
    }
    public function username(){
        include("config.busapp.php");
        $colname_user_info = "-1";
        if (isset($_SESSION['BUSAPP_USERNAME'])) {
             $colname_user_info = $_SESSION['BUSAPP_USERNAME'];
        }
        mysql_select_db($database_busapp, $busapp);
        $query_user_info = sprintf("SELECT * FROM accounts WHERE mail = %s", GetSQLValueString($colname_user_info, "text"));
        $user_info = mysql_query($query_user_info, $busapp) or die(mysql_error());
        $row_user_info = mysql_fetch_assoc($user_info);
        $totalRows_user_info = mysql_num_rows($user_info);
        
        return $row_user_info['username'] ;
    }
    public function is_admin(){
        
    }
    public function picture(){
        include("config.aidcom.php");
        $colname_user_info = "-1";
        if (isset($_SESSION['AIDCOM_USERNAME'])) {
             $colname_user_info = $_SESSION['AIDCOM_USERNAME'];
        }
        mysql_select_db($database_busapp, $busapp);
        $query_user_info = sprintf("SELECT * FROM accounts WHERE mail = %s", GetSQLValueString($colname_user_info, "text"));
        $user_info = mysql_query($query_user_info, $busapp) or die(mysql_error());
        $row_user_info = mysql_fetch_assoc($user_info);
        $totalRows_user_info = mysql_num_rows($user_info);
        if($row_user_info['image'] == ""){
            return "imag/avatar05.png";
        }else {
            return $row_user_info['image'] ;
        }
    }
    public function get_acces(){
        /*
         * For admin acces , and roles  . 5 = admin ... 0 = membre
         */
        include("config.busapp.php");
        $colname_user_info = "-1";
        if (isset($_SESSION['BUSAPP_USERNAME'])) {
             $colname_user_info = $_SESSION['BUSAPP_USERNAME'];
        }
        mysql_select_db($database_busapp, $busapp);
        $query_user_info = sprintf("SELECT * FROM accounts WHERE mail = %s", GetSQLValueString($colname_user_info, "text"));
        $user_info = mysql_query($query_user_info, $busapp) or die(mysql_error());
        $row_user_info = mysql_fetch_assoc($user_info);
        $totalRows_user_info = mysql_num_rows($user_info);
        
        return $row_user_info['grade'];
        
    }
    public function return_id($get_info){
        include("config.aidecom.php");
        $colname_user_info = "-1";
        if (isset($_SESSION['AIDECOM_USERNAME'])) {
             $colname_user_info = $_SESSION['AIDECOM_USERNAME'];
        }
        mysql_select_db($database_busapp, $busapp);
        $query_user_info = sprintf("SELECT * FROM accounts WHERE mail = %s", GetSQLValueString($colname_user_info, "text"));
        $user_info = mysql_query($query_user_info, $busapp) or die(mysql_error());
        $row_user_info = mysql_fetch_assoc($user_info);
        $totalRows_user_info = mysql_num_rows($user_info);
        return $row_user_info['id'];
    }
    public function check_profil($get_info){
        /*
         * Check if it's the user's profil user session profil :D
         */
        $my_id = $get_info->return_id($get_info);
        include("config.busapp.php");
        $colname_user_info = "-1";
        if (isset($_GET['id'])) {
             $colname_user_info = $_GET['id'];
        }
        mysql_select_db($database_busapp, $busapp);
        $query_user_info = sprintf("SELECT * FROM accounts WHERE id = %s", GetSQLValueString($colname_user_info, "text"));
        $user_info = mysql_query($query_user_info, $busapp) or die(mysql_error());
        $row_user_info = mysql_fetch_assoc($user_info);
        $totalRows_user_info = mysql_num_rows($user_info);
        if ($row_user_info['id'] == $my_id){
            return 1;
        }else {
            return -1;
        }
      
    }
}
class view 
{
    public function get_email(){
        
    }
    public function get_picture($view_info){
         include("config.busapp.php");
        $colname_user_info = "-1";
        if (isset($_GET['id'])) {
             $colname_user_info = $_GET['id'];
        }
        mysql_select_db($database_busapp, $busapp);
        $query_user_info = sprintf("SELECT * FROM accounts WHERE id = %s", GetSQLValueString($colname_user_info, "text"));
        $user_info = mysql_query($query_user_info, $busapp) or die(mysql_error());
        $row_user_info = mysql_fetch_assoc($user_info);
        $totalRows_user_info = mysql_num_rows($user_info);
        if($row_user_info['image'] == ""){
            return "images/avatar.jpg";
        }else {
            return $row_user_info['image'] ;
        }
    }
    public function get_full_name(){
        include("config.busapp.php");
        $colname_user_info = "-1";
        if (isset($_GET['id'])) {
             $colname_user_info = $_GET['id'];
        }
        mysql_select_db($database_busapp, $busapp);
        $query_user_info = sprintf("SELECT * FROM accounts WHERE id = %s", GetSQLValueString($colname_user_info, "text"));
        $user_info = mysql_query($query_user_info, $busapp) or die(mysql_error());
        $row_user_info = mysql_fetch_assoc($user_info);
        $totalRows_user_info = mysql_num_rows($user_info);
        
         return $row_user_info['full_name'] ;
    }
    public function get_first_name($view_info){
        include("config.busapp.php");
        $colname_user_info = "-1";
        if (isset($_GET['id'])) {
             $colname_user_info = $_GET['id'];
        }
        mysql_select_db($database_busapp, $busapp);
        $query_user_info = sprintf("SELECT * FROM accounts WHERE id = %s", GetSQLValueString($colname_user_info, "text"));
        $user_info = mysql_query($query_user_info, $busapp) or die(mysql_error());
        $row_user_info = mysql_fetch_assoc($user_info);
        $totalRows_user_info = mysql_num_rows($user_info);
        
         return $row_user_info['first_name'] ;
    }
    public function get_last_name(){
        
    }
    public function get_username(){
        include("config.busapp.php");
        $colname_user_info = "-1";
        if (isset($_GET['id'])) {
             $colname_user_info = $_GET['id'];
        }
        mysql_select_db($database_busapp, $busapp);
        $query_user_info = sprintf("SELECT * FROM accounts WHERE id = %s", GetSQLValueString($colname_user_info, "text"));
        $user_info = mysql_query($query_user_info, $busapp) or die(mysql_error());
        $row_user_info = mysql_fetch_assoc($user_info);
        $totalRows_user_info = mysql_num_rows($user_info);
        
        return $row_user_info['username'] ;
    }
    public function check_if_exist(){
        include("config.busapp.php");
        $colname_user_info = "-1";
        if (isset($_GET['id'])) {
             $colname_user_info = $_GET['id'];
        }
        mysql_select_db($database_busapp, $busapp);
        $query_user_info = sprintf("SELECT * FROM accounts WHERE id = %s", GetSQLValueString($colname_user_info, "text"));
        $user_info = mysql_query($query_user_info, $busapp) or die(mysql_error());
        $row_user_info = mysql_fetch_assoc($user_info);
        $totalRows_user_info = mysql_num_rows($user_info);
        
        if ($row_user_info['full_name'] == ""){
            return 2;
        }else{
            return 3;
        }
    }
    public function draw_modal(){
        /*
         * Drawing options modal for viewer (send message , or send a call request)
         */
        $view_info = new view;
        echo '<div class="modal fade" id="options" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
        echo '<div class="modal-dialog">';
        echo '<div class="modal-content">';
        echo '<div class="modal-header">';
        echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
        echo '<h4 class="modal-title" id="myModalLabel">Options</b></h4>';
        echo '</div>';
        echo '<div class="modal-body">';
        echo '<p><div align="center"><button type="button" class="btn btn-warning" onclick="show_message_area(this)">Envoyer un message</button>&nbsp;&nbsp;<button type="button" class="btn btn-info">Appeler</button></div></p>';
        echo '<p><div id="smsg" style="visibility: hidden"><p><img src="'. $view_info->get_picture($view_info) .'" height="60" width="80" />&nbsp;<b>'. $view_info->get_first_name($view_info) .'</b> - <a href="message.php?id='. $_GET['id'] .'">Voir la conversation</a></p><p><textarea class="form-control" rows="3" onblur="active_sendbtn(this)"></textarea></p>'
                . '<p><a href="#" title="Ajouter une image"><img src="images/camera_blue.png" height="20" width="20" /></a>&nbsp;<a href="#" title="Ajouter un fichier"><img src="images/attachment_blue.png" height="20" width="20" /></a></p>'
                . '<p><input type="submit" id="sendbtn" name="submit" id="submit" class="btn btn-success disabled" value="Envoyer" /></p>'
                . '</div>';
        echo '</div>';
        echo '<div class="modal-footer">';
        echo '<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>';
        echo '</div>';
        echo '</div>';
        echo '<!-- /.modal-content -->';
        echo '</div>';
        echo '<!-- /.modal-dialog -->';
        echo '</div>';
    }
    
}
class message
{
    public function get_dest_full_name(){
        include("config.busapp.php");
        $colname_user_info = "-1";
        if (isset($_GET['uid'])) {
            $colname_user_info = $_GET['uid'];
        }
        mysql_select_db($database_busapp, $busapp);
        $query_user_info = sprintf("SELECT * FROM accounts WHERE id = %s", GetSQLValueString($colname_user_info, "text"));
        $user_info = mysql_query($query_user_info, $busapp) or die(mysql_error());
        $row_user_info = mysql_fetch_assoc($user_info);
        $totalRows_user_info = mysql_num_rows($user_info);
        return $row_user_info['full_name'];
    }
    public function get_dest_image(){
        include("config.busapp.php");
        $colname_user_info = "-1";
        if (isset($_GET['uid'])) {
            $colname_user_info = $_GET['uid'];
        }
        mysql_select_db($database_busapp, $busapp);
        $query_user_info = sprintf("SELECT * FROM accounts WHERE id = %s", GetSQLValueString($colname_user_info, "text"));
        $user_info = mysql_query($query_user_info, $busapp) or die(mysql_error());
        $row_user_info = mysql_fetch_assoc($user_info);
        $totalRows_user_info = mysql_num_rows($user_info);
        return $row_user_info['image'];
    }
    public function get_dest_first_name(){
        include("config.busapp.php");
        $colname_user_info = "-1";
        if (isset($_GET['uid'])) {
            $colname_user_info = $_GET['uid'];
        }
        mysql_select_db($database_busapp, $busapp);
        $query_user_info = sprintf("SELECT * FROM accounts WHERE id = %s", GetSQLValueString($colname_user_info, "text"));
        $user_info = mysql_query($query_user_info, $busapp) or die(mysql_error());
        $row_user_info = mysql_fetch_assoc($user_info);
        $totalRows_user_info = mysql_num_rows($user_info);
        return $row_user_info['first_name'];
    }
    public function return_dest_id(){
        include("config.busapp.php");
        $colname_user_info = "-1";
        if (isset($_GET['uid'])) {
            $colname_user_info = $_GET['uid'];
        }
        mysql_select_db($database_busapp, $busapp);
        $query_user_info = sprintf("SELECT * FROM accounts WHERE id = %s", GetSQLValueString($colname_user_info, "text"));
        $user_info = mysql_query($query_user_info, $busapp) or die(mysql_error());
        $row_user_info = mysql_fetch_assoc($user_info);
        $totalRows_user_info = mysql_num_rows($user_info);
        return $row_user_info['id'];
    }
    public function check_if_exist(){
        include("config.busapp.php");
        $colname_user_info = "-1";
        if (isset($_GET['uid'])) {
            $colname_user_info = $_GET['uid'];
        }
        mysql_select_db($database_busapp, $busapp);
        $query_user_info = sprintf("SELECT * FROM accounts WHERE id = %s", GetSQLValueString($colname_user_info, "text"));
        $user_info = mysql_query($query_user_info, $busapp) or die(mysql_error());
        $row_user_info = mysql_fetch_assoc($user_info);
        $totalRows_user_info = mysql_num_rows($user_info);

        if ($row_user_info['full_name'] == ""){
            return 2;
        }else{
            return 3;
        }
    }

    public function creat_convo(){
        /*  check if convo already exist or not , then create a new one  */
        include("config.busapp.php");
        $id_convo = "conv-" . rand(1, 1337);
        $new_getinfo = new informations;
        $maxRows_nsoc = 2000;
        $pageNum_nsoc = 0;
        $statut = 0;
        $colname_info = "-1";
        if (isset($_GET['cid'])) {
            $colname_info = $_GET['cid'];
        }
        $startRow_nsoc = $pageNum_nsoc * $maxRows_nsoc;
        mysql_select_db($database_busapp, $busapp);
        $query_nsoc = sprintf("SELECT * FROM ". $db_prefix ."conv");
        $query_limit_nsoc = sprintf("%s LIMIT %d, %d", $query_nsoc, $startRow_nsoc, $maxRows_nsoc);
        $nsoc = mysql_query($query_limit_nsoc, $busapp) or die(mysql_error());
        $row_nsoc = mysql_fetch_assoc($nsoc);
        $id_conv = 0;
        do{
            if( ($row_nsoc['id_user2'] == $_GET['uid'] && $row_nsoc['id_user1'] == $new_getinfo->return_id($new_getinfo)) || ($row_nsoc['id_user1'] == $_GET['uid'] && $row_nsoc['id_user2'] == $new_getinfo->return_id($new_getinfo))){
                $statut = 1;
                $id_conv = $row_nsoc['conv_id'];
                break;
            }else {
                $statut = 0;
            }
        }while($row_nsoc = mysql_fetch_assoc($nsoc));
        if(!$statut){
            /*  create a new conv  */
            $insertSQL = sprintf("INSERT INTO ". $db_prefix ."conv (id_user1, id_user2, conv_id, date_created) VALUES (%s, %s, %s, %s)",
                GetSQLValueString($_GET['uid'], "text"),
                GetSQLValueString($new_getinfo->return_id($new_getinfo), "text"),
                GetSQLValueString($id_convo, "text"),
                GetSQLValueString("", "text"));
            mysql_select_db($database_busapp, $busapp);
            $Result1 = mysql_query($insertSQL, $busapp) or die(mysql_error());
            header('Location: message.php?id='. $id_convo .'&uid='. $_GET['uid']);
        }
        if($statut == 1){
            header('Location: message.php?id='. $id_conv .'&uid='. $_GET['uid']);
        }
    }
    public function draw_advanced_str($message){
        /*  function that allows as to draw smiley  */
        $new_str = $message ;
        if(strstr($message, ':)')){
            $new_str = str_replace(':)', '<img src="images/smiley/smile.png" />', $new_str);
        }
        if(strstr($message, ':(')){
            $new_str = str_replace(':(', '<img src="images/smiley/sad.png" />', $new_str);
        }
        if(strstr($message, ':p')){
            $new_str = str_replace(':p', '<img src="images/smiley/tongue.png" />', $new_str);
        }
        if(strstr($message, ':o')){
            $new_str = str_replace(':o', '<img src="images/smiley/shock.png" />', $new_str);
        }
        if(strstr($message, ';)')){
            $new_str = str_replace(';)', '<img src="images/smiley/wink.png" />', $new_str);
        }
        if(strstr($message, ':D')){
            $new_str = str_replace(':D', '<img src="images/smiley/laugh.png" />', $new_str);
        }
        if(strstr($message, 'computer')){
            $new_str = str_replace('computer', '<img src="images/smiley/computer.png" />', $new_str);
        }
        if(strstr($message, 'http://')){
            $new_str = str_replace('computer', '<img src="images/smiley/computer.png" />', $new_str);
        }


        return $new_str;
    }
    public function draw_time_message($min, $hour){
        /*  we will calculate the time and return it   */
        $now_hour = date("g");
        $now_minutes = intval(date("i"));
        $hour = $hour;
        if(intval($hour) > intval($now_hour)){
            return "at ". $hour . ":". $min ." H";
        }
        if($hour == $now_hour){
            if($now_minutes == $min){
                return "moins 1 min";
            }
            if ($now_minutes > $min){
                return "" . $now_minutes - $min ." min(s) ago";
            }
        }
        if($now_hour > $hour){
            if($now_hour - $hour <= 1){
                $min_1 = 60 - $min;
                $min_2 = $now_minutes + $min_1;
                return "" . $min_2 ." min(s) ago";
            }
            if($now_hour - $hour >=1){
                $t_hour = $now_hour - $hour;
                return "". $t_hour . " hour ago";
            }
            return "at ". $hour . ":". $min ." H";
        }
        return "at ". $hour . ":". $min ." H";
    }
    public function draw_message(){
        /*  function that allows as to draw messages  */
        include("config.busapp.php");
        $maxRows_nsoc = 10;
        $pageNum_nsoc = 0;
        $colname_info = "-1";
        if (isset($_GET['pageNum_gsoc'])) {
            $pageNum_nsoc = $_GET['pageNum_gsoc'];
        }
        if (isset($_GET['cid'])) {
            $colname_info = $_GET['cid'];
        }
        $startRow_nsoc = $pageNum_nsoc * $maxRows_nsoc;
        mysql_select_db($database_busapp, $busapp);
        $query_nsoc = sprintf("SELECT * FROM ". $db_prefix ."messages WHERE convo_id = %s", GetSQLValueString($colname_info, "text"));
        $query_limit_nsoc = sprintf("%s LIMIT %d, %d", $query_nsoc, $startRow_nsoc, $maxRows_nsoc);
        $nsoc = mysql_query($query_limit_nsoc, $busapp) or die(mysql_error());
        $row_nsoc = mysql_fetch_assoc($nsoc);

        if (isset($_GET['totalRows_gsoc'])) {
            $totalRows_gsoc = $_GET['totalRows_gsoc'];
        } else {
            $all_nsoc = mysql_query($query_nsoc);
            $totalRows_nsoc = mysql_num_rows($all_nsoc);
        }
        $totalPages_nsoc = ceil($totalRows_nsoc/$maxRows_nsoc)-1;

        if($row_nsoc['id_exp'] == ""){
            echo ' <div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Aucun message , envoyer votre premier message :D <a href="#" class="alert-link">Retour</a>.
                            </div>';

        }else{
        do{

            $colname_user_info = -1;
            if (isset($row_nsoc['id_exp'])) {
                    $colname_user_info = $row_nsoc['id_exp'];
            }
            mysql_select_db($database_busapp, $busapp);
            $query_user_info = sprintf("SELECT * FROM accounts WHERE id = %s", GetSQLValueString($colname_user_info, "text"));
            $user_info = mysql_query($query_user_info, $busapp) or die(mysql_error());
            $row_user_info = mysql_fetch_assoc($user_info);
            $totalRows_user_info = mysql_num_rows($user_info);
        echo '<li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="';
            if($row_user_info['image'] == ""){
                echo 'images/avatar.jpg';
            }else {
                echo $row_user_info['image'];
            }
            echo '" height="50" width="50" alt="User Avatar" class="img-circle" />
                                    </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <strong class="primary-font">';
            echo $row_user_info['first_name'];
            echo '</strong>
                                        <small class="pull-right text-muted">
                                            <i class="fa fa-clock-o fa-fw"></i> '. $this->draw_time_message($row_nsoc['last_min'], $row_nsoc['hour']) .'
        </small>
                                    </div>
                                    <p>
        '. $this->draw_advanced_str($row_nsoc['message']) ;
            if($row_nsoc['image'] != ""){
                echo '<p><img src="'. $row_nsoc['image']  .'" width="200" height="200" /></p>';
            }
            if($row_nsoc['fichier'] !=""){
                $name_file = str_replace('http://127.0.0.1/Busapp_phpstorm/home/', '', $row_nsoc['fichier']);
                echo '<div class="row show-grid"><div class="col-xs-6 col-md-4"><img src="images/attachment_blue.png" height="20" width="20" /> <a href="' . $row_nsoc['fichier'] .'" title="'. str_replace('%20', ' ', $name_file) .'">'. partof_str($name_file) .'</a></div></div>';
            }
           echo '
                                    </p>
                                </div>
                            </li>';
            } while ($row_nsoc = mysql_fetch_assoc($nsoc));
        }

    }
}
?>
