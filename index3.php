<?php
ob_start();
session_start();
ini_set("display_errors","0");

	/*************************************************************************************************************
	***************************************** DO NOT DELETE ******************************************************
	*
	*/
	require("sqlloginscript.php");
	//require("countryipcheck.php");
	//require("ccheck.php");
	//if (!isset($_SESSION['ccheck'])) {
	//	print "The website encountered an error.  Please contact the webmaster.";
	//	print "<p> Click <a href='mailto:rnaughton@technologica.com.au?subject=CDirect Error'> here </a> to notify the webmaster </p>";
	//	exit;
	//}
	/*
	*
	**************************************************************************************************************
	**************************************************************************************************************/
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	$cat = $_REQUEST['cat'];
	if($username == "" or $password == ""){
		echo "";
		}
		else{
	
		
		 $sql = "SELECT * FROM Representatives WHERE Username = '$username' AND Passwords = '$password' LIMIT 1";

		$result = mysqli_query($mysqli, $sql);

		if (mysqli_num_rows($result) == 1) {

			//	Set session data for user
			$row = mysqli_fetch_assoc($result);
			echo $row;
			$_SESSION['userdetails'] = $row;
			$_SESSION['logged'] = true;


			// Update login history
			$date = date("d/m/Y");
			$time = date("G:ia");
			$history = "$date at $time";

			// Update login count
			if($cat != 3)
				$sql = "UPDATE Clients SET LoginCount  = LoginCount + 1, LastLogin = '$history' WHERE AccountNumber = '$username' AND State = '$password' AND ClientCategory = '2' LIMIT 1";
			else $sql = "UPDATE Representatives SET LoginCount  = LoginCount + 1, LastLogin = '$history' WHERE Username = '$username' AND Passwords = '$password' LIMIT 1";

			$result = mysqli_query($mysqli, $sql);
		}
		else {
			//	Unable to log user
			$login_error = true;
		}
	

	}
	if(isset($_POST['Login'])) {

		$username = $_POST['username'];
		$password = $_POST['password'];
		// $cat = $_POST['clientcategory'];

		
		$sql = "SELECT * FROM Clients WHERE AccountNumber = '$username' AND State = '$password' AND ClientCategory = '2' LIMIT 1";
		  $sql2 = "SELECT * FROM Representatives WHERE Username = '$username' AND Passwords = '$password' LIMIT 1";

		$result = mysqli_query($mysqli, $sql);
        
		 $result2 = mysqli_query($mysqli, $sql2);

		if (mysqli_num_rows($result) == 1) {

			//	Set session data for user
			$row = mysqli_fetch_assoc($result);
			echo $row;
			$_SESSION['userdetails'] = $row;
			$_SESSION['logged'] = true;


			// Update login history
			$date = date("d/m/Y");
			$time = date("G:ia");
			$history = "$date at $time";

			// Update login count
			if($cat != 3)
				$sql = "UPDATE Clients SET LoginCount  = LoginCount + 1, LastLogin = '$history' WHERE AccountNumber = '$username' AND State = '$password' AND ClientCategory = '$cat' LIMIT 1";
			else $sql = "UPDATE Representatives SET LoginCount  = LoginCount + 1, LastLogin = '$history' WHERE Username = '$username' AND Passwords = '$password' LIMIT 1";

		}

        else if (mysqli_num_rows($result2)==1){
            
			$row = mysqli_fetch_assoc($result2);
			echo $row;
			$_SESSION['userdetails'] = $row;
			$_SESSION['logged'] = true;


			// Update login history
			$date = date("d/m/Y");
			$time = date("G:ia");
			$history = "$date at $time";

			// Update login count
			if($cat != 3)
				$sql = "UPDATE Clients SET LoginCount  = LoginCount + 1, LastLogin = '$history' WHERE AccountNumber = '$username' AND State = '$password' AND ClientCategory = '$cat' LIMIT 1";
			else $sql = "UPDATE Representatives SET LoginCount  = LoginCount + 1, LastLogin = '$history' WHERE Username = '$username' AND Passwords = '$password' LIMIT 1";


        }
		else {
			//	Unable to log user
			$login_error = true;
		}
	}

	if(isset($_POST['Logout'])) {

		//	Delete session data
		unset($_SESSION['userdetails']);
		unset($_SESSION['logged']);
		session_destroy();
	}


	//	Handle search functionality

//	if($action == "search") {
//		$content= "results";
	//}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta charset="utf-8"/>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js"></script>
