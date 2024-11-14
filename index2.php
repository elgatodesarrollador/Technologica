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
	// &username=remy%20perona&password=rP123&cat=3
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
				$sql = "UPDATE Clients SET LoginCount  = LoginCount + 1, LastLogin = '$history' WHERE AccountNumber = '$username' AND State = '$password' AND ClientCategory = '$cat' LIMIT 1";
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
		$cat = $_POST['clientcategory'];

		if($cat != 3)
			$sql = "SELECT * FROM Clients WHERE AccountNumber = '$username' AND State = '$password' AND ClientCategory = '$cat' LIMIT 1";
		else $sql = "SELECT * FROM Representatives WHERE Username = '$username' AND Passwords = '$password' LIMIT 1";

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
				$sql = "UPDATE Clients SET LoginCount  = LoginCount + 1, LastLogin = '$history' WHERE AccountNumber = '$username' AND State = '$password' AND ClientCategory = '$cat' LIMIT 1";
			else $sql = "UPDATE Representatives SET LoginCount  = LoginCount + 1, LastLogin = '$history' WHERE Username = '$username' AND Passwords = '$password' LIMIT 1";

			$result = mysqli_query($mysqli, $sql);
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
			echo "Technologica | Technologic-rectory";
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
<!-- <link href="stylesheet.css" rel="stylesheet" type="text/css" />
<link href="stylesheet_other.css" rel="stylesheet" type="text/css" /> -->
<link href="newcss.css" rel="stylesheet" type="text/css">
<link href="tailwind.min.css" rel="stylesheet" type="text/css">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<!-- <script type="text/javascript">
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

</script> -->
<!-- 
<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/> -->
<link rel="icon" type="image/svg+xml" href="/favicon.svg">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body><!-- Main Container -->
<div class="page-wrap">
<!-- Header -->

 
<nav id="site-menu" style="display:flex;
      flex-flow: row wrap;grid-column:1/-1;">

<img id="main-logo" src="/images/Technologica_Logos_Vector_FA.svg" style="max-height:76px;width:auto;flex-shrink" alt="Technologica Logo" style="float:left;" /> 
<img id="small-logo" src="/techlogo.svg" style="max-height:76px;width:auto;flex-shrink" alt="Technologica Logo" style="float:left;" /> 
<header class="page-header px-0">

<div class="flex justify-start lg:w-0 lg:flex-1">
        <a href="#">
          <span class="sr-only">Technologica</span>
          <!-- <img class="h-14 w-auto sm:h-10" style="max-width 250px;"src="https://www.technologica.com.au/images/Technologica_Logos_Vector_FA.svg" alt=""> -->
        </a>
      </div>
