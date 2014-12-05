<ul class="sidebar-menu">
            <li class="active">
                
                <?php if(isset($_SESSION['AIDECOM_USERNAME'])){ ?>
                    <a href="list.php?show=organisme"><i class="fa fa-briefcase"></i> <span>Organismes</span></a>
                <?php } else { ?>
                    <a href="#"><i class="fa fa-group"></i> <span>Inscription</span></a>
                <?php } ?>
            </li>
            <li>
                <a href="pages/widgets.html">
                <?php if(isset($_SESSION['AIDECOM_USERNAME'])){ ?>
                    <i class="fa fa-heart"></i> <span>Timeline</span> <small class="badge pull-right bg-green">Nouveau</small>
                <?php }else { ?>
                <i class="fa fa-sign-in"></i> <span>Connection</span> <small class="badge pull-right bg-green">Help</small>                
                <?php } ?>
                </a>
            </li>
            <?php if(isset($_SESSION['AIDECOM_USERNAME'])){ ?>
            <?php if($get_info->get_element("grade") == "5"){?>
            <li class="active">
                <a href="list.php?show=admin"><i class="fa fa-user"></i> <span>Admin</span></a>
            </li>
            <?php } ?>
            <?php } ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Les states</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                
            </li>
            <li class="treeview">
                <a href="list.php?show=organisme">
                    <i class="fa fa-briefcase"></i>
                    <span>Organisation</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Nous écrire</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                
            </li>
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-comments"></i> <span>Contact</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                
            </li>
        </ul>