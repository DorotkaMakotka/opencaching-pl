<div class="content2-pagetitle">{user_map} {username}</div>
<div class="content2-container">
<p class="content-title-noshade-size1">{current_zoom}: <input type="text" id="zoom" size="2" disabled="disabled"/></p>
<p class="content-title-noshade">{colors}: <b><font color="#dddd00">{yellow}</font></b> - {last_10_days}, <b><font color="#00dd00">{green}</font></b> - {own}, <b><font color="#aaaaaa">{gray}</font></b> - {found}, <b><font color="#ff0000">{red}</font></b> - {rest}</p>
</div>
<div id="map_canvas" style="width: {map_width}; height: {map_height}; float:left; border: 1px solid #000;">
</div>
<table width="100%">
<tr>
	<td width="33%">
		<div class="nav3">
			<ul>
				<li class="title">{hide_caches_type}:</li>
				<li class="group"><input class="chbox" id="h_u" name="h_u" value="1" type="checkbox" {h_u_checked} onclick="reload()"/><label for="h_u">{unknown_type} (U)</label></li>
				<li class="group"><input class="chbox" id="h_t" name="h_t" value="1" type="checkbox" {h_t_checked} onclick="reload()"/><label for="h_t">{traditional} (T)</label></li>
				<li class="group"><input class="chbox" id="h_m" name="h_m" value="1" type="checkbox" {h_m_checked} onclick="reload()"/><label for="h_m">{multicache} (M)</label></li>
				<li class="group"><input class="chbox" id="h_v" name="h_v" value="1" type="checkbox" {h_v_checked} onclick="reload()"/><label for="h_v">{virtual} (V)</label></li>
				<li class="group"><input class="chbox" id="h_w" name="h_w" value="1" type="checkbox" {h_w_checked} onclick="reload()"/><label for="h_w">Webcam (W)</label></li>
				<li class="group"><input class="chbox" id="h_e" name="h_e" value="1" type="checkbox" {h_e_checked} onclick="reload()"/><label for="h_e">{event} (E)</label></li>
				<li class="group"><input class="chbox" id="h_q" name="h_q" value="1" type="checkbox" {h_q_checked} onclick="reload()"/><label for="h_q">Quiz (Q)</label></li>
				<li class="group"><input class="chbox" id="h_o" name="h_o" value="1" type="checkbox" {h_o_checked} onclick="reload()"/><label for="h_o">{moving} (O)</label></li>
			</ul>
		</div>
	</td>
	<td width="*">
		<div class="nav3">
			<ul>
				<li class="title">{hide_caches}:</li>
				<li class="group"><input class="chbox" id="h_ignored" name="h_ignored" value="1" type="checkbox" {h_ignored_checked} onclick="reload()"/><label for="h_ignored">{ignored}</label></li>
				<li class="group"><input class="chbox" id="h_own" name="h_own" value="1" type="checkbox" {h_own_checked} onclick="reload()"/><label for="h_own">{own}</label></li>
				<li class="group"><input class="chbox" id="h_found" name="h_found" value="1" type="checkbox" {h_found_checked} onclick="reload()"/><label for="h_found">{founds}</label></li>
				<li class="group"><input class="chbox" id="h_noattempt" name="h_noattempt" value="1" type="checkbox" {h_noattempt_checked} onclick="reload()"/><label for="h_noattempt">{not_yet_found}</label></li>
				<li class="group"><input class="chbox" id="h_nogeokret" name="h_nogeokret" value="1" type="checkbox" {h_nogeokret_checked} onclick="reload()"/><label for="h_nogeokret">{without_geokret}</label></li>
				<li class="group"><input class="chbox" id="h_avail" name="h_avail" value="1" type="checkbox" {h_avail_checked} onclick="reload()"/><label for="h_avail">{ready_to_find}</label></li>
				<li class="group"><input class="chbox" id="h_temp_unavail" name="h_temp_unavail" value="1" type="checkbox" {h_temp_unavail_checked} onclick="reload()"/><label for="h_temp_unavail">{temp_unavailables}</label></li>
				<li class="group"><input class="chbox" id="h_arch" name="h_arch" value="1" type="checkbox" {h_arch_checked} onclick="reload()"/><label for="h_arch">{archived}</label></li>	
			</ul>
		</div>
	</td>
	<td width="33%">
		<div class="nav3">
			<ul>
				<li class="title">{other_options}:</li>
				<li class="group"><input class="chbox" id="signes" name="signes" value="1" type="checkbox" {signes_checked} onclick="reload()" disabled="disabled"/><label for="signes">{show_signes}</label></li>
				<li class="group"><input class="chbox" id="be_ftf" name="be_ftf" value="1" type="checkbox" {be_ftf_checked} onclick="reload();check_field()"/><label for="be_ftf">{be_ftf_label}</label></li>
				<li class="group"><input class="chbox" id="h_pl" name="h_pl" value="1" type="checkbox" {h_pl_checked} onclick="reload()"/><label for="h_pl">{h_pl_label}</label></li>
				<li class="group"><input class="chbox" id="h_de" name="h_de" value="1" type="checkbox" {h_de_checked} onclick="reload()"/><label for="h_de">{h_de_label}</label></li>
			<li class="group">{score_label} {from}:	
			<select id="min_score" name="min_score" onchange="reload()">
				<option value="0" {min_sel0}>0</option>
				<option value="1" {min_sel1}>1</option>
				<option value="2" {min_sel2}>2</option>
				<option value="3" {min_sel3}>3</option>
				<option value="4" {min_sel4}>4</option>
				<option value="5" {min_sel5}>5</option>
				<option value="6" {min_sel6}>6</option>
			</select>
			 {to}: 
			<select id="max_score" name="max_score" onchange="reload()">
				<option value="0" {max_sel0}>0</option>
				<option value="1" {max_sel1}>1</option>
				<option value="2" {max_sel2}>2</option>
				<option value="3" {max_sel3}>3</option>
				<option value="4" {max_sel4}>4</option>
				<option value="5" {max_sel5}>5</option>
				<option value="6" {max_sel6}>6</option>
			</select>
			</li>
			<li class="group"><input class="chbox" id="h_noscore" name="h_noscore" value="1" type="checkbox" {h_noscore_checked} onclick="reload()"/><label for="h_noscore">{show_noscore}</label></li>
			</ul>
		</div>
	</td>
