<?php
/***************************************************************************
											./tpl/stdstyle/viewlogs.tpl.php
															-------------------
		begin                : July 9 2004
		copyright            : (C) 2004 The OpenCaching Group
		forum contact at     : http://www.opencaching.com/phpBB2

	***************************************************************************/

/***************************************************************************
	*                                         				                                
	*   This program is free software; you can redistribute it and/or modify  	
	*   it under the terms of the GNU General Public License as published by  
	*   the Free Software Foundation; either version 2 of the License, or	    	
	*   (at your option) any later version.
	*
	***************************************************************************/

/****************************************************************************
	  
   Unicode Reminder ??
                                       				                                
	 view all logs of a cache

 ****************************************************************************/
?>
			<img src="tpl/stdstyle/images/description/22x22-logs.png" width="22" height="22" align="middle" border="0"/>
			<b>Wpisy do logów dla skrzynki <a href="viewcache.php?cacheid={cacheid}">{cachename}</a></b>
			<span style="font-weight: 400;">&nbsp;&nbsp;
			{found_icon} {founds}x 
			{notfound_icon} {notfounds}x 
			{note_icon} {notes}x<br /></span>
		{logs}

<table class="table">
	<tr>
		<td class="buffer">
		</td>
	</tr>
	<tr>
		<td>
			<span style="font-weight: 400;">[<a href="viewcache.php?cacheid={cacheid}">Powrót do skrzynki</a>]</span><br />
		</td>
	</tr>
</table>
