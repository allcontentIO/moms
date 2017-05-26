<?php
ob_start();
session_start();
 
include('../includes/connect.php');

if($_REQUEST['frequency']==2 || $_REQUEST['frequency']==9){

echo '<label>Expected Day <span style="color:#FF0000">*</span></label><select name="expected_day" id="expected_day"><option value="Sunday">Sunday</option><option value="Monday">Monday</option><option value="Tuesday">Tuesday</option><option value="Wednesday">Wednesday</option><option value="Thursday">Thursday</option><option value="Friday">Friday</option><option value="Saturday">Saturday</option></select>';


}elseif($_REQUEST['frequency']==3){
echo '<label>Expected Day <span style="color:#FF0000">*</span></label> <br /><input type="checkbox" name="expected_day[]" onclick="getExpected()" style="width:32px;height:15px;" id="expected_day" value="Sunday" > Sunday <input type="checkbox" style="width:32px;height:15px;" name="expected_day[]" onclick="getExpected()" id="expected_day" value="Monday" >Monday<input type="checkbox" name="expected_day[]" style="width:32px;height:15px;" onclick="getExpected()" id="expected_day" value="Tuesday" >Tuesday <input type="checkbox" style="width:32px;height:15px;" name="expected_day[]" onclick="getExpected()" id="expected_day" value="Wednesday" >Wednesday <input type="checkbox" style="width:32px;height:15px;" name="expected_day[]" id="expected_day" value="Thursday" onclick="getExpected()" >Thursday <input type="checkbox" style="width:32px;height:15px;" name="expected_day[]" id="expected_day" value="Friday"  onclick="getExpected()">Friday <input type="checkbox" style="width:32px;height:15px;" name="expected_day[]" id="expected_day" value="Saturday"  onclick="getExpected()">Saturday';

}
elseif($_REQUEST['frequency']!=1 ){

echo '<label>Expected Date <span style="color:#FF0000">*</span></label><input type="text" name="expected_date" id="expected_date" value="" placeholder="Expected Date"  style="margin:0"><span style="color:blue; line-height:12px;">Date format: yyyy-mm-dd </span>';
}else{
echo '<label>Expected Date <span style="color:#FF0000">*</span></label><br/><span style="color:blue; line-height:12px;">Not Applicable</span>';

}

		
?> 
    