</tr>
</table>
	<script type="text/javascript" language="javascript">
	var h_t = 0;
	var map=null;
	var tlo=null;
	var tlo_foreign=null;
	var old_temp_unavail_value=null;
	var old_arch_value=null;

	function statusToImageName(status)
	{
		switch( status )
		{
			case "2":
				return "-n";
			case "3":
				return "-a";
			case "6":
				return "-d";
			default:
				return "-s";			
		}
	}

	function typeToImageName(type, status)
	{
		switch( type )
		{
			case "1":
				return "unknown"+statusToImageName(status)+".png";
			case "2":
			default:
				return "traditional"+statusToImageName(status)+".png";
			case "3":
				return "multi"+statusToImageName(status)+".png";
			case "4":
				return "virtual"+statusToImageName(status)+".png";
			case "5":
				return "webcam"+statusToImageName(status)+".png";
			case "6":
				return "event"+statusToImageName(status)+".png";
			case "7":
				return "quiz"+statusToImageName(status)+".png";
			case "8":
				return "moving"+statusToImageName(status)+".png";
		}
	}
	
	function stripslashes(str) 
	{
		str=str.replace(/\\'/g,'\'');
		str=str.replace(/\\"/g,'"');
		str=str.replace(/\\\\/g,'\\');
		str=str.replace(/\\0/g,'\0');
		return str;
	}
	
	function check_field()
	{
		if( document.getElementById('be_ftf').checked )
		{
			// store previews values of temp_unavail and arch checkboxes
			old_temp_unavail_value = document.getElementById('h_temp_unavail').checked;
			old_arch_value = document.getElementById('h_arch').checked;

			document.getElementById('h_temp_unavail').checked = true;
			document.getElementById('h_arch').checked = true;
			
			document.getElementById('h_temp_unavail').disabled = true;
			document.getElementById('h_arch').disabled = true;
		}
		else
		{
			// restore previews values of temp_unavail and arch checkboxes
			document.getElementById('h_temp_unavail').checked = old_temp_unavail_value;
			document.getElementById('h_arch').checked = old_arch_value;
			
			document.getElementById('h_temp_unavail').disabled = false;
			document.getElementById('h_arch').disabled = false;
		}
	}
	
	function reload()
	{
		map.clearOverlays(tlo);
		tlo = new GTileLayerOverlay(
			new GTileLayer(null, null, null, 
				{
					tileUrlTemplate: "lib/mapper.php?userid={userid}&z={Z}&x={X}&y={Y}&sc={sc}&h_u="+document.getElementById('h_u').checked+"&h_t="+document.getElementById('h_t').checked+"&h_m="+document.getElementById('h_m').checked+"&h_v="+document.getElementById('h_v').checked+"&h_w="+document.getElementById('h_w').checked+"&h_e="+document.getElementById('h_e').checked+"&h_q="+document.getElementById('h_q').checked+"&h_o="+document.getElementById('h_o').checked+"&h_ignored="+document.getElementById('h_ignored').checked+"&h_own="+document.getElementById('h_own').checked+"&h_found="+document.getElementById('h_found').checked+"&h_noattempt="+document.getElementById('h_noattempt').checked+"&h_nogeokret="+document.getElementById('h_nogeokret').checked+"&h_avail="+document.getElementById('h_avail').checked+"&h_temp_unavail="+document.getElementById('h_temp_unavail').checked+"&h_arch="+document.getElementById('h_arch').checked+"&signes="+document.getElementById('signes').checked+"&be_ftf="+document.getElementById('be_ftf').checked+"&h_de="+document.getElementById('h_de').checked+"&h_pl="+document.getElementById('h_pl').checked+"&min_score="+document.getElementById('min_score').value+"&max_score="+document.getElementById('max_score').value+"&h_noscore="+document.getElementById('h_noscore').checked, 
					isPng:false,
					opacity:0.8
				})
		);
		map.addOverlay(tlo);
		reload_foreign();
	}

	function reload_foreign()
	{
		tlo_foreign = new GTileLayerOverlay(
			new GTileLayer(null, null, null, 
				{
					tileUrlTemplate: "lib/mapper_foreign.php?userid={userid}&z={Z}&x={X}&y={Y}&sc={sc}&h_u="+document.getElementById('h_u').checked+"&h_t="+document.getElementById('h_t').checked+"&h_m="+document.getElementById('h_m').checked+"&h_v="+document.getElementById('h_v').checked+"&h_w="+document.getElementById('h_w').checked+"&h_e="+document.getElementById('h_e').checked+"&h_q="+document.getElementById('h_q').checked+"&h_o="+document.getElementById('h_o').checked+"&h_ignored="+document.getElementById('h_ignored').checked+"&h_own="+document.getElementById('h_own').checked+"&h_found="+document.getElementById('h_found').checked+"&h_noattempt="+document.getElementById('h_noattempt').checked+"&h_nogeokret="+document.getElementById('h_nogeokret').checked+"&h_avail="+document.getElementById('h_avail').checked+"&h_temp_unavail="+document.getElementById('h_temp_unavail').checked+"&h_arch="+document.getElementById('h_arch').checked+"&signes="+document.getElementById('signes').checked+"&be_ftf="+document.getElementById('be_ftf').checked+"&h_pl="+document.getElementById('h_pl').checked+"&h_de="+document.getElementById('h_de').checked+"", 
					isPng:false,
					opacity:0.8
				})
		);
		map.addOverlay(tlo_foreign);
	}
	
	function load() 
	{
	 if (GBrowserIsCompatible()) 
		{
			map = new GMap2(document.getElementById("map_canvas"), {draggableCursor: 'crosshair', draggingCursor: 'pointer'});
			tlo = new GTileLayerOverlay(
				new GTileLayer(null, null, null, 
					{
						tileUrlTemplate: "lib/mapper.php?userid={userid}&z={Z}&x={X}&y={Y}&sc={sc}&h_u={h_u}&h_t={h_t}&h_m={h_m}&h_v={h_v}&h_w={h_w}&h_e={h_e}&h_q={h_q}&h_o={h_o}&h_ignored={h_ignored}&h_own={h_own}&h_found={h_found}&h_noattempt={h_noattempt}&h_nogeokret={h_nogeokret}&h_avail={h_avail}&h_temp_unavail={h_temp_unavail}&h_arch={h_arch}&signes={signes}&be_ftf={be_ftf}&h_de={h_de}&h_pl={h_pl}&min_score={min_score}&max_score={max_score}&h_noscore={h_noscore}", 
						isPng:false,
						opacity:0.8
					})
			);
			
			tlo_foreign = new GTileLayerOverlay(
				new GTileLayer(null, null, null, 
					{
						tileUrlTemplate: "lib/mapper_foreign.php?userid={userid}&z={Z}&x={X}&y={Y}&sc={sc}&h_u={h_u}&h_t={h_t}&h_m={h_m}&h_v={h_v}&h_w={h_w}&h_e={h_e}&h_q={h_q}&h_o={h_o}&h_ignored={h_ignored}&h_own={h_own}&h_found={h_found}&h_noattempt={h_noattempt}&h_nogeokret={h_nogeokret}&h_avail={h_avail}&h_temp_unavail={h_temp_unavail}&h_arch={h_arch}&signes={signes}&be_ftf={be_ftf}&h_de={h_de}&h_pl={h_pl}", 
						isPng:false,
						opacity:0.8
					})
			);
			
			map.setCenter(new GLatLng({coords}),{zoom},G_PHYSICAL_MAP);
			document.getElementById("zoom").value = map.getZoom();
	
			map.addControl(new GLargeMapControl());
			map.addControl(new GScaleControl());
			map.removeMapType(G_HYBRID_MAP);
			map.addMapType(G_PHYSICAL_MAP);
			map.addControl(new GMapTypeControl());
			map.addControl(new GOverviewMapControl());			
			map.setMapType({map_type});
			map.addOverlay(tlo);
			map.addOverlay(tlo_foreign);
			GEvent.addListener(map, "moveend", function() 
			{
			});
			
			GEvent.addListener(map, "zoomend", function() 
			{
				var zoom = map.getZoom();
				if( zoom > 13 )
					document.getElementById('signes').disabled = false;
				else
					document.getElementById('signes').disabled = true;
				
				// reset double click timer
				document.getElementById("zoom").value = map.getZoom();
				
			});
			
			GEvent.addListener(map, "click", function(overlay,point) 
			{
				if( point==undefined )
					return;
				
	GDownloadUrl("lib/xmlmap.php?lat="+point.lat()+"&lon="+point.lng()+"&userid={userid}&h_u="+document.getElementById('h_u').checked+"&h_t="+document.getElementById('h_t').checked+"&h_m="+document.getElementById('h_m').checked+"&h_v="+document.getElementById('h_v').checked+"&h_w="+document.getElementById('h_w').checked+"&h_e="+document.getElementById('h_e').checked+"&h_q="+document.getElementById('h_q').checked+"&h_o="+document.getElementById('h_o').checked+"&h_ignored="+document.getElementById('h_ignored').checked+"&h_own="+document.getElementById('h_own').checked+"&h_found="+document.getElementById('h_found').checked+"&h_noattempt="+document.getElementById('h_noattempt').checked+"&h_nogeokret="+document.getElementById('h_nogeokret').checked+"&h_avail="+document.getElementById('h_avail').checked+"&h_temp_unavail="+document.getElementById('h_temp_unavail').checked+"&h_arch="+document.getElementById('h_arch').checked+"&signes="+document.getElementById('signes').checked+"&be_ftf="+document.getElementById('be_ftf').checked+"&h_pl="+document.getElementById('h_pl').checked+"&h_de="+document.getElementById('h_de').checked+"&min_score="+document.getElementById('min_score').value+"&max_score="+document.getElementById('max_score').value+"&h_noscore="+document.getElementById('h_noscore').checked, function(data, responseCode) 
						{
							var xml = GXml.parse(data);
							
							var caches = xml.documentElement.getElementsByTagName("cache");
							var cache_id = caches[0].getAttribute("cache_id");
							var name = stripslashes(caches[0].getAttribute("name"));
							var username = stripslashes(caches[0].getAttribute("username"));
							var wp = caches[0].getAttribute("wp");
							var votes = caches[0].getAttribute("votes");
							var score = caches[0].getAttribute("score");
							var topratings = caches[0].getAttribute("topratings");
							var lat = caches[0].getAttribute("lat");
							var lon = caches[0].getAttribute("lon");
							var type = caches[0].getAttribute("type");
							var status = caches[0].getAttribute("status");
							var user_id = caches[0].getAttribute("user_id");
							var founds = caches[0].getAttribute("founds");
							var notfounds = caches[0].getAttribute("notfounds");
							var node = caches[0].getAttribute("node");
							
							if( cache_id != "" )
							{							
								var show_score;
								var print_topratings;
								if( score != "" && votes > 2)
								{
									show_score = "<br><b>{score}:</b> " + score;
									if( score >= 5 )
										score = "3";
									else if( score >= 4.4 )
										score = "2";
									else if( score >= 2.5 )
										score = "1";
									else
										score = "0";
								}
								else show_score = "";
								
								if( topratings == 0 )
									print_topratings = "";
								else 
								{
									print_topratings = "<br><b>{recommendations}: </b>";
									var gwiazdka = "<img width=\"10\" height=\"10\" src=\"images/rating-star.gif\" alt=\"R\">";
									var ii;
									for( ii=0;ii<topratings;ii++)
										print_topratings += gwiazdka;
								}

								var infoWindowContent = "";
								var domain="";
								switch( node )
								{
									case "1":
										domain = "http://www.opencaching.de/";
										break;
									case "2":
										domain = "";
										break;
									case "3":
										domain = "http://www.opencaching.cz/";
										break;
									default:
										domain = "";
								}
								
								if( type == 6 )
								{
									found_attended = "{attended}";
									notfound_will_attend = "{will_attend}";
								}
								else
								{
									found_attended = "{found}";
									notfound_will_attend = "{not_found}";
								}

								infoWindowContent += "<table border=\"0\" width=\"350\" height=\"120\" class=\"table\">";
								infoWindowContent += "<tr><td colspan=\"2\" width=\"100%\"><table cellspacing=\"0\" width=\"100%\"><tr><td width=\"90%\">";
								infoWindowContent += "<center><img align=\"left\" width=\"20\" height=\"20\" src=\"tpl/stdstyle/images/cache/"+typeToImageName(type, status)+"\"></center>";
								infoWindowContent += "&nbsp;<a href=\""+domain+"viewcache.php?cacheid=" + cache_id + "\" target=\"_blank\">" + name + "</a>";
								infoWindowContent += "</td><td width=\"10%\">";
								infoWindowContent += "<b>"+wp+"</b></td></tr></table>";
								infoWindowContent += "</td></tr>";
								infoWindowContent += "<tr><td width=\"70%\" valign=\"top\">";
								infoWindowContent += "<b>{created_by}:</b> " + username + show_score + print_topratings;
					
								infoWindowContent += "</td>";
								infoWindowContent += "<td valign=\"top\" width=\"30%\"><table cellspacing=\"0\" cellpadding=\"0\"><tr><td width=\"100%\">";
								infoWindowContent += "<nobr><img src=\"tpl/stdstyle/images/log/16x16-found.png\" border=\"0\" width=\"10\" height=\"10\"> "+founds+" x "+found_attended+"</nobr></td></tr>";
								infoWindowContent += "<tr><td width=\"100%\"><nobr><img src=\"tpl/stdstyle/images/log/16x16-dnf.png\" border=\"0\" width=\"10\" height=\"10\"> "+notfounds+" x "+notfound_will_attend+"</nobr><nobr></td></tr>";
								if( node == 2 )
									infoWindowContent += "<tr><td width=\"100%\"><img src=\"tpl/stdstyle/images/action/16x16-adddesc.png\" border=\"0\" width=\"10\" height=\"10\"> "+votes+" x {scored}</nobr>";

								infoWindowContent += "</td></tr></table></td></tr>";
								infoWindowContent += "<tr><td align=\"left\" width=\"100%\" colspan=\"2\">";
								/*if( node == 2 )
									infoWindowContent += "<font size=\"0\"><a href=\"cachemap3.php?lat="+"\"><?php echo ($yn=='y'?$language[$lang]['add_to']:$language[$lang]['remove_from']);?> {to_print_list}</a></font>";*/
								infoWindowContent += "</td></tr></table></td></tr>";
								infoWindowContent += "</table>";
								
								map.openInfoWindowHtml(new GLatLng(lat,lon), infoWindowContent,{onCloseFn: function() {
								
								}});
							}
						});
			});

			
		}
		document.getElementsByTagName("body")[0].onclick = saveMapType;
	}
</script>
