<? 
ini_set("display_errors","0");
ini_set("session.save_handler", "files");
session_save_path ("/clientdata/clients/c/-/c-direct.com.au/www");
include("sqlloginscript.php");
include("addon/class.phpmailer.php");
session_start();

ob_start();

$ip = $_SERVER['REMOTE_ADDR'];
$url = $_SESSION['badurl'];
$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$agent = $_SERVER['HTTP_USER_AGENT'];
$port = $_SERVER['REMOTE_PORT'];

$sql= "INSERT INTO SuspectIP (ip, url, host, agent, port, date) VALUES ('$ip', '$url', '$host', '$agent', '$port', NOW())";
mysql_query($sql);

$mail = new PHPMailer();
$mail->IsSendmail();

/* Subject */
$mail->Subject = "C-Direct Hacking Attempt";

/* From details */
$mail->From = "alert@c-direct.com.au";
$mail->FromName = "Alert";

/* Send as html */
$mail->IsHTML(true);

/* Send to address */
$mail->AddAddress("rnaughton@c-direct.com.au", "Ryan Naughton");

/* Content */
$body = "<html>
				<head>
					<title> C-Direct Hacking Attempt </title>
					<style type='text/css'>
					body { font-family: Verdana; font-size: 11px; color: #666666; }
					</style>
				</head>
				
				<body>
					<p>An attempt to hack C-Direct has been made by;</p>
					<ul>
						<li><b>IP:</b> $ip</li>
						<li><b>Host:</b> $host</li>
						<li><b>Port:</b> $port
						<li><b>Attempted URL:</b> $url</li>
						<li><b>User Agent:</b> $agent</li>
					</ul>
					<p>Login to SuspectID for more information</p>
				</body>
			</html>";
$mail->Body = $body;

$mail->Send();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Access Denied - <?php print $_SESSION['badurl']; ?></title>
</head>
<body style="background-image:url(images/403/ix_bg.jpg); background-repeat:repeat-x;">
<table height="100%" width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td height="100">&nbsp;</td>
	</tr>
	<tr>
		<td align="center" height="500">
			<table align="center" width="700" height="500" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0" style="border-style:outset; border-width:thin; border-bottom-color:#000000">
				<tr>
					<td colspan="3" style="font-size:12px; font-family: Verdana, Arial, Helvetica, sans-serif;" align="right" height="40px">&nbsp;
						
					</td>
				</tr>
				<tr valign="middle">
					<td width="33%" align="center" height="200">
						<a href="http://www.asio.gov.au" target="_blank">
							<img src="images/403/ASIOart.jpg" width="118" height="58" alt="Australian Security Intelligence Office" border="0" />
						</a>
					</td>
					<td align="center">
						<a href="http://www.afp.gov.au" target="_blank">
							<img src="images/403/fedpolice.jpg" alt="Australian Federal Police" border="0" />
						</a>
					</td>
					<td width="33%" align="center">
						<a href="http://www.police.vic.gov.au" target="_blank">
							<img src="images/403/vicpolice.jpg" alt="Victorian Police" width="168" height="98" border="0" />
						</a>
					</td>
				</tr>
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="3" align="center" style="font-size:12px; font-family:Verdana, Arial, Helvetica, sans-serif;" height="150">
						<div style="padding-left:110px; padding-right:110px;" align="center">
							<p><strong>Access to the following URL <?php print $_SESSION['badurl']; ?> has been denied.</strong></p>
							<div align="justify">
							The following details have been recorded and forwarded to the above law enforcement agencies to be 
							investigated. 
						    </div>
						</div>
						<div style="padding-left:135px; padding-right:110px; padding-top:20px" align="left">
							IP Address: <?php print $_SERVER['REMOTE_ADDR']; ?><br />		
							ISP Host: <?php print gethostbyaddr($_SERVER['REMOTE_ADDR']); ?><br />
							User Agent: <?php print $_SERVER['HTTP_USER_AGENT']; ?> <br />
							Port Used: <?php print $_SERVER['REMOTE_PORT']; ?><br />
							Date: <?php print date("r"); ?>
						</div>
						<div style="padding-left:110px; padding-right:110px; padding-top:20px" align="justify">
							Any actions deemed to be unlawful will be prosecuted ...
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="3" style="font-size:12px; font-family: Verdana, Arial, Helvetica, sans-serif;" align="right" height="80px">&nbsp;
						
					</td>
				</tr>
			</table>
		
		</td>
	</tr>
	<tr>
		<td height="100">&nbsp;</td>
	</tr>
</table>
</body>
</html>
<? ob_end_flush(); ?>