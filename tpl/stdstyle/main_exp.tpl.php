<?php

use Utils\Database\OcDb;
// load menu
global $mnu_bgcolor, $mnu_selmenuitem, $develwarning, $tpl_subtitle, $absolute_server_URI, $mnu_siteid, $site_name;
require_once $stylepath . '/lib/menu.php';
$menu_item_siteid = $tplname;
if (isset($mnu_siteid)) {
    $menu_item_siteid = $mnu_siteid;
}
$pageidx = mnu_MainMenuIndexFromPageId($menu, $menu_item_siteid);

if (isset($menu[$pageidx]['navicolor'])) {
    $mnu_bgcolor = $menu[$pageidx]['navicolor'];
} else {
    $mnu_bgcolor = '#D5D9FF';
}
if ($tplname != 'start')
    $tpl_subtitle .= htmlspecialchars($mnu_selmenuitem['title'] . ' - ', ENT_COMPAT, 'UTF-8');


// sitename and slogan iternational handling
// print $_SERVER['SERVER_NAME'] ;
// print '   ';
// $domain = substr($_SERVER['HTTP_HOST'],-2,2);
// exit;

$nodeDetect = substr($absolute_server_URI, -3, 2);


$logo1 = tr('oc_on_all_pages_top_' . $nodeDetect);
$logo2 = tr('oc_subtitle_on_all_pages_' . $nodeDetect);
$logo3 = $config['headerLogo'];

if ((date('m') == 4) and ( date('d') == 1)) {
    $logo1 = tr('oc_on_all_pages_top_1A');
    $logo2 = tr('oc_subtitle_on_all_pages_1A');
    $logo3 = $config['headerLogo1stApril'];
}

