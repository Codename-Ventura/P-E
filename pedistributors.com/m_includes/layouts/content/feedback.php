<?php
if($feedback->form_submit == "TRUE"){
?>
<div class="main">
<div class="text-box">
<div class="titles">Thank you!</div>
<p>Please click <a href="index.php?p=members">here</a> to return to the member's page</p>
</div>
</div>


<?php
}else{
?>

<form name="user_survey" method="post">
 
<div class="main">
<div class="text-box">
<div class="titles">Feedback</div>

<div style="width:400px; margin:1em auto 0 auto">
<div style="float:left; margin:1em 0 1em 0">1.  How often do you visit our site?</div>
<div style="float:left; clear:left; margin:0 auto 0 1em; line-height:20px; width:75%;"><input type="radio" name="Amount of Use" value="Everyday"  style="line-height:10px"/>Everyday</div>
<div style="float:left; clear:left; margin:0 auto 0 1em; line-height:20px; width:75%;"><input type="radio" name="Amount of Use" value="2-3 Times a week"  style="line-height:10px"/>2-3 times a week</div>
<div style="float:left; clear:left; margin:0 auto 0 1em; line-height:20px; width:75%;"><input type="radio" name="Amount of Use" value="Once a week"  style="line-height:10px"/>1 time a week</div>
<div style="float:left; clear:left; margin:0 auto 0 1em; line-height:20px; width:75%;"><input type="radio" name="Amount of Use" value="Less than once a week"  style="line-height:10px"/>Less than 1 time a week</div>
</div>


<div style="width:400px; margin:1em auto 0 auto">
<div style="float:left; margin-bottom:1em">2.  What do you mainly use the P&E website for?</div>
<div style="float:left; clear:left; margin:0 auto 0 1em; line-height:20px; width:75%;"><input type="radio" name="Main Use" value="Ordering"  style="line-height:10px"/>Ordering</div>
<div style="float:left; clear:left; margin:0 auto 0 1em; line-height:20px; width:75%;"><input type="radio" name="Main Use" value="Check Stock"  style="line-height:10px"/>Checking Stock</div>
<div style="float:left; clear:left; margin:0 auto 0 1em; line-height:20px; width:75%;"><input type="radio" name="Main Use" value="Check Price"  style="line-height:10px"/>Checking Prices</div>
<div style="float:left; clear:left; margin:0 auto 0 1em; line-height:20px; width:75%;"><input type="radio" name="Main Use" value="Other"  style="line-height:10px" onclick="$('#otheruse').slideToggle();"/>Other (please specify)</div>
<div style="float:left; display:none; clear:left; margin:1em auto 0 2em; line-height:20px; width:75%;" id="otheruse"><input type="text" name="Other:" style="line-height:10px; color:#CCCCCC;" value="specify here..." onclick="if(this.value==this.defaultValue)this.value='';" /></div>
</div>

<div style="width:400px; margin:1em auto 0 auto">
<div style="float:left; margin:1em 0 1em 0">3.  What time of the day do you usually use our site?</div>
<div style="float:left; clear:left; margin:0 auto 0 1em; line-height:20px; width:75%;"><input type="radio" name="Time of Use" value="Early AM"  style="line-height:10px"/>Early Morning (Before 8 AM)</div>
<div style="float:left; clear:left; margin:0 auto 0 1em; line-height:20px; width:75%;"><input type="radio" name="Time of Use" value="8 AM - Noon"  style="line-height:10px"/>8 AM - 12 PM</div>
<div style="float:left; clear:left; margin:0 auto 0 1em; line-height:20px; width:75%;"><input type="radio" name="Time of Use" value="Noon - 5 PM"  style="line-height:10px"/>12 PM - 5 PM</div>
<div style="float:left; clear:left; margin:0 auto 0 1em; line-height:20px; width:75%;"><input type="radio" name="Time of Use" value="After 5 PM"  style="line-height:10px"/>After 5 PM</div>
</div>

<div style="width:400px; margin:1em auto 0 auto">
<div style="float:left; margin:1em 0 1em 0">4.  What is one suggestion you would make?</div>
<div style="float:left; clear:left; margin:0 auto 0 1em; line-height:20px; width:75%;"><input type="text" name="Suggestion" value=""  style="line-height:10px" size="50"/></div>
</div>

<div style="width:400px; margin:1em auto 0 auto">
<div style="float:left; margin:1em 0 1em 0">5.  What is one thing you would not change?</div>
<div style="float:left; clear:left; margin:0 auto 0 1em; line-height:20px; width:75%;"><input type="text" name="Complaint" value=""  style="line-height:10px" size="50"/></div>
<div style="float:left; clear:left; margin:2em auto 0 1em; line-height:20px; width:75%; text-align:center" ><button type="submit">Submit</button></div>
</div>



</div></div>

<input type="hidden" name="feedbackform" value="true">
</form>

<?php
}
?>