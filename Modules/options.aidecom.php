<?php
/*
 * Aidecome open source plateforme developed for The nuit d'info
 * it helps you to create your own communication plateforme (web site)
 * 
 */

class option{

	public function draw_tab(){
		/*
        * code to liste 'organismes'
        */
        include("config.aidecom.php");
        $maxRows_gsoc = 10;
        $pageNum_gsoc = 0;
        if (isset($_GET['pageNum_gsoc'])) {
            $pageNum_gsoc = $_GET['pageNum_gsoc'];
        }
        $startRow_gsoc = $pageNum_gsoc * $maxRows_gsoc;

        mysql_select_db($database_busapp, $busapp);
        $query_gsoc = "SELECT * FROM ". $db_prefix ."organismes";
        $query_limit_gsoc = sprintf("%s LIMIT %d, %d", $query_gsoc, $startRow_gsoc, $maxRows_gsoc);
        $gsoc = mysql_query($query_limit_gsoc, $busapp) or die(mysql_error());
        $row_gsoc = mysql_fetch_assoc($gsoc);

        if (isset($_GET['totalRows_gsoc'])) {
            $totalRows_gsoc = $_GET['totalRows_gsoc'];
        } else {
            $all_gsoc = mysql_query($query_gsoc);
            $totalRows_gsoc = mysql_num_rows($all_gsoc);
        }
        $totalPages_gsoc = ceil($totalRows_gsoc/$maxRows_gsoc)-1;
		echo '<div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Liste des Organismes</h3>
                                    <div class="box-tools">
                                        <div class="input-group">
                                            <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>Image</th>
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Tel</th>
                                            <th>Adresse</th>
                                        </tr>';
                                    do{   
                                    echo'    <tr>
                                            <td><img src="img/avatar5.png" class="img-circle" alt="User Image" width="50" height="50" /></td>
                                            <td>'. $this->draw_info($row_gsoc['name']) .'</td>
                                            <td>'. $this->draw_info($row_gsoc['email']) .'</td>
                                            <td>'. $this->draw_info($row_gsoc['tel']) .'</td>
                                            <td></td>
                                            <td>'. $this->draw_info($row_gsoc['adresse']) .'</td>
                                        </tr>';
                                    }while($row_gsoc = mysql_fetch_assoc($gsoc));
                                    echo '</table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->';

	}
	public function draw_info($info){
		if($info == ""){
			return '<span class="label label-danger">Denied</span>';
		}else {
			return $info;
		}
	}
	public function draw_messages(){
		/*
        * code to liste 'messages'
        */
        include("config.aidecom.php");
        $maxRows_gsoc = 10;
        $pageNum_gsoc = 0;
        if (isset($_GET['pageNum_gsoc'])) {
            $pageNum_gsoc = $_GET['pageNum_gsoc'];
        }
        $startRow_gsoc = $pageNum_gsoc * $maxRows_gsoc;

        mysql_select_db($database_busapp, $busapp);
        $query_gsoc = "SELECT * FROM ". $db_prefix ."mails";
        $query_limit_gsoc = sprintf("%s LIMIT %d, %d", $query_gsoc, $startRow_gsoc, $maxRows_gsoc);
        $gsoc = mysql_query($query_limit_gsoc, $busapp) or die(mysql_error());
        $row_gsoc = mysql_fetch_assoc($gsoc);

        if (isset($_GET['totalRows_gsoc'])) {
            $totalRows_gsoc = $_GET['totalRows_gsoc'];
        } else {
            $all_gsoc = mysql_query($query_gsoc);
            $totalRows_gsoc = mysql_num_rows($all_gsoc);
        }
        $totalPages_gsoc = ceil($totalRows_gsoc/$maxRows_gsoc)-1;
		echo '<div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Liste des Mail</h3>
                                    <div class="box-tools">
                                        <div class="input-group">
                                            <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>Image</th>
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Sujet</th>
                                            <th>Organisation</th>
                                            <th>Actions</th>
                                        </tr>';
                                    do{  
                                    $colname_user_info = "-1";
        if (isset($row_gsoc['sender_id'])) {
             $colname_user_info = $row_gsoc['sender_id'];
        }
        mysql_select_db($database_busapp, $busapp);
        $query_user_info = sprintf("SELECT * FROM accounts  WHERE id = %s", GetSQLValueString($colname_user_info, "text"));
        $user_info = mysql_query($query_user_info, $busapp) or die(mysql_error());
        $row_user_info = mysql_fetch_assoc($user_info);
        $totalRows_user_info = mysql_num_rows($user_info); 
        /* organisation */
        $colname_user_inf = "-1";
        if (isset($row_gsoc['orga_id'])) {
             $colname_user_inf = $row_gsoc['orga_id'];
        }
        mysql_select_db($database_busapp, $busapp);
        $query_user_inf = sprintf("SELECT * FROM ". $db_prefix ."organismes WHERE email = %s", GetSQLValueString($colname_user_inf, "text"));
        $user_inf = mysql_query($query_user_inf, $busapp) or die(mysql_error());
        $row_user_inf = mysql_fetch_assoc($user_inf);
        $totalRows_user_inf = mysql_num_rows($user_inf); 
                                    echo'    <tr>
                                            <td><img src="img/avatar5.png" class="img-circle" alt="User Image" width="50" height="50" /></td>
                                            <td>'. $this->draw_info($row_user_info['full_name']) .'</td>
                                            <td>'. $this->draw_info($row_user_info['mail']) .'</td>
                                            <td>'. $this->draw_info($row_gsoc['subject']) .'</td>
                                           
                                            <td>'. $this->draw_info($row_user_inf['name']) .'</td>
                                            <td><button class="btn btn-primary btn-sm">Voir</button>&nbsp;<button class="btn btn-danger btn-sm">Supprimer</button></td>
                                        </tr>';
                                    }while($row_gsoc = mysql_fetch_assoc($gsoc));
                                    echo '</table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->';
	}
}


?>