<script>
 WebFont.load({
    google: {
      families: ['Roboto:400,700,400italic,700italic', 'Roboto Condensed:400,700']
    }
  });
</script>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,400italic,700italic,900,900italic' rel='stylesheet' type='text/css'>
<script type="text/javascript">
</script>
 <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-71909830-2', 'auto');
  ga('send', 'pageview');

</script>
<title>
	<?php

	$content = $_GET['content'];
	switch($content) {
		case 'telstra_callingcards_phonecard':
			echo "Telstra > Pre-Paid > Calling Cards > Phone Card";
			break;
		case 'telstra_callingcards_phoneaway':
			echo "Telstra > Pre-Paid > Calling Cards > Phone Away";
			break;
		case 'telstra_prepaidplus_recharge':
			echo "Telstra > Pre-Paid > Pre-Paid Plus | Recharge";
			break;
		case 'telstra_prepaidplus_starterkits':
			echo "Telstra > Pre-Paid > Pre-Paid Plus | Starter Kits";
			break;
		case 'telstra_prepaidplus_home':
			echo "Telstra > Pre-Paid > Pre-Paid Plus | Home";
			break;
		case 'telstra_prepaidplus_mobile':
			echo "Telstra > Pre-Paid > Pre-Paid Plus | Mobile";
			break;
		case 'telstra_bigpond':
			echo "Telstra > BigPond > Dial-Up";
			break;
		case 'telstra_bigpond_broadband':
			echo "Telstra > BigPond > Broadband";
			break;
		case 'telstra_cardcall':
			echo "Telstra > cardcall > Say G'Day";
			break;
		case 'telstra_cardcall':
			echo "Telstra > cardcall > Super Buzz";
			break;
		case 'movie_tickets':
			echo "Tickets > Movie Tickets";
			break;
		case 'themepark_tickets':
			echo "Tickets > Themepark Tickets";
			break;
		case 'verbatim':
			echo "Memory / Media - Verbatim";
			break;
		case 'sandisk':
			echo "Memory / Media - Sandisk";
			break;
		case 'the_age':
			echo "Family Business > The Age ";
			break;
		case 'aust_fin_review':
			echo "Family Business > Australian Financial Review";
			break;
		case 'generations':
			echo "Family Business > Generations ";
			break;
		case 'vic_fba':
			echo "Family Business > Victorian FBA Business Award ";
			break;
		case 'fba':
			echo "Family Business Australia";
			break;
		case 'news':
			echo "Technologica | News";
			break;
		case 'orderforms':
			echo "Technologica | Order Forms";
			break;
		case 'staff/index':
			echo "Technologica | Technologicaory";
			break;

		case 'about':
			echo "Technologica | About Us";
			break;
		case 'contact':
			echo "Technologica | News";
			break;
		case 'privacy':
			echo "Technologica | Privacy Statement";
			break;
		case 'terms':
			echo "Technologica | Terms &amp; Conditions";
			break;
		default:
			echo "Technologica Pty Ltd | Sales &amp; Distribution";
			break;
		}
	?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="ROBOTS" content="ALL" />
<meta name="robots" content="index,follow" />
<meta name="distribution" content="global" />
<META NAME="description" CONTENT="technologica - Merchandising, Marketing, Sales & Distribution" />
<META NAME="keywords" CONTENT="Telstra, merchandising, marketing, sales, distribution, pre-paid, calling cards,
phone card, phone away, say g'day, super buzz global, pre-paid plus, recharge, starter kits, home, mobile, BigPond, dial-up,
pre-paid starter kits, post-paid, phone contracts, phone assortment,
digital cameras, memory, inkjet paper, film, batteries, digital guide, talking great photos, tips and techniques, Fusion Memory,
downloads, SanDisk, Memory Cards, audio, video, camcorder, multimedia, Casio, digital cameras, tickets, movie tickets,
themepark tickets, other, Polariod, Ferndale, Tropicare, affiliates, Fusion Store,Telstra, Clubs Direct, airport luggage,
Gloweave shirts, Kolotex stockings, Leisure Guide, Phonecardrates, Themeparks, The Gift Shop, The Flower Shop, The Fragrance Shop,
The Box Office, Family Business, The Age, Australian Financial Review, Generations, Victorian FBA business award, FBA"  />
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
<link href="stylesheet_other.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
//Nested Side Bar Menu (Mar 20th, 09)
//By Dynamic Drive: http://www.dynamicdrive.com/style/