if (date('m') == 12 || date('m') == 1) {
    $logo3 = $config['headerLogoWinter'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" >
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="aplication:xhtml+xml; charset=UTF-8" />
        <meta http-equiv="Content-Language" content="{lang}" />
        <meta http-equiv="gallerimg" content="no" />
        <meta http-equiv="pragma" content="no-cache" />
        <meta name="KEYWORDS" content="geocaching, opencaching, skarby, poszukiwania,geocashing, longitude, latitude, utm, coordinates, treasure hunting, treasure, GPS, global positioning system, garmin, magellan, mapping, geo, hiking, outdoors, sport, hunt, stash, cache, geocaching, geocache, cache, treasure, hunting, satellite, navigation, tracking, bugs, travel bugs" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta name="author" content="{site_name}" />
        <meta http-equiv="X-UA-Compatible" content="IE=10" />

<!--         <link rel="stylesheet" type="text/css" media="screen,projection" href="tpl/stdstyle/css/style_screen.css" /> -->
        <link rel="stylesheet" type="text/css" media="screen,projection" href="tpl/stdstyle/css/style_screen_exp.css" />
        <link rel="stylesheet" type="text/css" media="print" href="tpl/stdstyle/css/style_print.css" />
        <!-- TODO -->
<!--         <link rel="stylesheet" type="text/css" media="screen,projection" href="tpl/stdstyle/css/style_{season}.css" /> -->

        <link rel="shortcut icon" href="/images/<?php print $config['headerFavicon']; ?>" />
        <link rel="apple-touch-icon-precomposed" href="/images/oc_logo_144.png" />

        <script type="text/javascript" src="lib/enlargeit/enlargeit.js"></script>
        <title><?php echo $tpl_subtitle; ?>{title}</title>

        {htmlheaders}
        {cachemap_header}
        {viewcache_header}
        {ga_script_header}
        <script type='text/javascript' src='lib/js/ga.js'></script>
        <script type='text/javascript' src='lib/js/CookiesInfo.js'></script>


    </head>
    <body {bodyMod}>


        <?php
        echo "<script type='text/javascript'>WHSetText('" . tr('cookiesInfo') . "');</script>";
        ?>


        <script type="text/javascript">
            function chname(newName,searchPage) {
                document.getElementById("search_input").name = newName;
                document.getElementById("search_form").action = searchPage;
                return false;
            }
        </script>
        <div id="overall">
            <div class="page-container-1" style="position: relative;">
                <div id="bg1">&nbsp;</div>
                <div id="bg2">&nbsp;</div>
                <!-- HEADER -->
                <!-- OC-Logo -->
                <div><img src="/images/<?php print $logo3; ?>" alt="" style="margin-top:5px; margin-left:3px;" /></div>
                <!-- Sitename -->
                <div class="site-name">
                    <p class="title"><a href="index.php"><?php print $logo1; ?></a></p>
                    <p class="subtitle"><a href="index.php"><?php print $logo2; ?></a></p>
                </div>
                <!-- Flag navigations -->
                <div class="navflag-container">
                    <div class="navflag">
                        <ul>
                            {language_flags}
                        </ul>
                    </div>
                </div>
                <!-- google plus recos
                        <script type="text/javascript">
                          (function() {
                            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                            po.src = 'https://apis.google.com/js/plusone.js';
                            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                          })();
                            window.___gcfg = {
                            lang: '{language4js}',
                            parsetags: 'onload',
                            size: 'small'
                          };
                        </script>
                        <g:plusone size="small"></g:plusone>
                -->

                <!-- Site slogan -->
                <div class="site-slogan-container">
                    <form method="get" action="search.php" name="search_form" id="search_form">
                        <div class="site-slogan">
                            <div style="width:100%; text-align:left;">
                                <p class="search">
                                    <input type="radio" onclick="chname('waypointname','search.php');" name="searchto" id="st_1" value="searchbywaypointname" class="radio" checked="checked"/> <label for="st_1">{{waypointname_label}}</label>&nbsp;&nbsp;
                                    <?php if ($config['quick_search']['byowner']) { ?><input type="radio" onclick="chname('owner','search.php');" name="searchto" id="st_2" value="searchbyowner" class="radio" /> <label for="st_2">{{owner_label}}</label>&nbsp;&nbsp; <?php } ?>
                                    <?php if ($config['quick_search']['byfinder']) { ?><input type="radio" onclick="chname('finder','search.php');" name="searchto" id="st_3" value="searchbyfinder" class="radio" /> <label for="st_3">{{finder_label}}</label>&nbsp;&nbsp; <?php } ?>
                                    <?php if ($config['quick_search']['byuser']) { ?><input type="radio" onclick="chname('username','searchuser.php');" name="searchto" id="st_4" value="searchbyuser" class="radio" /> <label for="st_4">{{user}}</label>&nbsp;&nbsp; <?php } ?>
                                    <input type="hidden" name="showresult" value="1"/>
                                    <input type="hidden" name="expert" value="0"/>
                                    <input type="hidden" name="output" value="HTML"/>
                                    <input type="hidden" name="sort" value="bydistance"/>
                                    <input type="hidden" name="f_inactive" value="0"/>
                                    <input type="hidden" name="f_ignored" value="0"/>
                                    <input type="hidden" name="f_userfound" value="0"/>
                                    <input type="hidden" name="f_userowner" value="0"/>
                                    <input type="hidden" name="f_watched" value="0"/>
                                    <input type="hidden" name="f_geokret" value="0"/>
                                </p>
                            </div>
                            <div style="float:right;  margin-top:3px;">
                                <input id="search_input" type="text" name="waypointname" class="input100" style="color:gray;" />&nbsp;&nbsp;
                                <input type="submit" name="submit" value="{{search}}" class="formbuttons" />
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Navigation Level 1 -->
                <div class="nav1-container">
                    <div class="nav1" style="text-align:right;margin-right:20px;">
                        {loginbox}
                    </div>
                </div>
                <!-- Header banner     -->
                <div class="header">
                    <div style="width:970px; padding-top:1px;"><img src="./images/head/rotator.php" alt="" style="border:0px;" /></div>
                </div>
                <!-- Navigation Level 2 -->
                <div class="nav2">
                    <ul>
                        <?php
                        $dowydrukuidx = mnu_MainMenuIndexFromPageId($menu, "mylist");
                        if (isset($_SESSION['print_list'])) {
                            if (count($_SESSION['print_list']) > 0) {
                                $menu[$dowydrukuidx]['visible'] = true;
                                $menu[$dowydrukuidx]['menustring'] .= " (" . count($_SESSION['print_list']) . ")";
                            }
                        }
                        //user is admin
                        if (isset($usr['admin']) && $usr['admin']) {
                            $db = OcDb::instance();
                            $new_reports = $db->simpleQueryValue("SELECT count(status) FROM reports WHERE status = 0", 0);
                            $lookhere_reports = $db->simpleQueryValue("SELECT count(status) FROM reports WHERE status = 3", 0);
                            $active_reports = $db->simpleQueryValue("SELECT count(status) FROM reports WHERE status <> 2", 0);
                            $new_pendings = $db->simpleQueryValue("SELECT COUNT(status) FROM caches WHERE status = 4", 0);
                            $in_review_count = $db->simpleQueryValue("SELECT COUNT(*) FROM caches JOIN approval_status ON approval_status.cache_id = caches.cache_id WHERE caches.status = 4", 0);
                        }
                        if (isset($menu[$pageidx])) {
                            mnu_EchoMainMenu($menu[$pageidx]['siteid']);
                        }
                        ?>
                    </ul>
                </div>
                <!-- Buffer after header -->
                <div class="buffer" ></div>
                <!-- NAVIGATION -->
                <!-- Navigation Level 3 -->

                <div class="nav3">
                    <?php
//Main menu
                    $mainmenuidx = mnu_MainMenuIndexFromPageId($menu, "start");
                    if (isset($menu[$mainmenuidx]['submenu'])) {
                        $registeridx = mnu_MainMenuIndexFromPageId($menu[$mainmenuidx]["submenu"], "register");
                        if ($usr) {
                            $menu[$mainmenuidx]['submenu'][$registeridx]['visible'] = false;
                        } else
                            $menu[$mainmenuidx]['submenu'][$registeridx]['visible'] = true;
                        echo '<ul>';
                        echo '<li class="title">' . tr('main_menu') . '</li>';
                        mnu_EchoSubMenu($menu[$mainmenuidx]['submenu'], $menu_item_siteid, 1, false);
                        echo '</ul>';
                    }
                    ?>
                    <?php
                    if ($usr && isset($_SESSION['user_id'])) {
                        $myhomeidx = mnu_MainMenuIndexFromPageId($menu, "myhome");
                        $myprofileidx = mnu_MainMenuIndexFromPageId($menu[$myhomeidx]["submenu"], "myprofile");
                        // [fixme] Have to do the menu unrolling... in not such a crappy way
                        // ^ agreed, but it's 1:30 AM
                        if ($menu_item_siteid == "myprofile" || $menu_item_siteid == "myprofile_change" || $menu_item_siteid == "newemail" || $menu_item_siteid == "newpw" || $menu_item_siteid == "change_statpic") {
                            for ($i = 0; $i < count($menu[$myhomeidx]["submenu"][$myprofileidx]['submenu']); $i++) {
                                $menu[$myhomeidx]["submenu"][$myprofileidx]['submenu'][$i]['visible'] = true;
                            }
                        }
                        echo '<ul>';
                        echo '<li class="title">' . $menu[$myhomeidx]["title"] . '</li>';
                        mnu_EchoSubMenu($menu[$myhomeidx]['submenu'], $menu_item_siteid, 1, false);
                        echo '</ul>';
                    }
                    ?>
                    <?php
                    if (isset($usr['admin']) && $usr['admin']) {
                        echo '<ul>';
                        $adminidx = mnu_MainMenuIndexFromPageId($menu, "viewreports");
                        $menu[$adminidx]['visible'] = false;
                        echo '<li class="title">' . $menu[$adminidx]["title"] . '</li>';
                        $zgloszeniaidx = mnu_MainMenuIndexFromPageId($menu[$adminidx]["submenu"], "viewreports");
                        if ($active_reports > 0)
                            $menu[$adminidx]["submenu"][$zgloszeniaidx]['menustring'] .= " (" . $new_reports . "/" . $active_reports . ")";
                        $zgloszeniaidx = mnu_MainMenuIndexFromPageId($menu[$adminidx]["submenu"], "viewpendings");
                        if ($new_pendings > 0)
                            $waitingForAssigne = $new_pendings - $in_review_count;
                            $menu[$adminidx]["submenu"][$zgloszeniaidx]['menustring'] .= " (" . $waitingForAssigne . "/" . $new_pendings .  ")";
                        mnu_EchoSubMenu($menu[$adminidx]['submenu'], $menu_item_siteid, 1, false);
                        echo '</ul>';
                    }
                    ?>

                    <!-- Main title -->
                </div>



                <!--     CONTENT -->
                <div class="content2" style="margin-top:30px;">

                    {template}
                </div>
                <!-- FOOTER -->
                <div class="footer">
                    <?php
                    global $usr, $onlineusers;
                    if ($usr == true && $onlineusers == 1) {
                        echo '<p><span class="txt-black">&nbsp;&nbsp;{{online_users}} (</span><span class="txt-white">';
                        global $dynstylepath;
                        include ($dynstylepath . "nonlusers.txt");
                        echo '</span><span class="txt-black">) - {{online_users_info}}:</span>&nbsp;<br /><center>
                            <div><span class="txt-white;" style="margin-left: 5px;margin-right: 5px;text-align: center; width: 800px;">';
                        global $dynstylepath;
                        include ($dynstylepath . "onlineusers.html");
                        echo '</span></div></center></p><br />';
                    }
                    ?>
                    <p>
                        <a href="articles.php?page=impressum">{{impressum}}</a> |
                        <a href="articles.php?page=history">{{history}}</a> |
                        <a href="articles.php?page=contact">{{contact}}</a> |
                        <a href="/index.php?page=sitemap">{{main_page}}</a> |
                        <a href="/okapi/">API</a><br />
                        {runtime}
                    </p>
<!--
                    <p><a href="http://validator.w3.org/check?uri=referer" title="Validate code as W3C XHTML 1.0 Compliant">W3C XHTML 1.0</a> | <a href="http://jigsaw.w3.org/css-validator/" title="Validate Style Sheet as W3C CSS 2.0 Compliant">W3C CSS 2.0</a></p>
-->
                </div>
                <!-- (C) The Open Caching Project ? - 2016 -->
            </div>
        </div>
    </body>
</html>
