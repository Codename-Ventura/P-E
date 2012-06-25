

<div class="main">

<div class="text-box">
<FORM name="tenn2" method="post" action = "http://wwwapps.ups.com/WebTracking/OnlineTool" target="blank">
<img src="images/headers/topper_UPS.jpg" style="margin:1em 0 1em 0" />

<div class="row">
	<div class="col">P&E Customer Number:</div>
    <div class="rcol"><input type="text" name="InquiryNumber" value="" size="22" class="style6"></div>
</div>
<div class="row">
	<div class="col">Ship From Date Range:</div>
    <div class="rcol">
     <SELECT class="style6" NAME="FromPickupMonth" size="1" style="width: 50px">
                          <OPTION VALUE="1" selected>Jan 
                          <OPTION VALUE="2">Feb 
                          <OPTION VALUE="3">Mar 
                          <OPTION VALUE="4">Apr 
                          <OPTION VALUE="5">May 
                          <OPTION VALUE="6">Jun 
                          <OPTION VALUE="7">Jul 
                          <OPTION VALUE="8">Aug 
                          <OPTION VALUE="9">Sep 
                          <OPTION VALUE="10">Oct 
                          <OPTION VALUE="11">Nov 
                          <OPTION VALUE="12">Dec 
                        </SELECT>

                        <SELECT class="style6" NAME="FromPickupDay" size="1" style="width: 40px">
                          <OPTION selected>1 
                          <OPTION>2 
                          <OPTION>3 
                          <OPTION>4 
                          <OPTION>5 
                          <OPTION>6 
                          <OPTION>7 
                          <OPTION>8 
                          <OPTION>9 
                          <OPTION>10 
                          <OPTION>11 
                          <OPTION>12 
                          <OPTION>13 
                          <OPTION>14 
                          <OPTION>15 
                          <OPTION>16 
                          <OPTION>17 
                          <OPTION>18 
                          <OPTION>19 
                          <OPTION>20 
                          <OPTION>21 
                          <OPTION>22 
                          <OPTION>23 
                          <OPTION>24 
                          <OPTION>25 
                          <OPTION>26 
                          <OPTION>27 
                          <OPTION>28 
                          <OPTION>29 
                          <OPTION>30 
                          <OPTION>31 
                        </SELECT>

                        <SELECT class="style6" NAME="FromPickupYear" size="1" style="width: 55px">
                          <option>2008</option>
                          <option>2009</option>
                          <option selected>2010</option>
                        </SELECT>
    </div>
</div>

<div class="row">
	<div class="col">Until</div>
    <div class="rcol" style="font-size:14px">TODAY (<?php echo date("m-d-Y");?>)</div>
</div>

<div class="row">
	<div class="col">Shipped From:</div>
    <div class="rcol" style="font-size:14px"><select name="SenderShipperNumber" class="style6">
                          <option value="311911">Goodlettsville, TN</option>
                          <option value="336223">Birmingham, AL</option>
                          <option value="45629X">Marietta, GA</option>

                                                </select>
	</div>
</div>
<div class="row">
	<div class="col" style="color:#E80000; border:.5px #E0E0E0 dashed;"></div>
    <div class="rcol" style="font-size:14px;"><input name="Log In" type="image" value="Track this package" src="images/gobutton.jpg" width="40" height="40" border="0"></div>
</div>

                       
                        <INPUT type="hidden" name="nonUPS_body" value="BGCOLOR=&quot;#EEEEEE&quot;">
                        <INPUT type="hidden" name="UPS_HTML_License" value="Your Access Key">
                        <INPUT type="hidden" name="UPS_HTML_Version" value="3.0">
                        <INPUT type="hidden" name="TypeOfInquiryNumber" value="R">
                      </FORM>
</div></div>