var menuids=["sidebarmenu1"] //Enter id(s) of each Side Bar Menu's main UL, separated by commas

function initsidebarmenu(){
for (var i=0; i<menuids.length; i++){
  var ultags=document.getElementById(menuids[i]).getElementsByTagName("ul")
    for (var t=0; t<ultags.length; t++){
    ultags[t].parentNode.getElementsByTagName("a")[0].className+=" subfolderstyle"
  if (ultags[t].parentNode.parentNode.id==menuids[i]) //if this is a first level submenu
   ultags[t].style.left=ultags[t].parentNode.offsetWidth+"px" //dynamically position first level submenus to be width of main menu item
  else //else if this is a sub level submenu (ul)
    ultags[t].style.left=ultags[t-1].getElementsByTagName("a")[0].offsetWidth+"px" //position menu to the right of menu item that activated it
    ultags[t].parentNode.onmouseover=function(){
    this.getElementsByTagName("ul")[0].style.display="block"
    }
    ultags[t].parentNode.onmouseout=function(){
    this.getElementsByTagName("ul")[0].style.display="none"
    }
    }
  for (var t=ultags.length-1; t>-1; t--){ //loop through all sub menus again, and use "display:none" to hide menus (to prevent possible page scrollbars
  ultags[t].style.visibility="visible"
  ultags[t].style.display="none"
  }
  }
}

if (window.addEventListener)
window.addEventListener("load", initsidebarmenu, false)
else if (window.attachEvent)
window.attachEvent("onload", initsidebarmenu)

</script>
<style type="text/css">
@media (max-width:640px){
	#topNavigation{display:none;}
.sidebarmenu{display:none;}
#mainlayout{display:none;}
#topslider{display:none;}
#mobcontent{display:flex;max-width:640px;}
#container{width:100%;}
body{background-image:none;}
#footer{max-width:499px;}
.nomobile{display:none;}
.mobdis{display:flex;}
table {
		overflow-x: auto;
		display: block;
	}
}
@media (min-width:641px){
	#mobcontent{display:none;max-width:500px;}

.mobdis{display:none;}
}
.formcontent {
	font-family: Roboto, Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: black;
}
.CU3ER{
	height:90px;
}
body {
    opacity: 1;
    transition: .25s opacity;
    margin-top:5px;
}
body.preload {
    opacity: 0;
    transition: none;
}
#9090{
	height:90px;
}
.slick-arrow{
	display:none;
}
.single-item{
 display:none;
}
#topNavigation {
    width: 950px;
    height: 40px;
    background: #000000;	
    border-bottom: 3px solid #b54bb5;
}
.sidebarmenu ul li a:link, .sidebarmenu ul li a:visited, .sidebarmenu ul li a:active {
    background-color: #000;
}
.sidebarmenu ul li a:hover {
    background-color: #333;
}

#login {
    background-color: #333;
    padding-left: 5px;
}
#mailing {
    background-color: #333;
    padding-left: 5px;
}
</style>
<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>

<link rel="icon" type="image/svg+xml" href="/favicon.svg">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<link rel="preconnect" href="https://fonts.gstatic.com"><link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
<!-- Main Container -->
<div id="container">

<!-- Header -->
		<div>
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
		    <tr>
		      <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
		        <tr>
		          <td align="left"><div id="9090" height="" width="250px">
					  <img src="/images/Technologica_Logos_Vector_FA.svg" width="250"  alt="Technologica Logo" /></div></td>
		          <td align="right" style="height:90px">
		          <div class="single-item" id="topslider" style="width:728px;height:90px;overflow:hidden;">


<!--

      <div><img src='images/cuber/verbatim.jpg' alt=''/></div>


      <div><img src='images/cuber/telstra.jpg' alt=''/></div>

      <div><img src='images/cuber/kodak.jpg' alt=''/></div>

      <div><img src='images/cuber/hoyts.jpg' alt=''/></div>

      <div><img src='images/cuber/village.jpg' alt=''/></div>

<!-- generated SEO content ends here -->

