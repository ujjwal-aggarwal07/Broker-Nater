<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if(isset($_COOKIE["ID"]))
{
	echo <<<HTML
	<!DOCTYPE html>
	<html>
	<head>
		<title>BROKERNATOR</title>
		<link rel="icon" type="image/x-icon" href="image/1logo.png">


	

		<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
		  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
			
			<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css"> -->
			<link rel="stylesheet" href="css/HomeHtml.css">
			<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
		  rel="stylesheet"/>
		  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js" integrity="sha512-eYSzo+20ajZMRsjxB6L7eyqo5kuXuS2+wEbbOkpaur+sA2shQameiJiWEzCIDwJqaB0a4a6tCuEvCOBHUg3Skg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		  <script  src="js/apiselect.js"></script>
		 
		</head>
		<body>
		<div id ="menu">
			<div id="leftmenu">
				<h4 id="sensex">SENSEX</h4><span id="sensexp">52896</span><span id="sensexc">(+580)</span>
				<h4 id="nifty">NIFTY</h4><span id="niftyp">17750</span><span id="niftyc">(+115)</span>
			</div>
			<div id="rightmenu">
				<img id="logo"src="image/1logo.png">
				<img id="user"src="image/avatar.png" alt="Avatar" class="avatar">
		          <ul id="menubar" name="menubar">
		          	<li class="active" id="DASHBOARD">DASHBOARD</li>
		          	<li id="HOLDINGS">HOLDINGS</li>
		           	<li id="REPORTS">REPORTS</li>
		           	
		           	<li id="FUNDS">FUNDS</li>
		          	</ul>    
			</div>
		</div>
		<div id="content">
			 <div id="leftcontent">
			 	<input id="watchlist_search"type="text" title="search stock"placeholder="Search eg: infy bse, nifty fut, nifty">
			 	
			 	<div id="stockAllReadyAdded">
			 		<!-- This is left content, just a watch ist type of things -->
			 		


			 	</div>
			 	<div id="searchContent">
			 		
			 	</div>
			 </div>
		     <div id="rightcontent">
		     	<p>WELCOME,<span id="useridd"></span></p>
		     	
		     </div>
		 </div>


		 <script src="js/watchlist.js"></script>
		</body>
		</html>
	HTML;
}
else
{
	header("Location: LoginHtml.php");
	exit;
}
?>
