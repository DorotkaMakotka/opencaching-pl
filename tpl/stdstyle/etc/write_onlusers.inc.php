<?php

use Utils\Database\XDb;
global $lang, $rootpath;
if (!isset($rootpath))
    $rootpath = '../../../';

//include template handling
require_once($rootpath . 'lib/common.inc.php');

function online_user()
{
    // add check users id who want to by username hidden
    $rs = XDb::xSql(
        "SELECT `user_id` FROM `sys_sessions`
        WHERE user_id!=1 AND `sys_sessions`.last_login >(NOW()-INTERVAL 10 MINUTE)
        GROUP BY `user_id`");

    $online_users = array();
    while ($r = XDb::xFetchArray($rs)) {
        $online_users[] = $r['user_id'];
    }
    return $online_users;
}

$onlusers = online_user();
$file_content = count($onlusers);
$n_file = fopen($dynstylepath . "nonlusers.txt", 'w');
fwrite($n_file, $file_content);
fclose($n_file);
$file_content = '';
$file_line = '';

foreach ($onlusers as $onluser) {
    //TODO: non optimal solution...
    $username = XDb::xMultiVariableQueryValue(
        "SELECT username FROM `user` WHERE user_id= :1 LIMIT 1", 0, $onluser);

    $file_line .='<a href="viewprofile.php?userid=' . $onluser . '">' . $username . '</a>,&nbsp;';
}

$file_content = $file_line;
$n_file = fopen($dynstylepath . "onlineusers.html", 'w');
fwrite($n_file, $file_content);
fclose($n_file);