</div>
</td>
	            </tr>
	          </table></td>
	        </tr></div>
	      </table>
  </div>
	<div class="nomobile" style="height:5px;width:950px;"></div>
		<!-- Navigation -->
		<div id="topNavigation">
			<table cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td> <a href="index.php?content=home"> HOME </a> </td>
                    <td> <a href="index.php?content=aboutus"> ABOUT US </a> </td>
					<td> <a href="index.php?content=mediacentre"> MEDIA CENTRE </a> </td>
					<td> <a href="index.php?content=admin"> ADMIN </a> </td>
                    <td><a href="index.php?content=neworder">ORDER FORMS </a> </td>
					<td> <a href="index.php?content=question"> CONTACT </a> </td>
				</tr>
			</table>
	  </div>

		<!-- Table for main layout -->
		<table id="mainLayout" cellpadding="0" cellspacing="0" border="0">

			<tr>
<td class="hideme" width="180" valign="top">

					<!-- Side Navigation -->
                    <div class="sidebarmenu">
<ul id="sidebarmenu1">
<?php if(!empty($_SESSION['userdetails']['Rep_name'])) { ?>
  <li><a style="color:#fdcb02" href="#">Employee</a>
  <ul>
  <li><a href="?content=employee/online_administration">Online Administration</a></li>
  <li><a href="?content=employee/order_forms">Order Forms</a></li>
  <li><a href="?content=employee/conference_photos">Conference Photos</a></li>
  </ul>
  <?php	} ?>


  <li><a href="?content=eveready">EVEREADY</a></li>
  
<li><a href="?content=reolink">REOlink</a></li>
<li><a href="?content=tictoclanding">Tik Toc Track</a></li>
<li><a href="#">Telecommunications</a>
  <ul>
  
	<li><a href="?content=outright_mobile"> Unlocked Handsets</a></li>
    <li><a href="?content=boost_mobile">Boost Pre-Paid Mobile</a>
      </li>
    
    <li><ul><a href="?content=telstra_callingcards_phonecard">Phone Card</a></ul></li>
    
  </li>
    <li><a href="#">Telstra Pre-Paid Mobile</a>
    <ul>
    <li><a href="?content=telstra_prepaidplus_starterkits">Starter Kits</a></li>
    <li><a href="?content=telstra_prepaidplus_recharge">Mobile Recharge</a></li>
    <li><a href="?content=telstra_prepaidplus_mobile">Mobile Phones</a></li>
    <li><a href="?content=telstra_prepaidplus_broadband">Mobile Broadband</a></li>
    </ul>
  </li>
    <li><a href="#">Card Call</a>
    <ul>
    <li><a href="?content=telstra_cardcall_saygday">Say G'Day</a></li>
    <li><a href="?content=telstra_cardcall_superbuzz">Superbuzz</a></li>
    </ul>
  </li>

  <li><a href="?content=beyond">Accessories</a></li>
</ul>
</li>

<li><a href="#">Memory &amp; Media</a>
  <ul>
  <li><a href="?content=verbatim">Verbatim</a></li>
    </ul>
</li>
  <!--
  <li><a href="#">Batteries</a><ul>
  <li><a href="?content=kodakproducts">Kodak</a></li>
  <li><a href="?content=energizer">Energizer</a></li>
  </ul></li>!-->
</li>
<li><a href="#">Movie Tickets</a>
  <ul>
  <li><a href="?content=movie_tickets">Movie Tickets</a></li>
    <li><a href="?content=hoyts_corporate">Private Movie Screenings</a></li>
  </ul>
</li>

<li><a href="?content=laserco">LASER Products</a></li>

<li><a href="?content=pacific_brands">Hanes / PacificBrands</a></li>

<li><a href="?content=samsierra">High Sierra/Samsonite</a></li>