</header>
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="relative bg-white">
  <div class="max-w-7xl mx-auto px-2 sm:px-2">
    <div style="flex-grow:1;" class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">
       
   
      <div class="-mr-0 -my-2 md:hidden">
      
      </div>
      <nav class="hidden md:flex space-x-10">
      <a href="https://www.technologica.com.au/index.php?content=aboutus" class="text-base font-medium text-gray-500 hover:text-gray-900">
          About Us
        </a>

        <div x-data="{ open: false }" x-on:click.outside="open = false" class="relative">
          <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
          <button x-on:click="open = !open" type="button" class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-expanded="false">
            <span>Mobile and Telecommunications</span>
     
            <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </button>

       
          <div x-show="open"   style="display:none;"class="absolute z-10 -ml-4 mt-3 transform px-2 w-screen max-w-md sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
            <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
              <div class="relative grid gap-4 bg-white px-5 py-6 sm:gap-4 sm:p-4">
                <a href="https://www.technologica.com.au/?content=telstra_prepaidplus_mobile" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
         
                  <div class="ml-4">
                    <p class="text-base font-medium text-gray-900">
                      Telstra Prepaid Mobile
                    </p>
                  
                  </div>
                </a>
                <a href="https://www.technologica.com.au/?content=outright_mobile" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                   <div class="ml-4">
                    <p class="text-base font-medium text-gray-900">
                     Unlocked Mobile  

                    </p>
                  
                  </div>
                </a>
                <a href="https://www.technologica.com.au/?content=boost_mobile" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                   <div class="ml-4">
                    <p class="text-base font-medium text-gray-900">
                     Boost Prepaid 

                    </p>
                  
                  </div>
                </a>

                <a href="https://www.technologica.com.au/?content=telstra_prepaidplus_starterkits" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                  <!-- Heroicon name: outline/shield-check -->
               
                  <div class="ml-4">
                    <p class="text-base font-medium text-gray-900">
                      Telstra Starter Kits
                    </p>
                    <p class="mt-1 text-sm text-gray-500">Prepaid Sims, ETC
                    </p>
                  </div>
                </a>

                <a href="https://www.technologica.com.au/?content=telstra_prepaidplus_broadband" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                  <!-- Heroicon name: outline/shield-check -->
               
                  <div class="ml-4">
                    <p class="text-base font-medium text-gray-900">
                      Mobile Broadband
                    </p>
                  </div>
                </a>

                <a href="https://www.technologica.com.au/?content=beyond" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                  <!-- Heroicon name: outline/shield-check -->
               
                  <div class="ml-4">
                    <p class="text-base font-medium text-gray-900">
                      Accessories
                    </p>
                  </div>
                </a>

              </div>
            </div>
          </div>
        </div>

        <div x-data="{ open: false }" x-on:click.outside="open = false" class="relative">
    
          <button x-on:click="open = !open" type="button" 
          class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
           aria-expanded="false">
            <span>Other Products</span>
        
            <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </button>

     
          <div x-show="open"   x style="display:none;"class="absolute z-10 -ml-4 mt-3 transform px-2 w-screen max-w-md sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
            <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
              <div class="relative grid gap-4 bg-white px-5 py-6 sm:gap-4 sm:p-4">
              <a href="https://www.technologica.com.au/?content=eveready" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
              
              <div class="ml-4">
                <p class="text-base font-medium text-gray-900">
                 Batteries
                </p>
              
            </a>

            <a href="https://www.technologica.com.au/?content=verbatim" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
              
              <div class="ml-4">
                <p class="text-base font-medium text-gray-900">
                 Verbatim Memory
                </p>
              
              </div>
            </a>
            <a href="https://www.technologica.com.au/?content=reolink" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
              
              <div class="ml-4">
                <p class="text-base font-medium text-gray-900">
                 REOLink
                </p>
              
              </div>
            </a>
            <a href="https://www.emovietickets.com.au" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
              
              <div class="ml-4">
                <p class="text-base font-medium text-gray-900">
                 Movie Tickets
                </p>
              
              </div>
            </a>
            <a href="https://www.technologica.com.au/?content=laserco" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
              
              <div class="ml-4">
                <p class="text-base font-medium text-gray-900">
                 LASER products
                </p>
              
              </div>
            </a>
            <a href="https://www.technologica.com.au/?content=pacific_brands" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
              
              <div class="ml-4">
                <p class="text-base font-medium text-gray-900">
                 Hanes/Pacific Brands
                </p>
              
              </div>
            </a>
            <a href="https://www.technologica.com.au/?content=samsierra" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
              
              <div class="ml-4">
                <p class="text-base font-medium text-gray-900">
                 High Sierra/Samsonite
                </p>
              
              </div>
            </a>
            <a href="http://www.anystoregiftcard.com.au/" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
              
              <div class="ml-4">
                <p class="text-base font-medium text-gray-900">
                 Visa/EFTPOS Cards
                </p>
              
              </div>
            </a>
