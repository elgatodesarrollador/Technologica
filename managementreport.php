<?php

ini_set("display_errors","0");
ini_set("session.save_handler", "files");
session_save_path ("/clientdata/clients/c/-/c-direct.com.au/www");
session_start();

require ("../sqlloginscript.php");

$adminArray = array();
$adminArray[] = 11;
$adminArray[] = 67;

if ($_POST['Save']) {

	$rep_id = $_SESSION['userdetails']['RepresentativeID'];
	$addedCounter = 1;
	
	// Get Date
	$date = date("Y-m-d");

	for ($i = 0; $i < 5; $i++) {
	
		$date = $_POST["date$i"];
		$manager = $_POST["manager$i"];
		$company = $_POST["company$i"];
		$project = $_POST["project$i"];
		$status = $_POST["status$i"];
		$importance = $_POST["importance$i"];
		$issue = $_POST["issue$i"];
		$comment = $_POST["comment$i"];
		$require_followup = $_POST["require_followup$i"];
		$followup = $_POST["followup$i"];
		$estend = $_POST["estend$i"];
		
		// standard date format is dd/mm/yyyy but database requires yyyy-mm-dd so reformat
		$temp_date = explode("/", $date);
		$date = $temp_date[2] ."-" .$temp_date[1] ."-" .$temp_date[0];
		
		$temp_date = explode("/", $estend);
		$estend = $temp_date[2] ."-" .$temp_date[1] ."-" .$temp_date[0];
		
		
		// If sitename is entered, add row
		if (strlen($manager) > 0) {

				$query = "INSERT INTO managementreport (rep_id, date, manager, company, project, status, importance, issue, comment, require_followup, followup, estend)
							 VALUES ('$rep_id', '$date', '$manager', '$company', '$project', '$status', '$importance', '$issue', '$comment', '$require_followup', '$followup', '$estend')";

			/* ??????????
			 * Why do you need the different queries for the require follow up
			 * because the value is retrived from the users entered information
			 * ??????????
			
			if ($require_followup === "Yes") {
				$query = "INSERT INTO managementreport (rep_id, date, manager, company, project, status, importance, issue, comment, require_followup, followup, estend)
							 VALUES ('$rep_id', '$date', '$manager', '$company', '$project', '$status', '$importance', '$issue', '$comment', '$require_followup', '$followup', '$estend')";
			}
			else {
				$query = "INSERT INTO managementreport (rep_id, date, manager, company, project, status, importance, issue, comment, require_followup, followup, estend)
							 VALUES ('$rep_id', '$date', '$manager', '$company', '$project', '$status', '$importance', '$issue', '$comment', '$require_followup', '$followup', 'no')";
			}*/
			$result = mysql_query($query);
			
			if (mysql_affected_rows() == 1)
				$userMessage .= "Row $addedCounter has been saved.<br />";
			else $userMessage .= "ERROR: Row $addedCounter could not be saved.<br />";
		}
		else $userMessage .= "No data found in row $addedCounter.<br />";

		$addedCounter++;
	}
}
else if ($_POST['Export']) {

	header("Location: employee/exportmanagementreport.php");
	exit;
}
	
?>

