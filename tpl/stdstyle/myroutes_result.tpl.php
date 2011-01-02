<?php
/***************************************************************************
	*                                         				                                
	*   This program is free software; you can redistribute it and/or modify  	
	*   it under the terms of the GNU General Public License as published by  
	*   the Free Software Foundation; either version 2 of the License, or	    	
	*   (at your option) any later version.
	*   
	*  UTF-8 ąść
	***************************************************************************/
?>

<div class="content2-pagetitle"><img src="tpl/stdstyle/images/blue/route.png" class="icon32" alt="" />&nbsp;{{caches_along_route}} ({number_caches}): <span style="color: black;font-size:13px;">{routes_name} ({{radius}} {distance} km)</span></div>
<div class="searchdiv">
<form action="myroutes_search.php" method="post" enctype="multipart/form-data" name="myroute_form" dir="ltr">
<input type="hidden" name="routeid" value="{routeid}"/>
<input type="hidden" name="distance" value="{distance}"/>
<input type="hidden" name="nrlogs" value="{nrlogs}"/>
<table border="0" cellspacing="2" cellpadding="1" style="margin-left: 10px; line-height: 1.4em; font-size: 13px;" width="95%">
<tr>
<td ><strong>{{date_hidden_label}}</strong></td>
<td style="width: 22px;"><img src="images/rating-star.png" border="0" alt="Recomended" title="Recomended"/></td>
<td tyle="width: 22px;">&nbsp;</td>
<td ><strong>Geocache</strong></td>
<td><strong>{{owner}}</strong>&nbsp;&nbsp;&nbsp;</td>
<td colspan="3"><strong>{{latest_logs}}</strong></td>
</tr>
<tr>
<td colspan="8"><hr></hr></td>
</tr>
		{file_content}
<tr>
<td colspan="8"><hr></hr></td>
</tr>
</table>
</div>
<br/>
<div class="content-title-noshade-size3">{{min_logs_cache_gpx}}: <input type="text" name="nrlogs" value="{nrlogs}" maxlength="3" class="input50" /></div>

<br/>
			<button type="submit" name="back" value="back" style="font-size:12px;width:160px"><b>{{back}}</b></button>&nbsp;&nbsp;
{list_empty_start}
			<button type="submit" name="submit_gpx" value="submit_gpx" style="font-size:12px;width:160px"><b>{{save_gpx}}</b></button>
{list_empty_end}			
			<br/><br/><br/>

