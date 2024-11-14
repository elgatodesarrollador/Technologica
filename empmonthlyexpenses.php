<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title> Monthly Expenses Form </title>
		<style type="text/css">
			<!--
			body {
				font-family: Arial, Helvetica, sans-serif;
				font-size: small;
			}
			table tr td {
				text-align: center;
				font-family: Verdana, Helvetica, sans-serif;
				font-size: small;
			}
			.heading {
				text-align: center;
				font-size: x-small;
				font-family: Arial, Helvetica, sans-serif;
				font-weight: bold;
				color: white;
				background-color: #006699;
				padding: 0 4px;
			}
			select {
				color: white;
				background-color: #006699;
			}
			input.lightShade {
				background-color: #CCCCCC;
			}
			input.darkShade {
				background-color: #999999;
			}
			-->
		</style>
        <script src='https://www.google.com/recaptcha/api.js'></script>
	</head>

	<body>
		<form action="<?php $_SERVER['PHP_SELF'];?>" secret="6Lf-Tg8UAAAAAAjUGQY6WuHd6Ov5F0oQk60m8-0Q"  method="post">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td height="40" colspan="10" class="heading"><span style="font-size: medium;"><b> Monthly Expenses </b></span></td>
				</tr>
				<tr><td>&nbsp;  </td></tr>
				<tr>
					<td colspan="5">
						<strong> Month: </strong>
						<select name="month" id="select2">
							<option value="Please Select..">Please Select..</option>
							<option value="January">January</option>
							<option value="February">February</option>
							<option value="March">March</option>
							<option value="April">April</option>
							<option value="May">May</option>
							<option value="June">June</option>
							<option value="July">July</option>
							<option value="August">August</option>
							<option value="September">September</option>
							<option value="October">October</option>
							<option value="November">November</option>
							<option value="December">December</option>
						</select>
					</td>
					<td colspan="5">
						<strong> Representative: </strong> <?php print $_SESSION['userdetails']['Rep_name']; ?>
					</td>
				</tr>
				<tr><td colspan="10">
					<a href="mailto:rnaughton@c-direct.com.au"> First time user or need help? rnaughton@c-direct.com.au </a>
				</td></tr>
				<tr><td>&nbsp;  </td></tr>
				<tr>
					<td class="heading"> <strong> Day </strong> </td>
					<td class="heading"> <strong> KM </strong></td>
					<td class="heading"> <strong> Expenses </strong></td>
					<td class="heading"> <strong> Parking/Toll </strong></td>
					<td class="heading"> <strong> Phone/Fax </strong></td>
					<td class="heading"> <strong> Travel </strong></td>
					<td class="heading"> <strong> Entertainment </strong></td>
					<td class="heading"> <strong> Misc </strong></td>
					<td class="heading"> <strong> KM $ </strong></td>
					<td class="heading"> <strong> Total $ </strong></td>
				</tr>
				
				<?php
					/* Run loop to dynamically added fields */
					for ($fieldrow = 1; $fieldrow <= 20; $fieldrow++) {
					
						if ($fieldrow % 2 == 0)
							$colorClass = "lightShade";
						else $colorClass = "darkShade";
				?>
						<tr>
							<td> <input class="<?php print $colorClass; ?>" type="text" name="<?php print "day$fieldrow"; ?>" size="5" maxlength"5"> </td>
							<td> <input class="<?php print $colorClass; ?>" type="text" name="<?php print "kms$fieldrow"; ?>" size="4" maxlength"4"> </td>
							<td> <input class="<?php print $colorClass; ?>" type="text" name="<?php print "expenses$fieldrow"; ?>" size="6" maxlength"255"> </td>
							<td> <input class="<?php print $colorClass; ?>" type="text" name="<?php print "parkingtoll$fieldrow"; ?>" size="6" maxlength"6"> </td>
							<td> <input class="<?php print $colorClass; ?>" type="text" name="<?php print "phonefax$fieldrow"; ?>" size="6" maxlength"6"> </td>
							<td> <input class="<?php print $colorClass; ?>" type="text" name="<?php print "travel$fieldrow"; ?>" size="6" maxlength"6"> </td>
							<td> <input class="<?php print $colorClass; ?>" type="text" name="<?php print "entertainment$fieldrow"; ?>" size="8" maxlength"6"> </td>
							<td> <input class="<?php print $colorClass; ?>" type="text" name="<?php print "misc$fieldrow"; ?>" size="4" maxlength"6"> </td>
							<td> <input class="<?php print $colorClass; ?>" type="text" name="<?php print "kmtotal$fieldrow"; ?>" size="4" maxlength"6"> </td>
							<td> <input class="<?php print $colorClass; ?>" type="text" name="<?php print "total$fieldrow"; ?>" size="4" maxlength"6"> </td>
						</tr>
				<?php
					}
				?>
			</table>
            <div class="g-recaptcha" data-sitekey="6Lf-Tg8UAAAAAIqM6N9PwuH724bwscdl14WrSsLL"></div>
		</form>
	</body>
</html>