<html>
	<head>
   	<title> C-Direct Management Report </title>
     	<link href="managementreportstylesheet.css" type="text/css" rel="stylesheet">
      <script src="managementreport_validation.js" type="text/javascript" language="javascript"></script>
		<script type="text/javascript" language="javascript">
		<!--//
			// Set timeout
			function setTimer() {
			
				var timer = window.setTimeout(timeoutNotification, 1440000);
			}
			
			function timeoutNotification() {
			
				alert("Your session has expired.  Please login again to avoid losing unsaved entries.\nYou can login as normal from the C-Direct website, and then continue working.  You do not need to close this reporting window.");
			}
		//-->
		</script>
   </head>
   
   <body onLoad="setTimer()">
   
   	<div id="container">
      
      	<p class="title"> Management Report </p>
         
			<p class="note"> You are logged in as: <?php print $_SESSION['userdetails']['Rep_name']; ?> </p>

         <div class="info">
         	<p>
            Please use the Management Reporting System to submit your reports.
            Fill in the rows in the form below and click 'Save'.  To use the reporting system, simply fill in the fields provided.
            You may choose to 'Save' your entries a row at a time, or you can fill in all five rows, clicking 'Save' and the end.
            </p>
            <p>
            Please ensure the information you enter is correct, since it cannot be changed after it has been saved.
            </p>
            <p>
            <p> Field headings marked with an <span class="required"> * </span> are required to be entered before saving. </p>

				<p> <i> <u> Please Note: The report will timeout after a period of 20minutes if unused.  Any unsaved work will be lost. </u> </i> </p>
         </div>
            
      	<p class="note"> <?php print "$userMessage"; ?> </p>
   
         <form action="" method="post" onSubmit="return validateForm(this)">
         
            <table class="report" cellpadding="0" cellspacing="0" border="0">
            
					<tr>
               	<th colspan="11">
                  	<input type="submit" name="Save" value="Save" />
							<?php
							if (in_array($_SESSION['userdetails']['RepresentativeID'], $adminArray)) { ?>
	                  	<input type="button" value="Export" onClick="window.open('exportmanagementreport.php', '', 'width=800, height=600');" /> <?php
							} ?>                  </th>
               </tr>
               <tr>
                  <th class="detailsheading" colspan="11"> Details   </th>
               </tr>
               <tr>
                  <th class="detailsheading"> Date </th>
                  <th class="detailsheading"> <span class="required"> Manager's Name </span> </th>
                 <th class="detailsheading"> <span class="required"> Company Name</span> </th>
                  <th class="detailsheading"> <span class="required"> Project </span> </th>
                  <th class="detailsheading"> <span class="required"> Status </span> </th>
                  <th class="detailsheading"> <span class="required"> Importance </span> </th>
                  <th class="providerheading">Issues</th>
                  <th class="providerheading"> <span class="required"> Comments </span> </th>
                  <th class="providerheading"> <span class="required"> Requires follow up</span> </th>
                  <th class="providerheading"> <span class="required"> Requires follow up from</span> </th>
                  <th colspan="2" class="cdheading"> Estimated <br>
                  End Date</th>
               </tr>
               
               <?php
               for ($i = 0; $i < 5; $i++) {
   
						if ($i % 2 == 0)
							$rowColour = "lightRow";
						else $rowColour = "darkRow"; ?>

                  <tr class="<?php print "$rowColour"; ?>">
                     <td> <input name="date<?php print "$i"; ?>" type="text" id="date<?php print "$i"; ?>" /> </td>
                     <td> <input name="manager<?php print "$i"; ?>" type="text" id="manager<?php print "$i"; ?>" /> </td>
                     <td> <input name="company<?php print "$i"; ?>" type="text" id="company<?php print "$i"; ?>" /> </td>
                     <td> <input name="project<?php print "$i"; ?>" type="text" id="project<?php print "$i"; ?>" /> </td>
                     <td>
                     	<select name="status<?php print "$i"; ?>" id="status<?php print "$i"; ?>">
                     	  <option value="New">New</option>
                     	  <option value="Ongoing">Ongoing</option>
                     	  <option value="Completed">Completed</option>
                        </select>                     </td>
                     <td><select name="importance<?php print "$i"; ?>" id="importance<?php print "$i"; ?>">
                       <option value="High">High</option>
                       <option value="Moderate">Moderate</option>
                       <option value="Low">Low</option>
                                          </select></td>
                     <td> <textarea name="issue<?php print "$i"; ?>" id="issue<?php print "$i"; ?>"></textarea> </td>
                     <td> <textarea name="comment<?php print "$i"; ?>" id="comment<?php print "$i"; ?>"></textarea> </td>
                     <td><select name="require_followup<?php print "$i"; ?>" id="require_followup<?php print "$i"; ?>" style="width: 80px">
                       <option value="Yes">Yes</option>
                       <option value="No">No</option>
                                          </select></td>
                     <td> <input name="followup<?php print "$i"; ?>" type="text" id="followup<?php print "$i"; ?>" /> </td>
                     <td><input name="estend<?php print "$i"; ?>" type="text" id="estend<?php print "$i"; ?>" /></td>
                  </tr> <?php
               }
               ?>
            </table>
            
      </form>
         
      </div>
      
   </body>
</html>