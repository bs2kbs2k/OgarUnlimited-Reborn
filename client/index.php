<!-- /* 
*| AJS :: OgarUnlimited, (Public Release) [.86]
*| Source :: https://github.com/LegitSoulja/ogarul
*/ -->

<!DOCTYPE HTML>
<html>

	<head>
		<title>OgarUnlimited</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
		<meta name="description" content="OgarUnlimited">
		<meta name='copyright' content='AJS-development'>
		<meta name="keywords" content="OgarUnlimited, Agario, AJS, play.ogarul.tk, ogarul.tk, AJS/Ogar-unlimited, play.ogarul.io, ogarul.io, forum.ogarul.io, OgarUl">
		<meta name='coverage' content='Worldwide'>
		<meta name='revisit-after' content='1 days'>
		<meta name='subtitle' content='AJS Project creation'>
		<link rel="stylesheet" href="css/style.css?cache=1.1" />
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0-rc.2/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<script type="text/javascript" src="js/output.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>

	<body>
		<div id="overlays" style="display: none; position: absolute; left: 0; right: 0; top: 0; bottom: 0; background-color: rgba(0,0,0,0.5); z-index: 200;">
			<div id="helloDialog">
				<form>
					<div class="form-group">
						<div style="float: left; margin-left: 20px;">
							<h3 id="titleh"><i class="fa fa-caret-right" aria-hidden="true"></i> OgarUl Reborned</i></h3>
						</div>
					</div>
					<br/>
					<br/>
					<div class="form-group">
						<input class="form-control" id="nick" maxlength="15" placeholder="Nick">
						<select class="form-control" id="gamemode" onchange="setGameMode($(this).val());">
							<option selected value="">FFA</option>
							<option value=":teams">Teams</option>
							<option value=":experimental">Experimental</option>
						</select>
						<br/>
					</div>
					<div id="cantc" style="display: none;">
						<h4>Cannot connect to server, click the reconnect button below to try again</h4>
						<br>
					</div>
					<div class="checkbox" id="settings" style="display:none;">
						<div style="verticle-align: center; text-align: center; margin: 6px;">
							<label>
								<input id="cskin" onchange="setSkins(!$(this).is(':checked'));" type="checkbox"> No skins</label>
							<label>
								<input id="cname" onchange="setNames(!$(this).is(':checked'));" type="checkbox"> No names</label>
							<label>
								<input id="cdark" onchange="setDarkTheme($(this).is(':checked'));" type="checkbox"> Dark Theme</label>
							<label>
								<input id="ccolor" onchange="setColors($(this).is(':checked'));" type="checkbox"> No colors</label>
							<label>
								<input id="cmass" onchange="setShowMass($(this).is(':checked'));" type="checkbox"> Show mass</label>
							<label>
								<input id="cchat" onchange="setHideChat($(this).is(':checked'));" type="checkbox"> Hide chat</label>
							<label>
								<input id="csmooth" onchange="setSmooth($(this).is(':checked'));" type="checkbox"> Smooth Render</label>
							<label>
								<input id="cacid" onchange="setAcid($(this).is(':checked'));" type="checkbox"> Acid mode</label>
							<label>
								<input id="cgrid" onchange="setHideGrid($(this).is(':checked'));" type="checkbox">Hide Grid</label>
							<br/>
							<label>
								<button class="btn" onclick="getConnection()"><label>Reconnect</label></button>
							</label>
							<label>
								<button class="btn" onclick="spectate(); return false;">Spectate</button>
							</label>
							<br/>
							<div id="translator" style="display: none;"></div>
						</div>
					</div>
					<div class="form-group">
						<br/>
						<button class="btn btn-play btn-primary btn-needs-server" id="playBtn" onclick="setNick(document.getElementById('nick').value); return false;" type="submit">Play</button>
						<button class="btn btn-info btn-settings" onclick="$('#settings, #instructions').toggle();return false;"><i class="glyphicon glyphicon-cog"></i></button>
						<br/>
						<p></p>
						<select class="serverlist form-control" style="display: none; text-align-last:center; border: 1px solid orange;" size="8"></select>
					</div>
				</form>
				<div>
					<p id="customins">Control your cell using the mouse, w for eject, space for split. Add &lt;skinname&gt; in your username for skins.</p>
				</div>
				<br/>
				<div id="customht"></div>
				<div style="margin-bottom: 5px; margin-left: auto; margin-right: auto;">
					<span class="tts"></span>
					<center>
				</div>
				<center>
					<a class="skinlist" title="Official OgarUnlimited Skins"><i class="fa fa-unlock" aria-hidden="true" ></i> <font color="green">Skins</font></a>
				</center>
				</center>
			</div>
		</div>
		<div id="connecting" style="position: absolute; left: 0; right: 0; top: 0; bottom: 0; z-index: 100; background-color: rgba(0,0,0,0.5);">
			<div style="width: 350px; background-color: #FFFFFF; margin: 100px auto; border-radius: 15px; padding: 5px 15px 5px 15px;">
				<h2>Connecting</h2>
				<p>If you cannot connect to the servers, check if you have some anti virus or firewall blocking the connection. Try refreshing the page if nothing isn't loading. - AJS</p>
			</div>
		</div>
		<canvas height="600" id="ogarul" width="800"></canvas>
		<form>
			<input id="chat_textbox" maxlength="200" placeholder="Press Enter to chat!" type="text">
		</form>
		<div id="skins" style="display: none;" title="Skins List (Click Your Skin)"></div>

		<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js" integrity="sha256-xNjb53/rY+WmG+4L6tTl9m6PpqknWZvRt0rO1SRnJzw=" crossorigin="anonymous"></script>
		<script src="Vector2.js" type="text/javascript"></script>
		<script src="js/main_out.js?c=<?=time()/2;?>" type="text/javascript"></script>
		<script>
			$(document).on("contextmenu", function(t) {
				return t.preventDefault(), t.stopPropagation(), !1
			}), $(window).load(function() {
				$(".skinlist").click(function(t) {
					t.preventDefault(), t.stopPropagation(), 
					$("#skins").dialog({ show: "blind", hide: "clip" })
				}), $("#skins").on("click", ".skinclick", function() {
					$("#nick").val("<" + $(this).attr("title") + ">"), $("#skins").dialog("close")
				}), $.ajax({
					url: "skinlist.php",
					type: "GET",
					success: function(t) {
						var e = t.split("\n");
						for (var n in e) e[n] && "" != e[n] && "_" != e[n].slice(0, 1) && $("#skins").append("<img draggable='false' oncontextmenu='return false;' class='skinclick' title='" + e[n] + "' style='width: 30px; height: 30px;' src='skinlist/" + e[n] + ".png'>")
					}
				})
			});
		</script>
	</body>
</html>