</div></div></div></div></div>
<a href="https://www.technologica.com.au/index.php?content=question" class="text-base font-medium text-gray-500 hover:text-gray-900">
          Contact
        </a>
        <a href="https://www.technologica.com.au/index.php?content=neworder" class="text-base font-medium text-gray-500 hover:text-gray-900">
          Order Forms
        </a>
        <div x-data="{ open: false }" x-on:click.outside="open = false" class="relative">
          <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
          <button x-on:click="open = !open" type="button" class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" style="left:-130px;" aria-expanded="false">
            
            <?php if(!empty($_SESSION['userdetails']['Rep_name'])) { ?>
  <a style="" href="#">Employee</a>
 
  <?php	} else{
    
?>
<span>Login</span>
<?php } 
?>
            <!--
              Heroicon name: solid/chevron-down

              Item active: "text-gray-600", Item inactive: "text-gray-400"
            -->
            <svg :class="{'rotated': open}" class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </button>

          <!--
            'More' flyout menu, show/hide based on flyout menu state.

            Entering: "transition ease-out duration-200"
              From: "opacity-0 translate-y-1"
              To: "opacity-100 translate-y-0"
            Leaving: "transition ease-in duration-150"
              From: "opacity-100 translate-y-0"
              To: "opacity-0 translate-y-1"
          -->
          <div  x-show="open"    style="display:none;transform:translate(-90%,10%);" class="absolute z-10 left-1/2 mt-3 px-2 w-screen max-w-md sm:px-0">
            <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
              <div  class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                
<div class="rounded-lg">
    <div class="bg-gray-200 rounded-lg w-auto">   
        <?php   
        if(!isset($_SESSION['logged'])) {             
            ?>            
        <div class="px-5 py-3 mb-10 text-center">            
            <form style="display:inline;" action="" method="post">
            <div class="mb-4 text-2xl font-bold text-purple-600 uppercase">Login</div>
                      
            <span class="text-sm">
                Customer type:<br>
            </span>
            
<select name="clientcategory">
                            <!--<option value="1">technologica</option>!-->
                            <option value="2" selected="selected">CD-Prepaid</option>
                            <option value="3">CD-Employee</option>
</select>                
                 <br>  Customer ID: <br>
             
                        <input type="text" name="username" /><br>
                        <span
                     <?php if ($login_error === "true") print "style='color: red'"; ?> /> Password:<br> </span>
              
                        <input type="password" name="password" />	
                        <br>
                   
<div style="font-size:9px; padding-top:5px; padding-bottom:5px;"><em>Forgot password?</em><br />
<a style="color:black; text-decoration:none;" href="mailto:webmaster@technologica.com.au">webmaster@technologica.com.au</a></div>

            </div>
            <?php
                if (isset($login_error)) { ?>
                   
                       <div class="w-full rounded-4-lg text-lg font-extrabold text-gray-100 bg-red-600"> Invalid Login </div>
                
        <?php 
                }?>
        <button
            class="w-full h-16 text-lg font-extrabold text-gray-100 transition duration-300 bg-purple-600 rounded-b-lg hover:bg-purple-700" type="submit" name="Login" value="Login">LOG IN</button>		
   
    <?php
        }else { 
        ?>



                <div class="w-full p-8 text-xl font-extrabold text-gray-100 bg-purple-600 rounded-t-lg">    <?php
                    if (isset($_SESSION['userdetails']['ClientCategory']))
                        print "<p> logged in as: <b>" .$_SESSION['userdetails']['CompanyName'] ."</b><br>".$_SESSION['userdetails']['ContactName'] ."</p>";
                    else if (isset($_SESSION['userdetails']['RepresentativeID']))
                        print "<p>logged in as: <b>" .$_SESSION['userdetails']['Rep_name'] ."</b></p>";

                    // print "<p> You have logged in " .$_SESSION['userdetails']['LoginCount'] ." times. ";
                    // if ($_SESSION['userdetails']['LastLogin'] !== "")
                    //     print " Your last login was on " .$_SESSION['userdetails']['LastLogin'] .". </p>";
                    // else print "<p style=''> Your last login is unknown. </p>";
                    ?> </div>
                <div class="p-4 normal-case text-sm">
              
                    <?php if(!empty($_SESSION['userdetails']['Rep_name'])) { ?>
  
  <a href="?content=employee/online_administration"><button class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 my-2 rounded">Online Administration</button></a><br>
  <a href="?content=employee/order_forms">          <button class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">Order Forms</button></a><br>
  </ul>
  <?php	} ?>
                   
        </div>
        <form style="display:inline;" action="index.php?content=home" method="post">
        
        <button 
            class="w-full h-16 text-lg font-extrabold text-gray-100  duration-300 bg-purple-600 rounded-b-lg hover:bg-purple-700" type="submit" name="Logout" value="Logout" >LOG OUT</button>
            </form>

    <?php
  

}
    ?>
        </div>
                   
        </div>
        </div>
      </nav>
    
    </div>
  </div>

  <!--
    Mobile menu, show/hide based on mobile menu state.

    Entering: "duration-200 ease-out"
      From: "opacity-0 scale-95"
      To: "opacity-100 scale-100"
    Leaving: "duration-100 ease-in"
      From: "opacity-100 scale-100"
      To: "opacity-0 scale-95"
  -->
  <div id="mobmenu" x-data="{ open: false }" x-on:click.outside="open = false" class="relative">
    
          <button x-on:click="open = !open" type="button" class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-expanded="false">
            <span>Other Products</span>
            <div style="top:30px;"  class="grid gap-4 bg-white px-5 py-6 sm:gap-4 sm:p-4 absolute bg-gray-100 rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden" x-show="open" x-transition >
                <!-- <ul id="sidebarmenu1">
                  <?php if(!empty($_SESSION['userdetails']['Rep_name'])) { ?>
                    <li><a style="color:#fdcb02" href="#">Employee</a>
                    <ul>
                    <li><a href="?content=employee/online_administration">Online Administration</a></li>
                    <li><a href="?content=employee/order_forms">Order Forms</a></li>
                    <li><a href="?content=employee/conference_photos">Conference Photos</a></li>
                    </ul>
                    <?php	} ?>
                    </ul> -->
                    <div class="relative grid gap-4 bg-white px-5 py-6 sm:gap-4 sm:p-4">
                     <a href="https://www.technologica.com.au/?content=telstra_prepaidplus_mobile" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
         
                  <div class="ml-4">
                    <p class="text-base font-medium text-gray-900">
                      Telstra Prepaid Mobile
                    </p>
                  
                  </div>
                  </a>
                 
          </div>

