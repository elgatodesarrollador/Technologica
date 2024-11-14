<?php
@session_start();
//================================================
// Mailcode is copyright (c)2007, Scott J. LeCompte
// 
// Released 03/05/2010 under GNU Public Licensing 
// Terms.  Free to use, modify, and distribute.
//
// Support available at http://www.myphpscripts.net
//================================================

include('mailcode-includes/config.php');
$userip = $_SERVER['REMOTE_ADDR'];

if (!isset($_POST['submit'])) {

// ===============================================
// The form below may be edited to add form fields.
// =============================================== 
?>
<script language="javascript">
	function updateimage(){
		document.getElementById('captcha').src='mailcode-includes/captcha.php?'+Math.random();
	}
</script>

<table cellpadding="5" width="500" style="border:solid; border-color:grey; border-width:1px; color:white;">
	<tr>
		<td bgcolor="#017cb5" colspan="2" align="left">
			<form enctype="multipart/form-data" action="<?php echo 'index.php?content=question' ?>" method="post">
				<input type="hidden" name="address" value="<?php echo $userip; ?>" /><br />
				Name:<br />
				<input type="text" name="name" size="40" class="formcontent">
				<br />
				<img src="images/spacer.gif" alt="spacer" width="80" height="7" /><br />
Company Name<br />
                <input type="text" name="company" size="40" class="formcontent" />
                <br />
                <img src="images/spacer.gif" alt="spacer" width="80" height="7" /><br />
Telephone:<br />
                <input type="text" name="phone" size="40" class="formcontent" />
<br />
                <img src="images/spacer.gif" alt="spacer" width="80" height="7" /><br />
Account Number (if applicable)<br />
                <input type="text" name="account_no" size="40" class="formcontent" />
eg. PP1234/CD1234               <br />
                <img src="images/spacer.gif" alt="spacer" width="80" height="7" /><br />
Email:<br />
              <input type="text" name="email" size="40" class="formcontent" />
<br />
				<img src="images/spacer.gif" alt="spacer" width="80" height="7" /><br />
Preferred method of contact:<br>
				<select name="contact_method" class="formcontent" id="contact_method">
				  <option value="Phone">Phone</option>
				  <option value="Email">Email</option>
              </select>
              <br />
              <img src="images/spacer.gif" alt="spacer" width="80" height="7" /><br />
Enquiry Type:<br />
                <select name="enquiry_type" class="formcontent" id="enquiry_type">
                  <option value="Account Enquiry">Account Enquiry</option>
                  <option value="Order Enquiry">Order Enquiry</option>
                  <option value="New Account">New Account</option>
                  <option value="General Enquiry">General Enquiry</option>
                  <option value="Product Enquiry">Product Enquiry</option>
                </select>
              <br />
              <img src="images/spacer.gif" alt="spacer" width="80" height="7" /><br />
State:<br />
				<select name="state" class="formcontent" id="state">
                  <option value="VIC" selected="selected">VIC</option>
                  <option value="NSW">NSW</option>
                  <option value="QLD">QLD</option>
                  <option value="TAS">TAS</option>
                  <option value="SA">SA</option>
                  <option value="NT">NT</option>
                  <option value="ACT">ACT</option>
                  <option value="SA">SA</option>
                  <option value="WA">WA</option>
</select>
              <br />
              <img src="images/spacer.gif" alt="spacer" width="80" height="7" /><br />
Join the newsletter mailing list:
              <select name="mailinglist" class="formcontent" id="mailinglist">
                <option value="Yes" selected="selected">Yes</option>
                <option value="No">No</option>
              </select>
              <br />
              <img src="images/spacer.gif" alt="spacer" width="80" height="7" /><br />
Do you require a sales representative to contact you:
              <select name="sales_rep" class="formcontent" id="sales_rep">
                <option value="Yes">Yes</option>
                <option value="No" selected="selected">No</option>
              </select>
<br />				
				<img src="images/spacer.gif" alt="spacer" width="80" height="7" /><br />
<?php
				// ========================================================================================
				// Begin Attachments: Do Not Delete This Section.  Enable/Disable attachments in script config.
				// ========================================================================================
				if ($attachments == 1) {				
					echo str_repeat('
					Attachment:<br><input type="file" name="attachment[]" size="28">
					<input type="hidden" name="MAX_FILE_SIZE" value="' . $max_file_size . '"><br>
					',$uploads);
				}
				// ========================================================================================
				// End Attachments 
				// ======================================================================================== 
				?>Questions/Comments:<br />
				<textarea name="message" rows="5" cols="60"></textarea><br />
				Security Code:<br />
				<img src="mailcode-includes/captcha.php" name="captcha" id="captcha" alt="Security Code" title="Security Code" /><br />
				Type the Code:<br />
				<input id="security_code" name="security_code" type="text" />
				<input type="submit" name="submit" value="Send" />
				<input type="reset" value="Clear" />
		      <br /><a style="color:white" href="javascript:updateimage();">Click Here</a> for a new code.
			  <br />
			  <br />
            </form>
		</td>
	</tr>
	<tr>
	  <td bgcolor="white" style="color:black;"><strong style="color:#004eaf">Alternative Contact Details</strong><br />
	    <br />
	    <strong>Head Office:</strong> <br />
	    243A Lower Heidelberg Road <br />
	    East Ivanhoe, Victoria 3079 <br />
	    <br />
	    <strong>Postal Address:</strong> <br />
	    P.O. BOX 2074 <br />
	    East Ivanhoe, Victoria, 3079</td>
	  <td bgcolor="white" style="color:black;"><strong><br />
	    <br />
	    Phone:</strong> <br />
	    (03) 9499 7771 <br />
	    1300 785 506<br />
	    <br />
	    <strong>Fax:</strong><br />
	    (03) 9499 7993 <br />
	    1300 785 505 </td>
  </tr>
</table>

<?php
// ====================================================== //
// ============= Do Not Edit Below This Line =============== //
// ===================================================== //
}
else {
	function check_email_address($email) {
		// First, we check that there's one @ symbol, and that the lengths are right
		if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
			// Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
			return false;
		}
		// Split it into sections to make life easier
		$email_array = explode("@", $email);
		$local_array = explode(".", $email_array[0]);
		for ($i = 0; $i < sizeof($local_array); $i++) {
			if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
				return false;
			}
		}  
		if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
			$domain_array = explode(".", $email_array[1]);
			if (sizeof($domain_array) < 2) {
				return false; // Not enough parts to domain
			}
			for ($i = 0; $i < sizeof($domain_array); $i++) {
				if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
					return false;
				}
			}
		}
		return true;
	}
	$boundary = md5(date('r', time()));
	$msg = "This is a multi-part message in MIME format.\n\n";
	$msg .= "--$boundary\n";
	if ($html == 1) {
		$msg .= "Content-Type: text/html; charset=utf-8; format=flowed; delsp=yes\n";
	}
	else {
		$msg .= "Content-Type: text/plain; charset=utf-8; format=flowed; delsp=yes\n";
	}
	$msg .= "Content-Transfer-Encoding: 7bit\n\n";
	if ($html == 1) {
		$msg .= "<p>$intro</p>";
	}
	else {
		$msg .= "$intro\n";
	}
	foreach ($_POST as $key => $string) {
		$posted[] = $key;
		if (!is_array($string)) {
			$value = stripslashes($string);
		}
		else {
			$arrayCount = count($string);
			$oldValue = NULL;
			foreach ($string as $arrayKey => $arrayValue) {
				$oldValue .= $arrayValue . ', ';
			}
			$value = $oldValue;
		}
		if (in_array($key,$formval) && ($value == NULL || $value == '')) {
			$results[] = ucfirst($key) . " cannot be blank!";
			$bademail = true;
		}
		if ($key == "email" && !check_email_address($value)) { 
			$results[] = "Invalid email address!";
			$bademail = true; 
		}
		if($key == "security_code" && $value != ($_SESSION['security_code'])) {
			$results[] = "Wrong security code!";
			$bademail = true;
		}			
		if ($key != "security_code" && $key != "submit" && $key !="MAX_FILE_SIZE" && $key != "message") {
			if ($html == 1) {
				$msg .= ucfirst($key) . " : " . $value . "<br/>";
			}
			else {
				$msg .= ucfirst($key) . " : " . $value . "\n";
			}
		}
		if ($key == "name") {
			$name = $value;
		}
		if ($key == "email") {
			$headers = "From: " . $name . " <" . $value . ">\n";
			$headers .= "Reply-To: " . $value . "\n";
			$headers .= "Return-Path: " . $value . "\n";
			$headers .= "Envelope-from: " . $value . "\n";
			$headers .= "MIME-Version: 1.0\n";
			$headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\n";		
		}
		if ($key == "message") {
			$message = "\n\n$value\n";
		}
	}
	foreach ($formval as $string) {
		if (!in_array($string,$posted)) {
			$results[] = ucfirst($string) . " cannot be blank!";
			$bademail = true;
		}
	}
	$msg .= $message;
	if ($attachments == 0) {
		$msg .= "--$boundary--\n";
	}
	else if (isset($_FILES['attachment']) && $attachments == 1) {
		foreach ($_FILES["attachment"]["error"] as $key => $error) {
			if ($error == UPLOAD_ERR_OK) {
				echo"$error_codes[$error]";
				if (move_uploaded_file($_FILES["attachment"]["tmp_name"][$key], 'tmp/' . 			 					$_FILES["attachment"]["name"][$key]) or die("Problems with upload")) {
					$file_upload = true;
					$tmp_path = 'tmp/' . $_FILES["attachment"]["name"][$key];
					$file = fopen($tmp_path,'rb');
					$data = fread($file,filesize($tmp_path));
					fclose($file);				
				}
				$attachment = chunk_split(base64_encode($data));
				$attachment_name = $_FILES['attachment']['name'][$key];
				$attachment_type = $_FILES['attachment']['type'][$key];
				$attachment_size = $_FILES['attachment']['size'][$key];
				$file_extension = strtolower(substr(strrchr($attachment_name,"."),1));
				$msg .= "\n--$boundary\n";
				$msg .= "Content-Type: $attachment_type; name=\"$attachment_name\"\n"; 
				$msg .= "Content-Transfer-Encoding: base64\n";
				$msg .= "Content-Disposition: attachment; filename=$attachment_name\n\n\n";
				$msg .= "$attachment\n";
			}
		}
		$msg .= "\n--$boundary\n";
	}
	if ($attachments == 1 && $attachment_size > $max_file_size && $file_upload == true) {
		$results[] = 'The uploaded file size is too big!';
	}
	else if ($attachments == 1 && !in_array($file_extension, $file_types) && $file_upload == true) {
		$results[] = 'The uploaded file type is not an acceptable type!';
	}
	else if ($emailval == 1) {
		if ($bademail != true) {
			mail($to, $subject, $msg, $headers);
			$results[] = '<strong>Thank You!  Your question or comment has been submitted.../n We endeavour to answer you as quickly as possible.</strong>';
		}
	}
	if ($logging == 1) {
		$timestamp = date('Y-m-d');
		foreach ($_POST as $key => $string) {
			$value = stripslashes($string);
			if ($key == 'security_code') {
				$logmsg .= ucfirst ($key) . " : Submitted: " . $value . " => Required: " . $_SESSION['security_code'] . "\n";
			}
			else {
				$logmsg .= ucfirst ($key) . " : " . $value . "\n";
			}
		}
		$logmsg .= "\n";
		if (isset($_FILES["attachment"]["error"])) {
			foreach ($_FILES["attachment"]["error"] as $filekey => $fileerror) {
				if ($fileerror == UPLOAD_ERR_OK) {
					$logmsg .= "Attachment " . $filekey . " : " . $_FILES["attachment"]["name"][$filekey] . "\n";
				}
			}
		}
		$logmsg .= "\n";
		if ($bademail == true) {
			foreach ($results as $result) {
				$logmsg .= "Error : " . $result . "\n";
			}
			$logmsg .= "\n";
		}
		$logmsg .= "Referrer : " . $_SERVER['HTTP_REFERER'] . "\n";
		$logmsg .= "User Agent : " . $_SERVER['HTTP_USER_AGENT'] . "\n";
		if (file_exists($logpath . $timestamp . '.txt')) {
			$fh = fopen($logpath . $timestamp . '.txt', 'a+') or die( "Error opening file" );
		}
		else {
			$fh = fopen($logpath . $timestamp . '.txt', 'w') or die( "Error opening file" );		
		}
		if (!fwrite($fh, $logmsg)) { die( "Error writing to file!" ); }
		if (!fwrite($fh, "\n---------------\n\n")) { die( "Error writing to file!" ); }
		fclose($fh) or die( "Error closing file!" );
	}
	session_unregister(security_code);
}
if (file_exists($tmp_path)) {
	unlink($tmp_path);
}
if (!empty($results)) {
	echo '<ul>';
	foreach ($results as $result) {
		echo '<li>' . $result . '</li>';
	}
	echo '</ul>';
	$errors = '';
}
if ($handle = opendir('tmp/')) { 
	while (false !== ($file = readdir($handle))) { 
		if (is_file('tmp/' . $file)) {
			unlink('tmp/' . $file);
		}
	} 
	closedir($handle); 
}
?>