<li><a target="_blank" href="http://www.anystoregiftcard.com.au">VISA/EFTPOS Gift Cards</a></li>
</ul>
</div>
				<!--  <div id="offers" style="background-color:#f3f3f3">
                    <table border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <th width="165" valign="top"><div align="left"><a style="text-decoration:none; color:#004eaf" href="?content=news">technologica News</a></div></th>
                      </tr>
                       <tr>
                        <td align="left" height="45px"><div align="left" style="padding-left:5px; font-size:10px;"><span class="title"> <strong>Unlocked Phones</strong></span><br />
                          C Direct are now offering you a range of unlocked outright phones, including top of the line models like the Samsung Galaxy S8<br />
                          <a style="text-align:left; color:gray; font-size:10px; text-decoration:none; text-align:right;" href="?content=orderforms">read more...</a></div></td>
                      </tr>
                       <tr>
                        <td align="left" height="45px"><div align="left" style="padding-left:5px; font-size:10px;"><span class="title"> <strong>Zume 5 and Pixi 4</strong></span><br />
                          Telstra have introduced the Pixi 4 to their prepaid range, while Boost Mobile brings the Boost Zume 4.<br />
                          <a style="text-align:left; color:gray; font-size:10px; text-decoration:none; text-align:right;" href="http://www.technologica.com.au/?content=telstra_prepaidplus_mobile">read more...</a></div></td>
                      </tr>
                      <tr>
                        <td align="left" height="45px"><div align="left" style="padding-left:5px; font-size:10px;"><span class="title"> <strong>New Phones added to range</strong></span><br />
                          technologica is proud to add the Samsung Galaxy J1 Mini, the Samsung Galaxy J3 and the Telstra 4GX Smart to our range of prepaid mobiles.<br />
                          <a style="text-align:left; color:gray; font-size:10px; text-decoration:none; text-align:right;" href="http://www.technologica.com.au/?content=telstra_prepaidplus_mobile">read more...</a></div></td>
                      </tr>
                        <tr>
                        <td align="left" height="45px"><div align="left" style="padding-left:5px; font-size:10px;"><span class="title"> <strong>Telstra 4GX Plus and Telstra 4GX HD Prepaid</strong></span><br />
                          Telstra has introduced two great new phones, the 4GX Plus featuring a 5 inch screen and 1.1GHz processor, and the 4GX HD with a crystal clear HD IPS display and 8MP camera<br />
                          <a style="text-align:left; color:gray; font-size:10px; text-decoration:none; text-align:right;" href="?content=news">read more...</a></div></td>
                      </tr>


                    </table>
</div>!-->
                   <!-- <div id="offers" style="background-color:#fd3030;">
                     <table border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <th width="165" valign="top"><div align="left" style="color:white;">Announcement</div></th>
                      </tr>
                      <tr>
                        <td align="left" height="20px"><div align="left" style="padding-left:5px; font-size:10px; color:white;">
                          <p>Price changes apply to the Telstra 4GX USB+WiFi Plus E8372</p> Click read more to get the price protection form.
                          <strong><br />
                            <a style="color:black; font-size:10px; text-decoration:none; text-align:right;" href="?content=admin">read more...</a></p>
                        </div></td>
                      </tr>
                     </table>
</div> -->
            <div align="center" style="vertical-align:middle;"></div>
              </td>
				<!-- Main Content -->
				<td width="590" align="center" valign="top">

				  <div id="content">

						<?php
						if (isset($_GET['content']))
							$content = $_GET['content'];
						else $content = "home";

						require("$content.php");
						?><br />
<br />

					</div>

					</td>

				<!-- Right Side -->
				<td  class="hideme" valign="top">

					<div id="rightSide">

					  <div id="login">

							<?php
							if(!isset($_SESSION['logged'])) { ?>

								<form style="display:inline;" action="" method="post">
									<table width="165" border="0" cellpadding="0" cellspacing="0">
										<tr>
											<th> Login </th>
										</tr>
										<?php
										if (isset($login_error)) { ?>
											<tr>
												<td style="color: red; font-weight: bold"> Invalid Login </td>
											</tr> <?php
										}
										?>
										<tr>
											<!-- <td> Customer Type: </td>
										</tr>
										<tr>
											<td>
<select name="clientcategory">
													<!--
														option value="1">technologica</option>
													<option value="2" selected="selected">CD-Prepaid</option>
													<option value="3">CD-Employee</option>
</select></td> -->
										</tr>
										<tr>
											<td> Customer ID: </td>
										</tr>
										<tr>
											<td>
												<input type="text" name="username" />											</td>
										</tr>
										<tr>
											<td <?php if ($login_error === "true") print "style='color: red'"; ?>> Password: </td>
										</tr>
										<tr>
											<td>
												<input type="password" name="password" />											</td>
										</tr>
										<tr>
											<td> <input type="submit" name="Login" value="Login" />
<div style="font-size:9px; padding-top:5px; padding-bottom:5px;"><em>Forgot password?</em><br />
<a style="color:white; text-decoration:none;" href="mailto:webmaster@technologica.com.au">webmaster@technologica.com.au</a></div>
</td></tr></table>
</form>
<?php } else { ?>
	<table cellpadding="0" cellspacing="0" border="0" width="165px;">
									<tr>
										<th> Logged In </th>
									</tr>
									<tr>
										<td valign="middle" align="center" style="padding-bottom:10px;"> <?php
											if (isset($_SESSION['userdetails']['ClientCategory']))
												print "<p style='font-size: 10px; padding-top:10px;'> You are logged in as: <br><b>" .$_SESSION['userdetails']['CompanyName'] ."</b><br>".$_SESSION['userdetails']['ContactName'] ."</p>";
											else if (isset($_SESSION['userdetails']['RepresentativeID']))
												print "<p style='font-size: 10px; padding-top:10px;'>You are logged in as: <b><br>" .$_SESSION['userdetails']['Rep_name'] ."</b></p>";

											print "<p style='font-size: 10px;'> You have logged in " .$_SESSION['userdetails']['LoginCount'] ." times. </p>";
											if ($_SESSION['userdetails']['LastLogin'] !== "")
												print "<p style='font-size: 10px;'> Your last login was on " .$_SESSION['userdetails']['LastLogin'] .". </p>";
											else print "<p style='font-size: 10px;'> Your last login is unknown. </p>";
											?>
											<form style="display:inline;" action="index.php?content=home" method="post"><input type="submit" name="Logout" value="Logout" />
											</form></td>
									</tr>
						</table> <?php
							}
							?>
					  </div>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <!-- <td><img src="images/spacer.gif" width="50" height="2" /><br />
