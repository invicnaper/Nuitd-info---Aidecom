<?php
/*
 * Aidecome open source plateforme developed for The nuit d'info
 * it helps you to create your own communication plateforme (web site)
 * 
 */

require_once("../modules/config.aidecom.php");
include("../modules/session.aidecom.php");
$get_info = new informations;
$new_message = new message;

    $maxRows_nsoc = 10;
    $pageNum_nsoc = 0;
    $colname_info = "-1";

    if (isset($_GET['cid'])) {
        $colname_info = $_GET['cid'];
    }
    $startRow_nsoc = $pageNum_nsoc * $maxRows_nsoc;
    mysql_select_db($database_busapp, $busapp);
    $query_nsoc = sprintf("SELECT * FROM ". $db_prefix ."chat", GetSQLValueString($colname_info, "text"));
    $query_limit_nsoc = sprintf("%s LIMIT %d, %d", $query_nsoc, $startRow_nsoc, $maxRows_nsoc);
    $nsoc = mysql_query($query_limit_nsoc, $busapp) or die(mysql_error());
    $row_nsoc = mysql_fetch_assoc($nsoc);
    
    if($row_nsoc['id'] != ""){
        $i = 3;
        do{
            $colname_user_info = "-1";
        if (isset($row_nsoc['sender_id'])) {
             $colname_user_info = $row_nsoc['sender_id'];
        }
        mysql_select_db($database_busapp, $busapp);
        $query_user_info = sprintf("SELECT * FROM accounts WHERE id = %s", GetSQLValueString($colname_user_info, "text"));
        $user_info = mysql_query($query_user_info, $busapp) or die(mysql_error());
        $row_user_info = mysql_fetch_assoc($user_info);
        $totalRows_user_info = mysql_num_rows($user_info);
        echo '<div class="item">
                                        <img src="'; 
                                        switch($i){
                                            case 1:
                                                echo "img/avatar2.png";
                                                
                                                break;
                                            case 2:
                                                echo "img/avatar3.png";
                                                break;
                                            case 3:
                                                echo "img/avatar5.png";
                                                break;
                                            default :
                                                echo "img/avatar5.png";
                                                break;
                                        }
                                        echo'" alt="user image" class="offline"/>
                                        <p class="message">
                                            <a href="#" class="name">
                                                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                                                '. $row_user_info['full_name'] .'
                                            </a>
                                            '. draw_advanced_str($row_nsoc['message']) .'
                                        </p>
                                    </div><!-- /.item -->';
        if($i == 3){
            $i = 0;
        }
        }while($row_nsoc = mysql_fetch_assoc($nsoc));

    }else {
        echo '<div class="callout callout-warning">
                                            <h4>Attention !</h4>
                                            <p>Aucun contenu</p>
                                        </div>';
    }

    function draw_advanced_str($message){
        /*  function that allows as to draw smiley  */
        $new_str = $message ;
        if(strstr($message, ':)')){
            $new_str = str_replace(':)', '<img src="img/smiley/smile.png" />', $new_str);
        }
        if(strstr($message, ':(')){
            $new_str = str_replace(':(', '<img src="img/smiley/sad.png" />', $new_str);
        }
        if(strstr($message, ':p')){
            $new_str = str_replace(':p', '<img src="img/smiley/tongue.png" />', $new_str);
        }
        if(strstr($message, ':o')){
            $new_str = str_replace(':o', '<img src="img/smiley/shock.png" />', $new_str);
        }
        if(strstr($message, ';)')){
            $new_str = str_replace(';)', '<img src="img/smiley/wink.png" />', $new_str);
        }
        if(strstr($message, ':*')){
            $new_str = str_replace(':*', '<img src="img/smiley/kiss.png" />', $new_str);
        }
        if(strstr($message, ':D')){
            $new_str = str_replace(':D', '<img src="img/smiley/laugh.png" />', $new_str);
        }
        if(strstr($message, ':computer:')){
            $new_str = str_replace(':computer:', '<img src="img/smiley/computer.png" />', $new_str);
        }
        if(strstr($message, ':boy:')){
            $new_str = str_replace(':boy:', '<img src="img/smiley/boy.png" />', $new_str);
        }
        if(strstr($message, 'http://')){
            $new_str = str_replace('computer', '<img src="img/smiley/computer.png" />', $new_str);
        }


        return $new_str;
    }

?>