</div>
</div>

</nav>


 <!-- <nav id="site-menu" class="page-nav flex flex-col sm:flex-row w-full justify-between items-center px-4 sm:px-6 py-1 bg-white shadow sm:shadow-none border-t-4 ">
 <ul class="topmenu" style="display:inline-flex; padding:5px;">
    <li><a href="index.php?content=home"> HOME </a> </li>
       <li> <a href="index.php?content=aboutus"> ABOUT US </a> </li>
	<li> <a href="index.php?content=admin"> ADMIN </a> </li>
         <li><a href="index.php?content=orderforms">ORDER FORMS </a> </li>
	<li ><a href="#"> Mobile and Telecommunications</a>
                <ul style="position:absolute;" class="dropdown">
                    <li> <a href="#">Unlocked Mobile  </a></li>
                    <li> <a href="#">Telstra Pre Paid</a></li>
                    <li> <a href="#">Boost Mobile</a></li>
                    <li> <a href="#">Telstra Starter Kits</a></li>
                    <li> <a href="#">Mobile Accessories</a></li>
                </ul></li>
                <li> Other Products</li>
                <li> <a href="index.php?content=question"> CONTACT </a> </li>
</ul>
<div x-data="{ open: false }" x-on:click.outside="open = false">
<button x-on:click="open = !open">
  My Account
  
  <span :class="{'rotated': open}">&raquo;</span>
</button>
<ul style="position:absolute" x-show="open">
  <li><a href="#">Edit Profile</a></li>
  <li><a href="#">Settings</a></li>
  <li><a href="#">Log Out</a></li>        
</ul>
</div>
     </nav> -->



  <main class="page-main normal-case">
      <div>
  <?php
						if (isset($_GET['content']))
							$content = $_GET['content'];
						else $content = "home";

						require("$content.php");
						?><br />