<a href="index.php?content=question"><img align="top" src="images/question_clickhere.gif" alt="question_comment" width="180" height="100" border="0"/></a>
    <img src="images/spacer.gif" width="50" height="2" /></td> -->
  </tr>
  <tr>
    <td><form style="display:inline;" method="post" action="http://oi.vresp.com?fid=800b7516b2" target="vr_optin_popup" onSubmit="window.open( 'http://www.verticalresponse.com', 'vr_optin_popup', 'scrollbars=yes,width=600,height=450' ); return true;" >
<div id="mailing"><table width="165" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th>Newsletter</th>
  </tr>
  <tr>
    <td>Email Address:</label>
    <span style="color: #f00">* </span></td>
  </tr>
  <tr>
    <td><input name="email_address"/></td>
  </tr>
  <tr>
    <td>First Name:</td>
  </tr>
  <tr>
    <td>
      <input name="first_name"/></td>
  </tr>
  <tr>
    <td>Last Name:</td>
  </tr>
  <tr>
    <td><input name="last_name"/></td>
  </tr>
  <tr>
    <td>Product(s) of Interest:</td>
  </tr>
  <tr>
    <td><select name="ProductGroup" style="font-size:10px;">
        <option value="Telecommunications" selected="selected">Telecommunications</option>
        <option value="Photographics">Photographics</option>
        <option value="Entertainment">Entertainment</option>
        <option value="Memory &amp; Media">Memory / Media </option>
        <option value="Gift Cards">Gift Cards</option>
      </select></td>
  </tr>
  <tr>
    <td style="padding-bottom:5px;"><input type="submit" value="Join Now" /></td>
  </tr>
</table>
</div>
      </form><img src="images/creditcard_logos.gif" width="175" height="59" alt="creditcardlogos" />
      </td>
  </tr>
  </table>

</div>
                    </td>
			</tr>
	  </table>
	</div> <div id="mobcontent" style="">

					<table>

					<tr>
<td>
						<?php
						if (isset($_GET['content']))
							$content = $_GET['content'];
						else $content = "home";

						require("$content.php");
						?><br />
<br />
</table></div>
					</div>
     <div id="footer">
          <div class="wrap">
               <table cellpadding="0" cellspacing="0" border="0"  width="100%" bgcolor="white" >
				<tr>
					<td align="left">&copy; Technologica Pty Ltd | <a style="padding-left:5px; padding-bottom:10px;" href="index.php?content=terms"> Terms and Conditions </a> | <a href="index.php?content=privacy">Privacy Policy </a></td>
				  <td> <a href="index.php?content=privacy"></a> </td>
				  <td align="right">Designed by <b style="padding-right:5px;">Technologica</b></td>
			  </tr>
			</table>
          </div>
     </div>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){

  $('.single-item').slick({
  autoplay: true,
  autoplaySpeed: 2000,
  });
  $('.single-item2').slick({
  autoplay: true,
  autoplaySpeed: 3500,
  });
});
</script>
<script type="text/javascript">
$(window).load(function() {
  // When the page has loaded
  $("single-item").fadeIn(120);
});
</script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-1391194686341149",
    enable_page_level_ads: true
  });
</script></body>
<?php
  while (@ob_end_flush());
?>
</html>
