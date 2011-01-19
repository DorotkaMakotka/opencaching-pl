<?php

/***************************************************************************
	*                                         				                                
	*   This program is free software; you can redistribute it and/or modify  	
	*   it under the terms of the GNU General Public License as published by  
	*   the Free Software Foundation; either version 2 of the License, or	    	
	*   (at your option) any later version.
	*
	***************************************************************************/

/****************************************************************************
	      
   Unicode Reminder ăĄă˘
                                   				                                
	 Starting page of the OpenCaching website and template usage example
	
	 used template(s): start
	 parameter(s):     none
	
 ****************************************************************************/

	//prepare the templates and include all neccessary
	require_once('./lib/common.inc.php');


	//Preprocessing
	if ($error == false)
	{
		//if( $_)
		//set here the template to process
		$tplname = 'start';
		// news
		require($stylepath . '/news.inc.php');
		$newscontent ="<br />";
		$rs = sql('SELECT `news`.`date_posted` `date`, `news`.`content` `content` FROM `news` WHERE datediff(now(), news.date_posted) <= 31 AND `news`.`display`=1 AND `news`.`topic`=2 ORDER BY `news`.`date_posted` DESC LIMIT 4');
	
	if (mysql_num_rows($rs)!=0) {
			$newscontent .= $tpl_newstopic_header.'<div class="searchdiv">';
		}	


		while ($r = sql_fetch_array($rs))
		{
		$news= $tpl_newstopic_without_topic;
			$post_date = strtotime($r['date']);	
			$news = mb_ereg_replace('{date}', fixPlMonth(htmlspecialchars(strftime("%d %B %Y", $post_date), ENT_COMPAT, 'UTF-8')), $news);
			$news = mb_ereg_replace('{message}', $r['content'], $news);			
			$newscontent .= $news . "\n";
		}

	
		tpl_set_var('display_news', $newscontent.'</div>');
		mysql_free_result($rs);
		$newscontent = '';
		
		$hiddenCaches = sqlValue("SELECT COUNT(*) FROM `caches` WHERE (`status`=1 OR `status`=2 OR `status`=3)", 0);		
		$rs = sql('SELECT COUNT(*) AS `hiddens` FROM `caches` WHERE `status`=1');
		$r = sql_fetch_array($rs);
		tpl_set_var('hiddens', $r['hiddens']);
		tpl_set_var('total_hiddens', $hiddenCaches);
		mysql_free_result($rs);
		
		$rs = sql('SELECT COUNT(*) AS `founds` FROM `cache_logs` WHERE (`type`=1 OR `type`=2) AND `deleted`=0');
		$r = sql_fetch_array($rs);
		tpl_set_var('founds', $r['founds']);
		mysql_free_result($rs);
		
		$rs = sql('SELECT COUNT(*) AS `users` FROM (SELECT DISTINCT `user_id` FROM `cache_logs` WHERE (`type`=1 OR `type`=2) AND `deleted`=0 UNION DISTINCT SELECT DISTINCT `user_id` FROM `caches`) AS `t`');
		$r = sql_fetch_array($rs);
		tpl_set_var('users', $r['users']);
		mysql_free_result($rs);

		// here is the right place to set up template replacements
		// example: 
		// tpl_set_var('foo', 'myfooreplacement');
		// will replace {foo} in the templates
	}


	//make the template and send it out
	tpl_BuildTemplate(false);

	//not neccessary, call tpl_BuildTemplate with true as argument and the db will be closed there
	db_disconnect();
?>
