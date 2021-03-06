<?php
/**
 *
 * This script sends emails which are stored in DB table email_user
 * Those are for examples:
 *  - messages sended by user to other user inside OC service
 *
 * This script should be called from cron quite often (to not delay messages)
 */

use Utils\Database\XDb;


$rootpath = '../../';
require_once($rootpath . 'lib/common.inc.php');

$result = XDb::xSql('SELECT `id`, `to_email`, `send_emailaddress`, `from_email`, `mail_subject`, `mail_text` FROM `email_user` WHERE `date_sent`=0');

while ($row = XDb::xFetchArray($result)) {
    $headers = '';
    $to_email = ($debug == true) ? $debug_mailto : $row['to_email'];

    if ($row['send_emailaddress'] == '1') { // send emailaddress
        $headers = "Content-Type: text/plain; charset=utf-8\n";
        $headers .= 'From: "' . $mailfrom . '" <' . $emailaddr . ">\n";
        $headers .= 'Return-Path: ' . $row['from_email'] . "\n";
        $headers .= 'Reply-To: ' . $row['from_email'] . "\n";
    } else {
        $headers = "Content-Type: text/plain; charset=utf-8\n";
        $headers .= 'From: "' . $mailfrom . '" <' . $emailaddr . ">\n";
        $headers .= 'Return-Path: ' . $mailfrom . "\n";
        $headers .= 'Reply-To: ' . $mailfrom_noreply . "\n";
    }

    if (mb_send_mail($to_email, $row['mail_subject'], $row['mail_text'], $headers)) {

        // Send copy of the message to sender
        mb_send_mail($row['from_email'], $row['mail_subject'], tr('copy_sender') . ":\n" . $row['mail_text'], $headers);

        $upd_result = XDb::xSql(
            "UPDATE `email_user` SET `mail_text`='[Delivered]', `date_sent`=NOW() WHERE `id`= ? ", $row['id']);
    }
}
