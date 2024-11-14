<? 
//	Check that an employee has logged into the system 
if(empty($_SESSION['userdetails']['Rep_name']) && $_SESSION['logged'] == true) { 
	
		header("Location: ../index.php?content=home");
		
} else { ?>
<style type="text/css">
<!--
.style26 {color: #FFFFFF}
.style32 {color: #666666}
.style43 {color: #990033}
.style44 {color: #FFFFFF; font-weight: bold; }
.style34 {	color: #990033;
	font-weight: bold;
}
.style45 {color: #000000; font-weight: bold; }
.style47 {color: #FFFFCC}
.style50 {color: #666666; font-weight: bold; }
.style51 {color: #FF0000; font-weight: bold; }
.style52 {color: #FF0000}
.style58 {color: #FFD7D7}
.style59 {color: #CCEEFF}
.style60 {color: #E1E1FF}
.style62 {color: #FFFFBF; }
.style63 {color: #FFCECE}
.style64 {color: #FFD7AE}
.style65 {color: #D9ECFF}
-->
</style>


<div class="heading"> Customer > Catalogue and Information Documents</div>

<table width="585" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="4" height="40"><br />
		  <table width="550" cellpadding="4" cellspacing="0" bordercolor="#000000" bgcolor="#EBEBEB">
                <tr>
                  <td><div align="center" style="color:#000000"><strong><span class="style52">NOTE:</span><br />
                  </strong>If you are having problems opening any of the forms, I suggest you update your 'Adobe Reader' to the latest version<strong> - <a href="http://www.adobe.com/reader" target="_blank">Click here...</a></strong></div></td>
                </tr>
          </table>
		  <br />
		  <table class="onlineAdmin" width="550" cellpadding="1" cellspacing="0">
            <tr>
              <td height="25" colspan="4" style="background-image:url(client/images/headers/default.jpg); background-repeat:repeat-y"><div align="center"><a name="orderforms" id="orderforms"></a><span class="style26"><strong>Product Catalogues and Information Sheets</strong></span></div></td>
            </tr>
            <tr bgcolor="#003466">
              <td width="167" bgcolor="#003466"><div align="center" class="style44">
                  <div align="center" class="style26">by Brand</div>
              </div></td>
              <td width="74" nowrap="nowrap"><div align="center" class="style26">
                  <div align="center"><strong>Date</strong></div>
              </div></td>
              <td width="232" bgcolor="#003466"><div align="center" class="style26">
                  <div align="center"><strong>Type</strong> </div>
              </div></td>
            <td width="67"><div align="center" class="style26">
                  <div align="center"><strong>Download</strong></div>
              </div></td>
            </tr>
                        <tr bgcolor="#FF3300">
              <td bgcolor="#FF9900"><div align="center"><strong>Photographic Catalogue</strong></div></td>
              <td nowrap="nowrap" bgcolor="#FF9900"><div align="center">Jan-08</div></td>
              <td bgcolor="#FF9900"><div align="center">Full listing of Products</div></td>
              <td bgcolor="#FF9900"><div align="center"><a href="client/orderforms/photographic catalogue.pdf" target="_blank"><img src="images/download_std.gif" width="19" height="20" border="0" /></a></div></td>
            </tr>
            <tr bgcolor="#FF3300">
              <td bgcolor="#FF9900"><div align="center"><strong>Communication Catalogue</strong></div></td>
              <td nowrap="nowrap" bgcolor="#FF9900"><div align="center">Jan-08</div></td>
              <td bgcolor="#FF9900"><div align="center">Full listing of Products</div></td>
              <td bgcolor="#FF9900"><div align="center"><a href="client/orderforms/communication catalogue.pdf" target="_blank"><img src="images/download_std.gif" alt="" width="19" height="20" border="0" /></a></div></td>
            </tr>
             <tr bgcolor="#FF3300">
              <td bgcolor="#FF9900"><div align="center"><strong>Entertainment Catalogue</strong></div></td>
              <td nowrap="nowrap" bgcolor="#FF9900"><div align="center">Jan-08</div></td>
              <td bgcolor="#FF9900"><div align="center">Full listing of Products</div></td>
              <td bgcolor="#FF9900"><div align="center"><a href="client/orderforms/entertainment catalogue.pdf" target="_blank"><img src="images/download_std.gif" width="19" height="20" border="0" /></a></div></td>
            </tr>
            <tr bgcolor="#84C1FF">
              <td rowspan="4" bgcolor="#D9ECFF"><div align="center"><strong>Telstra</strong></div></td>
              <td nowrap="nowrap" bgcolor="#D9ECFF"><div align="center">v2.0</div></td>
              <td bgcolor="#D9ECFF"><div align="center">Returns Policy </div></td>
              <td bgcolor="#D9ECFF"><div align="center"><a href="client/orderforms/RFO_Telstra_PrePaid_Returns_Policy_V20.pdf" target="_blank"><img src="images/download_std.gif" width="19" height="20" border="0" /></a></div></td>
            </tr>
            <tr bgcolor="#333333">
              <td nowrap="nowrap" bgcolor="#D9ECFF"><div align="center">July 2005</div></td>
              <td bgcolor="#D9ECFF"><div align="center">Phonecard Terms </div></td>
              <td bgcolor="#D9ECFF"><div align="center"><a href="client/orderforms/phonecard_terms.pdf" target="_blank"><img src="images/download_std.gif" width="19" height="20" border="0" /></a></div></td>
            </tr>
            <tr bgcolor="#333333">
              <td nowrap="nowrap" bgcolor="#D9ECFF"><div align="center">Nov 2005 </div></td>
              <td bgcolor="#D9ECFF"><div align="center">Product Reference Guide </div></td>
              <td bgcolor="#D9ECFF"><div align="center"><a href="orderforms/54432_PROD REF GUIDE ROUTE.pdf" target="_blank"><img src="images/download_std.gif" width="19" height="20" border="0" /></a></div></td>
            </tr>
             <tr bgcolor="#333333">
              <td nowrap="nowrap" bgcolor="#D9ECFF"><div align="center">Sept 2007 </div></td>
              <td bgcolor="#D9ECFF"><div align="center">Next G Network<br />
               CDMA Migration Module</div></td>
              <td bgcolor="#D9ECFF"><div align="center"><a href="orderforms/Next GT Network - CDMA Migration module.doc" target="_blank"><img src="images/download_std.gif" width="19" height="20" border="0" /></a></div></td>
            </tr>
<tr bgcolor="#333333">
              <td rowspan="6" bgcolor="#FFFFCC"><div align="center"><strong>Kodak </strong></div></td>
            <tr bgcolor="#333333">
              <td nowrap="nowrap" bgcolor="#FFFFCC"><div align="center">01-Aug-07</div></td>
              <td bgcolor="#FFFFCC"><div align="center">Kodak Digital Camera Info </div></td>
              <td bgcolor="#FFFFCC"><div align="center"><a href="orderforms/Reseller(Other)-Kodak DSC &amp; Accessories Price List (Effective 1st August 2007).pdf" target="_blank"><img src="client/images/download_std.gif" width="19" height="20" border="0" /></a></div></td>
            </tr>
              <tr bgcolor="#333333">
              <td nowrap="nowrap" bgcolor="#FFFFCC"><div align="center">6-Mar-06</div></td>
              <td bgcolor="#FFFFCC"><div align="center">Warranty/Repair Procedures</div></td>
              <td bgcolor="#FFFFCC"><div align="center"><a href="orderforms/Kodak Repair Request.pdf" target="_blank"><img src="client/images/download_std.gif" width="19" height="20" border="0" /></a></div></td>
              </tr>
              <tr bgcolor="#333333">
              <td nowrap="nowrap" bgcolor="#FFFFCC"><div align="center">27-June-07</div></td>
              <td bgcolor="#FFFFCC"><div align="center">Tech Support Guide</div></td>
              <td bgcolor="#FFFFCC"><div align="center"><a href="orderforms/DSC TechSuppGuide.pdf" target="_blank"><img src="client/images/download_std.gif" width="19" height="20" border="0" /></a></div></td>
              </tr>
              <tr bgcolor="#333333">
              <td nowrap="nowrap" bgcolor="#FFFFCC"><div align="center">27-June-07</div></td>
              <td bgcolor="#FFFFCC"><div align="center">Kodak Digital DOA Procedure</div></td>
              <td bgcolor="#FFFFCC"><div align="center"><a href="orderforms/DOA procedure 2007.doc" target="_blank"><img src="client/images/download_std.gif" width="19" height="20" border="0" /></a></div></td>
              </tr>
             <tr bgcolor="#333333">
              <td nowrap="nowrap" bgcolor="#FFFFCC"><div align="center">27-June-07</div></td>
              <td bgcolor="#FFFFCC"><div align="center">Kodak Digital DOA Claim Form</div></td>
              <td bgcolor="#FFFFCC"><div align="center"><a href="orderforms/KODAK DIGITAL PRODUCTS DOA FORM.doc" target="_blank"><img src="client/images/download_std.gif" width="19" height="20" border="0" /></a></div></td>
              </tr>
                          <tr bgcolor="#333333">
              <td rowspan="2" bgcolor="#FFFFCC"><div align="center"><strong>Kodak POS </strong></div></td>
              <td nowrap="nowrap" bgcolor="#FFFFCC"><div align="center">6-Mar-06</div></td>
              <td bgcolor="#FFFFCC"><div align="center">Online POS Account Reg Form </div></td>
              <td bgcolor="#FFFFCC"><div align="center"><a href="orderforms/Docklands activation form.pdf" target="_blank"><img src="client/images/download_std.gif" width="19" height="20" border="0" /></a></div></td>
            </tr>
            <tr bgcolor="#333333">
              <td nowrap="nowrap" bgcolor="#FFFFCC"><div align="center">6-Apr-06</div></td>
              <td bgcolor="#FFFFCC"><div align="center">KPK POS Fax Order Form </div></td>
              <td bgcolor="#FFFFCC"><div align="center"><a href="orderforms/6N6ARP DSPH A4 Available pos.pdf" target="_blank"><img src="client/images/download_std.gif" width="19" height="20" border="0" /></a></div></td>
            </tr>
                        <tr bgcolor="#333333">
              <td rowspan="7" bgcolor="#FFFFCC"><div align="center"><strong>Kodak Picture Kiosk </strong></div></td>
              <td nowrap="nowrap" bgcolor="#FFFFCC"><div align="center">12-Feb-07</div></td>
              <td bgcolor="#FFFFCC"><div align="center">KPK User Guide </div></td>
              <td bgcolor="#FFFFCC"><div align="center"><a href="orderforms/ORG_KPK-UserGuide.pdf" target="_blank"><img src="client/images/download_std.gif" width="19" height="20" border="0" /></a></div></td>
            </tr>
            <tr bgcolor="#333333">
              <td nowrap="nowrap" bgcolor="#FFFFCC"><div align="center">17-May-06</div></td>
              <td bgcolor="#FFFFCC"><div align="center">Kiosk Proposal </div></td>
              <td bgcolor="#FFFFCC"><div align="center"><a href="orderforms/kiosk proposal.pdf" target="_blank"><img src="client/images/download_std.gif" width="19" height="20" border="0" /></a></div></td>
            </tr>
                        <tr bgcolor="#333333">
              <td nowrap="nowrap" bgcolor="#FFFFCC"><div align="center">17-May-07</div></td>
              <td bgcolor="#FFFFCC"><div align="center">KPK  Purchase Order </div></td>
              <td bgcolor="#FFFFCC"><div align="center"><a href="orderforms/KPK Purchase Order Form 070516.pdf" target="_blank"><img src="client/images/download_std.gif" width="19" height="20" border="0" /></a></div></td>
            </tr>
            <tr bgcolor="#333333">
              <td nowrap="nowrap" bgcolor="#FFFFCC"><div align="center">17-May-07</div></td>
              <td bgcolor="#FFFFCC"><div align="center">KPK Rental Order </div></td>
              <td bgcolor="#FFFFCC"><div align="center"><a href="orderforms/KPK Rental Order Form 070516.pdf" target="_blank"><img src="client/images/download_std.gif" width="19" height="20" border="0" /></a></div></td>
            </tr>
            <tr bgcolor="#333333">
              <td nowrap="nowrap" bgcolor="#FFFFCC"><div align="center">17-May-07</div></td>
              <td bgcolor="#FFFFCC"><div align="center">GS Compact  Purchase Order </div></td>
              <td bgcolor="#FFFFCC"><div align="center"><a href="orderforms/[2008-01 C-Direct] GS COMPACT Kiosk Offer [PURCHASE].doc" target="_blank"><img src="client/images/download_std.gif" width="19" height="20" border="0" /></a></div></td>
            </tr>
            <tr bgcolor="#333333">
              <td nowrap="nowrap" bgcolor="#FFFFCC"><div align="center">17-May-07</div></td>
              <td bgcolor="#FFFFCC"><div align="center">GS Compact Rental Order </div></td>
              <td bgcolor="#FFFFCC"><div align="center"><a href="orderforms/[2008-01 C-Direct] GS COMPACT Kiosk Offer [RENTAL].doc" target="_blank"><img src="client/images/download_std.gif" width="19" height="20" border="0" /></a></div></td>
            </tr>
            <tr bgcolor="#333333">
              <td nowrap="nowrap" bgcolor="#FFFFCC"><div align="center">29-Aug-07</div></td>
              <td bgcolor="#FFFFCC"><div align="center">Kiosk Viability Calculator</div></td>
              <td bgcolor="#FFFFCC"><div align="center"><a href="orderforms/CDOF_KODAK_CONS_060821_STD.pdf"></a><a href="orderforms/Digital Kiosk calculator v070828.xls" target="_blank"><img src="client/images/xls.gif" width="20" height="20" border="0" /></a></div></td>
            </tr>
    <tr bgcolor="#F4F4F4">
    <td bgcolor="#FFD7D7"><div align="center"><strong>Sandisk</strong></div></td>
    <td nowrap="nowrap" bgcolor="#FFD7D7"><div align="center">5-May-06</div></td>
    <td bgcolor="#FFD7D7"><div align="center">Information Page </div></td>
    <td bgcolor="#FFD7D7"><div align="center"><a href="orderforms/CDINFO_SANDISK_memorycard_guide.pdf" target="_blank"><img src="client/images/download_std.gif" width="19" height="20" border="0" /></a></div></td>
  </tr>
  <td rowspan="2" bgcolor="#CCEEFF"><div align="center"><strong>TDK</strong></div></td>
    <td nowrap="nowrap" bgcolor="#CCEEFF"><div align="center">7-Feb-08</div></td>
    <td bgcolor="#CCEEFF"><div align="center">Info - Headphones </div></td>
    <td bgcolor="#CCEEFF"><div align="center"><a href="orderforms/headphone Guide.pdf" target="_blank"><img src="client/images/download_std.gif" width="19" height="20" border="0" /></a></div></td>
  </tr>
    <tr bgcolor="#333333">
    <td nowrap="nowrap" bgcolor="#CCEEFF"><div align="center">7-Feb-08</div></td>
    <td bgcolor="#CCEEFF"><div align="center">Info - Recordable Media</div></td>
    <td bgcolor="#CCEEFF"><div align="center"><a href="orderforms/TDK_Recordable_Guide.pdf" target="_blank"><img src="client/images/download_std.gif" width="19" height="20" border="0" /></a></div></td>
  </tr>  
    <tr bgcolor="#333333">
    <td bgcolor="#CC99CC"><div align="center"><strong>eGrips Tredz </strong></div></td>
    <td nowrap="nowrap" bgcolor="#CC99CC"><div align="center">21-Feb-07</div></td>
    <td bgcolor="#CC99CC"><div align="center">Information Page/Flyer </div></td>
    <td bgcolor="#CC99CC"><div align="center"><a href="orderforms/INFO_TREDZ_070221.pdf" target="_blank"><img src="client/images/download_std.gif" width="19" height="20" border="0" /></a></div></td>
  </tr>
  <tr bgcolor="#333333">
    <td bgcolor="#FFD7AE"><div align="center"><strong>Tropicare</strong></div></td>
    <td nowrap="nowrap" bgcolor="#FFD7AE"><div align="center">21-Aug-06</div></td>
    <td bgcolor="#FFD7AE"><div align="center">Information Page </div></td>
    <td bgcolor="#FFD7AE"><div align="center"><a href="orderforms/Tropicare A4 Flyer.pdf" target="_blank"><img src="client/images/download_std.gif" width="19" height="20" border="0" /></a></div></td>
  </tr>
          </table>
	  </td>
	</tr>
	<tr>
		<td colspan="4" height="60">
			<div style="padding-top:10px;padding-left:10px">
				<a href="client/index.php?content=home"><strong>>> Home</strong></a>			</div>		</td>
	</tr>
</table>
<? } ?>