<br />
    <!-- <article>
      <details>
        <summary>Article</summary>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos laborum cumque incidunt, enim ipsa dicta? Porro illo doloribus, consectetur eum exercitationem sit ipsam, est nesciunt maxime, eius animi dolor? Harum.</p>
        <p>Commodi culpa deserunt dolor sed, ipsam tempore ullam architecto fuga voluptas, quis veniam. Vitae veniam, odit adipisci, quas similique debitis excepturi quisquam minima facere temporibus, porro optio perferendis iusto fuga.</p>
        <p>Illo numquam, sapiente neque repellendus facere amet doloribus asperiores quia eum? Sunt vero amet neque vel? Tempora, nulla voluptatum amet autem culpa magnam debitis! Dolores esse quam amet nobis ut.</p>
        <p>Sunt excepturi in nostrum, fugiat veritatis ab sit sequi nemo aperiam deserunt temporibus, dolorem ex adipisci autem. Quasi, iure fugiat! Nulla amet doloribus velit nam tempora, soluta consequatur doloremque omnis?</p>
        <p>Officia ea repellat ad, sapiente eligendi modi magni quos temporibus totam culpa corporis, dignissimos quibusdam mollitia dolore eaque suscipit soluta beatae ipsam! Aperiam doloremque vero soluta pariatur possimus. Cupiditate, fuga.</p>
        <p>Beatae deserunt veritatis magni quis quae enim ad est dignissimos iste, quidem, dolores temporibus asperiores natus inventore, nobis eius facere adipisci doloremque eligendi autem magnam excepturi? Inventore, iusto soluta. Maiores.</p>
        <p>Enim facilis aspernatur, maiores unde at inventore temporibus minima possimus eveniet? Cum alias, asperiores quibusdam doloribus, vel ullam qui in dicta recusandae eaque atque dolor perspiciatis tenetur, fugit vero reprehenderit.</p>
        <p>Reiciendis, deleniti eius nostrum fugit commodi quasi esse molestias non voluptates, corrupti excepturi voluptatibus, consequatur ipsa animi placeat quia corporis ut itaque quos pariatur inventore. Quasi incidunt sapiente quisquam soluta?</p>
        <p>Laboriosam eos atque possimus assumenda quia voluptatem saepe optio, eveniet laborum. Sit esse doloremque laboriosam? Ullam inventore ut facilis accusamus, ipsum, autem labore incidunt consequatur eos dolorem, sit aperiam odit.</p>
        <p>Consequuntur pariatur illum doloremque, necessitatibus praesentium quis cumque officiis non commodi reprehenderit quaerat velit saepe impedit vitae dolores, veritatis reiciendis ducimus nobis totam, itaque porro temporibus excepturi error iste! Sunt.</p>
        <p>Commodi culpa deserunt dolor sed, ipsam tempore ullam architecto fuga voluptas, quis veniam. Vitae veniam, odit adipisci, quas similique debitis excepturi quisquam minima facere temporibus, porro optio perferendis iusto fuga.</p>
        <p>Illo numquam, sapiente neque repellendus facere amet doloribus asperiores quia eum? Sunt vero amet neque vel? Tempora, nulla voluptatum amet autem culpa magnam debitis! Dolores esse quam amet nobis ut.</p>
        <p>Sunt excepturi in nostrum, fugiat veritatis ab sit sequi nemo aperiam deserunt temporibus, dolorem ex adipisci autem. Quasi, iure fugiat! Nulla amet doloribus velit nam tempora, soluta consequatur doloremque omnis?</p>
        <p>Officia ea repellat ad, sapiente eligendi modi magni quos temporibus totam culpa corporis, dignissimos quibusdam mollitia dolore eaque suscipit soluta beatae ipsam! Aperiam doloremque vero soluta pariatur possimus. Cupiditate, fuga.</p>
      </details>
    </article> -->
  </main>
   
</div>

  <footer class="page-footer">
  Technologica Pty Ltd <a style="padding-left:5px; padding-bottom:10px;" href="index.php?content=terms"> Terms and Conditions </a> | <a href="index.php?content=privacy">Privacy Policy </a></td>
				  <td> <a href="index.php?content=privacy"></a>
  </footer>
</div> 

				
                    </td>
		
	</div> 
					</div>
  
<!-- <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script> -->

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
